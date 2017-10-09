"use strict";
app.controller('OrderController',
function ($scope, $http, $filter,$timeout,Customers,Orders,OrderPrecess,OrderInfo) {
        /* Bindable functions
		 -----------------------------------------------*/
		$scope.endDateBeforeRender = endDateBeforeRender;
		$scope.endDateOnSetTime = endDateOnSetTime;
		$scope.startDateBeforeRender = startDateBeforeRender;
		$scope.startDateOnSetTime = startDateOnSetTime;
    $scope.orders = {};
    $scope.ordersYear = [];
    $scope.ordersYearMonth = [];
    $scope.ordersList = [];
    var arr = [];

    fetchOrderPrecess(Customers.customerId(),$scope.startDateBeforeRender(),$scope.endDateBeforeRender() );

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
                console.log('month year : ' +  month + ' year is ' + year );
                //console.log( $scope.ordersYear.indexOf(year) );
                if ($scope.ordersYearMonth.indexOf(month) === -1)
                $scope.ordersYearMonth.push( {month );

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
                console.log('$scope.ordersList');
                console.log($scope.ordersList);
                //console.log(arr);
            }
          console.log(response.data);
        });
      }
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
		  $scope.$broadcast('end-date-changed');
		}

		function startDateBeforeRender ($dates) {
		  if ($scope.dateRangeEnd) {
		    var activeDate = moment($scope.dateRangeEnd);

		    $dates.filter(function (date) {
		      return date.localDateValue() >= activeDate.valueOf()
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
		      return date.localDateValue() <= activeDate.valueOf()
		    }).forEach(function (date) {
          console.log('date selectable false');
		      date.selectable = false;
		    })
		  }else{
        //console.log('dateRangeStart false ');
        //console.log( moment().format('YYYY-MM-DD HH:mm:ss').replace(' ','T') );
        return moment().format('YYYY-MM-DD HH:mm:ss').replace(' ','T');

      }
		}

 })
