"use strict";
app.controller('CustomerController',
    function ($scope, $http, $filter,Customers,Auth,sharedService) {
        //retrieve customers listing from API
        $scope.customers = {};
        $scope.loading = true;
$('.top-search').attr('placeholder','ค้นหาร้านค้า');

        fetchAllCustomers(Auth.userId());

        function fetchAllCustomers(userId) {
            Customers.fetchAll(userId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.customers = response.data.data.customerList;
                }
                $scope.loading = false;
            });
        }

        $scope.$on('dataPassed', function () {
          $scope.searchstring = sharedService.values;
          fetchCustomersFilter(Auth.userId());
        });

        function fetchCustomersFilter(userId) {
            $scope.loading = true;
            $scope.customers = {};
            Customers.fetchAll(userId).then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.customers = response.data.data.customerList;
                    console.log($scope.searchstring);
                    $scope.customers = getResult($scope.customers,'customerName','customerCode',$scope.searchstring);
                    console.log($scope.customers);
                }
                $scope.loading = false;
            });
        }

        function getResult(results,keyToFilter,keyToFilter2, valueStartsWith){
            //return _.filter(results, function(d){ return d[keyToFilter].startsWith(valueStartsWith); })
            return _.filter(results, function(d){ return d[keyToFilter].indexOf(valueStartsWith)!=-1 || d[keyToFilter2].indexOf(valueStartsWith)!=-1; })

        }
        /*customer_data.all(5)
                .then(function(result) {
                    if(result.result=='SUCCESS'){
                        result = result.data;
                        $scope.customers = result.data.customerList;
                    }
                    $scope.loading = false;
                });*/


        $scope.toHome = function(id){
            var url =  './home/'+id;

            var cusInfo = _.where($scope.customers, { customerId: id })[0];
            fetchCustomer(id);

            function fetchCustomer(customerId) {
                Customers.fetchOne(customerId).then(function (response) {
                    if(response.data.result=='SUCCESS'){
                      console.log('customer info fetch')
                        $scope.customer = response.data.data.customerInfo;
                        console.log($scope.customer);
                        /*
                        if( $scope.customer.blockFlag == '01'){
                          swal('MSG : 101 ไม่สามารถสั่งซื้อสินค้าได้ กรุณาติดต่อผู้แทนขายที่ดูแลท่าน ขอบคุณค่ะ');
                          return false;
                        }else{
                        */
                          Customers.setCustomer(id,cusInfo.customerName,cusInfo.customerCode);
                          window.location.href = url;
                        //}
                    }
                    $scope.loading = false;
                });
            }
            console.log(cusInfo);
            /*
            Customers.setCustomer(id,cusInfo.customerName);
            window.location.href = url;
            */
          }

 })

 app.controller('homeContactController',
     function ($scope, $http, $filter,Products,Promotions,Config,Customers,Auth,Carts,Fav) {
       $scope.customers = {};
       $scope.loading = true;


       fetchCustomer(Customers.customerId());

       function fetchCustomer(customerId) {
           Customers.fetchOne(customerId).then(function (response) {
               if(response.data.result=='SUCCESS'){
                 console.log('customer info fetch')
                   $scope.customer = response.data.data.customerInfo;

               }
               $scope.loading = false;
           });
       }
});
