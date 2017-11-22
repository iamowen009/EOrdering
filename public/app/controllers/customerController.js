"use strict";
app.controller('CustomerController', function ($scope, $http, $filter, Customers, Auth, sharedService) {
    //retrieve customers listing from API
    $scope.customers = {};
    $scope.loading = true;
    $('.top-search').attr('placeholder', 'ค้นหาร้านค้า');

    fetchAllCustomers(Auth.userId());

    function fetchAllCustomers(userId) {
        Customers.fetchAll(userId).then(function (response) {
            if (response.data.result == 'SUCCESS') {
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
            if (response.data.result == 'SUCCESS') {
                $scope.customers = response.data.data.customerList;
                console.log($scope.searchstring);
                $scope.customers = getResult($scope.customers, 'customerName', 'customerCode', $scope.searchstring);
                console.log($scope.customers);
            }
            $scope.loading = false;
        });
    }

    function getResult(results, keyToFilter, keyToFilter2, valueStartsWith) {
        //return _.filter(results, function(d){ return d[keyToFilter].startsWith(valueStartsWith); })
        return _.filter(results, function (d) { return d[keyToFilter].indexOf(valueStartsWith) != -1 || d[keyToFilter2].indexOf(valueStartsWith) != -1; })

    }
    /*customer_data.all(5)
            .then(function(result) {
                if(result.result=='SUCCESS'){
                    result = result.data;
                    $scope.customers = result.data.customerList;
                }
                $scope.loading = false;
            });*/


    $scope.toHome = function (id) {
        var url = './home/' + id;

        var cusInfo = _.where($scope.customers, { customerId: id })[0];
        fetchCustomer(id);

        function fetchCustomer(customerId) {
            Customers.fetchOne(customerId).then(function (response) {
                if (response.data.result == 'SUCCESS') {
                    console.log('customer info fetch')
                    $scope.customer = response.data.data.customerInfo;
                    console.log($scope.customer);
                    if ($scope.customer.blockFlag == '01') {
                        swal('MSG : 101 ไม่สามารถสั่งซื้อสินค้าได้ กรุณาติดต่อผู้แทนขายที่ดูแลท่าน ขอบคุณค่ะ');
                        return false;
                    } else {
                        Customers.setCustomer(id, cusInfo.customerName, cusInfo.customerCode);
                        window.location.href = url;
                        
                    }
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

    $scope.fetchCustomer = function() {
        Customers.fetchOne(Customers.customerId()).then(function (response) {
            if (response.data.result == 'SUCCESS') {
                var cus = response.data.data.customerInfo;
                $scope.cus = cus;
                $scope.input = {
                    customerName: cus.customerName,
                    address: cus.address,
                    street: cus.street,
                    subDistrictName: cus.subDistrictName,
                    districtName: cus.districtName,
                    cityName: cus.cityName,
                    postCode: cus.postCode,
                    telNo: cus.telNo,
                    email: cus.email,
                    transportZoneDesc: cus.transportZoneDesc
                };
            }
            $scope.loading = false;
        });
    }

    $scope.updateProfile = function(isValid) {
        if (isValid) {
            $scope.btnLoading = true;

            var formData = {
                customerId: $scope.cus.customerId,
                customerCode: $scope.cus.customerCode,
                customerName: $scope.input.customerName,
                address: $scope.input.address,
                street: $scope.input.street,
                subDistinct: $scope.input.subDistrictName,
                distinct: $scope.input.districtName,
                city: $scope.input.cityName,
                postCode: $scope.input.postCode,
                phoneNumber: $scope.input.telNo,
                email: $scope.input.email,
                shipToText: $scope.input.transportZoneDesc,
                remark: '', 
                userName: Auth.username(),
            };
    
            Customers.customerUpdate({ customer: formData })
                .then(function(res) {
                    if (res.data.result == 'SUCCESS') {
                        swal('สำเร็จ', 'แจ้งเรื่องเปลี่ยนแปลงข้อมูลสำเร็จ', 'success');
                    } else {
                        swal('เกิดข้อผิดพลาด', 'ไม่สามารถแจ้งเรื่องเปลี่ยนแปลงข้อมูลได้', 'warning');
                    }
    
                    $scope.input.remark = '';   
                    $scope.btnLoading = false;             
                });
        }
    };

    $scope.sendProblem = function(isValid) {
        if (isValid) {
            $scope.btnLoading = true;

            var formData = {
                customerId: $scope.cus.customerId,
                customerCode: $scope.cus.customerCode,
                customerName: $scope.input.customerName,
                problemText: $scope.input.problemText,
                userName: Auth.username(),
            };

            Customers.customerProblem({ problem: formData })
                .then(function(res) {
                    if (res.data.result == 'SUCCESS') {
                        swal('สำเร็จ', 'แจ้งปัญหาการใช้งานเรียบร้อย', 'success');
                        $scope.input = { };
                        $scope.form.$setPristine();
                    } else {
                        swal('เกิดข้อผิดพลาด', 'ไม่สามารถแจ้งปัญหาได้', 'warning');
                    }

                    $scope.btnLoading = false;            
                });
        }
    }
})

app.controller('homeContactController',
    function ($scope, $http, $filter, Products, Promotions, Config, Customers, Auth, Carts, Fav) {
        $scope.customers = {};
        $scope.loading = true;


        fetchCustomer(Customers.customerId());

        function fetchCustomer(customerId) {
            Customers.fetchOne(customerId).then(function (response) {
                if (response.data.result == 'SUCCESS') {
                    console.log('customer info fetch')
                    $scope.customer = response.data.data.customerInfo;

                }
                $scope.loading = false;
            });
        }
    });
