"use strict";
app.controller('ProductController', function ($scope, $http, $filter, Marketings, Products, Config, Brands, Types, Fav, Promotions, Customers, sharedService, Auth) {

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
    $scope.partImgProductList = Config.partImgProductList();
    $scope.partImgProductDetail = Config.partImgProductDetail();

    Config.fetchAll();
    // fetch
    fetchAllMarketings($scope.usersId);
    //fetchAllProducts($scope.usersId, [$scope.marketingCode], ['01', '18'], ['003', '006'],true)
    fetchAllProducts($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode, true);
    //fetchBrands($scope.marketingCode,$scope.usersId);
    fetchTypes($scope.marketingCode,$scope.usersId,$scope.brandCode);
    //fetchAllPromotions($scope.usersId, [$scope.marketingCode], ['01', '18'], ['003', '006']);
    fetchAllPromotions($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode);

    function fetchAllMarketings(customerId) {
        Marketings.fetchAll(customerId).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                $scope.marketings = response.data.data.marketingList;
                $scope.brands = response.data.data.brandList;
                $scope.types = response.data.data.typeList;

                if (window.location.href.search('search') >= 0) {
                    $scope.marketings.forEach(function (value) {
                        $scope.marketingSelection(value.marketingCode);
                    });

                    if (purl().param('q') != 'undefined') {
                        $scope.searchstring = purl().param('q');
                    }
                }

                for (var key in $scope.marketings) {
                    if ($scope.marketings[key]['marketingCode'] == $scope.marketingCode)
                        $scope.marketingDesc = $scope.marketings[key]['marketingDesc']
                }

                $scope.brandsFilter = getFilterMarketing($scope.brands, $scope.marketingCode);
                $scope.typesFilter = getFilterMarketing($scope.types, $scope.marketingCode);

                console.log($scope.typesFilter);
            }
            $scope.loading = false;
        });
    }

    function fetchAllProducts(customerId, marketingCodeList, brandCodeList, typeCodeList, isBTFView) {
        Products.fetchAll(customerId, marketingCodeList, brandCodeList, typeCodeList, isBTFView).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                console.log(response);
                $scope.products = response.data.data.productList;
                $scope.products_all = $scope.products;
                $scope.totalProduct = $scope.products.length;

                if (window.location.href.search('search') >= 0 && purl().param('q') != 'undefined') {
                    fetchProductsFilter();
                }
            }
            $scope.loading = false;
        });
    }
    function fetchBrands(categoryId, customerId) {
        Brands.fetchAll(categoryId, customerId).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                $scope.brands = response.data.data.brandList;
            }
            $scope.loading = false;
        });
    }
    function fetchTypes(categoryId, customerId, brandId) {
        Types.fetchAll(categoryId, customerId, brandId).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                $scope.types = response.data.data.typeList;
                console.log($scope.types);
            }
            $scope.loading = false;
        });
    }
    function fetchAllPromotions(customerId, marketingCodeList, brandCodeList, typeCodeList) {
        Promotions.fetchAll(customerId, marketingCodeList, brandCodeList, typeCodeList).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                $scope.promotions = response.data.data.promotionDTList;
            }
            $scope.loading = false;
        });
    }

    $scope.addFav = function (product) {
        var favoriteInfo = {
            customerId: $scope.usersId,
            btfCode: product.btf,
            userName: Auth.username()
        };

        Fav.addFav($scope.usersId, product.btf, Auth.username()).then(function (response) {
            $scope.loading = false;
            if (response.data.result == 'SUCCESS') {
                product.isFavorite = true;
                swal('เพิ่ม Favorite เรียบร้อยแล้ว');
                //location.reload();
            } else {
                swal('เพิ่ม Favorite ไม่สำเร็จ');
            }
        }, function (response) {

            console.log(response);
        });
    }

    $scope.removeFav = function (product) {
        var favoriteInfo = {
            customerId: $scope.usersId,
            btfCode: product.btf,
            userName: Auth.username()
        };

        Fav.removeFav(favoriteInfo).then(function (response) {
            $scope.loading = false;
            if (response.data.result == 'SUCCESS') {
                product.isFavorite = false;
                swal('ลบ Favorite เรียบร้อยแล้ว');
                //location.reload();
            } else {
                swal('ลบ Favorite ไม่สำเร็จ');
            }
            console.log(response);
        }, function (response) {

            console.log(response);
        });
    }

    // Toggle selection for a given fruit by name
    $scope.marketingSelection = function (code) {
        //console.log($scope.marketingCode);
        //console.log(code);
        var idx = $scope.marketingCode.indexOf(code);
        //console.log(idx);
        // Is currently selected
        if (idx > -1) {
            $scope.brandCode = [];
            $scope.typeCode = [];
            $scope.marketingCode.splice(idx, 1);
        }

        // Is newly selected
        else {
            $scope.marketingCode.push(code);
        }
        //console.log($scope.marketingCode);
        $scope.brandsFilter = getFilterMarketing($scope.brands, $scope.marketingCode);
        //$scope.typesFilter = getFilterMarketing($scope.types, $scope.marketingCode);

        fetchAllProducts($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode, true);
        //fetchBrands($scope.marketingCode,$scope.usersId);
        //fetchTypes($scope.marketingCode,$scope.usersId,$scope.brandCode);
        //fetchAllPromotions($scope.usersId, [$scope.marketingCode], ['01', '18'], ['003', '006']);
        fetchAllPromotions($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode);

    };

    $scope.brandSelection = function (code) {
        var idx = $scope.brandCode.indexOf(code);
        // Is currently selected
        if (idx > -1) {
            $scope.typeCode = [];
            $scope.brandCode.splice(idx, 1);
        }

        // Is newly selected
        else {
            $scope.brandCode.push(code);
        }
        //fetchTypes($scope.marketingCode,$scope.usersId,$scope.brandCode);
        if (code == '') {
            $scope.typesFilter = getFilterMarketing($scope.types, $scope.marketingCode, $scope.brandCode);
        } else
            $scope.typesFilter = getFilterBrand($scope.types, $scope.marketingCode, $scope.brandCode);

        //console.log($scope.typeCode);

        fetchAllProducts($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode, true);
        fetchAllPromotions($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode);

    };

    $scope.typeSelection = function (code) {
        var idx = $scope.typeCode.indexOf(code);
        console.log(code);
        // Is currently selected
        if (idx > -1) {
            $scope.typeCode.splice(idx, 1);
        }

        // Is newly selected
        else {
            $scope.typeCode.push(code);
        }

        fetchAllProducts($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode, true);
        fetchAllPromotions($scope.usersId, $scope.marketingCode, $scope.brandCode, $scope.typeCode);

    };
    //console.log(' scope customer ', $scope.customers);

    $scope.toProductDetail = function (productId) {
        var url = _base + '/product-detail/' + productId;
        Customers.fetchOne($scope.usersId).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                //console.log('customer info fetch')
                $scope.customer = response.data.data.customerInfo;
                //console.log($scope.customer);
                if ($scope.customer.blockFlag == '01') {
                    swal('MSG : 101 ไม่สามารถสั่งซื้อสินค้าได้ กรุณาติดต่อผู้แทนขายที่ดูแลท่าน ขอบคุณค่ะ');
                    return false;
                } else {
                    // Customers.setCustomer(id,cusInfo.customerName);
                    window.location.href = url;
                }
            }
        });
        // window.location.href = url;
    }

    $scope.toPromotionList = function (promotionId) {
        var url = '../../promotion/' + promotionId;
        window.location.href = url;
    }


    $scope.getFilter = function (results, valueStartsWith) {
        return _.filter(results, function (d) { return results.indexOf(valueStartsWith) != -1; })
    }
    $scope.getFilterMarketing = function (results, valueStartsWith) {
        return _.filter(results, function (d) { return valueStartsWith.indexOf(d['marketingCode']) != -1; })
    }

    function getFilterMarketing(results, valueStartsWith) {
        return _.filter(results, function (d) { return valueStartsWith.indexOf(d['marketingCode']) != -1; })
    }

    function getFilterBrand(results, valueStartsWith, valueStartsWith2) {
        return _.filter(results, function (d) { return valueStartsWith.indexOf(d['marketingCode']) != -1 && valueStartsWith2.indexOf(d['brandCode']) != -1; })
    }

    function fetchProductsFilter() {
        $scope.loading = true;
        $scope.products = {};
        $scope.products = getResult($scope.products_all, 'btfWebDescTh', 'promotionDesc', $scope.searchstring);
        $scope.loading = false;
        $scope.totalProduct = $scope.products.length;
    }

    function getResult(results, keyToFilter, keyToFilter2, valueStartsWith) {
        return _.filter(results, function (d) { return (d[keyToFilter] != null && d[keyToFilter].indexOf(valueStartsWith)) != -1; })
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

app.controller('ProductDetailController', function ($scope, $http, $filter, Products, Promotions, Config, Customers, Auth, Carts, cartService, Fav) {
    $scope.ddd = 1;
    $scope.product = {};
    $scope.loading = true;
    $scope.promotions = {};
    $scope.products = {};
    $scope.boms = {};
    $scope.sizes = [];
    $scope.colors = [];
    $scope.listColors = [];
    $scope.productId = {};
    $scope.cartProductQty = 1;
    $scope.productSelect = {};
    $scope.usersId = Auth.userTypeDesc() != 'Multi' ? Auth.genId() : Customers.customerId();

    $scope.partImgProduct = Config.partImgProduct();
    $scope.partImgProductList = Config.partImgProductList();
    $scope.partImgProductDetail = Config.partImgProductDetail();
    $scope.btfId = window.location.href.split('/').pop();
    // fetch
    // console.log('product detail user ' + $scope.usersId + ' | ' + Auth.genId() + ' | ' + Auth.userTypeDesc() );
    fetchOneProduct($scope.usersId, $scope.btfId);
    fetchAllPromotions($scope.usersId, [], [], []);
    fetchAllProducts($scope.usersId, [], [], [], true);
    $scope.promotionLink = function () {
        $('#modal-promotion').modal('show');
    }
    function fetchOneProduct(customerId, btf) {
        Products.fetchOne(customerId, btf).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                $scope.btf = response.data.data.btfInfo;
                $scope.product = response.data.data.productList;
                $scope.boms = response.data.data.productInBOMList;
                //  console.log('scope boms',$scope.boms);
                for (var key in $scope.product) {
                    //  console.log('key is ' + key );
                    if ($scope.sizes.indexOf($scope.product[key]['sizeCode']) == -1) {
                        if (hasDupsObjects($scope.sizes, $scope.product[key]['sizeCode'], 'sizeCode') == false)
                            $scope.sizes.push({
                                'sizeCode': $scope.product[key]['sizeCode'],
                                'sizeName': $scope.product[key]['sizeName'],
                                'productCode': $scope.product[key]['productCode']
                            });
                    }
                    if ($scope.product[key]['colorCode'] && $scope.colors.indexOf($scope.product[key]['colorCode']) == -1 && $scope.colors.indexOf($scope.product[key]['productCode']) == -1) {
                        console.log('check duplicate : ', hasDupsObjects($scope.colors, $scope.product[key]['colorCode'], 'colorCode') + '&&' + hasDupsObjects($scope.colors, $scope.product[key]['productCode'], 'productCode'));
                        // if( hasDupsObjects($scope.colors,$scope.product[key]['colorCode'],'colorCode')===false &&  hasDupsObjects($scope.colors,$scope.product[key]['productCode'],'productCode')===false ){
                        if (hasDupsObjects($scope.colors, $scope.product[key]['productCode'], 'productCode') === false) {

                            $scope.colors.push({
                                'colorCode': $scope.product[key]['colorCode'],
                                'colorNameTh': $scope.product[key]['colorNameTh'],
                                'cartrgbColor': $scope.product[key]['rgbCode'],
                                'sizeCode': $scope.product[key]['sizeCode'],
                                'productCode': $scope.product[key]['productCode']
                            });

                        }
                    }
                }
                colorval();
                console.log('scope size : ', $scope.sizes);
                console.log('scope colors : ', $scope.colors);
                $scope.cartSize = $scope.sizes[0]['sizeCode'];
                $scope.cartCode = $scope.sizes[0]['productCode'];
                $scope.cartColor = $scope.colors[0] ? $scope.colors[0]['colorCode'] : {};
                $scope.cartrgbColor = $scope.colors[0] ? $scope.colors[0]['rgbCode'] : {};
                $scope.colorCodeName = $scope.colors[0] ? $scope.colors[0]['colorCode'] : '';
                $scope.getProduct();

            }
            $scope.loading = false;
        });
    }
    // console.log( 'scope colors ');
    // console.log( $scope.colors );

    var hasDupsObjects = function (array, value, field) {
        for (var key in array) {
            if (array[key][field] == value) {
                return true;
            }
        }
        return false;

    }
    /*
    var checkCartId = function(array,value,field) {
        for(var key in array){
            if(array[key][field]==value){
                return array[key];
            }
        }
        return false;

    }
    */
    function fetchAllPromotions(customerId, marketingCodeList, brandCodeList, typeCodeList) {
        Promotions.fetchAll(customerId, marketingCodeList, brandCodeList, typeCodeList).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                $scope.promotions = response.data.data.promotionDTList;
                $scope.totalPromotion = $scope.promotions ? $scope.promotions.length : 0;
            }
            $scope.loading = false;
        });
    }

    function fetchAllProducts(customerId, marketingCodeList, brandCodeList, typeCodeList, isBTFView) {
        Products.fetchAll(customerId, marketingCodeList, brandCodeList, typeCodeList, isBTFView).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                $scope.products = response.data.data.productList;
                // console.log('scope products');
                // console.log($scope.products);
            }
            $scope.loading = false;
        });
    }

    function colorval() {
        $scope.listColors = [];

        for (var kr in $scope.colors) {
            //console.log('size code : ', $scope.colors[kr].sizeCode, ' | ', $scope.cartSize, ' product colorval code : ', $scope.cartCode, ' | ', $scope.colors[kr].productCode);
            if ($scope.colors[kr].sizeCode == $scope.cartSize) {
                $scope.listColors.push({ 'colorCode': $scope.colors[kr]['colorCode'], 'colorNameTh': $scope.colors[kr]['colorNameTh'], 'cartrgbColor': $scope.colors[kr]['rgbCode'], 'sizeCode': $scope.colors[kr]['sizeCode'], 'productCode': $scope.colors[kr]['productCode'] });
            }
        }
        //console.log('$scope.listColors : ', $scope.listColors);
        $scope.colorCodeName = $scope.listColors[0] ? $scope.listColors[0]['colorCode'] : '';
        for (var key in $scope.product) {
            if ($scope.product[key]['sizeCode'] == $scope.cartSize && $scope.product[key]['colorCode'] == $scope.colorCodeName) {
                $scope.productSelect = $scope.product[key];
                $scope.productId = $scope.product[key]['productId'];
                $scope.cartProductQty = $scope.productSelect.altUnit1Amount > 0 ? $scope.productSelect.altUnit1Amount : 1;
                //$scope.cartrgbColor = $scope.product[key]['rgbCode'];
            }
        }
        var bomPrice = 0;
        for (var kx in $scope.boms) {
            //  if($scope.boms[kx]['productRefToCode'] == $scope.productSelect.productCode){
            bomPrice += $scope.boms[kx]['productPrice'];
            //  }
        }
        if ($scope.boms.length > 0) {
            $scope.productPrice = bomPrice;
        } else {
            $scope.productPrice = $scope.productSelect.productPrice;
        }
        //console.log('bom price is ', bomPrice, ' boms ', $scope.boms, ' scope product select ', $scope.productSelect);

        //$scope.setProduct( $scope.listColors[0]['colorCode'] );
        // console.log( 'listColors : ', $scope.listColors );
    }


    $scope.toProductDetail = function (productId) {
        var url = _base + '/product-detail/' + productId;
        window.location.href = url;
    }

    $scope.logout = function () {
        Config.logout();
    }
    // Check product in cart before add product to cart//
    $scope.onCart = {};
    var onCart = function () {
        $scope.checkCart = [];
        Carts.fetchAll($scope.usersId).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                $scope.onCart = response.data.data.cartList;
            }
        });
        // return 'false';
    }
    onCart();

    $scope.addCart = function () {
        for (var key in $scope.product) {
            if ($scope.product[key]['sizeCode'] == $scope.cartSize && $scope.product[key]['colorCode'] == $scope.cartColor) {
                $scope.productId = $scope.product[key]['productId'];
            }
        }
        // console.log( $scope.cartProductQty ,'<', $scope.productSelect.altUnit1Amount);
        var cqty = true;
        if ($scope.cartProductQty < $scope.productSelect.altUnit1Amount) {
            swal('กรุณาสั่งซื้ออย่างน้อย ' + $scope.productSelect.altUnit1Amount + ' ' + $scope.productSelect.unitNameTh + ' ค่ะ');
            cqty = false;
        } else if ($scope.cartProductQty % $scope.productSelect.altUnit1Amount) {
            swal('ผลิตภัณฑ์ต้องสั่งซื้อทีละ ' + $scope.productSelect.altUnit1Amount + ' ' + $scope.productSelect.unitNameTh + ' ค่ะ ระบบจะปรับจำนวนให้อัตโนมัติ กรุณาตรวจสอบจำนวนสินค้า ก่อนกดเพิ่มสินค้าค่ะ');
            var un = parseInt($scope.cartProductQty / $scope.productSelect.altUnit1Amount);
            $scope.cartProductQty = $scope.productSelect.altUnit1Amount * un;
            cqty = false;
        }

        var promotionList = [];

        cartService.checkCart($scope.usersId, $scope.productId).then(function (res) {
            if (res == false) {
                var cartList = [{
                    customerId: $scope.usersId,
                    productId: $scope.productId,
                    qty: $scope.cartProductQty,
                    userName: Auth.username()
                }];

                Carts.addCart(cartList, promotionList).then(function (response) {
                    $scope.loading = false;
                    if (response.data.result == 'SUCCESS') {
                        Carts.fetchAll($scope.usersId, $scope.productId).then(function (res) {
                            var product = $filter('filter')(res.data.data.cartList, {
                                productId: $scope.productId
                            })[0];
                            cartService.addProduct(product);
                        });

                        swal('สำเร็จ', 'เพิ่มสินค้าเรียบร้อยแล้ว', 'success');
                    } else {
                        swal('เกิดข้อผิดพลาด', 'เพิ่มสินค้าไม่สำเร็จ', 'warning');
                    }
                });
            } else {
                var cartList = [{
                    customerId: $scope.usersId,
                    productId: res.productId,
                    qty: parseInt(res.qty) + parseInt($scope.cartProductQty),
                    userName: Auth.username()
                }];

                Carts.updateCart(cartList, promotionList).then(function (response) {
                    $scope.loading = false;

                    if (response.data.result == 'SUCCESS') {
                        swal('สำเร็จ', 'เพิ่มสินค้าเรียบร้อยแล้ว', 'success');
                    } else {
                        swal('เกิดข้อผิดพลาด', 'เพิ่มสินค้าไม่สำเร็จ', 'warning');
                    }
                });
            }
        });
    }

    $scope.getProduct = function () {
        if ($scope.cartSize != '' && $scope.cartColor != '') {
            colorval();
        }
    }

    $scope.setProduct = function (val) {
        // console.log('set product ' , val);
        $scope.cartColor = val;
        $scope.colorCodeName = val;
        for (var key in $scope.product) {
            if ($scope.product[key]['sizeCode'] == $scope.cartSize && $scope.product[key]['colorCode'] == val) {
                $scope.productSelect = $scope.product[key];
                $scope.cartProductQty = $scope.productSelect.altUnit1Amount > 0 ? $scope.productSelect.altUnit1Amount : 1;
                //$scope.cartrgbColor = $scope.product[key]['rgbCode'];
            }
        }
        var bomPrice = 0;
        for (var kx in $scope.boms) {
            //  if($scope.boms[kx]['productRefToCode'] == $scope.productSelect.productCode){
            bomPrice += $scope.boms[kx]['productPrice'];
            //  }
        }
        console.log('price ', $scope.productSelect.productPrice);
        if ($scope.boms.length > 0) {
            $scope.productPrice = bomPrice;
        } else {
            $scope.productPrice = $scope.productSelect.productPrice;
        }

        //  $scope.getProduct();
    }
    // console.log('product : ' , $scope.product );
    $scope.addFav = function (product) {
        var favoriteInfo = {
            customerId: $scope.usersId,
            btfCode: product.btf,
            userName: Auth.username()
        };

        Fav.addFav(favoriteInfo).then(function (response) {
            $scope.loading = false;
            if (response.data.result == 'SUCCESS') {
                product.isFavorite = true;
                swal('เพิ่ม Favorite เรียบร้อยแล้ว');
                //location.reload();
            } else {
                swal('เพิ่ม Favorite ไม่สำเร็จ');
            }
        }, function (response) {

            console.log(response);
        });

    }

    $scope.removeFav = function (product) {
        var favoriteInfo = {
            customerId: $scope.usersId,
            btfCode: product.btf,
            userName: Auth.username()
        };

        console.log(favoriteInfo);

        Fav.removeFav(favoriteInfo).then(function (response) {
            $scope.loading = false;
            if (response.data.result == 'SUCCESS') {
                product.isFavorite = false;
                swal('ลบ Favorite เรียบร้อยแล้ว');
                //location.reload();
            } else {
                swal('ลบ Favorite ไม่สำเร็จ');
            }
            console.log(response);
        }, function (response) {

            console.log(response);
        });
    }

    $scope.toHistory = function (marketingCode) {
        var url = _base + '/product/' + marketingCode;
        window.location.href = url;
    }

    $scope.addQty = function () {
        $scope.cartProductQty += 1;
    }
    $scope.removeQty = function () {
        if ($scope.cartProductQty > 1)
            $scope.cartProductQty -= 1;
    }
});
