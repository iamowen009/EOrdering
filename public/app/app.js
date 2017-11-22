"use strict";
var currentUrl = window.location.origin;
//var dataServicesUrl = "http://unicornsolution.ddns.net:8185";

var app = angular.module('app', [
    'oitozero.ngSweetAlert',
    'ngCart',
    'ui.bootstrap.datetimepicker',
    'angularUtils.directives.dirPagination',
    //'vcRecaptcha',
    'ngMessages',
    'validation.match',
    'ui.bootstrap',
    'ngSanitize',
    'angularjs-dropdown-multiselect',
    'UserValidation',
]);

app.constant('API_URL', 'http://202.142.195.168:8010/API/');


app.run(function ($rootScope, Orders, Auth, Customers) {
    //
    $("#cart-checkout").steps({
        //console.log("Step changed to: " + currentIndex);
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: 0,
        startIndex: 1,
        autoFocus: true,
        labels: {
            finish: "ยืนยัน",
            previous: "ย้อนกลับ",
            next: "ถัดไป"
        },
        onStepChanged: function (event, currentIndex, newIndex) {
            console.log(currentIndex);
            if (currentIndex == 0) {
                $('ul[role="tablist"] >li:nth-child(2)').removeClass('done').addClass('disabled');//('','#ddd');
                $('ul[role="tablist"] >li:nth-child(3)').removeClass('done').addClass('disabled');//('','#ddd');
                $('ul[role="menu"] > li:nth-child(1)')
                    .removeClass('disabled')
                    .attr('aria-disabled', 'false');
                $('.li-btn').show();
            } else if (currentIndex == 1) {
                $('ul[role="tablist"] >li:nth-child(3)').removeClass('done').addClass('disabled');
                $('ul[role="menu"] > li:nth-child(1) > a').attr('href', '#previous');
            } else {
                $('.li-btn').hide();
            }
        },

        onInit: function (event, currentIndex) {
            if (currentIndex == 1) {
                $('ul[role="menu"] a[href="#previous"]').hide();
            } else if (currentIndex == 2) {
                $('ul[role="menu"] a[href="#previous"]').show();
            }

            if (currentIndex == 0 || currentIndex == 1) {
                var btnPrint = $("<a>").attr({ "href": "#", "ng-click": "btnPrint" }).addClass("btn-print btn btn-primary").text("Print");
                var btnClear = $("<a>").attr({ "href": "#", "ng-click": "removeAll()" }).addClass("btn-clear btn btn-danger").text("ลบรายการสินค้าทั้งหมด");
                var printeBtn = $("<li>").attr("aria-disabled", false).addClass('li-btn pull-left').append(btnPrint);
                var cleareBtn = $("<li>").attr("aria-disabled", false).addClass('li-btn pull-left').append(btnClear);
                var ul = $("<ul>").addClass('pull-left').append(printeBtn).append(cleareBtn);

                $(document).find(".actions").prepend(ul)
                $(document).find('.actions ul[role="menu"]').addClass('pull-right');
                //$(document).find(".actions ul").prepend(cleareBtn)
            } else if (currentIndex == 1) {
                $('ul[role="menu"] a[href="#next"]').on('click', function (e) {
                    e.preventDefault();


                });
            } else {
                $('.li-btn').hide();
            }
        },
        onStepChanging: function (e, currentIndex, newIndex) {
            var trans_id = angular.element('#trans_id').val();
            
            if ((trans_id == null || trans_id == '') && trans_id != undefined) {
                swal('กรุณาเลือก บริษัทขนส่ง');
                return false;
            }
            
            if (newIndex > currentIndex && currentIndex == 1) {
                if ($('input[name="optradio"]:checked').length == 0) {
                    swal('กรุณาเลือก รูปแบบการชำระเงิน');
                    return false;
                }
            }
            
            return true;
        },
        onFinished: function () {
            console.log('add order');

            swal({
                title: "ยืนยัน?",
                text: "ท่านต้องการยืนยันใบสั่งซื้อนี้หรือไม่",
                //type: "warning",
                showCancelButton: true,
                //confirmButtonColor: '#DD6B55',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: "ยกเลิก",
                closeOnConfirm: true,
                closeOnCancel: true
            },

                function (isConfirm) {
                    if (isConfirm) {
                        var appElement = document.querySelector('[ng-controller=ProductCheckoutController]');
                        var appScope = angular.element(appElement).scope();
                        
                        console.log('123123123' + appScope.ddlShipTo);
                        //swal('Loading');
                        var appShipCondition = '';
                        var checkedShip = false;
                        var shipId = 0;
                        var shipCode = '';
                        var shipName = '';
                        var appPaymentTerm = '';

                        function newLocalDate() {
                            var date = new Date();
                            var dateStr = `${moment(date).get('year')}-${moment(date).format('MM-DD')}`;
                            var date2 = new Date(dateStr);
                            var dateStr2 = `${moment(date2).get('year')}-${moment(date2).format('MM-DD')}`;
                            return new Date(dateStr2);
                        }
                        console.log('newLocalDate : ', newLocalDate(), ' appscope ', appScope);

                        if (typeof appScope.paymentTerm !== 'undefined') {
                            appPaymentTerm = appScope.paymentTerm;
                        }
                     
                        //if (typeof appScope.ddlShipTo !== undefined || appScope.ddlShipTo !== null || appScope.ddlShipTo !== '') {
                        console.log('===================>',appScope.ddlShipTo);
                        if (appScope.ddlShipTo != null) {
                            appShipCondition = appScope.ddlShipTo.shipCondition;
                            shipId = appScope.ddlShipTo.shipId;
                            shipCode = appScope.ddlShipTo.shipCode;
                            shipName = appScope.ddlShipTo.shipName;

                            console.log('not undefined ship shipId ' + shipId + ' shipCode ' + shipCode + ' shipName ' + shipName + ' shipCondition ' + appShipCondition);
                        } else {
                            console.log('customer info : ', appScope.customer);
                            appShipCondition = appScope.customer.shipCondition;
                            shipId = 0;
                            shipCode = Customers.customerId();
                            shipName = appScope.customer.shipConditionDesc;

                        }

                        //appShipCondition
                        checkedShip = appScope.shipCondition;

                        console.log('appScope.shipCondition ' + appScope.shipCondition);

                        console.log('appScope.ddlShipTo : ', appScope.ddlShipTo);
                        var transportId = 0;
                        var transportZone = '';
                        var transportZoneDesc = '';
                        //if (typeof appScope.ddlTransport !== 'undefined') {
                        console.log('ddlTransport =======>', appScope.ddlTransport);
                        console.log('ddlTransport =======>',(appScope.ddlTransport != 'undefined') ? '1' : '0');
                        if (appScope.ddlTransport != undefined) {
                            // if( appScope.ddlTransport.length > 0){
                            //transportId = appShipCondition == '08' ? 0 : appScope.ddlTransport.transportId;

                            transportId = appScope.ddlTransport.transportId;
                            transportZone = appShipCondition == '08' ? appScope.ddlShipTo.transportZone : appScope.ddlTransport.transportZone;
                            transportZoneDesc = appShipCondition == '08' ? appScope.ddlShipTo.transportZoneDesc : appScope.ddlTransport.transportZoneDesc;
                        } else {
                            transportId = 0;
                            transportZone = appScope.customer.transportZone;
                            transportZoneDesc = appScope.customer.transportZoneDesc;
                        }
                        console.log('appScope.ddlTransport : ', appScope.ddlTransport);
                        var customerPO = '';
                        if (typeof appScope.customerPO !== 'undefined') {
                            customerPO = appScope.customerPO;
                        }
                        // var reqDate =newLocalDate();
                        // if(typeof appScope.ddlDate !== 'undefined'){
                        function LocalDate(date) {
                            console.log('date : ', date);
                            // ;

                            if (!date || date === undefined) {
                                var today = new Date();
                                var hh = today.getHours();
                                if (hh >= 17 && hh <= 23) {
                                    var dd = today.getDate() + 1;
                                } else {
                                    var dd = today.getDate();
                                }

                                var mm = today.getMonth() + 1; //January is 0!

                                var yyyy = today.getFullYear();

                                if (dd < 10) {
                                    dd = '0' + dd;
                                }
                                if (mm < 10) {
                                    mm = '0' + mm;
                                }
                                return yyyy + '-' + mm + '-' + dd + 'T00:00:00';
                            } else {
                                var dx = date.split('/');
                                return dx[2] + '-' + dx[1] + '-' + dx[0] + 'T00:00:00';
                            }
                        }
                        var eqDate = appScope.ddlDate.reqDate;
                        var reqDate = LocalDate(eqDate);//.replace('/','-') + ' 00:00:00T';
                        // }

                        console.log('reqDate ' + reqDate);

                        var order = {
                            documentDate: appScope.carts[0].cartDate,
                            userName: Auth.username(),
                            customerId: Customers.customerId(),
                            customerCode: appScope.carts[0].customerCode,
                            customerName: appScope.carts[0].customerName,
                            paymentTerm: appPaymentTerm != 'CASH' ? appPaymentTerm : 'CASH',
                            //shipCondition   : checkedShip  === true ? '01' : ( checkedShip === false ? '' : appShipCondition ),

                            shipCondition: checkedShip === true ? '01' : (checkedShip === false ? '' : appScope.customer.shipCondition),
                            shipId: (shipId === undefined || shipId == '' || checkedShip === true) ? Customers.customerId() : shipId,
                            shipCode: (shipCode === undefined || checkedShip === true) ? '' : shipCode,
                            shipName: (shipName === undefined || checkedShip === true) ? 'รับสินค้าเอง' : shipName,
                            requestDate: reqDate,
                            customerPO: customerPO,
                            transportId: (transportId !== '' && transportId !== 0 && transportId !== undefined) ? transportId : 0,
                            transportZone: (transportZone !== '' && transportZone !== undefined) ? transportZone : '',
                            transportZoneDesc: (transportZoneDesc !== '' && transportZoneDesc !== undefined) ? transportZoneDesc : '',

                        };
                        console.log('order : ', order);

                        Orders.addOrder(order).then(function (response) {
                            //$scope.loading = false;
                            console.log(response);
                            if (response.data.result == 'SUCCESS') {

                                var orders = response.data.data.order;
                                console.log(orders);
                                console.log(orders.orderId);
                                //swal.close();

                                swal({
                                    title: "ระบบดำเนินการสร้างใบสั่งซื้อ เลขที่ " + orders.documentNumber + " เรียบร้อยแล้ว ท่านต้องการ",
                                    //text: "ระบบดำเนินการสร้างใบสั่งซื้อเรียบร้อยแล้ว ท่านต้องการ?",
                                    //type: "warning",
                                    showCancelButton: true,
                                    //confirmButtonColor: '#DD6B55',
                                    confirmButtonText: 'กลับสู่หน้าแรก',
                                    cancelButtonText: "ดูรายละเอียดใบสั่งซื้อ",
                                    closeOnConfirm: true,
                                    closeOnCancel: true
                                },
                                    function (isConfirm) {
                                        if (isConfirm) {
                                            if (Auth.userTypeDesc() == 'Multi') {
                                                window.location = _base + '/customer';
                                            } else {
                                                window.location = _base + '/home/' + Customers.customerId();
                                            }
                                        } else {
                                            window.location = _base + '/cart-summary/' + orders.orderId;
                                        }

                                    });

                                //location.reload();
                            } else {
                                console.log('error ');
                                console.log(response.data.result);
                                swal('เพิ่ม Order ไม่สำเร็จ');
                            }
                        }, function (response) {

                            console.log(response);
                        });


                    } else {
                        //swal.close();
                    }
                });
        }
    });
});

app.service('cartService', function(Carts, $filter) {
    var productList = [];

    this.addProduct = function(obj) {
        productList.push(obj);
    };

    this.getProducts = function() {
        return productList;
    };

    this.removeProduct = function(index) {
        productList.splice(index);
    };

    this.updateProduct = function(index, data) {
        productList[index] = data;
    }

    this.checkCart = function(userId, productId) {
        return Carts.fetchAll(userId).then(function(response) {
            if (response.data.result == 'SUCCESS') {
                var product = $filter('filter')(response.data.data.cartList, {
                    productId: productId
                })[0];

                return (product != undefined) ? product : false;
            }
        });
    };
});

app.factory("sharedService", function ($rootScope) {
    var mySharedService = {};
    mySharedService.values = {};

    mySharedService.passData = function (newData) {
        mySharedService.values = newData;
        $rootScope.$broadcast('dataPassed');
    }

    mySharedService.updateTotalCart = function () {
        $rootScope.$broadcast('updateTotalCart');
    };


    return mySharedService;
});

app.directive('errSrc', function () {
    return {
        link: function (scope, element, attrs) {
            element.bind('error', function () {
                if (attrs.src != attrs.errSrc) {
                    attrs.$set('src', attrs.errSrc);
                }
            });

            attrs.$observe('ngSrc', function (value) {
                if (!value && attrs.errSrc) {
                    attrs.$set('src', attrs.errSrc);
                }
            });
        }
    }
})
    .directive('numbersOnly', function () {
        return {
            require: 'ngModel',
            link: function (scope, element, attr, ngModelCtrl) {
                function fromUser(text) {
                    if (text) {
                        var transformedInput = text.replace(/[^0-9]/g, '');

                        if (transformedInput !== text) {
                            ngModelCtrl.$setViewValue(transformedInput);
                            ngModelCtrl.$render();
                        }
                        return transformedInput;
                    }
                    return undefined;
                }
                ngModelCtrl.$parsers.push(fromUser);
            }
        };
    })
    .directive("datepicker", function () {
        return {
            restrict: "A",
            require: "ngModel",
            link: function (scope, elem, attrs, ngModelCtrl) {
                var updateModel = function (dateText) {
                    scope.$apply(function () {
                        ngModelCtrl.$setViewValue(dateText);
                    });
                };
                var options = {
                    dateFormat: "dd/mm/yy",
                    onSelect: function (dateText) {
                        updateModel(dateText);
                    }
                };
                elem.datepicker(options);
            }
        }
    });

angular.module('UserValidation', []).directive('validPasswordC', function () {
    return {
        require: 'ngModel',
        link: function (scope, elm, attrs, ctrl) {
            ctrl.$parsers.unshift(function (viewValue, $scope) {
                var noMatch = viewValue != scope.myForm.password.$viewValue
                ctrl.$setValidity('noMatch', !noMatch)
            })
        }
    }
})
/*directive('wizard', ['$timeout', function ($timeout) {
    return {
        link: function ($scope, element, attrs) {
            $scope.$on('dataloaded', function () {
                $timeout(function () { // You might need this timeout to be sure its run after DOM render.
                    element.width()
                    element.height()
                }, 0, false);
            })
        }
    };
}]);*/

/*app.directive('wizard', function() {
  return function(scope, element, attrs) {

    $("#cart-checkout2").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: 0,
        autoFocus: true
    });
    console.log('1');

  };
});*/
/*app.config(['$qProvider', function ($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);
//------------------------
//       MY ENTER       //
//------------------------
app.directive('myEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if (event.which === 13) {
                scope.$apply(function () {
                    scope.$eval(attrs.myEnter);
                });

                event.preventDefault();
            }
        });
    };
});


app.factory('customer_data', ['$http','API_URL','AppService', function($http,API_URL,AppService){
  return {
    all: function(userId) {
      return AppService.get(API_URL+'Customer', { userId: userId });
    },
    /*find: function(id) {
      return $http.get( Routing.generate('api_1_get_public_blog_features',{'id':id}) );
    }*/
/*  }
}]);
app.factory('category_data', ['$http','API_URL','AppService', function($http,API_URL,AppService){
  return {
    all: function(customerId) {
      return AppService.get(API_URL+'Category', { customerId: customerId });
    },
    /*find: function(id) {
      return $http.get( Routing.generate('api_1_get_public_blog_features',{'id':id}) );
    }*/
/*  }
}]);*/
