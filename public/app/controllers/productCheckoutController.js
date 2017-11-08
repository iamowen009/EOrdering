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
       //$scope.itemQty = [];
      //  $scope.cartProductQty =[];
       $scope.customer={};
       $scope.requests={};
       $scope.ships=[];
       $scope.transportss={};
       $scope.transports=[];
       $scope.ddlShipTo = {};
       $scope.paymentTerm = {};
       $scope.ddlDate = '';
       $scope.ddlTransport = {};
       $scope.shipper = {};
       $scope.loadingcart = [];
       //$scope.pay = {'name':'CASH','name':'CREDIT'};
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
                        //$scope.itemQty = $scope.carts[key]['qty'];
                        var list_date = $scope.carts[key]['cartDate'].split('T');
                        var split_date = list_date[0].split('-');
                        $scope.cartDate = split_date[2]+'/'+split_date[1]+'/'+split_date[0];
                        $scope.loadingcart[key] = false;

                    }
                }
                $scope.loading = false;
            });
       }

       $scope.cartProductQty = function(qty){
         return qty;
       }

       $scope.paidType = function(showPaid){
          console.log('showPaid : ' + showPaid );
           $scope.paid = showPaid;
       }

       function prepareOrder(customerId){
         console.log('prepareOrder');
       		Orders.fetchAll(customerId).then(function (response) {
            console.log(response);
                if(response.data.result=='SUCCESS'){
                    $scope.customer = response.data.data.customerInfo;
                    $scope.requests = response.data.data.requestDateList;
                    var ls = $scope.requests.length;
                    console.log('ls ' + ls)
                    for(var key in $scope.requests){

                        var list_date = $scope.requests[key]['reqDate'].split('T');
                        var split_date = list_date[0].split('-');
                        $scope.requests[key]['reqDate'] = split_date[2]+'/'+split_date[1]+'/'+split_date[0];

                    }
                    $scope.shipss        = response.data.data.shipToList;
                    for( var k in $scope.shipss ){
                      if($scope.shipss[k]['shipCode'])
                          $scope.ships.push($scope.shipss[k]);
                    }

                    $scope.transportss   = response.data.data.transportList;
                    for( var k in $scope.transportss ){
                      if($scope.transportss[k]['transportId'] != 0)
                          $scope.transports.push($scope.transportss[k]);
                    }
                    $scope.carts        = response.data.data.cartProductList;
                  //  if( $scope.transports.length > 0)
                    //.transportZone +' ' + $scope.transports[0].transportZoneDesc;
                    //$scope.ddlShipTo    = $scope.ships[0];
                    if( $scope.ddlShipTo.shipCondition == '08'){
                      $scope.ddlTransport =  $scope.ddlShipTo.transportZone;
                    }else{
                      $scope.ddlTransport =  $scope.transports[0];
                    }
                  //  $scope.ddlDate      = $scope.requests[0];
                    $scope.paymentTerm  = ($scope.customer.paymentTerm !== 'CASH' && $scope.customer.paymentTerm !== 'CA02') ? '' :  $scope.customer.paymentTerm ;
                    //$scope.paymentTerm;
                    //console.log('ships : ' , $scope.ships,' $scope.paymentTerm ' , $scope.paymentTerm, ' shipto condition : ');// , $scope.ddlShipTo );
                    console.log('scope ddl ship to ', $scope.ddlShipTo);
                    // if($scope.ddlShipTo)
                    $scope.shipaddress  = ($scope.ships.length && $scope.ddlShipTo ) > 0 ? ($scope.ships[0].address+' '+$scope.ships[0].street+' '+$scope.ships[0].subdistrict+' '+$scope.ships[0].districtName+' '+$scope.ships[0].cityName ) : '';
                   var shipper = angular.toJson($scope.ddlShipTo);
                   console.log('shipper',$scope.ddlShipTo);
/*
                    if( ( $scope.ddlShipTo.shipCondition == '03' || $scope.ddlShipTo.shipCondition == '08') && $scope.transports.length == 0 )
                    {
                      $scope.transports = [{
                        id : $scope.ddlShipTo.transportZone,
                        label : $scope.ddlShipTo.transportZone,
                        value : $scope.ddlShipTo.transportZone +' '+ shipper.transportZoneDesc,
                        name : $scope.ddlShipTo.transportZone +' '+ shipper.transportZoneDesc
                      }];
                      //$scope.ddlTransport = $scope.shipLoop;
                    }
*/

                }
                console.log('ddlShipTo : ' , $scope.transports);
                $scope.loading = false;
            });
       }

       $scope.shippingType = 'show';
       $scope.shipCondition = false;
       $scope.pickUp = function(shipCondition){
          console.log('$scope.shipCondition : ', shipCondition );
          if( shipCondition === true ){
            $scope.shippingType = 'hide';
          }else{
            $scope.shippingType = 'show';
          }
       }

       $scope.changePay = function(val){
         $scope.paymentTerm = val;
       }

        $scope.removeNull = function(itm) {
           return itm.profiles;
        }

       $scope.changeShip = function(sel){
        if(typeof sel!="undefined"){
          //console.log(sel);
          $scope.ship = getFilter($scope.ships,sel);
          $scope.shipaddress = $scope.ship[0].address+' '+$scope.ship[0].street+' '+$scope.ship[0].subdistrict+' '+$scope.ship[0].districtName+' '+$scope.ship[0].cityName;

          if( $scope.ship[0].shipCondition == '08')
            $scope.ddlTransport =  $scope.ship[0].transportZone;
        }
       }


      var getFilter = function(results, valueStartsWith){
            return _.filter(results, function(d){ return d['shipId'] == valueStartsWith; })
        }

      var getTransport = function(results, valueStartsWith){
            return _.filter(results, function(d){ return d['transportId'] == valueStartsWith; })
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

      $scope.updateCart = function($index){
        $scope.loadingcart[$index] = true;
        console.log('index : ' , $index , ' items : ', $scope.carts );
        angular.copy($scope.carts[$index], $scope.editedItem);
        console.log('edited item : ', $scope.editedItem );

        var cartList = [{
            customerId: Customers.customerId(),
            productId: $scope.carts[$index].productId,
            qty: $scope.carts[$index].qty,
            userName: Auth.username()
        }];
        var promotionList = [];
        Carts.updateCart(cartList,promotionList).then(function (response) {
            $scope.loadingcart[$index] = false;

            fetchCart(Customers.customerId());
        }, function (response) {

                console.log(response);
        });
      }

      $scope.goShop = function(){
        console.log('to to shop');
          //window.location= _base + '/product/0';
      }

      $scope.addQty = function(field){
            $scope.editing = $scope.carts.indexOf(field);
            $scope.newField = angular.copy(field);
            $scope.newField['qty']+=1;
            $scope.carts[$scope.editing] = $scope.newField;
            $scope.loadingcart[$index] = true;
            var cartList = [{
                customerId: Customers.customerId(),
                productId: $scope.newField['productId'],
                qty: $scope.newField['qty'],
                userName: Auth.username()
            }];
            var promotionList = [];
            Carts.updateCart(cartList,promotionList).then(function (response) {
                $scope.loadingcart[$index] = false;

                fetchCart(Customers.customerId());
            }, function (response) {

                    console.log(response);
            });
        }
        $scope.removeQty = function(field){
            $scope.editing = $scope.carts.indexOf(field);
            $scope.newField = angular.copy(field);
            console.log('new qty ' + $scope.newField['qty']);
          if( $scope.newField['qty'] > 1 ){
            $scope.newField['qty']-=1;
            $scope.carts[$scope.editing] = $scope.newField;
            $scope.loadingcart[$index] = true;
            var cartList = [{
                customerId: Customers.customerId(),
                productId: $scope.newField['productId'],
                qty: $scope.newField['qty'],
                userName: Auth.username()
            }];
            var promotionList = [];
            Carts.updateCart(cartList,promotionList).then(function (response) {
                $scope.loadingcart[$index] = false;

                fetchCart(Customers.customerId());
            }, function (response) {
                    console.log(response);
            });
          }
      }

 })
