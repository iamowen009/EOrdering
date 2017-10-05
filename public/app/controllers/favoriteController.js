"use strict";
app.controller('FavoriteController',
    function ($scope, $http,Customers,Fav,Config) {
        
       $scope.favorites = {};
       $scope.loading = true;
       $scope.partImgProduct = Config.partImgProduct();

       fetchFavorite(Customers.customerId());
       
       function fetchFavorite(customerId){
          Fav.fetchAll(customerId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.favorites = response.data.data.favoriteList;
                    

                }
                $scope.loading = false;
            });
       }

       $scope.toProductDetail = function(productId){
          var url =  '../../product-detail/'+productId;
            window.location.href = url;
        }
       

 })
