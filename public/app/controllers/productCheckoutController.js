"use strict";
app.controller('ProductCheckoutController',
    function ($scope, $http, $filter,$timeout,Customers,Carts,Orders,Auth,Config) {

      $scope.removeAll = function(){

        var cartList = [{
            customerId: Customers.customerId(),
            productId:0,
            userName: Auth.username()
        }];
        console.log(cartList);

        Carts.removeCart(cartList).then(function (response) {
            if(response.data.result=='SUCCESS'){
                swal('ลบสินค้าเรียบร้อยแล้ว');
                //$uibModalInstance.dismiss('cancel');
                //fetchCart(Customers.customerId());
                window.location.reload();
                $('.bellnumbers').text('0');

            }else{
                swal('ลบสินค้าไม่สำเร็จ');

            }

            $scope.loading = false;
        });
      }
       fetchCart(Customers.customerId());

       prepareOrder(Customers.customerId());

       $scope.totalAmount = 0;
       $scope.totalQty = 0;
       $scope.carts={};
       $scope.customer={};
       $scope.requests={};
       $scope.ships={};
       $scope.transports={};
       $scope.carts = {};
       $scope.pay = {'name':'CASH'};
       $scope.partImgProduct = Config.partImgProduct();
       $scope.shipaddress = '-';
       console.log('$scope.partImgProduct' + $scope.partImgProduct );
       function fetchCart(customerId) {
         console.log('fetchCart');
            Carts.fetchAll(customerId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.carts = response.data.data.cartList;
                    $scope.totalAmount=0;
                    $scope.totalQty=0;
                    for(var key in $scope.carts){
                        $scope.totalAmount += $scope.carts[key]['totalAmount'];
                        $scope.totalQty += $scope.carts[key]['qty'];
                        var list_date = $scope.carts[key]['cartDate'].split('T');
                        var split_date = list_date[0].split('-');
                        $scope.cartDate = split_date[2]+'/'+split_date[1]+'/'+split_date[0];

                    }
                }
                $scope.loading = false;
            });
       }

       function prepareOrder(customerId){
         console.log('prepareOrder');
       		Orders.fetchAll(customerId).then(function (response) {
            console.log(response);
                if(response.data.result=='SUCCESS'){
                    $scope.customer = response.data.data.customerInfo;
                    $scope.requests = response.data.data.requestDateList;
                    for(var key in $scope.requests){

                        var list_date = $scope.requests[key]['reqDate'].split('T');
                        var split_date = list_date[0].split('-');
                        $scope.requests[key]['reqDate'] = split_date[2]+'/'+split_date[1]+'/'+split_date[0];

                    }
                    $scope.ships = response.data.data.shipToList;

                    $scope.transports = response.data.data.transportList;
                    $scope.carts = response.data.data.cartProductList;
                }
                $scope.loading = false;
            });
       }

       $scope.changeShip = function(sel){
        if(typeof sel!="undefined"){
          //console.log(sel);
          $scope.ship = getFilter($scope.ships,sel);
          $scope.shipaddress = $scope.ship[0].address+' '+$scope.ship[0].street+' '+$scope.ship[0].subdistrict+' '+$scope.ship[0].districtName+' '+$scope.ship[0].cityName;
        }
       }

      var getFilter = function(results, valueStartsWith){
            return _.filter(results, function(d){ return d['shipId'] == valueStartsWith; })
        }

       $scope.removeCart = function(productId){

		    var cartList = [{
		        customerId: Customers.customerId(),
		        productId: productId,
		        userName: Auth.username()
		    }];

		    Carts.removeCart(cartList).then(function (response) {
		        if(response.data.result=='SUCCESS'){
		            swal('ลบสินค้าเรียบร้อยแล้ว');
                console.log('clear cart and reload');
		            window.location.reload();
		        }else{
		            swal('ลบสินค้าไม่สำเร็จ');
		        }

		        $scope.loading = false;
		    });
		  }

      $scope.addQty = function(field){
            $scope.editing = $scope.carts.indexOf(field);
            $scope.newField = angular.copy(field);
            $scope.newField['qty']+=1;
            $scope.carts[$scope.editing] = $scope.newField;
            $scope.loadingcart = true;
            var cartList = [{
                customerId: Customers.customerId(),
                productId: $scope.newField['productId'],
                qty: $scope.newField['qty'],
                userName: Auth.username()
            }];
            var promotionList = [];
            Carts.updateCart(cartList,promotionList).then(function (response) {
                $scope.loadingcart = false;

                fetchCart(Customers.customerId());
            }, function (response) {

                    console.log(response);
            });


        }
        $scope.removeQty = function(field){
            $scope.editing = $scope.carts.indexOf(field);
            $scope.newField = angular.copy(field);
            $scope.newField['qty']-=1;
            $scope.carts[$scope.editing] = $scope.newField;
            $scope.loadingcart = true;
            var cartList = [{
                customerId: Customers.customerId(),
                productId: $scope.newField['productId'],
                qty: $scope.newField['qty'],
                userName: Auth.username()
            }];
            var promotionList = [];
            Carts.updateCart(cartList,promotionList).then(function (response) {
                $scope.loadingcart = false;

                fetchCart(Customers.customerId());
            }, function (response) {

                    console.log(response);
            });
        }

 })
