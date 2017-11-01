"use strict";
app.controller('ProductController',
    function ($scope, $http, $filter,Marketings,Products,Config,Brands,Types,Promotions,Customers,sharedService,Auth) {

        $scope.marketings = {};
        $scope.brands = {};
        $scope.submarketings = {};
        $scope.products = {};
        $scope.products_all = {};
        $scope.types = {};
        $scope.promotions = {};
        $scope.loading = true;
        $scope.marketingCode = [window.location.href.split('/').pop()];
        $scope.brandCode = [];
        $scope.typeCode = [];
        $scope.usersId = Auth.userTypeDesc() != 'Multi' ? Auth.genId() : Customers.customerId();

        $scope.partImgProduct = Config.partImgProduct();
        console.log('usersId xx = ' + $scope.usersId);

        // fetch
        fetchAllMarketings($scope.usersId);
        //fetchAllProducts($scope.usersId, [$scope.marketingCode], ['01', '18'], ['003', '006'],true)
        fetchAllProducts($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode,true);
        //fetchBrands($scope.marketingCode,$scope.usersId);
        //fetchTypes($scope.marketingCode,$scope.usersId,$scope.brandCode);
        //fetchAllPromotions($scope.usersId, [$scope.marketingCode], ['01', '18'], ['003', '006']);
        fetchAllPromotions($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode);

        function fetchAllMarketings(customerId) {
            Marketings.fetchAll(customerId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.marketings = response.data.data.marketingList;
                    $scope.brands = response.data.data.brandList;
                    $scope.types = response.data.data.typeList;
                    for(var key in $scope.marketings){

                        if($scope.marketings[key]['marketingCode']==$scope.marketingCode)
                            $scope.marketingDesc = $scope.marketings[key]['marketingDesc']
                    }

                    $scope.brandsFilter = getFilterMarketing($scope.brands,$scope.marketingCode);
                    $scope.typesFilter = getFilterMarketing($scope.types,$scope.marketingCode);


                }
                $scope.loading = false;
            });
        }



        function fetchAllProducts(customerId, marketingCodeList, brandCodeList, typeCodeList,isBTFView){
        	Products.fetchAll(customerId, marketingCodeList, brandCodeList, typeCodeList,isBTFView).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    console.log( response );
                    $scope.products = response.data.data.productList;
                    $scope.products_all = $scope.products;
                    $scope.totalProduct = $scope.products.length;
                    if(typeof $scope.searchstring != 'undefined'){
                        fetchProductsFilter();
                    }
                }
                $scope.loading = false;
            });
        }
        function fetchBrands(categoryId,customerId){
            Brands.fetchAll(categoryId, customerId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.brands = response.data.data.brandList;
                }
                $scope.loading = false;
            });
        }
        function fetchTypes(categoryId,customerId,brandId){
            Types.fetchAll(categoryId, customerId,brandId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.types = response.data.data.typeList;
                }
                $scope.loading = false;
            });
        }
        function fetchAllPromotions(customerId,marketingCodeList,brandCodeList,typeCodeList) {
            Promotions.fetchAll(customerId,marketingCodeList,brandCodeList,typeCodeList).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.promotions = response.data.data.promotionDTList;
                }
                $scope.loading = false;
            });
        }


        // Toggle selection for a given fruit by name
          $scope.marketingSelection = function(code) {
            //console.log($scope.marketingCode);
            //console.log(code);
            var idx = $scope.marketingCode.indexOf(code);
            //console.log(idx);
            // Is currently selected
            if (idx > -1) {
              $scope.marketingCode.splice(idx, 1);
            }

            // Is newly selected
            else {
              $scope.marketingCode.push(code);
            }
            //console.log($scope.marketingCode);
            $scope.brandsFilter = getFilterMarketing($scope.brands,$scope.marketingCode);
            $scope.typesFilter = getFilterMarketing($scope.types,$scope.marketingCode);

            fetchAllProducts($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode,true);
            //fetchBrands($scope.marketingCode,$scope.usersId);
            //fetchTypes($scope.marketingCode,$scope.usersId,$scope.brandCode);
            //fetchAllPromotions($scope.usersId, [$scope.marketingCode], ['01', '18'], ['003', '006']);
            fetchAllPromotions($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode);

          };

          $scope.brandSelection = function(code) {
            var idx = $scope.brandCode.indexOf(code);

            // Is currently selected
            if (idx > -1) {
              $scope.brandCode.splice(idx, 1);
            }

            // Is newly selected
            else {
              $scope.brandCode.push(code);
            }
            //fetchTypes($scope.marketingCode,$scope.usersId,$scope.brandCode);
            if(code == ''){
                $scope.typesFilter = getFilterMarketing($scope.types,$scope.marketingCode,$scope.brandCode);
            }else
                $scope.typesFilter = getFilterBrand($scope.types,$scope.marketingCode,$scope.brandCode);
            fetchAllProducts($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode,true);
            fetchAllPromotions($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode);

          };

          $scope.typeSelection = function(code) {
            var idx = $scope.typeCode.indexOf(code);

            // Is currently selected
            if (idx > -1) {
              $scope.typeCode.splice(idx, 1);
            }

            // Is newly selected
            else {
              $scope.typeCode.push(code);
            }
            fetchAllProducts($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode,true);
            fetchAllPromotions($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode);

          };


        $scope.toProductDetail = function(productId){
        	var url =  _base +'/product-detail/'+productId;
            window.location.href = url;
        }

        $scope.toPromotionList = function(promotionId){
            var url =  '../../promotion/'+promotionId;
            window.location.href = url;
        }


        $scope.getFilter = function(results, valueStartsWith){
            return _.filter(results, function(d){ return results.indexOf(valueStartsWith)!=-1; })
        }
        $scope.getFilterMarketing = function(results, valueStartsWith){
            return _.filter(results, function(d){ return valueStartsWith.indexOf(d['marketingCode'])!=-1; })
        }

        function getFilterMarketing(results, valueStartsWith){
            return _.filter(results, function(d){ return valueStartsWith.indexOf(d['marketingCode'])!=-1; })
        }

        function getFilterBrand(results, valueStartsWith,valueStartsWith2){
            return _.filter(results, function(d){ return valueStartsWith.indexOf(d['marketingCode'])!=-1 && valueStartsWith2.indexOf(d['brandCode'])!=-1; })
        }


        $scope.$on('dataPassed', function () {
          $scope.searchstring = sharedService.values;
          fetchProductsFilter();
        });

        function fetchProductsFilter() {
            $scope.loading = true;
            $scope.products = {};
            $scope.products = getResult($scope.products_all,'btfWebDescTh','promotionDesc',$scope.searchstring);
            $scope.loading = false;
            $scope.totalProduct = $scope.products.length;
        }

        function getResult(results,keyToFilter,keyToFilter2, valueStartsWith){
            return _.filter(results, function(d){ return (d[keyToFilter] != null && d[keyToFilter].indexOf(valueStartsWith))!=-1; })
        }

        /*var vm = this;

        vm.dummyItems = _.range(1, 151); // dummy array of items to be paged
        vm.pager = {};
        vm.setPage = setPage;

        initController();

        function initController() {
            // initialize to page 1
            vm.setPage(1);
        }

        function setPage(page) {
            if (page < 1 || page > vm.pager.totalPages) {
                return;
            }

            // get pager object from service
            vm.pager = PagerService.GetPager(vm.dummyItems.length, page);

            // get current page of items
            vm.items = vm.dummyItems.slice(vm.pager.startIndex, vm.pager.endIndex + 1);
        }*/

 })

app.controller('ProductDetailController',
    function ($scope, $http, $filter,Products,Promotions,Config,Customers,Auth,Carts,Fav) {

        $scope.product = {};
        $scope.loading = true;
        $scope.promotions = {};
        $scope.products = {};
        $scope.sizes = [];
        $scope.colors = [];
        $scope.productId = {};
        $scope.cartProductQty = 1;
        $scope.productSelect = {};
        $scope.usersId = Auth.userTypeDesc() != 'Multi' ? Auth.genId() : Customers.customerId();

        $scope.partImgProduct = Config.partImgProduct();
        $scope.btfId = window.location.href.split('/').pop();
        // fetch
        console.log('product detail user ' + $scope.usersId + ' | ' + Auth.genId() + ' | ' + Auth.userTypeDesc() );
        fetchOneProduct($scope.btfId);
        fetchAllPromotions($scope.usersId, [], [], []);
        fetchAllProducts($scope.usersId, [], [], [],true);

        function fetchOneProduct(btf){
            Products.fetchOne(btf).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.btf = response.data.data.btfInfo;
                    $scope.product = response.data.data.productList;
                    console.log('scope product');
                    console.log( $scope.product);
                    for(var key in $scope.product){
                      //  console.log('key is ' + key );
                        if($scope.sizes.indexOf($scope.product[key]['sizeCode'])==-1){
                            if(hasDupsObjects($scope.sizes,$scope.product[key]['sizeCode'],'sizeCode')==false)
                                $scope.sizes.push({'sizeCode':$scope.product[key]['sizeCode'],'sizeName':$scope.product[key]['sizeName']});
                        }
                        if($scope.product[key]['colorCode'] && $scope.colors.indexOf($scope.product[key]['colorCode'])==-1 && $scope.colors.indexOf($scope.product[key]['sizeCode'])==-1)
                            if(hasDupsObjects($scope.colors,$scope.product[key]['colorCode'],'colorCode')==false ){
                                $scope.colors.push({'colorCode':$scope.product[key]['colorCode'],'colorNameTh':$scope.product[key]['colorNameTh'],'cartrgbColor':$scope.product[key]['rgbCode'],'sizeCode' : $scope.product[key]['sizeCode'] })
                            }
                    }
                    $scope.cartSize= $scope.sizes[0]['sizeCode'];
                    $scope.cartColor = $scope.colors[0] ? $scope.colors[0]['colorCode'] : {};
                    $scope.cartrgbColor = $scope.colors[0] ? $scope.colors[0]['rgbCode'] : {};
                    $scope.getProduct();

                }
                $scope.loading = false;
            });
        }
        console.log( 'scope colors ');
        console.log( $scope.colors );
        var hasDupsObjects = function(array,value,field) {
            for(var key in array){
                if(array[key][field]==value){
                    return true;
                }
            }
            return false;

        }

        function fetchAllPromotions(customerId,marketingCodeList,brandCodeList,typeCodeList) {
            Promotions.fetchAll(customerId,marketingCodeList,brandCodeList,typeCodeList).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.promotions = response.data.data.promotionDTList;
                    $scope.totalPromotion  = $scope.promotions ? $scope.promotions.length : 0;
                }
                $scope.loading = false;
            });
        }

        function fetchAllProducts(customerId, marketingCodeList, brandCodeList, typeCodeList,isBTFView){
            Products.fetchAll(customerId, marketingCodeList, brandCodeList, typeCodeList,isBTFView).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.products = response.data.data.productList;
                    console.log('scope products');
                    console.log($scope.products);                }
                $scope.loading = false;
            });
        }

        $scope.toProductDetail = function(productId){
        	var url =  _base +'/product-detail/'+productId;
            window.location.href = url;
        }

        $scope.logout = function(){
            Config.logout();
        }

        $scope.addCart = function(){

            for(var key in $scope.product){
                if($scope.product[key]['sizeCode']==$scope.cartSize && $scope.product[key]['colorCode']==$scope.cartColor){
                    $scope.productId = $scope.product[key]['productId'];
                }
            }
            var cartList = [{
                customerId: $scope.usersId,
                productId: $scope.productId,
                qty: $scope.cartProductQty,
                userName: Auth.username()
            }];
            var promotionList = [];
            Carts.addCart(cartList,promotionList).then(function (response) {
                $scope.loading = false;
                if(response.data.result=='SUCCESS'){
                      swal({
                        title:'',
                        text:'เพิ่มสินค้าเรียบร้อยแล้ว'},
                      function(){
                        location.reload();
                      });

                    }else{
                        swal('เพิ่มสินค้าไม่สำเร็จ');
                    }
            }, function (response) {

                    console.log(response);
            });
        }

        $scope.getProduct = function(){
            if($scope.cartSize != '' && $scope.cartColor != ''){
                for(var key in $scope.product){
                    if($scope.product[key]['sizeCode']==$scope.cartSize && $scope.product[key]['colorCode']==$scope.cartColor){
                        $scope.productSelect = $scope.product[key];
                        $scope.cartrgbColor = $scope.product[key]['rgbCode'];


                        console.log('key ' + key );
                    }
                }
                console.log('$scope.getProduct');
                console.log($scope.cartrgbColor);
            }
        }

        $scope.setProduct = function(val){
            console.log(val);
            $scope.cartColor = val;
            $scope.getProduct();
        }

        $scope.addFav = function(btfCode){

            var favoriteInfo = {
                customerId: $scope.usersId,
                btfCode: btfCode,
                userName: Auth.username()
            };


            Fav.addFav($scope.usersId,btfCode,Auth.username()).then(function (response) {
                $scope.loading = false;
                if(response.data.result=='SUCCESS'){
                        $scope.productSelect.isFavorite = true;
                        swal('เพิ่ม Favorite เรียบร้อยแล้ว');
                        //location.reload();
                    }else{
                        swal('เพิ่ม Favorite ไม่สำเร็จ');
                    }
            }, function (response) {

                    console.log(response);
            });

        }

        $scope.removeFav = function(productId){

            var favoriteInfo = [{
                customerId: $scope.usersId,
                productId: productId,
                userName: Auth.username()
            }];

            Fav.removeFav(favoriteInfo).then(function (response) {
                $scope.loading = false;
                if(response.data.result=='SUCCESS'){
                        $scope.productSelect.isFavorite = false;
                        swal('ลบ Favorite เรียบร้อยแล้ว');
                        //location.reload();
                    }else{
                        swal('ลบ Favorite ไม่สำเร็จ');
                    }
            }, function (response) {

                    console.log(response);
            });

        }

        $scope.toHistory = function(marketingCode){
            var url =  _base + '/product/'+marketingCode;
            window.location.href = url;
        }

        $scope.addQty = function(){
            $scope.cartProductQty+=1;
        }
        $scope.removeQty = function(){
            if( $scope.cartProductQty > 1)
            $scope.cartProductQty-=1;
        }


 });
