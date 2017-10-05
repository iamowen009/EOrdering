"use strict";
app.controller('DocumentController',
    function ($scope, $http, $filter,Documents,Config) {
        //retrieve customers listing from API
        $scope.documents = {};
        $scope.loading = true;
        $scope.partFileDocument = '';

        fetchAllDocuments();
        function fetchAllDocuments(userId) {
            Documents.fetchAll().then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.documents = response.data.data.generalDocumentList;
                    $scope.partFileDocument = Config.partFileDocument();
                }
                $scope.loading = false;
            });
        }

        $scope.openDoc = function(path,name){
            window.open(path+'/'+name);
        }
        
 });