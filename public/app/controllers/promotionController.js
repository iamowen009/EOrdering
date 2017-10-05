"use strict";
app.controller('PromotionController',
    function ($scope, $http, $filter,Promotions,Products) {

    	$scope.promotions = {};
    	$scope.loading = true;
    	$scope.promotion = {};
    	$scope.product_code = [];
    	$scope.products = [];

        $scope.promotionId = window.location.href.split('/').pop();

        fetchOne($scope.promotionId);

        function fetchOne(promotionId) {
            Promotions.fetchOne(promotionId).then(function (response) {
                if(response.data.result=='SUCCESS'){

                    $scope.promotions = response.data.data.promotionDTList;
                    for(var key in $scope.promotions){
                        
                        if($scope.promotions[key]['promotionHdId']==$scope.promotionCode){
                        	$scope.promotion = $scope.promotions[key]
                        	//$scope.product_code.push($scope.promotions[key]['productNo']);
                        }
                            
                    }
                    //console.log($scope.product_code);
                    //fetchAllProducts(1, ['10', '40'], ['01', '18'], ['003', '006'],false);

                }
                $scope.loading = false;
            });
        }

        /*function fetchAllProducts(customerId, marketingCodeList, brandCodeList, typeCodeList,isBTFView){
            Products.fetchAll(customerId, marketingCodeList, brandCodeList, typeCodeList,isBTFView).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.products_tmp = response.data.data.productList;
                    for(var key in $scope.products_tmp){
                        
                        if($scope.product_code.indexOf($scope.products_tmp[key]['productCode']) != -1 ){
                        	
                        	$scope.products = $scope.products_tmp[key];
                        }

                	}
                	console.log($scope.products);
                }
            });
        }*/

 });