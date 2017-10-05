"use strict";
app.controller('ForgotPasswordController',
    function ($scope, $http) {
        $scope.toLogin = function(){
          window.location = _base;
        }
});
