"use strict";
app.controller('OrderController',
function ($scope, $http,Config, $filter,$timeout,Customers,Orders,OrderPrecess,OrderInfo,OrderPrecessInfo,OrderProcessTracking,OrderBillHistory) {
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
		$scope.haveBill = [];
		$scope.haveNoBill = [];
		$scope.discountAdd = [];
		$scope.discountSub = [];

		$scope.ItemAll = [];
		$scope.Customer = {};

    var arr = [];
    var Ym = [];
		$scope.partImgProduct = Config.partImgProduct() + "/OrderDetail";
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
												'salesOrderNumber':$scope.orders[k].salesOrderNumber,
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

								console.log('Owen List Order >> ');
								console.log($scope.orders);

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
					console.log(response);
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

		$scope.OrderStatusModal = function(saleOrderNumber){
			$scope.discountSub = [];
			$scope.discountAdd = [];

			OrderPrecessInfo.fetchOne(saleOrderNumber).then(function (response) {
					if(response.data.result=='SUCCESS'){
							console.log("OrderPrecessInfo");
							console.log(response);
							var head = response.data.data.orderProcessInfo,
									 detail = response.data.data.orderProcessItemList,
									 discountList = response.data.data.orderProcessDiscountList;
							 		$scope.inv = head;
									$scope.detail = detail;
									$scope.discount = discountList;	  
									console.log("discount-->>", $scope.discount);

									for(var k in $scope.discount){
										var arr_temp = {
											'description':$scope.discount[k].description,
											'fkimg':$scope.discount[k].fkimg,
											'kwert':$scope.discount[k].kwert,
											'per':$scope.discount[k].per,
											'perTx':$scope.discount[k].perTx,
											'saledocument':$scope.discount[k].saledocument,
											'type':$scope.discount[k].type
										}

										

										if($scope.discount[k].type === "หัก")
										$scope.discountSub.push(arr_temp);
										else
										$scope.discountAdd.push(arr_temp);

										// console.log("$scope.discountSub-->",$scope.discountSub);
										// console.log("$scope.discountAdd-->",$scope.discountAdd);
									}

										
									
							$('#OrderStatusModal').modal('show');
					}else{

					}
			});
	}

	$scope.OrderHistoryModal = function(saleOrderNumber){

		OrderPrecessInfo.fetchOne(saleOrderNumber).then(function (response) {
		 var head = response.data.data.orderProcessInfo;
		 $scope.inv = head;
		});

		OrderProcessTracking.fetchOne(saleOrderNumber).then(function (response) {
			if(response.data.result=='SUCCESS'){
				console.log(response);
				var detail = response.data.data.orderProcessOrderItemList;
				var orderProcessShipmentList = response.data.data.orderProcessShipmentList;
					$scope.detail = detail;
					$scope.orderProcessShipmentList = orderProcessShipmentList;
					$scope.totalAmount=0;
					$scope.totalQty=0;
					for(var key in $scope.detail){
						$scope.totalAmount += $scope.detail[key]['totalAmount'];
						$scope.totalQty += $scope.detail[key]['qty'];
					}
					$scope.haveNoBill =[];
					$scope.haveBill = [];

					$scope.ItemAll = [];
					for(var k in $scope.detail){
						var arr_sum = {
							'balaQty':$scope.detail[k].balaQty,
							'billQty':$scope.detail[k].billQty,
							'deliQty':$scope.detail[k].deliQty,
							'freeGoods':$scope.detail[k].freeGoods,
							'itmNumber':$scope.detail[k].itmNumber,
							'material':$scope.detail[k].material,
							'materialDes':$scope.detail[k].materialDes,
							'netwr2':$scope.detail[k].netwr2,
							'rejeQty':$scope.detail[k].rejeQty,
							'salesdocument':$scope.detail[k].salesdocument,
							'targetQty':$scope.detail[k].targetQty,
							'unit':$scope.detail[k].unit,

							'billDate':$scope.orderProcessShipmentList[k].billDate,
							'billNo':$scope.orderProcessShipmentList[k].billNo,
							'billQty':$scope.orderProcessShipmentList[k].billQty,
							'custRecDate':$scope.orderProcessShipmentList[k].custRecDate,
							'custRecTime':$scope.orderProcessShipmentList[k].custRecTime,
							'driveName':$scope.orderProcessShipmentList[k].driveName,
							'foragt':$scope.orderProcessShipmentList[k].foragt,
							'itmNumber':$scope.orderProcessShipmentList[k].itmNumber,
							'lisense':$scope.orderProcessShipmentList[k].lisense,
							'runno':$scope.orderProcessShipmentList[k].runno,
							'salesdocument':$scope.orderProcessShipmentList[k].salesdocument,
							'shipmentDoc':$scope.orderProcessShipmentList[k].shipmentDoc,
							'startDat':$scope.orderProcessShipmentList[k].startDat,
							'startTime':$scope.orderProcessShipmentList[k].startTime,
							'telDrive':$scope.orderProcessShipmentList[k].telDrive
						};

						$scope.ItemAll.push(arr_sum);
					}

					for(var k in $scope.ItemAll){
						var arr_b = {
							'balaQty':$scope.ItemAll[k].balaQty,
							'billQty':$scope.ItemAll[k].billQty,
							'deliQty':$scope.ItemAll[k].deliQty,
							'freeGoods':$scope.ItemAll[k].freeGoods,
							'itmNumber':$scope.ItemAll[k].itmNumber,
							'material':$scope.ItemAll[k].material,
							'materialDes':$scope.ItemAll[k].materialDes,
							'netwr2':$scope.ItemAll[k].netwr2,
							'rejeQty':$scope.ItemAll[k].rejeQty,
							'salesdocument':$scope.ItemAll[k].salesdocument,
							'targetQty':$scope.ItemAll[k].targetQty,
							'unit':$scope.ItemAll[k].unit,

							'billDate':$scope.ItemAll[k].billDate,
							'billNo':$scope.ItemAll[k].billNo,
							'custRecDate':$scope.ItemAll[k].custRecDate,
							'custRecTime':$scope.ItemAll[k].custRecTime,
							'driveName':$scope.ItemAll[k].driveName,
							'foragt':$scope.ItemAll[k].foragt,
							'itmNumber':$scope.ItemAll[k].itmNumber,
							'lisense':$scope.ItemAll[k].lisense,
							'runno':$scope.ItemAll[k].runno,
							'salesdocument':$scope.ItemAll[k].salesdocument,
							'shipmentDoc':$scope.ItemAll[k].shipmentDoc,
							'startDat':$scope.ItemAll[k].startDat,
							'startTime':$scope.ItemAll[k].startTime,
							'telDrive':$scope.ItemAll[k].telDrive
						};


						if($scope.ItemAll[k].billNo === "")
							$scope.haveNoBill.push(arr_b);
						else{
							$scope.haveBill.push(arr_b);
							
							//ถ้ายังเหลือ บิลที่ยังไม่ได้ออก ให้มาแสดงด้วย
							if($scope.ItemAll[k].targetQty  -  $scope.ItemAll[k].billQty > 0)
							{
								arr_b.billQty = $scope.ItemAll[k].targetQty  -  $scope.ItemAll[k].billQty;
								$scope.haveNoBill.push(arr_b);
							}

						}
						
					}
					
				$('#OrderHistoryModal').modal('show');
			}else{

			}
		});
	}

	$scope.OrderDetailModal = function(saleOrderNumber){

		OrderPrecessInfo.fetchOne(saleOrderNumber).then(function (response) {
		 var head = response.data.data.orderProcessInfo;
		 $scope.inv = head;
		 console.log(head);
		 console.log("head");
		});

		OrderProcessTracking.fetchOne(saleOrderNumber).then(function (response) {
			if(response.data.result=='SUCCESS'){
				console.log(response);
				//var head = response.data.data.orderProcessHeaderList

				var detail = response.data.data.orderProcessOrderItemList;
					$scope.detail = detail;
					$scope.totalAmount=0;
					$scope.totalQty=0;
					for(var key in $scope.detail){
						$scope.totalAmount += $scope.detail[key]['totalAmount'];
						$scope.totalQty += $scope.detail[key]['qty'];
					}
				$('#OrderDetailModal').modal('show');
			}else{

			}
		});
	}

	$scope.OrderBillHistory = function(saleOrderNumber){
		$scope.Bill = '';
		$scope.detail = '';
		$scope.descountdetail = '';
		OrderBillHistory.fetchOne(saleOrderNumber).then(function (response) {
			if(response.data.result=='SUCCESS'){
				console.log(response);
				var head = response.data.data.orderHistoryHeaderList,
						detail = response.data.data.orderHistoryDetailList,
						descountdetail = response.data.data.prderHistoryDiscountList;

					$scope.Bill = head;
					$scope.detail = detail;
					$scope.descountdetail = descountdetail;
			}else{
			}
		});
	}

	$scope.OrderBillHistoryModal = function(saleOrderNumber){
		$scope.MBill = '';
		$scope.detail = '';
		$scope.descountdetail = '';
		OrderBillHistory.fetchOne(saleOrderNumber).then(function (response) {
			console.log(response.data.result);
			if(response.data.result=='SUCCESS'){
				console.log(response);
				var head = response.data.data.orderHistoryHeaderList,
						detail = response.data.data.orderHistoryDetailList,
						descountdetail = response.data.data.prderHistoryDiscountList;
				 
					$scope.MBill = head[0];	
					$scope.totalsum_manual = 0.0;
					$scope.totalQty;
					for(var e in detail)
					{
						detail[e].amount;
						$scope.totalsum_manual += detail[e].amount;
					}

					$scope.detail = detail;
					$scope.descountdetail = descountdetail;
					$('#TaxModal').modal('show');
			}else{
			}
		});
	}

	$scope.OrderTrackingModal = function(orderId){
		Orders.fetchOne(orderId).then(function (response) {
				if(response.data.result=='SUCCESS'){
						// var head = response.data.data.order,
								// detail = response.data.data.orderDetailList;
								// $scope.inv = head;
								// console.log("OrderTrackingModal");
								// console.log($scope.inv);
								// $scope.detail = detail;
								// $scope.totalAmount=0;
								// $scope.totalQty=0;
								// for(var key in $scope.detail){
								// 		$scope.totalAmount += $scope.detail[key]['totalAmount'];
								// 		$scope.totalQty += $scope.detail[key]['qty'];
								// }
								console.log("OrderTrackingModal IF");
						$('#OrderTrackingModal').modal('show');
				}else{
					console.log("OrderTrackingModal ELSE");
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
