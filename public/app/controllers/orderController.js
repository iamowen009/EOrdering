"use strict";
app.controller('OrderController',
function ($scope, $http,Config, $filter,$timeout,Customers,Orders,OrderPrecess,OrderInfo,OrderPrecessInfo,OrderProcessTracking) {
        /* Bindable functions
		 -----------------------------------------------*/
		$scope.endDateBeforeRender = endDateBeforeRender;
		$scope.endDateOnSetTime = endDateOnSetTime;
		$scope.startDateBeforeRender = startDateBeforeRender;
		$scope.startDateOnSetTime = startDateOnSetTime;
    $scope.orders = {};
		$scope.inv = {};
		//$scope.detail = {};
    $scope.ordersYear = [];
    $scope.ordersYearMonth = [];
    $scope.ordersYm = [];
		$scope.ordersList = [];
		
		$scope.Customer = {};

    var arr = [];
    var Ym = [];
		$scope.partImgProduct = Config.partImgProduct();
		fetchOrderPrecess(Customers.customerId(),$scope.startDateBeforeRender(),$scope.endDateBeforeRender() );
		prepareOrder(Customers.customerId());

    function fetchOrderPrecess(customerId,startDate,endDate){
      console.log( 'start date : ' + startDate + ' end date : ' + endDate );
      var intStart = moment(startDate ),
          intEnd   = moment(endDate);
      if( intStart > intEnd ){
        swal('โปรดทำการเลือกวันที่เริ่มต้นให้น้อยกว่า วันสิ้นสุด');
        return false;
      }else{
        console.log('run fatch OrderPrecess');
        OrderPrecess.fetchAll(customerId,startDate,endDate).then(function (response) {

            if(response.data.result=='SUCCESS'){
              console.log('order precess success');
              $scope.orders = response.data.data.orderProcessList;

              for( var k in $scope.orders ){

                var month = moment($scope.orders[k].docDate).format('YYYY-MM');
                var year = moment($scope.orders[k].docDate).format('YYYY');
                //console.log('month year : ' +  month + ' year is ' + year );
								Ym = {
									'year' : year,
									'month' : month
								};
								//console.log( Ym.month + ' | ' + checkArr( $scope.ordersYm ,month));
								//console.log($scope.ordersYm);
								if(checkArr( $scope.ordersYm ,month) == 0){
									$scope.ordersYm.push(Ym);
									//console.log('push ym ');
								}
								//console.log( $scope.ordersYear.indexOf(year) );
                if ($scope.ordersYearMonth.indexOf(month) === -1)
                $scope.ordersYearMonth.push( month );
                $scope.ordersYearMonth.sort();


                if ($scope.ordersYear.indexOf(year) === -1)
                $scope.ordersYear.push( year );

                 arr = {
                        'docDate':$scope.orders[k].docDate,
                        'docName':$scope.orders[k].docName,
                        'docNumber':$scope.orders[k].docNumber,
                        'docType':$scope.orders[k].docType,
                        'netAmount':$scope.orders[k].netAmount,
                        'orderId':$scope.orders[k].orderId,
                        'percentComplete':$scope.orders[k].percentComplete,
                        'month':month
                      };

                $scope.ordersList.push( arr );
              }
                console.log('scope orders year month');
                console.log($scope.ordersYearMonth);
                console.log($scope.ordersYear);
                console.log('$scope.ordersYm');
                console.log($scope.ordersYm);
                console.log('$scope.ordersList');
                console.log($scope.ordersList);
                //console.log(arr);
            }
          console.log(response.data);
        });
      }
    }

		function checkArr(arr,val){
			var x = 0;
			if(arr.length){
					for( var k in arr ){
						if(arr[k].month == val )
							x = 1;
					}
			}
			return x;
		}

		$scope.OrderInfo = function(orderId){
				Orders.fetchOne(orderId).then(function (response) {
            if(response.data.result=='SUCCESS'){
								var head = response.data.data.order,
										detail = response.data.data.orderDetailList;
										$scope.inv = head;
										$scope.inv.customerEmail = $scope.customer.email;
										$scope.detail = detail;
										$scope.totalAmount=0;
										$scope.totalQty=0;
										for(var key in $scope.detail){
                        $scope.totalAmount += $scope.detail[key]['totalAmount'];
                        $scope.totalQty += $scope.detail[key]['qty'];
                    }
								$('#invoiceModal').modal('show');
						}else{
						}
				});
		}

		function prepareOrder(customerId){
			Orders.fetchAll(customerId).then(function (response) {
						if(response.data.result=='SUCCESS'){
								$scope.customer = response.data.data.customerInfo;
								console.log("customer-->",$scope.customer)
								// $scope.ships = response.data.data.shipToList;
								// $scope.ship = getFilter($scope.ships,$scope.order.shipId);
								// $scope.shipaddress = $scope.ship[0].address+' '+$scope.ship[0].street+' '+$scope.ship[0].subdistrict+' '+$scope.ship[0].districtName+' '+$scope.ship[0].cityName;
						}
						$scope.loading = false;
				});
	 }

		$scope.OrderPrint = function(orderId){
				Orders.fetchOne(orderId).then(function (response) {
            if(response.data.result=='SUCCESS'){
								var head = response.data.data.order,
										detail = response.data.data.orderDetailList;
										$scope.inv = head;
										$scope.detail = detail;
										$scope.totalAmount=0;
										$scope.totalQty=0;
										for(var key in $scope.detail){
                        $scope.totalAmount += $scope.detail[key]['totalAmount'];
                        $scope.totalQty += $scope.detail[key]['qty'];
                    }
								$('#invoiceModal-print').modal('show');
								window.print();
								setTimeout(function(){
									$('#invoiceModal-print').modal('hide');
								},600);
						}else{
						}
				});
		}

		$scope.tracking = function(orderId){
			OrderProcessTracking.fetchOne(orderId).then(function (response) {
				if(response.data.result=='SUCCESS'){
            var len = 0;
						$scope.orderProcessHeaderList = response.data.data.orderProcessHeaderList;
						$scope.orderProcessOrderItemList = response.data.data.orderProcessOrderItemList;
						$scope.orderProcessShipmentList = response.data.data.orderProcessShipmentList;
            len = parseInt( $scope.orderProcessHeaderList.length ) + parseInt( $scope.orderProcessOrderItemList.length ) + parseInt( $scope.orderProcessShipmentList.length );
            if( len > 0 ){
						    $('#orderModal').modal('show');
            }else{
                swal('สินค้ายังอยู่ในสถานะรอจัดส่ง');
            }
				}else{
				}
		});
		}

		$scope.ordersStatus = function(orderId){
			OrderProcessTracking.fetchOne(orderId).then(function (response) {
				if(response.data.result=='SUCCESS'){
						var len = 0;
						$scope.orderProcessHeaderList = response.data.data.orderProcessHeaderList;
						$scope.orderProcessOrderItemList = response.data.data.orderProcessOrderItemList;
						$scope.orderProcessShipmentList = response.data.data.orderProcessShipmentList;
						len = parseInt( $scope.orderProcessHeaderList.length ) + parseInt( $scope.orderProcessOrderItemList.length ) + parseInt( $scope.orderProcessShipmentList.length );
						if( len > 0 ){
								$('#orderDetailModal').modal('show');
						}else{
								swal('สินค้ายังอยู่ในสถานะรอจัดส่ง');
						}
				}else{
				}
			});		}
			$scope.ordersHistory = function(orderId){
				ordersHistory.fetchHistory(orderId).then(function (response) {
					if(response.data.result=='SUCCESS'){

					}else{

					}
				});
			}

		$scope.shipto = function(key){
				var arr = {
					'02' : 'ส่งโดยบริษัทขนส่ง',
					'03' : 'ส่งโดยบริษัทขนส่ง',
					'08' : 'ส่งโดย TOA  No charge',
				};
				return arr[key] ? arr[key] : 'รับสินค้าเอง';
		}



    $scope.txtmonth = function(monthYear){
      var mn = monthYear.split('-');
      var m = {
          '01' : 'มกราคา',
          '02' : 'กุมภาพันธ์',
          '03' : 'มีนาคม',
          '04' : 'เมษายน',
          '05' : 'พฤษภาคม',
          '06' : 'มิถุนายน',
          '07' : 'กรกฎาคม',
          '08' : 'สิงหาคม',
          '09' : 'กันยายน',
          '10' : 'ตุลาคม',
          '11' : 'พฤศจิกายน',
          '12' : 'ธันวาคม',
        };
        return m[mn[1]]? m[mn[1]] : monthYear;
    }

    $scope.dateTime = function(date){
      return moment(date).format('DD/MM/YY HH:mm');
    }

		function startDateOnSetTime () {
		  $scope.$broadcast('start-date-changed');
		}

		function endDateOnSetTime () {
		  //$scope.$broadcast('end-date-changed');
		}

		function startDateBeforeRender ($dates) {
		  if ($scope.dateRangeEnd) {
		    var activeDate = moment($scope.dateRangeEnd);

		    $dates.filter(function (date) {
		      return date.localDateValue() >= activeDate.valueOf().format('YYYY-MM-DD HH:mm:ss').replace(' ','T')
		    }).forEach(function (date) {
		      date.selectable = false;
		    })
		  }else{
        var startDate = moment().format('YYYY-01-01 00:00:00').replace(' ','T');
        console.log('dateRangeStart false ');
        console.log( startDate );
        return '0000-00-00T00:00:00';

      }
		}

		function endDateBeforeRender ($view, $dates) {
		  if ($scope.dateRangeStart) {
		    var activeDate = moment($scope.dateRangeStart).subtract(1, $view).add(1, 'minute');
        console.log('dateRangeStart true');
        //console.log(activeDate)
		    $dates.filter(function (date) {
		      return date.localDateValue() <= activeDate.valueOf().format('YYYY-MM-DD HH:mm:ss').replace(' ','T')
		    }).forEach(function (date) {
          console.log( 'date selectable false' );
		      date.selectable = false;
		    })
		  }else{
        //console.log('dateRangeStart false ');
        //console.log( moment().format('YYYY-MM-DD HH:mm:ss').replace(' ','T') );
        return moment().format('YYYY-MM-DD HH:mm:ss').replace(' ','T');

      }
		}

 })
