"use strict";

app.controller('cartInstanceCtrl', function ($uibModalInstance, $scope, Carts, Auth, Customers, Products, sharedService, cartService, Config) {
  init()

  function init() {
    $scope.partImgProduct = Config.partImgProduct();
    $scope.partImgProductOrder = Config.partImgProductOrder();
    $scope.partImgProductList = Config.partImgProductList();
    $scope.partImgProductCard = Config.partImgProductCard();
    
    fetchCart();

    $scope.items = cartService.getProducts();
    $scope.totalAmount = 0;
  }

  $scope.order = function () {
    window.location = _base + '/cart';
  };

  $scope.toShop = function () {
    window.location = _base + '/product/10';
  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
  
  $scope.editedItem = {};

  $scope.updateCart = function ($index) {
    $scope.loadingcart = true;
    angular.copy($scope.items[$index], $scope.editedItem);

    if ($scope.editedItem.qty < $scope.items[$index].altUnitAmount) {
      var $qty = $scope.items[$index].altUnitAmount;

      swal(`กรุณาสั่งซื้ออย่างน้อย ${$scope.items[$index].altUnitAmount} ${$scope.items[$index].unitNameTh} ค่ะ`,);
      $scope.loadingcart = false;
    } else if ($scope.editedItem.qty % $scope.items[$index].altUnitAmount) {
      var un = parseInt($scope.editedItem.qty) / parseInt($scope.items[$index].altUnitAmount);
      var $qty = $scope.items[$index].altUnitAmount * parseInt(un);
      
      swal({ 
        html:true , 
        title:'ผลิตภัณฑ์ต้องสั่งซื้อทีละ ' + $scope.items[$index].altUnitAmount + ' ' + $scope.items[$index]['unitNameTh'] + '<br> ระบบจะปรับจำนวนให้อัตโนมัติ <br>กรุณาตรวจสอบจำนวนสินค้า ก่อนกดเพิ่มสินค้าค่ะ' , 
        text:''
      });

      $scope.loadingcart = false;
    } else {
      var $qty = $scope.editedItem.qty;
    }

    var cartList = [{
      customerId: Customers.customerId(),
      productId: $scope.editedItem.productId,
      qty: $qty,
      userName: Auth.username()
    }];

    var promotionList = [];
 
    Carts.updateCart(cartList, promotionList).then(function(res) {
      fetchCart();
      $scope.loadingcart = false;
    });
  };

  $scope.addQty = function ($index) {
    $scope.loadingcart = true;
    angular.copy($scope.items[$index], $scope.editedItem);

    console.log("isBox-->",$scope.items[$index].isBox);

    var $mqty = 0;
    if($scope.items[$index].isBox == false)
    {
      $mqty = 1;
    }
    else
    {
      $mqty = $scope.items[$index].altUnitAmount == 0 ? 1 : $scope.items[$index].altUnitAmount;
    }

    var cartList = [{
      customerId: Customers.customerId(),
      productId: $scope.editedItem.productId,
      qty: parseInt($scope.editedItem.qty) + parseInt($mqty),
      userName: Auth.username()
    }];

    var promotionList = [];

    Carts.updateCart(cartList, promotionList).then(function (response) {
      fetchCart();
      $scope.loadingcart = false;
    }, function (response) {
    });
  }

  $scope.removeQty = function ($index) {
    $scope.loadingcart = true;
    angular.copy($scope.items[$index], $scope.editedItem);

    var $mqty = 0;
    if($scope.items[$index].isBox == false)
    {
      $mqty = 1;
    }
    else
    {
      $mqty = $scope.items[$index].altUnitAmount == 0 ? 1 : $scope.items[$index].altUnitAmount;
    }

    // var $mqty = $scope.items[$index].altUnitAmount == 0 ? 1 : $scope.items[$index].altUnitAmount;

    if ($scope.editedItem.qty > $mqty)
      var cartList = [{
        customerId: Customers.customerId(),
        productId: $scope.editedItem.productId,
        qty: parseInt($scope.editedItem.qty) - parseInt($mqty),
        userName: Auth.username()
      }];

    var promotionList = [];

    Carts.updateCart(cartList, promotionList).then(function (response) {
      fetchCart();
      $scope.loadingcart = false;
    });
  };

  $scope.removeCart = function (product) {
    var cartList = [{
      customerId: Customers.customerId(),
      productId: product.productId,
      userName: Auth.username()
    }];
    
    Carts.removeCart(cartList).then(function (response) {
      if (response.data.result == 'SUCCESS') {
        cartService.getProducts().forEach(function(i, x) {
          if (i.productId = product.productId) {
            cartService.removeProduct(x);
          }
        });

        fetchCart();
        
        swal('สำเร็จ', 'ลบสินค้าเรียบร้อยแล้ว', 'success');
      } else {
        swal('เกิดข้อผิดพลาด', 'ไม่สามารถลบสินค้าได้', 'warning');
      }
    });
  }

  $scope.removeAll = function() {
    if ($scope.items.length > 0) {
      swal({
        title: 'คุณต้องการลบสินค้าทั้งหมดใช้ตระกร้าใช่หรือไม่',
        showCancelButton: true,
        confirmButtonText: 'ตกลง',
        cancelButtonText: 'ยกเลิก',
        closeOnConfirm: false
      },
      function(){
        var cartList = [{
          customerId: Customers.customerId(),
          productId: 0,
          userName: Auth.username()
        }];
        
        Carts.removeCart(cartList).then(function(response) {
          if (response.data.result == 'SUCCESS') {
            cartService.getProducts().forEach(function(i, x) {
              cartService.removeProduct(i);
            });
    
            fetchCart();
            
            swal('ลบสินค้าเรียบร้อยแล้ว');
          } else {
            return false;
          }
        });
      });   
    } else {
      swal('ไม่มีสินค้าในตะกร้า');
    }
  }


  function fetchCart() {
    Carts.fetchAll(Customers.customerId()).then(function (response) {
      if (response.data.result == 'SUCCESS') {
        console.log(response);
        $scope.carts = response.data.data.cartList;
        $scope.bomxs = response.data.data.cartBOMItems;
        $scope.totalAmount = 0;
        $scope.totalQty = 0;

        for (var key in $scope.carts) {
          //  console.log('key ' + key + ' total amount ' + $scope.items[key].totalAmount );
          $scope.totalAmount += $scope.carts[key].totalAmount;
          $scope.totalQty += $scope.carts[key].qty;
          //  $('.bellnumbers').text($scope.totalQty);
          for (var bm in $scope.bomxs) {
            //console.log('check ref id ', $scope.bomxs[bm]['productRefCode'],' > ', $scope.items[key]['productCode'])
            if ($scope.bomxs[bm]['productRefCode'] == $scope.carts[key]['productCode'])
              $scope.totalAmount += $scope.bomxs[bm]['price'] * $scope.carts[key]['qty'];
          }
        }

        response.data.data.cartList.forEach(function (i, x) {
          cartService.updateProduct(x, i);
        });
      }
    });
  }
});

app.controller('AppController', function ($scope, $http, $filter, Customers, Auth, $uibModal, $log, Carts, Config, sharedService, cartService) {
  $scope.placesearch = 'ค้นหาสินค้า';
  $scope.bomxs = {};
  $scope.totalAmount = 0;
  $scope.totalQty = 0;

  $scope.username = Auth.username();
  $scope.usertype = Auth.userTypeDesc();
  $scope.customerName = Customers.customerName();
 
  if ($scope.usertype == 'Multi') {
    $scope.customerCode = Customers.customerCode();
  }

  Carts.fetchAll(Customers.customerId()).then(function (response) {
    if (response.data.result == 'SUCCESS') {
      response.data.data.cartList.forEach(function (i, x) {
        cartService.addProduct(i);
      });
    }
  });

  $scope.carts = cartService.getProducts();

  $scope.maddQty = function (field) {
    //console.log('on click maddQty ');
  }

  var url = window.location.href.split('/').pop();

  if (url == 'customer')
    $scope.hidemenu = true;
  else
    $scope.hidemenu = false;

  $scope.search = function () {
    //window.location = _base + '/product/search?q=' + $scope.searchstring;
    if ($scope.hidemenu) {
      sharedService.passData($scope.searchstring);
    } else {
      window.location = _base + '/product/search?q=' + $scope.searchstring;     
    }
  }

  $scope.toPage = function (page) {
    window.location.href = page;
  }

  $scope.toHome = function () {
    window.location = _base + '/home/' + Customers.customerId();
  }

  $scope.logout = function () {
    Auth.logout();
  }

  $scope.animationsEnabled = true;

  $scope.openModalCart = function (size, parentSelector) {
    /*
    var parentElem = parentSelector ?
      angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;
    */
    var modalInstance = $uibModal.open({
      animation: $scope.animationsEnabled,
      ariaLabelledBy: 'modal-title',
      ariaDescribedBy: 'modal-body',
      templateUrl: _base + '/template/modals/cart.modal.html',
      controller: 'cartInstanceCtrl',
      controllerAs: '$scope',
      windowClass: 'modal-cart right fade',
      size: size,
      //appendTo: parentElem,
    });

    modalInstance.result.then(function (selectedItem) {
      $scope.selected = selectedItem;

    }, function () {
      $log.info('Modal dismissed at: ' + new Date());
    });
  };

  $scope.toggleAnimation = function () {
    $scope.animationsEnabled = !$scope.animationsEnabled;
  };

  function fetchCustomer(customerId) {
    Customers.fetchOne(customerId).then(function (response) {
      if (response.data.result == 'SUCCESS') {
        $scope.customer = response.data.data.customerInfo;
        $scope.customerCode = $scope.customer.customerCode;
      }
      $scope.loading = false;
    });
  }
});
