"use strict";
app.controller('LoginController',
    function ($scope, $http, $filter,API_URL,SweetAlert,Auth,Config,vcRecaptchaService,Customers) {

        console.log('Customers');
        console.log( Auth.username() );
        if( Auth.username()  !== null){
          console.log('login true');

          if(Auth.userTypeDesc()=='Multi'){
              window.location= _base + '/customer';
          }else{
              window.location= _base + '/home/'+Customers.customerId();
          }

        }
        var vm = this;

        $scope.loginData = {};
        $scope.slideshows1 = '';
        $scope.slideshows2 = '';
        $scope.slideshows3 = '';

        $scope.logintime = 0;
        $scope.loginDescription = '';

        $scope.loading_config = true;
        $scope.response = null;
        $scope.widgetId = null;
        $scope.model = {
            key: '6Lf2XS0UAAAAAIx1aI3a7eWvThlNSUjhyQQvmCmj'
        };

        fillByMemory();

        function fillByMemory(){
            $scope.rememberme=false;
            if(!!$.cookie('id') && $.cookie('id') != null){
                console.log($.cookie('id'));
                $scope.loginData.username = $.cookie('id');
                $scope.rememberme=true;
                //$('#username').val($.cookie('id'));
            }

            if(!!$.cookie('pass') && $.cookie('pass') != null){
                console.log($.cookie('pass'));
                $scope.loginData.password = $.cookie('pass');
                //$('#password').val($.cookie('pass'));
            }
        }

        function removeCookie(){
            $.cookie("id", '');
            $.cookie("pass", '');
        }

        $scope.setResponse = function (response) {
            console.info('Response available');
            $scope.response = response;
        };
        $scope.setWidgetId = function (widgetId) {
            console.info('Created widget ID: %s', widgetId);
            $scope.widgetId = widgetId;
        };

        $scope.cbExpiration = function() {
            console.info('Captcha expired. Resetting response object');
            vcRecaptchaService.reload($scope.widgetId);
            $scope.response = null;
         };
        /*fetchSlideshow();

        function fetchSlideshow(){
            Config.fetchAll().then(function (response) {
                if(response.data.result=='SUCCESS'){

                    $scope.slideshows1 = response.data.data.configList[0].partImgLogin+"/"+response.data.data.configList[0].imageLogin1;
                    $scope.slideshows2 = response.data.data.configList[0].partImgLogin+"/"+response.data.data.configList[0].imageLogin2;
                    $scope.slideshows3 = response.data.data.configList[0].partImgLogin+"/"+response.data.data.configList[0].imageLogin3;
                }
            });
        }*/

        fetchAll();


        function fetchAll(){
            Config.fetchAll().then(function (response) {
                if(response.data.result=='SUCCESS'){
                    $scope.loginDescription = response.data.data.configList[0].loginDescription;
                    Config.setPath(response.data.data.configList[0].partImgLogin,response.data.data.configList[0].partImgHome,
                        response.data.data.configList[0].partImgProduct,response.data.data.configList[0].partImgPromotion,
                        response.data.data.configList[0].partImgDocument,response.data.data.configList[0].partImgActivity,
                        response.data.data.configList[0].partFileProduct,response.data.data.configList[0].partFilePromotion,
                        response.data.data.configList[0].partFileDocument);
                    Config.setLoginImage(response.data.data.configList[0].imageLogin1,
                        response.data.data.configList[0].imageLogin2,
                        response.data.data.configList[0].imageLogin3);

                    Config.setHomeImage(response.data.data.configList[0].imgHomeA1,
                        response.data.data.configList[0].imgHomeA2,
                        response.data.data.configList[0].imgHomeA3);
                    fetchSlideshow();
                }
            });
        }
        function fetchSlideshow(){
            $scope.slideshows1 = Config.partImgLogin()+"/"+Config.imgLogin1();
            $scope.slideshows2 = Config.partImgLogin()+"/"+Config.imgLogin2();
            $scope.slideshows3 = Config.partImgLogin()+"/"+Config.imgLogin3();
            $scope.loading_config = false;
        }

console.log('$scope.logintime ' + $scope.logintime);
        $scope.dologin = function () {
            $scope.dataList = [];
            //$('#divProcess').show();


            $scope.loading = true;
            Auth.login($scope.loginData.username,$scope.loginData.password).then(function (response) {
                $scope.loading = false;
                if(response.data.result=='SUCCESS'){

                        if($scope.rememberme==true){
                            $.cookie('id',$scope.loginData.username);
                            $.cookie('pass',$scope.loginData.password);
                        }else{
                            removeCookie();
                        }
                        if(response.data.data.userInfo.userTypeDesc=='Multi'){
                            //sales
                            Auth.storeUserCredentials('sales',response.data.data.userInfo.userName,response.data.data.userInfo.userId,response.data.data.userInfo.tokenId,response.data.data.userInfo.userTypeDesc);
                            window.location = "./customer";
                        }else{
                            //store
                            Auth.storeUserCredentials('store',response.data.data.userInfo.userName,response.data.data.userInfo.userId,response.data.data.userInfo.tokenId,response.data.data.userInfo.userTypeDesc);
                            window.location = "./home/1";
                        }
                    }else{
                        $scope.logintime+=1;
                        console.log('$scope.logintime ' + $scope.logintime);
                        swal('รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบ Username หรือ Password');
                        //AppService.alertWarning('รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบ Username หรือ Password');
                    }
            }, function (response) {

                    console.log(response);
            });

        /*    AppService.post(API_URL+'Login', { userName: userName, password: password })
                .then(
                function (result) {

                    if(result.result=='SUCCESS'){
                        result = result.data;
                        if(result.data.userInfo.isSuperAmin==1){
                            //sales
                            window.location = "./customer";
                        }else{
                            //store
                            window.location = "./home/1";
                        }
                    }else{
                        AppService.alertWarning('รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบ Username หรือ Password');
                    }

                    /*result = result.data;

                    console.log(result);

                    $scope.dataList.push(result.data.userInfo);

                    $scope.buildHtmlTable();
                    $('#divProcess').hide();*/
        /*        }, function (response) {
                    console.log(response);
                });*/
        }
    });
