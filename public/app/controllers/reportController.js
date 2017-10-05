"use strict";
app.controller('ReportController',
    function ($scope, $http, $filter,Config,SaleGroups,CustomerArea) {
       $scope.title_report = 'รายงาน';

       $scope.salegroups = {}
       $scope.customerareas = {}

       fetchAllSaleGrops(10);
       fetchAllCustomerAreas(10);
       function fetchAllSaleGrops(customerId) {
            SaleGroups.fetchAll(customerId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.salegroups = response.data.data.saleGroupList;
                }
            });
        }

        function fetchAllCustomerAreas(customerId) {
            CustomerArea.fetchAll(customerId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.customerareas = response.data.data.customerAreaList;
                }
            });
        }

       $scope.report_sale = function(){
       	$scope.title_report = 'On sales Total and non-Dec Report';
       } 

       $scope.report_achieve = function(){
       	$scope.title_report = '% Achieve (Active Stop) Report';
       }

       $scope.report_show = function(){
       	$scope.title_report = 'New Shop Report';
       }

       $scope.report_summary = function(){
       	$scope.title_report = 'Sales Summary Report';
       }

       $scope.logout = function(){
       	Config.logout();
       }
 });