"use strict";
app.controller('HomeController',
    function ($scope, $http, $filter,Marketings,Promotions,Config,Customers,Carts,$uibModal,$log,sharedService) {
        //retrieve customers listing from API

        $scope.marketings = {};
        $scope.promotions_all = {};
        $scope.promotions = {};
        $scope.loading = true;
        $scope.totalPromotion = 0;
        $scope.slideshows1 = '';
        $scope.slideshows2 = '';
        $scope.slideshows3 = '';
        $scope.carts = {};
        $scope.marketingmodel = [];

        $scope.partImgPromotion = Config.partImgPromotion();
        //Customers.setCustomer(window.location.href.split('/').pop());

        // fetch
        fetchAllMarketings(Customers.customerId());
        //fetchAllPromotions(Customers.customerId(), ['10', '40'], ['01', '18'], ['003', '006']);
        fetchAllPromotions(Customers.customerId(), [], [], []);
        fetchSlideshow();

        function fetchSlideshow(){
            $scope.slideshows1 = Config.partImgHome()+"/"+Config.imgHome1();
            $scope.slideshows2 = Config.partImgHome()+"/"+Config.imgHome2();
            $scope.slideshows3 = Config.partImgHome()+"/"+Config.imgHome3();
        }

        function fetchAllMarketings(customerId) {
            Marketings.fetchAll(customerId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.marketings = response.data.data.marketingList;

                    for (var i = 0; i < $scope.marketings.length; i++) {
                      $scope.marketings[i].id = parseInt($scope.marketings[i].marketingCode);
                      $scope.marketings[i].label = $scope.marketings[i].marketingDesc;
                    }
                    //$scope.example4data =$scope.marketings;
                    //$scope.example4data = [ {id: 1, label: "David"}, {id: 2, label: "Jhon"}, {id: 3, label: "Danny"}];
                    //console.log($scope.example4data[0]);
                    //$scope.example4settings = {displayProp: 'marketingDesc', idProp: 'id'};


                }
                $scope.loading = false;
            });
        }
        $scope.getResult = function(valueStartsWith){
            return _.filter($scope.marketingmodel, function(d){ return d['id'] == valueStartsWith; })
        }

        function getFilter(results,keyToFilter, valueStartsWith){
            return _.filter(results, function(d){  return valueStartsWith.indexOf(parseInt(d[keyToFilter]))!=-1; })
        }

        $scope.update = function() {
            $scope.promotions = [];
            $scope.loading = true;
            var tmp=[];
            for (var i = 0; i < $scope.marketingmodel.length; i++) {
                tmp.push($scope.marketingmodel[i].id);
            }
            $scope.promotions = getFilter($scope.promotions_all,'marketingCode', tmp);
            $scope.loading = false;
            $scope.totalPromotion  = $scope.promotions.length;

        }


        function fetchAllPromotions(customerId,marketingCodeList,brandCodeList,typeCodeList) {
            Promotions.fetchAll(customerId,marketingCodeList,brandCodeList,typeCodeList).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    //$scope.promotions = response.data.data.promotionDTList;
                    $scope.promotions = response.data.data.promotionHDList;
                    $scope.promotions_all = $scope.promotions;
                    $scope.totalPromotion  = $scope.promotions.length;
                }
                $scope.loading = false;
            });
        }

        $scope.$on('dataPassed', function () {
          $scope.searchstring = sharedService.values;
          fetchPromotionsFilter();
        });

        function fetchPromotionsFilter() {
            $scope.loading = true;
            $scope.promotions = {};
            $scope.promotions = getResult($scope.promotions_all,'promotionName','promotionDesc',$scope.searchstring);
            $scope.loading = false;
            $scope.totalPromotion  = $scope.promotions.length;
        }

        function getResult(results,keyToFilter,keyToFilter2, valueStartsWith){
            return _.filter(results, function(d){ return (d[keyToFilter] != null && d[keyToFilter].indexOf(valueStartsWith))!=-1 || (d[keyToFilter2] != null && d[keyToFilter2].indexOf(valueStartsWith)!=-1); })
        }



        /*category_data.all(1)
                .then(function(result) {
                    if(result.result=='SUCCESS'){
                        result = result.data;
                        $scope.categorys = result.data.categoryList;
                    }
                    $scope.loading = false;
                });

        customer_data.all(5)
                .then(function(result) {
                    if(result.result=='SUCCESS'){
                        result = result.data;
                        $scope.customers = result.data.customerList;
                    }
                    $scope.loading = false;
                });
        */
        /*$scope.toPromotionList = function(promotionId){
            var url =  '../../promotion/'+promotionId;
            window.location.href = url;
        }*/

        $scope.toProductList = function(marketingCode){
            var url =  _base + '/product/'+marketingCode;
            window.location.href = url;

        }

        $scope.logout = function(){
            Config.logout();
        }
 });
