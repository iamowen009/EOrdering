"use strict";

app.controller('ModalInstanceCtrl', function ($uibModalInstance, boms,items,totalAmount,totalQty,$scope,Carts,Auth,Customers,Config) {


  $scope.items = items;
  $scope.boms = boms;
  $scope.totalAmount = totalAmount;
  $scope.totalQty = totalQty;
  $scope.selected = {
    item: $scope.items[0],
    boms: $scope.boms[0]
  };
  $scope.partImgProduct = Config.partImgProduct();
  $scope.partImgProductOrder = Config.partImgProductOrder();
  $scope.partImgProductList = Config.partImgProductList();
  $scope.order = function () {
    //$uibModalInstance.close($scope.selected.item);
    window.location= _base + '/cart';
  };

  $scope.toShop = function(){
      window.location= _base + '/product/0';//+Customers.customerId();
  }

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
  $scope.editedItem = {};
  $scope.updateCart = function($index){
    $scope.loadingcart = true;
    angular.copy($scope.items[$index], $scope.editedItem);
    //console.log($scope.editedItem);
    var cartList = [{
        customerId: Customers.customerId(),
        productId: $scope.editedItem.productId,
        qty: $scope.editedItem.qty,
        userName: Auth.username()
    }];
    var promotionList = [];
    Carts.updateCart(cartList,promotionList).then(function (response) {
        $scope.loadingcart = false;

        fetchCart(Customers.customerId());
    }, function (response) {

            console.log(response);
    });
  }
  $scope.maddQty = function($index){
    $scope.loadingcart = true;
    angular.copy($scope.items[$index], $scope.editedItem);
    //console.log($scope.editedItem);
    var cartList = [{
        customerId: Customers.customerId(),
        productId: $scope.editedItem.productId,
        qty: parseInt($scope.editedItem.qty)+1,
        userName: Auth.username()
    }];
    var promotionList = [];
    Carts.updateCart(cartList,promotionList).then(function (response) {
        $scope.loadingcart = false;

        fetchCart(Customers.customerId());
    }, function (response) {
            console.log('response');
            console.log(response);
    });
  }

  $scope.mremoveQty = function($index){
    $scope.loadingcart = true;
    angular.copy($scope.items[$index], $scope.editedItem);
    //console.log($scope.editedItem);
      if( $scope.editedItem.qty > 1)
    var cartList = [{
        customerId: Customers.customerId(),
        productId: $scope.editedItem.productId,
        qty: parseInt($scope.editedItem.qty)-1,
        userName: Auth.username()
    }];
    var promotionList = [];
    Carts.updateCart(cartList,promotionList).then(function (response) {
        $scope.loadingcart = false;

        fetchCart(Customers.customerId());
    }, function (response) {
            console.log('response');
            console.log(response);
    });
  }

  $scope.removeCart = function(productId){

    var cartList = [{
        customerId: Customers.customerId(),
        productId: productId,
        userName: Auth.username()
    }];
    console.log(cartList);

    Carts.removeCart(cartList).then(function (response) {
        if(response.data.result=='SUCCESS'){
            swal({
              'text'  : 'ลบสินค้าเรียบร้อยแล้ว'
            },
            function(){
              fetchCart(Customers.customerId());
              //window.location.reload();
            });
            fetchCart(Customers.customerId());
            //$uibModalInstance.dismiss('cancel');

        }else{
            swal('ลบสินค้าไม่สำเร็จ');
        }

        $scope.loading = false;
    });
  }

  $scope.removeAll = function(){

    var cartList = [{
        customerId: Customers.customerId(),
        productId:0,
        userName: Auth.username()
    }];
    console.log(cartList);

    Carts.removeCart(cartList).then(function (response) {
        if(response.data.result=='SUCCESS'){

            swal('ลบสินค้าเรียบร้อยแล้ว');
            //$uibModalInstance.dismiss('cancel');
            fetchCart(Customers.customerId());
            $scope.cancel();
        }else{
            swal('ลบสินค้าไม่สำเร็จ');
        }

        $scope.loading = false;
    });
  }
$scope.bomxs = {};
  function fetchCart(customerId) {
      $scope.loading = true;
      console.log('cart ' + customerId);
      Carts.fetchAll(customerId).then(function (response) {
          if(response.data.result=='SUCCESS'){
              $scope.items = response.data.data.cartList;
              $scope.bomxs   = response.data.data.cartBOMItems;
              //console.log('in cart');
              //console.log($scope.items);
              $scope.totalAmount=0;
              $scope.totalQty=0;
              for(var key in $scope.items){
                //  console.log('key ' + key + ' total amount ' + $scope.items[key].totalAmount );
                  $scope.totalAmount += $scope.items[key].totalAmount;
                  $scope.totalQty += $scope.items[key].qty;
                  console.log('total amount : ' + $scope.totalAmount + ' total qty : ' + $scope.totalQty );
                //  $('.bellnumbers').text($scope.totalQty);
                for(var bm in $scope.bomxs){
                  console.log('check ref id ', $scope.bomxs[bm]['productRefCode'],' > ', $scope.items[key]['productCode'])
                  if( $scope.bomxs[bm]['productRefCode'] == $scope.items[key]['productCode'] )
                    $scope.totalAmount += $scope.bomxs[bm]['price'] * $scope.items[key]['qty'];

                }

              }
              $('.bellnumbers').text($scope.items.length);
          }
          $scope.loading = false;
      });

  }

});



app.controller('AppController',
    function ($scope, $http, $filter,Customers,Auth,$uibModal,$log,Carts,Config,sharedService) {
        $scope.placesearch = 'ค้นหาสินค้า';
        $scope.bomxs = {};
        fetchCart(Customers.customerId());
        $scope.totalAmount = 0;
        $scope.totalQty = 0;

        $scope.username = Auth.username();
        $scope.usertype = Auth.userTypeDesc();
        $scope.customerName = Customers.customerName();

        var customerId = Customers.customerId();
        fetchCustomer(customerId);

        console.log( 'customer name : ' + $scope.customerName + ' | '+Customers.customerId() + 'Autn : ' + Auth.genId() , Customers );
        function fetchCart(customerId) {
            console.log('cart');
            Carts.fetchAll(customerId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.carts = response.data.data.cartList;
                    $scope.bomxs = response.data.data.cartBOMItems;
                    console.log('in cart');
                    console.log($scope.carts);
                    for(var key in $scope.carts){
                        $scope.totalAmount += $scope.carts[key]['totalAmount'];
                        $scope.totalQty += $scope.carts[key]['qty']+'ss';
                        for(var bm in $scope.bomxs){
                          console.log('check ref id ', $scope.bomxs[bm]['productRefCode'],' > ', $scope.carts[key]['productCode'])
                          if( $scope.bomxs[bm]['productRefCode'] == $scope.carts[key]['productCode'] )
                            $scope.totalAmount += $scope.bomxs[bm]['price'] * $scope.carts[key]['qty'];

                        }
                    }
                }
                $scope.loading = false;
            });
        }

        $scope.maddQty = function(field){
          console.log('on click maddQty ');
        }


        var url = window.location.href.split('/').pop();
        if(url=='customer')
          $scope.hidemenu = true;
        else
          $scope.hidemenu = false;
        console.log($scope.hidemenu);

        $scope.search = function(){
            $scope.link = window.location.href;
            //window.location = $scope.link+'?searchstring='+$scope.searchstring;
            /*$scope.link = window.location.href.split('/').pop();
            console.log($scope.link);
            if($scope.link=='customer'){
              fetchAllCustomers(Auth.userId());

            }*/
            sharedService.passData($scope.searchstring);


        }
        $scope.toPage = function(page){
          window.location.href = page;
        }
        console.log(Auth.userTypeDesc());
        $scope.toHome = function(){
          /*
            if(Auth.userTypeDesc()=='Multi'){
                window.location= _base + '/customer';
            }else{
                window.location= _base + '/home/'+Customers.customerId();
            }
            */
            window.location= _base + '/home/'+Customers.customerId();
        }

        $scope.logout = function(){
          Auth.logout();
         }

        $scope.animationsEnabled = true;

          $scope.open = function (size, parentSelector) {
            var parentElem = parentSelector ?
              angular.element($document[0].querySelector('.modal-demo ' + parentSelector)) : undefined;

            var modalInstance = $uibModal.open({
              animation: $scope.animationsEnabled,
              ariaLabelledBy: 'modal-title',
              ariaDescribedBy: 'modal-body',
              templateUrl: 'myModalContent.html',
              controller: 'ModalInstanceCtrl',
              controllerAs: '$scope',
              dialogClass:'modal_right',
              size: size,
              appendTo: parentElem,

              resolve: {

                items: function () {
                    console.log('items : ', $scope.carts);
                  return $scope.carts;
                },
                boms:function(){
                  console.log('boms : ', $scope.bomxs);
                  return $scope.bomxs;
                },
                totalAmount: function(){
                    return $scope.totalAmount;
                },
                totalQty: function(){
                    return $scope.totalQty;
                },
                addQty:function(){
                  return $scope.addQty
                }

              }
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
                if(response.data.result=='SUCCESS'){
                    $scope.customer = response.data.data.customerInfo;
                    $scope.customerCode = $scope.customer.customerCode;
                }
                $scope.loading = false;
            });
          }
 });
