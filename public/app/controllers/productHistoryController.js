"use strict";
app.controller('ProductHistoryController',
    function ($scope, $http,Products,Config,Customers) {

       $scope.products = {};
       $scope.loading = true;
       $scope.partImgProduct = Config.partImgProduct();
       $scope.partImgProductList = Config.partImgProductList();

       fetchHistory(Customers.customerId());

       function fetchHistory(customerId){

          Products.fetchHistory(customerId).then(function (response) {
              console.log( response );
                if(response.data.result=='SUCCESS'){
                    console.log( response );
                    $scope.products = response.data.data.productInOrderList;


                }
                $scope.loading = false;
            });
       }

       $scope.toProductDetail = function(productId){
          var url =  _base + '/product-detail/'+productId;
            window.location.href = url;
        }


 })
