"use strict";
app.controller('ForgotConfController',
    function ($scope, $http,$location) {
        $scope.protocol = $location.protocol();
        $scope.host = $location.host();
        $scope.port = $location.port();

        
});