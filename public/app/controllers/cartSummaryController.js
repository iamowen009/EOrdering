"use strict";
app.controller('CartSummaryController',
    function ($scope, $http,Customers,Carts,Orders,Config,Products) {

       $scope.orderId = [window.location.href.split('/').pop()];
       $scope.loading = true;
       fetchOrder($scope.orderId);
       $scope.partImgProduct = Config.partImgProduct();
       $scope.shipaddress = '-';
       console.log('$scope.partImgProduct' + $scope.partImgProduct );


       function fetchOrder(orderId) {
            Orders.fetchOne(orderId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.order = response.data.data.order;
                    $scope.carts = response.data.data.orderDetailList;
                    $scope.totalAmount=0;
                    $scope.totalQty=0;
                    for(var key in $scope.carts){
                        $scope.totalAmount += $scope.carts[key]['totalAmount'];
                        $scope.totalQty += $scope.carts[key]['qty'];


                    }
                    var list_date = $scope.order['documentDate'].split('T');
                    var split_date = list_date[0].split('-');
                    $scope.order['documentDate'] = split_date[2]+'/'+split_date[1]+'/'+split_date[0];

                    var list_date = $scope.order['requestDate'].split('T');
                    var split_date = list_date[0].split('-');
                    $scope.order['requestDate'] = split_date[2]+'/'+split_date[1]+'/'+split_date[0];

                    prepareOrder(Customers.customerId());
                }
                $scope.loading = false;
            });
       }
       $scope.imgProduct = function(productId){
          // return productInfo(productId);
       }

       function productInfo(productId){
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


       function prepareOrder(customerId){
          Orders.fetchAll(customerId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.customer = response.data.data.customerInfo;
                    $scope.ships = response.data.data.shipToList;

                    $scope.ship = getFilter($scope.ships,$scope.order.shipId);
                    $scope.shipaddress = $scope.ship[0].address+' '+$scope.ship[0].street+' '+$scope.ship[0].subdistrict+' '+$scope.ship[0].districtName+' '+$scope.ship[0].cityName;

                }
                $scope.loading = false;
            });
       }
       var getFilter = function(results, valueStartsWith){
            return _.filter(results, function(d){ return d['shipId'] == valueStartsWith; })
        }



 })
