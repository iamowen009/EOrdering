"use strict";
app.controller('NewsController',
function ($scope, $http,Config, $filter,$timeout,Customers,Orders,OrderPrecess,OrderInfo,OrderPrecessInfo,OrderProcessTracking,OrderBillHistory,API_URL) {
  $scope.news = {};
  $scope.partImgActivity = Config.partImgActivity();
  $scope.partImgProduct = Config.partImgProduct();
  console.log('picture path ' , Config.partImgActivity() );
    $http.get(API_URL + '/News').then(function(response){
      if(response.data.result == 'SUCCESS'){
            $scope.news = response.data.data.newsActivityHDList;
      }
      console.log( response);
    });
    $scope.newsDate = function($date){
      // var $date = $scope.newsHD.newsDate;
      var dt = $date.split('T');
      console.log( 'detact date ', dt );

      var dx = dt[0].split('-');
      return dx[2] + ' ' + monthName( dx[1] ) + ' ' + (parseInt(dx[0])+parseInt(543));
    }

    function monthName($month){
      var month = {
        '01': 'มกราคม',
        '02': 'กุมภาพันธ์',
        '03': 'มีนาคม',
        '04': 'เมษายน',
        '05': 'พฤษภาคม',
        '06': 'มิถุนายน',
        '07': 'กรกฎาคม',
        '08': 'สิงหาคม',
        '09': 'กันยายน',
        '10': 'ตุลาคม',
        '11': 'พฤศจิกายน',
        '12': 'ธันวาคม'
      };
      return month[$month] ? month[$month] : $month;
    }
})
app.controller('NewsDetailController',
function ($scope, $http,Config, $filter,$timeout,Customers,Orders,OrderPrecess,OrderInfo,OrderPrecessInfo,OrderProcessTracking,OrderBillHistory,API_URL) {
  $scope.news = {};
  $scope.partImgActivity = Config.partImgActivity();
  $scope.partImgProduct = Config.partImgProduct();
  $scope.newsKey = $('input[name="newsKey"]').val()-1;
    $http.get(API_URL + '/News').then(function(response){
      if(response.data.result == 'SUCCESS'){
            $scope.newsHD = response.data.data.newsActivityHDList[$scope.newsKey];
            $scope.news = response.data.data.newsActivityDTList[$scope.newsKey];

            $scope.newsDate = function(){
              var $date = $scope.newsHD.newsDate;
              var dt = $date.split('T');
              console.log( 'detact date ', dt );

              var dx = dt[0].split('-');
              return dx[2] + ' ' + monthName( dx[1] ) + ' ' + (parseInt(dx[0])+parseInt(543));
            }

            function monthName($month){
              var month = {
                '01': 'มกราคม',
                '02': 'กุมภาพันธ์',
                '03': 'มีนาคม',
                '04': 'เมษายน',
                '05': 'พฤษภาคม',
                '06': 'มิถุนายน',
                '07': 'กรกฎาคม',
                '08': 'สิงหาคม',
                '09': 'กันยายน',
                '10': 'ตุลาคม',
                '11': 'พฤศจิกายน',
                '12': 'ธันวาคม'
              };
              return month[$month] ? month[$month] : $month;
            }
      }
              console.log( response);
            });


})
