"use strict";
app.controller('FavoriteController', function ($scope, $http, Customers, Fav, Auth, Config) {

  $scope.favorites = {};
  $scope.loading = true;
  $scope.partImgProduct = Config.partImgProduct();
  $scope.partImgProductList = Config.partImgProductList();
  $scope.partImgProductDetail = Config.partImgProductDetail();

  fetchFavorite(Customers.customerId());

  function fetchFavorite(customerId) {
    Fav.fetchAll(customerId).then(function (response) {
      if (response.data.result == 'SUCCESS') {
        $scope.favorites = response.data.data.favoriteList;


      }
      $scope.loading = false;
    });
  }

  $scope.toProductDetail = function (productId) {
    var url = '../../product-detail/' + productId;
    window.location.href = url;
  }

  $scope.removeFav = function (product, $index) {
    var favoriteInfo = {
      customerId: Customers.customerId(),
      btfCode: product.btf,
      userName: Auth.username()
    };

    Fav.removeFav(favoriteInfo).then(function (response) {
      $scope.loading = false;
      if (response.data.result == 'SUCCESS') {
        product.isFavorite = false;
        $scope.favorites.splice($index, 1);        
        swal('ลบออกจากรายการโปรด เรียบร้อยแล้ว');        
      } else {
        swal('ลบรายการโปรด ไม่สำเร็จ');
      }
      console.log(response);
    }, function (response) {

      console.log(response);
    });
  }
})