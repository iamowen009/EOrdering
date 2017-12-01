"use strict";
app.controller('CartSummaryController', function ($scope, $http, $filter, Customers, Carts, Orders, Config, Products) {

  $scope.orderId = [window.location.href.split('/').pop()];
  $scope.loading = true;
  fetchOrder($scope.orderId);
  $scope.shipaddress = '-';
  $scope.partImgProduct = Config.partImgProduct();
  $scope.partImgProductOrder = Config.partImgProductOrder();
  $scope.partImgProductList = Config.partImgProductList();

  function fetchOrder(orderId) {
    Orders.fetchOne(orderId).then(function (response) {
      if (response.data.result == 'SUCCESS') {
        $scope.order = response.data.data.order;
        $scope.carts = response.data.data.orderDetailList;
        $scope.totalAmount = 0;
        $scope.totalQty = 0;
        $scope.boms = response.data.data.orderBOMItems;

        $scope.totalQty = $filter('filter')($scope.carts, {
          isBOM: false
        }).length + $scope.boms.length;
        $scope.totalQty = $scope.carts.length;
        for (var key in $scope.carts) {
          $scope.totalAmount += $scope.carts[key]['totalAmount'];

          for (var bm in $scope.boms) {
            if ($scope.boms[bm]['productRefCode'] == $scope.carts[key]['productCode'])
              $scope.totalAmount += ($scope.boms[bm]['price'] * $scope.carts[key]['qty']);
          }
        }
        var list_date = $scope.order['documentDate'].split('T');
        var split_date = list_date[0].split('-');
        $scope.order['documentDate'] = split_date[2] + '/' + split_date[1] + '/' + split_date[0];

        var list_date = $scope.order['requestDate'].split('T');
        var split_date = list_date[0].split('-');
        $scope.order['requestDate'] = split_date[2] + '/' + split_date[1] + '/' + split_date[0];

        prepareOrder(Customers.customerId());
      }
      $scope.loading = false;
      console.log('OrderId > response');
      console.log(response);
    });
  }
  $scope.imgProduct = function (productId) {
    // return productInfo(productId);
  }

  function productInfo(productId) {
    var imgProduct = '';
    /*
    Products.fatchInfo(productId).then(function(response){
      if(response.data.result=='SUCCESS'){
          imgProduct = response.data.data.btfCode;
      }

      $scope.loading = false;
    });
    */
    return imgProduct;
  }


  function prepareOrder(customerId) {
    Orders.fetchAll(customerId).then(function (response) {
      if (response.data.result == 'SUCCESS') {
        $scope.customer = response.data.data.customerInfo;
        $scope.ships = response.data.data.shipToList;

        $scope.ship = getFilter($scope.ships, $scope.order.shipId);
        $scope.shipaddress = $scope.ship[0].address + ' ' + $scope.ship[0].street + ' ' + $scope.ship[0].subdistrict + ' ' + $scope.ship[0].districtName + ' ' + $scope.ship[0].cityName;

      }
      $scope.loading = false;
      console.log('customerId > response');
      console.log(response);
    });
  }
  var getFilter = function (results, valueStartsWith) {
    return _.filter(results, function (d) {
      return d['shipId'] == valueStartsWith;
    })
  }

  $scope.bomRows = function (productCode) {
    var len = 0;
    for (var bm in $scope.boms) {
      if ($scope.boms[bm]['productRefCode'] == productCode)
        len++;
    }
    return len;
  }
});