"use strict";
app.controller('PromotionController',
    function ($scope, $http, $filter, Promotions, Products, Config, Customers, Separations, Carts, Auth) {

        $scope.promotionHD = {};
        $scope.promotionDT = {};
        $scope.freeGoods = {};
        $scope.pricingConditionList = {};
        $scope.productInDt = {};
        $scope.productInFreeGoods = {};

        $scope.promotionHD_Sel = {};
        $scope.promotionDT_Sel = {};
        $scope.freeGoods_Sel = {};
        $scope.loading = true;
        $scope.product_code = [];
        $scope.salesItem = {};
        $scope.freeItem = {};
        $scope.brandListAll = {};
        $scope.typeListAll = {};
        $scope.functionListAll = {};
        $scope.sizeListAll = {};
        $scope.colorListAll = {};
        $scope.typeList = {};
        $scope.functionList = {};
        $scope.sizeList = {};
        $scope.colorList = {};
        $scope.btfList = {};
        $scope.sizeFreegoodsList = {};
        $scope.colorFreegoodsList = {};
        $scope.btfFreegoodsList = {};

        $scope.btfInfo = {}
        $scope.productListAll = {}

        $scope.promotionId = window.location.href.split('/').pop();

        $scope.isPromotionSet = false;
        $scope.promotionSetValue = 1;

        $scope.isCallFreegoods = false;

        fetchOne_Promotion($scope.promotionId);
        // fetchAll_Separations(Customers.customerId());


        function fetchOne_Promotion(promotionId) {
            Promotions.fetchOne(promotionId).then(function (response) {
                if (response.data.result == 'SUCCESS') {
                    $scope.promotionHD = response.data.data.promotionHDList;
                    $scope.promotionDT = response.data.data.promotionDTList;
                    $scope.freeGoods = response.data.data.freeGoodsList;
                    $scope.pricingConditionList = response.data.data.pricingConditionList;
                    $scope.productInDt = response.data.data.productInDtList;
                    $scope.productInFreeGoods = response.data.data.productInFreeGoodsList;

                    $scope.promotionHD_Sel = response.data.data.promotionHDList;
                    $scope.promotionDT_Sel = response.data.data.promotionDTList;
                    $scope.freeGoods_Sel = response.data.data.freeGoodsList;

                    $scope.promotionHD[0].promotionSet = false;
                    $scope.promotionHD[0].promotionSetEdit = false;
                    $scope.promotionHD[0].promotionSetOne = false;
                    $scope.promotionHD[0].promotionSetDelete = false;

                    $scope.isPromotionSet = $scope.promotionHD[0].isPromotionSet;
                    $scope.promotionSetValue = $scope.promotionHD[0].promotionSetValue;
                   
                    if ($scope.promotionHD[0].isPromotionSet) {
                        $scope.promotionHD[0].promotionSet = true;

                        if ($scope.promotionHD[0].promotionSetValue > 1) {
                            $scope.promotionHD[0].promotionSetEdit = true;
                        }
                    }

                    for (var key in $scope.promotionDT) {
                        //Left
                        $scope.promotionDT[key].salesqty = 0;
                        $scope.promotionDT[key].btfEdit = false;
                        $scope.promotionDT[key].typeEdit = false;
                        $scope.promotionDT[key].functionEdit = false;
                        $scope.promotionDT[key].sizeEdit = false;
                        $scope.promotionDT[key].colorEdit = false;
                        $scope.promotionDT[key].qtyEdit = true;
                        $scope.promotionDT[key].color = "";
                        $scope.promotionDT[key].rgbCode = "";
                        $scope.promotionDT[key].colorCode = "";

                        //Right
                        $scope.promotionDT_Sel[key].productId = "";
                        $scope.promotionDT_Sel[key].salesqty_sel = 0;
                        $scope.promotionDT_Sel[key].selected = false;
                        $scope.promotionDT_Sel[key].productNoSelected = "";
                        $scope.promotionDT_Sel[key].productNameSelected = "";
                        $scope.promotionDT_Sel[key].unitSelected = "";
                        $scope.promotionDT_Sel[key].priceSelected = "";
                        $scope.promotionDT_Sel[key].totalPrice = "";
                        $scope.promotionDT_Sel[key].partImgProduct = Config.partImgProduct();
                    }

                    var index = 0;
                    for (var key in $scope.freeGoods) {
                        $scope.freeGoods[key].listNo = index + 1;
                        $scope.freeGoods[key].sizeFreegoodsEdit = false;
                        $scope.freeGoods[key].colorFreegoodsEdit = false;
                        $scope.freeGoods[key].btfFreegoodsEdit = false;
                        // $scope.freeGoods[key].freeQty = $scope.freeGoods[key].freeGoodsQty;

                        $scope.freeGoods_Sel[key].listNo = index + 1;
                        $scope.freeGoods_Sel[key].freeQty = 0;
                        index++;
                    }

                    console.log($scope.freeGoods);

                    //Sales Product
                    setPromotionProduct($scope.promotionDT);
                    if ($scope.promotionHD[0].isPromotionSet) {
                        setFixedQty();
                    }

                    //Free Product
                    setPromotionFreegoods($scope.freeGoods)

                }
                $scope.loading = false;
            });
        }

        //Product
        function setPromotionProduct(promotionDT) {
            var log = [];
            angular.forEach(promotionDT, function (value1, key1) {
                console.log("Product format =" + value1.format);
                switch (value1.format) {
                    case "MG":
                    case "B":
                        getBTF(value1.listNo);
                        break;
                    case "BTF":
                        getSize(value1.promotionDtId, value1.listNo);
                        break;
                    case "BTFS":
                        getSize(value1.promotionDtId, value1.listNo);
                        getColor(value1.promotionDtId, $scope.promotionDT[value1.listNo - 1].sizeCode, value1.listNo);
                        $scope.promotionDT[value1.listNo - 1].btfCode = value1.btfsCode;
                        $scope.promotionDT[value1.listNo - 1].btfDesc = value1.btfsDesc;
                        $scope.promotionDT[value1.listNo - 1].sizeEdit = false;
                        break;
                    case "SKU":
                        getSize(value1.promotionDtId, value1.listNo);
                        getColor(value1.promotionDtId, $scope.promotionDT[value1.listNo - 1].sizeCode, value1.listNo);
                        $scope.promotionDT[value1.listNo - 1].btfCode = $scope.promotionDT[value1.listNo - 1].brandCode +
                            $scope.promotionDT[value1.listNo - 1].typeCode +
                            $scope.promotionDT[value1.listNo - 1].functionCode;
                        $scope.promotionDT[value1.listNo - 1].btfDesc = value1.skuDesc;
                        $scope.promotionDT[value1.listNo - 1].sizeEdit = false;
                        $scope.promotionDT[value1.listNo - 1].colorEdit = false;

                        // console.log($scope.colorList[value1.listNo]);
                        var log = [];
                        angular.forEach($scope.colorList[value1.listNo], function (value2, key2) {
                            $scope.promotionDT[value1.listNo - 1].colorCode = value2.colorCode;
                        }, log);
                        break;
                    default:
                        break;
                }
            }, log);
        }

        //FreeGoods
        function setPromotionFreegoods(freeGoods) {
            var log = [];
            angular.forEach(freeGoods, function (value1, key1) {
                console.log("Freegoods format =" + value1.format);
                switch (value1.format) {
                    // case "MG":
                    // case "B":
                    //     getBTFFreegoods(value1.listNo);
                    //     break;
                    case "BTF":
                        getSizeFreegoods(value1.freeGoodsId, value1.listNo);
                        break;
                    case "BTFS":
                        getSizeFreegoods(value1.freeGoodsId, value1.listNo);
                        getColorFreegoods(value1.freeGoodsId, value1.sizeCode, value1.listNo);
                        value1.btfCode = value1.btfsCode;
                        value1.btfDesc = value1.btfsDesc;
                        value1.sizeFreegoodsEdit = false;
                        break;
                    case "SKU":
                        getSizeFreegoods(value1.freeGoodsId, value1.listNo);
                        getColorFreegoods(value1.freeGoodsId, $scope.freeGoods[value1.listNo - 1].sizeCode, value1.listNo);
                        $scope.freeGoods[value1.listNo - 1].btfCode = $scope.freeGoods[value1.listNo - 1].brandCode +
                            $scope.freeGoods[value1.listNo - 1].typeCode +
                            $scope.freeGoods[value1.listNo - 1].functionCode;
                        $scope.freeGoods[value1.listNo - 1].btfDesc = value1.skuDesc;
                        $scope.freeGoods[value1.listNo - 1].sizeFreegoodsEdit = false;
                        $scope.freeGoods[value1.listNo - 1].colorFreegoodsEdit = false;

                        var log = [];
                        angular.forEach($scope.colorFreegoodsList[value1.listNo], function (value2, key2) {
                            $scope.freeGoods[value1.listNo - 1].colorCode = value2.colorCode;
                        }, log);
                        break;
                    default:
                        break;
                }
            }, log);
        }

        function setFixedQty() {
            var log = [];
            angular.forEach($scope.promotionDT, function (value1, key1) {
                value1.salesqty = value1.minQty;
                value1.qtyEdit = false;
            }, log);
        }

        function fetchAll_Separations(customerId) {
            Separations.fetchAll(customerId).then(function (response) {
                if (response.data.result == 'SUCCESS') {
                    $scope.brandListAll = response.data.data.brandList;
                    $scope.typeListAll = response.data.data.typeList;
                    $scope.functionListAll = response.data.data.functionList;
                    $scope.sizeListAll = response.data.data.sizeList;

                    var log = [];

                    angular.forEach($scope.promotionDT, function (value1, key1) {
                        // console.log(value1.format);

                        console.log("btf = " + value1.brandCode + value1.typeCode + value1.functionCode);
                        switch (value1.format) {
                            case "B":
                                //Get Type
                                $scope.typeList[value1.listNo] = [];
                                angular.forEach(response.data.data.typeList, function (value2, key2) {

                                    if (value1.brandCode == value2.brandCode) {
                                        $scope.typeobj = [];
                                        $scope.typeobj.typeCode = value2.typeCode;
                                        $scope.typeobj.typeDesc = value2.typeDesc;

                                        if (!(hasDupsObjects($scope.typeList[value1.listNo], $scope.typeobj.typeCode, "typeCode"))) {
                                            $scope.typeList[value1.listNo].push($scope.typeobj);
                                        }
                                    }
                                }, log);

                                if ($scope.typeList[value1.listNo].length > 0)
                                    $scope.promotionDT[value1.listNo - 1].typeEdit = true;

                                break;
                            case "BTF":
                                var btf = value1.brandCode + value1.typeCode + value1.functionCode;
                                $scope.sizeList[value1.listNo] = [];
                                $scope.colorList[value1.listNo] = [];
                                fetchOne_BTF(btf, "SC", value1.listNo);

                                break;
                            case "BTFS":
                                var btf = value1.brandCode + value1.typeCode + value1.functionCode;
                                $scope.colorList[value1.listNo] = [];
                                fetchOne_BTF(btf, "C", value1.listNo);

                                break;
                            default:
                                //  SKU
                                // console.log($scope.promotionDT[value1.listNo-1].productDescTH);
                                $scope.promotionDT[value1.listNo - 1].colorCode = $scope.promotionDT[value1.listNo - 1].productDescTH;
                                break;
                        }
                    }, log);
                }
                $scope.loading = false;
            });
        }


        function fetchOne_BTF(btf, format, listNo) {
            Products.fetchOne(btf).then(function (response) {
                if (response.data.result == 'SUCCESS') {
                    $scope.btfInfo = response.data.data.btfInfo;
                    $scope.productListAll = response.data.data.productList;
                    var log = [];
                    //    console.log(response);
                    switch (format) {
                        case "S":
                            getSize($scope.productListAll, listNo);
                            break;
                        case "C":
                            getColor($scope.productListAll, listNo);
                            break;
                        case "SC":
                            getSize($scope.productListAll, listNo);
                            getColor($scope.productListAll, listNo);
                            break;
                        case "SEL":

                            angular.forEach($scope.productListAll, function (value1, key1) {
                                // console.log(value1.productNameTh);
                                if (value1.sizeCode == $scope.promotionDT[listNo - 1].sizeCode
                                    // && value1.colorCode == $scope.promotionDT[listNo - 1].colorCode
                                ) {
                                    // console.log($scope.promotionDT_Sel);
                                    if (value1.colorCode == $scope.promotionDT[listNo - 1].colorCode) {
                                        $scope.promotionDT_Sel[listNo - 1].productNoSelected = value1.productCode;
                                        $scope.promotionDT_Sel[listNo - 1].productNameSelected = value1.productNameTh;
                                        $scope.promotionDT_Sel[listNo - 1].unitSelected = value1.unitNameTh;
                                        $scope.promotionDT_Sel[listNo - 1].priceSelected = value1.productPrice;
                                        $scope.promotionDT_Sel[listNo - 1].totalPrice = $scope.promotionDT_Sel[listNo - 1].salesqty_sel * value1.productPrice;
                                        $scope.promotionDT_Sel[listNo - 1].btf = btf;
                                        $scope.promotionDT_Sel[listNo - 1].productId = value1.productId;
                                    } else {
                                        if (value1.productCode == $scope.promotionDT_Sel[listNo - 1].productNo) {
                                            $scope.promotionDT_Sel[listNo - 1].productNoSelected = value1.productCode;
                                            $scope.promotionDT_Sel[listNo - 1].productNameSelected = value1.productNameTh;
                                            $scope.promotionDT_Sel[listNo - 1].unitSelected = value1.unitNameTh;
                                            $scope.promotionDT_Sel[listNo - 1].priceSelected = value1.productPrice;
                                            $scope.promotionDT_Sel[listNo - 1].totalPrice = $scope.promotionDT_Sel[listNo - 1].salesqty_sel * value1.productPrice;
                                            $scope.promotionDT_Sel[listNo - 1].btf = btf;
                                            $scope.promotionDT_Sel[listNo - 1].productId = value1.productId;
                                        }
                                    }
                                }
                            }, log);

                            break;
                        default:

                            break;
                    }
                }
                $scope.loading = false;
            });
        }

        //Use
        function getBTF(listNo) {
            var log = [];
            $scope.btfList[listNo] = [];
            angular.forEach($scope.promotionDT, function (value1, key1) {
                if (value1.listNo == listNo) {
                    $scope.btfobj = [];
                    $scope.btfobj.btfCode = value1.btfCode;
                    $scope.btfobj.btfDesc = value1.btfDesc;

                    if (!(hasDupsObjects($scope.btfList[listNo], $scope.btfobj.btfCode, "btfCode"))) {
                        $scope.btfList[listNo].push($scope.btfobj);
                    }
                }
            }, log);

            if ($scope.btfList[listNo].length > 0)
                $scope.promotionDT[listNo - 1].btfEdit = true;

            console.log($scope.btfList);
        }

        //Use
        function getSize(promotionDtId, listNo) {
            //Get  size
            var log = [];
            $scope.sizeList[listNo] = [];
            angular.forEach($scope.productInDt, function (value1, key1) {
                if (value1.promotionDtId == promotionDtId) {
                    $scope.$sizeobj = [];
                    $scope.$sizeobj.sizeCode = value1.sizeCode;
                    $scope.$sizeobj.sizeDesc = value1.sizeName;

                    if (!(hasDupsObjects($scope.sizeList[listNo], $scope.$sizeobj.sizeCode, "sizeCode"))) {
                        $scope.sizeList[listNo].push($scope.$sizeobj);
                    }
                }
            }, log);

            if ($scope.sizeList[listNo].length > 0)
                $scope.promotionDT[listNo - 1].sizeEdit = true;
        }

        function getSizeFreegoods(freeGoodsId, listNo) {
            //Get  size
            var log = [];
            $scope.sizeFreegoodsList[listNo] = [];
            angular.forEach($scope.productInFreeGoods, function (value1, key1) {
                if (value1.freeGoodsId == freeGoodsId) {
                    $scope.$sizeobj = [];
                    $scope.$sizeobj.sizeCode = value1.sizeCode;
                    $scope.$sizeobj.sizeDesc = value1.sizeName;

                    if (!(hasDupsObjects($scope.sizeFreegoodsList[listNo], $scope.$sizeobj.sizeCode, "sizeCode"))) {
                        $scope.sizeFreegoodsList[listNo].push($scope.$sizeobj);
                    }
                }
            }, log);

            if ($scope.sizeFreegoodsList[listNo].length > 0)
                $scope.freeGoods[listNo - 1].sizeFreegoodsEdit = true;
        }

        //Use
        function getColor(promotionDtId, sizeCode, listNo) {
            //Color
            var log = [];
            $scope.colorList[listNo] = [];
            angular.forEach($scope.productInDt, function (value1, key1) {

                if (value1.promotionDtId == promotionDtId &&
                    value1.sizeCode == sizeCode) {
                    // console.log("value1.promotionDtId = " + value1.promotionDtId);
                    // console.log("value1.sizeCode = " + value1.sizeCode);
                    // console.log("promotionDtId = " + promotionDtId);
                    // console.log("sizeCode = " + sizeCode);
                    $scope.$colorobj = [];
                    $scope.$colorobj.colorCode = value1.colorCode;
                    $scope.$colorobj.colorNameTh = value1.colorNameTh;
                    $scope.$colorobj.colorNameEng = value1.colorNameEng;
                    $scope.$colorobj.rgbCode = value1.rgbCode;

                    if (!(hasDupsObjects($scope.colorList[listNo], $scope.$colorobj.colorCode, "colorCode"))) {
                        $scope.colorList[listNo].push($scope.$colorobj);
                    }
                }
            }, log);

            if ($scope.colorList[listNo].length > 0)
                $scope.promotionDT[listNo - 1].colorEdit = true;
        }

        function getColorFreegoods(freeGoodsId, sizeCode, listNo) {
            //Color
            var log = [];
            $scope.colorFreegoodsList[listNo] = [];
            angular.forEach($scope.productInFreeGoods, function (value1, key1) {
                if (value1.freeGoodsId == freeGoodsId &&
                    value1.sizeCode == sizeCode) {
                    // console.log("value1.freeGoodsId = " + value1.freeGoodsId);
                    // console.log("value1.sizeCode = " + value1.sizeCode);
                    // console.log("freeGoodsId = " + freeGoodsId);
                    // console.log("sizeCode = " + sizeCode);
                    $scope.$colorobj = [];
                    $scope.$colorobj.colorCode = value1.colorCode;
                    $scope.$colorobj.colorNameTh = value1.colorNameTh;
                    $scope.$colorobj.colorNameEng = value1.colorNameEng;
                    $scope.$colorobj.rgbCode = value1.rgbCode;

                    if (!(hasDupsObjects($scope.colorFreegoodsList[listNo], $scope.$colorobj.colorCode, "colorCode"))) {
                        $scope.colorFreegoodsList[listNo].push($scope.$colorobj);
                    }
                }
            }, log);

            if ($scope.colorFreegoodsList[listNo].length > 0)
                $scope.freeGoods[listNo - 1].colorFreegoodsEdit = true;
        }

        //Use
        $scope.selectedProduct = function (promotionDtId, listNo) {
            var log = [];
            console.log($scope.promotionDT[listNo - 1]);
            if (
                // $scope.promotionDT[listNo - 1].brandCode != "" &&
                // $scope.promotionDT[listNo - 1].typeCode != "" &&
                // $scope.promotionDT[listNo - 1].functionCode != "" &&
                $scope.promotionDT[listNo - 1].sizeCode != "" &&
                $scope.promotionDT[listNo - 1].colorCode != "" &&
                $scope.promotionDT[listNo - 1].salesqty > 0
            ) {

                angular.forEach($scope.promotionDT, function (value1, key1) {
                    //console.log(value1.listNo);
                    if (value1.promotionDtId == promotionDtId) {
                        angular.forEach($scope.promotionDT_Sel, function (value2, key2) {
                            if (value2.listNo == value1.listNo) {
                                value2.salesqty_sel = value1.salesqty;
                                value2.selected = true;
                            }
                        }, log);

                        angular.forEach($scope.productInDt, function (value3, key3) {
                            if (value3.promotionDtId == promotionDtId &&
                                value3.sizeCode == $scope.promotionDT[listNo - 1].sizeCode &&
                                value3.colorCode == $scope.promotionDT[listNo - 1].colorCode
                            ) {
                                // console.log($scope.promotionDT_Sel);
                                if (value3.colorCode == $scope.promotionDT[listNo - 1].colorCode) {
                                    $scope.promotionDT_Sel[listNo - 1].productNoSelected = value3.productCode;
                                    $scope.promotionDT_Sel[listNo - 1].productNameSelected = value3.productNameTh;
                                    $scope.promotionDT_Sel[listNo - 1].unitSelected = value3.unitNameTh;
                                    $scope.promotionDT_Sel[listNo - 1].priceSelected = value3.productPrice;
                                    $scope.promotionDT_Sel[listNo - 1].totalPrice = $scope.promotionDT_Sel[listNo - 1].salesqty_sel * value3.productPrice;
                                    $scope.promotionDT_Sel[listNo - 1].btf = $scope.promotionDT[listNo - 1].brandCode + $scope.promotionDT[listNo - 1].typeCode + $scope.promotionDT[listNo - 1].functionCode;
                                    $scope.promotionDT_Sel[listNo - 1].productId = value3.productId;
                                } else {
                                    if (value3.productCode == $scope.promotionDT_Sel[listNo - 1].productNo) {
                                        $scope.promotionDT_Sel[listNo - 1].productNoSelected = value3.productCode;
                                        $scope.promotionDT_Sel[listNo - 1].productNameSelected = value3.productNameTh;
                                        $scope.promotionDT_Sel[listNo - 1].unitSelected = value3.unitNameTh;
                                        $scope.promotionDT_Sel[listNo - 1].priceSelected = value3.productPrice;
                                        $scope.promotionDT_Sel[listNo - 1].totalPrice = $scope.promotionDT_Sel[listNo - 1].salesqty_sel * value3.productPrice;
                                        $scope.promotionDT_Sel[listNo - 1].btf = $scope.promotionDT[listNo - 1].brandCode + $scope.promotionDT[listNo - 1].typeCode + $scope.promotionDT[listNo - 1].functionCode;
                                        $scope.promotionDT_Sel[listNo - 1].productId = value3.productId;
                                    }
                                }
                            }
                        }, log);
                    }
                }, log);

            }
        }


        $scope.selectedProductSet = function () {

            var log = [];
            var listNo;
            var promotionDtId;
            var allPass = true;
            angular.forEach($scope.promotionDT, function (value1, key1) {
                listNo = value1.listNo;
                promotionDtId = value1.promotionDtId;

                if (
                    $scope.promotionDT[listNo - 1].sizeCode == "" ||
                    $scope.promotionDT[listNo - 1].colorCode == "" ||
                    $scope.promotionDT[listNo - 1].salesqty <= 0
                ) {
                    allPass = false;
                }
            }, log);

            angular.forEach($scope.promotionDT, function (value1, key1) {
                // console.log("sizeCode = " + value1.sizeCode);
                // console.log("colorCode = " + value1.colorCode);
                // console.log("salesqty = " + value1.salesqty);
                // console.log("promotiondtid = "+value1.promotionDtId);
                listNo = value1.listNo;
                promotionDtId = value1.promotionDtId;

                if (
                    $scope.promotionDT[listNo - 1].sizeCode != "" &&
                    $scope.promotionDT[listNo - 1].colorCode != "" &&
                    $scope.promotionDT[listNo - 1].salesqty > 0 &&
                    allPass
                ) {

                    angular.forEach($scope.promotionDT_Sel, function (value2, key2) {
                        if (value2.listNo == value1.listNo) {
                            value2.salesqty_sel = value1.salesqty;
                            value2.selected = true;
                        }
                    }, log);

                    if (!angular.isNumber($scope.promotionHD[0].promotionSetValue))
                        $scope.promotionHD[0].promotionSetValue = 1;

                    angular.forEach($scope.productInDt, function (value3, key3) {
                        if (value3.promotionDtId == promotionDtId &&
                            value3.sizeCode == $scope.promotionDT[listNo - 1].sizeCode &&
                            value3.colorCode == $scope.promotionDT[listNo - 1].colorCode
                        ) {
                            // console.log($scope.promotionDT_Sel);
                            if (value3.colorCode == $scope.promotionDT[listNo - 1].colorCode) {
                                $scope.promotionDT_Sel[listNo - 1].productNoSelected = value3.productCode;
                                $scope.promotionDT_Sel[listNo - 1].productNameSelected = value3.productNameTh;
                                $scope.promotionDT_Sel[listNo - 1].unitSelected = value3.unitNameTh;
                                $scope.promotionDT_Sel[listNo - 1].priceSelected = value3.productPrice;
                                $scope.promotionDT_Sel[listNo - 1].totalPrice = $scope.promotionDT_Sel[listNo - 1].salesqty_sel * value3.productPrice * $scope.promotionHD[0].promotionSetValue;
                                // $scope.promotionDT_Sel[listNo - 1].btf = $scope.promotionDT[listNo - 1].btfCode;
                                $scope.promotionDT_Sel[listNo - 1].btf = $filter('limitTo')($scope.promotionDT[value1.listNo - 1].btfCode, 7)
                                $scope.promotionDT_Sel[listNo - 1].productId = value3.productId;
                            } else {
                                if (value3.productCode == $scope.promotionDT_Sel[listNo - 1].productNo) {
                                    $scope.promotionDT_Sel[listNo - 1].productNoSelected = value3.productCode;
                                    $scope.promotionDT_Sel[listNo - 1].productNameSelected = value3.productNameTh;
                                    $scope.promotionDT_Sel[listNo - 1].unitSelected = value3.unitNameTh;
                                    $scope.promotionDT_Sel[listNo - 1].priceSelected = value3.productPrice;



                                    $scope.promotionDT_Sel[listNo - 1].totalPrice = $scope.promotionDT_Sel[listNo - 1].salesqty_sel * value3.productPrice * $scope.promotionHD[0].promotionSetValue;
                                    // $scope.promotionDT_Sel[listNo - 1].btf = $scope.promotionDT[listNo - 1].btfCode;
                                    $scope.promotionDT_Sel[listNo - 1].btf = $filter('limitTo')($scope.promotionDT[value1.listNo - 1].btfCode, 7)
                                    $scope.promotionDT_Sel[listNo - 1].productId = value3.productId;
                                }
                            }
                        }
                    }, log);

                    $scope.promotionHD[0].promotionSetDelete = true;

                    if ($scope.promotionHD[0].promotionSetValue == 1)
                        $scope.promotionHD[0].promotionSetOne = true;
                }


            }, log);


        }


        $scope.deletedProduct = function (no) {
            var log = [];
            angular.forEach($scope.promotionDT, function (value1, key1) {
                if (value1.listNo == no) {
                    angular.forEach($scope.promotionDT_Sel, function (value2, key2) {
                        if (value2.listNo == value1.listNo) {
                            value2.selected = false;
                        }
                    }, log);
                }
            }, log);
        }

        $scope.deletedProductSet = function () {
            var log = [];
            angular.forEach($scope.promotionDT_Sel, function (value1, key1) {
                value1.selected = false;
            }, log);

            $scope.promotionHD[0].promotionSetDelete = false;
            $scope.promotionHD[0].promotionSetOne = false;
        }


        $scope.addQty = function (no) {
            if ($scope.promotionDT[no - 1].qtyEdit) {
                var log = [];
                angular.forEach($scope.promotionDT, function (value1, key1) {
                    if (value1.listNo == no) {
                        value1.salesqty += 1;
                    }
                }, log);
            }
        }

        $scope.removeQty = function (no) {
            if ($scope.promotionDT[no - 1].qtyEdit) {
                var log = [];
                angular.forEach($scope.promotionDT, function (value1, key1) {
                    if (value1.listNo == no) {
                        if (!value1.salesqty - 1 < 0) {
                            value1.salesqty -= 1;
                        }

                        if (value1.salesqty == 0) {
                            angular.forEach($scope.promotionDT_Sel, function (value2, key2) {
                                if (value2.listNo == value1.listNo) {
                                    value2.selected = false;
                                }
                            }, log);
                        }
                    }
                }, log);
            }
        }

        $scope.findFunction = function (brandCode, typeCode, no) {
            // Get Function 
            var log = [];
            $scope.functionList[no] = [];
            $scope.sizeList[no] = [];
            $scope.colorList[no] = [];

            // Clear Function ,Size, Color
            $scope.promotionDT[no - 1].functionCode = "";
            $scope.promotionDT[no - 1].sizeCode = "";
            $scope.promotionDT[no - 1].colorCode = "";
            $scope.promotionDT[no - 1].rgbCode = "";
            $scope.promotionDT[no - 1].color = "";

            $scope.promotionDT[no - 1].sizeEdit = false;
            $scope.promotionDT[no - 1].colorEdit = false;

            angular.forEach($scope.functionListAll, function (value2, key2) {

                if (brandCode == value2.brandCode && typeCode == value2.typeCode) {
                    $scope.funcobj = [];
                    $scope.funcobj.functionCode = value2.functionCode;
                    $scope.funcobj.functionDesc = value2.functionDesc;

                    if (!(hasDupsObjects($scope.functionList[no], $scope.funcobj.functionCode, "functionCode"))) {
                        $scope.functionList[no].push($scope.funcobj);
                    }
                }
            }, log);

            if ($scope.functionList[no].length > 0)
                $scope.promotionDT[no - 1].functionEdit = true;

        }

        //รออออ
        $scope.findSize = function (promotionDtId, btfCode, no) {

            // $scope.promotionDT[no - 1].sizeCode = "";
            // $scope.promotionDT[no - 1].colorCode = "";
            // $scope.promotionDT[no - 1].rgbCode = "";
            // $scope.promotionDT[no - 1].color = "";

            // $scope.promotionDT[no - 1].sizeEdit = false;
            // $scope.promotionDT[no - 1].colorEdit = false;

            // if (typeCode != "" && functionCode != "") {
            //     var btf = brandCode + typeCode + functionCode;
            //     // console.log("btf = " + btf + "/" + no);

            //     $scope.sizeList[no] = [];
            //     $scope.colorList[no] = [];
            //     fetchOne_BTF(btf, "SC", no);
            // }
        }


        $scope.findSizeFreegoods = function (freeGoodsId, btfCode, no) {

        }

        //Use
        $scope.findColor = function (promotionDtId, sizeCode, no) {
            $scope.promotionDT[no - 1].colorCode = "";
            $scope.promotionDT[no - 1].rgbCode = "";
            $scope.promotionDT[no - 1].color = "";
            $scope.promotionDT[no - 1].colorEdit = false;
            // console.log("promotionDtId = " + promotionDtId);
            // console.log("listNo = " + no);
            // console.log("sizeCode = " + sizeCode);

            getColor(promotionDtId, sizeCode, no);
        }

        $scope.findColorFreegoods = function (freeGoodsId, sizeCode, no) {
            $scope.freeGoods[no - 1].colorCode = "";
            $scope.freeGoods[no - 1].rgbCode = "";
            $scope.freeGoods[no - 1].color = "";
            $scope.freeGoods[no - 1].colorEdit = false;
            // console.log("freeGoodsId = " + freeGoodsId);
            // console.log("listNo = " + no);
            // console.log("sizeCode = " + sizeCode);

            getColorFreegoods(freeGoodsId, sizeCode, no);
        }

        $scope.setColor = function (color, no, rgb) {
            $scope.promotionDT[no - 1].color = color;
            $scope.promotionDT[no - 1].colorCode = color;
            $scope.promotionDT[no - 1].rgbCode = rgb;
        }

        $scope.setColorFreegoods = function (color, no, rgb) {
            $scope.freeGoods[no - 1].color = color;
            $scope.freeGoods[no - 1].colorCode = color;
            $scope.freeGoods[no - 1].rgbCode = rgb;
        }

        var hasDupsObjects = function (array, value, field) {
            for (var key in array) {
                if (array[key][field] == value) {
                    return true;
                }
            }
            return false;

        }

        $scope.totalQty = function () {
            var total = 0;
            var log = [];

            angular.forEach($scope.promotionDT_Sel, function (value2, key2) {
                if (value2.selected) {
                    total += value2.salesqty_sel;
                }
            }, log);

            if ($scope.isPromotionSet) {
                total = total * $scope.promotionSetValue;
            }

            return total;
        }

        $scope.totalPrice = function () {
            var total = 0;
            var log = [];

            angular.forEach($scope.promotionDT_Sel, function (value2, key2) {
                if (value2.selected) {
                    total += value2.totalPrice;
                }
            }, log);

            if ($scope.isPromotionSet) {
                total = total * $scope.promotionSetValue;
            }

            return total;
        }


        $scope.callCalFreeGoods = function () {



            // $scope.isCallFreegoods = true;
        }

        $scope.addCart = function () {
            var log = [];

            // angular.forEach($scope.promotionDT_Sel, function (value2, key2) {
            //     if (value2.selected) {
            //         // console.log(value2);

            //         var cartList = [{
            //             customerId: Customers.customerId(),
            //             productId: value2.productId,
            //             qty: value2.salesqty_sel,
            //             userName: Auth.username()
            //         }];

            //         var promotionList = [];
            //         Carts.addCart(cartList, promotionList).then(function (response) {
            //             $scope.loading = false;
            //             if (response.data.result == 'SUCCESS') {
            //                 swal('เพิ่มสินค้าเรียบร้อยแล้ว');
            //                 location.reload();
            //             } else {
            //                 swal('เพิ่มสินค้าไม่สำเร็จ');
            //             }
            //         }, function (response) {

            //             console.log(response);
            //         });
            //     }
            // }, log);
        }
    });