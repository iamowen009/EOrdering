"use strict";
app.controller('ForgotPasswordController',
    function ($scope, $http,Customers) {
        $scope.toLogin = function(){
          window.location = _base;
        }

});
