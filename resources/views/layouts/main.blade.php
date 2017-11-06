<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Ordering System</title>

    <!-- Bootstrap core CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/custom.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('./css/ecommerce.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/custom.css') ?>" rel="stylesheet">

    <link href="<?= asset('./css/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <link href="<?= asset('node_modules/sweetalert/lib/sweet-alert.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendors/jquery-steps/demo/css/jquery.steps.css') ?>" rel="stylesheet">

    <link href="<?= asset('node_modules/smartwizard/dist/css/smart_wizard.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?= asset('node_modules/bootstrap/dist/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= asset('node_modules/angular-bootstrap-datetimepicker/src/css/datetimepicker.css') ?>"/>
    <link rel="stylesheet" href="<?= asset('css/main.css') ?>"/>

    <!--<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>-->
    <style>

    </style>
    @yield('head')
</head>

<body ng-app="app" ng-controller="AppController">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-toa navbar-fixed-top">
        <div class="container-fluid ">
            <div class="navbar-header ">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!--<a class="navbar-brand" href="#"><img src="<?= asset('images/logo-TOA-2.png') ?>"></a>-->
            </div>
            <a class="navbar-brand visible-md" href="#"><img src="<?= asset('images/logo-TOA-2.png') ?>"></a>
            <div class="collapse navbar-collapse" id="myNavbar">

                <div class="col-sm-2 col-xs-2">
                <div class="well text-center">
                    <img class="mainlogo" src="<?= asset('images/logo-TOA-2.png') ?>">
                </div>

            </div>
            <div class="col-sm-10 col-xs-10">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        @verbatim
                        <span class="pull-right">ยินดีต้อนรับ {{username}} <span ng-show="!hidemenu">,{{customerName}}</span></span>
                        @endverbatim
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <ul class="navbar-nav ml-auto text-center pull-right">

                            <li class="nav-item active " ng-hide="hidemenu">
                                 <a class="navbar-menu " href="#" ng-click="$event.preventDefault();toHome()">
                                    <img class="icon-in-home" src="<?= asset('images/home.png') ?>">
                                    <!-- <span class="fa fa-home fa-2x"></span> -->
                                    <br/>
                                    หน้าแรก
                                </a>
                            </li>
                            <li class="nav-item" ng-hide="hidemenu">
                                <!--href="/cart"-->
                              <a class="navbar-menu  text-center"  href="#" ng-click="$event.preventDefault();open('lg')">
                                    <span class="bell">
                                    <img class="icon-in-home" src="<?= asset('images/cart.png') ?>">
                                    <!-- <span class="fa fa-shopping-cart fa-2x"></span> -->
                                    <br/>
                                    @verbatim
                                    ตะกร้าสินค้า
                                    <span class="bellnumbers">{{carts.length}}</span>
                                    @endverbatim
                                </span>
                                </a>
                            </li>
                            <li class="nav-item" ng-hide="hidemenu">
                                <a class="navbar-menu  text-center" href="{{ url('order') }}">
                                <img class="icon-in-home" src="<?= asset('images/order.png') ?>">
                                    <!-- <span class="fa fa-clipboard fa-2x"></span> -->
                                    <br/>
                                    สถานะคำสั่งซื้อ
                                </a>
                            </li>
                            <li class="nav-item" ng-hide="hidemenu">
                              <a class="navbar-menu  text-center" href="{{ url('favorite') }}">
                                    <img class="icon-in-home" src="<?= asset('images/fav.png') ?>">
                                    <!-- <span class="fa fa-star fa-2x"></span> -->
                                    <br/>
                                    รายการโปรด
                                </a>
                            </li>
                            <li class="nav-item" ng-hide="hidemenu">
                              <a class="navbar-menu  text-center" href="{{ url('product-history') }}">
                                    <img class="icon-in-home" src="<?= asset('images/history.png') ?>">
                                    <!-- <span class="fa fa-hourglass-half fa-2x"></span> -->
                                    <br/>
                                    สินค้าที่เคยสั่งซื้อ
                                </a>
                            </li>

                            <li class="nav-item" ng-hide="hidemenu">
                              <a class="navbar-menu  text-center" href="{{ url('news') }}">
                                    <img class="icon-in-home" src="<?= asset('images/news.png') ?>">
                                    <!-- <span class="fa fa-list-alt fa-2x"></span> -->
                                    <br/>
                                    ข่าวสาร-กิจกรรม
                                </a>
                            </li>

                            <li class="nav-item" ng-hide="hidemenu">
                              <a class="navbar-menu  text-center" href="{{ url('documents') }}">
                                    <img class="icon-in-home" src="<?= asset('images/doc.png') ?>">
                                    <!-- <span class="fa fa-file-pdf-o fa-2x"></span> -->
                                    <br/>
                                    เอกสารทั่วไป
                                </a>
                            </li>
                            <li class="nav-item" ng-hide="hidemenu">
                              <a class="navbar-menu  text-center" href="{{ url('report') }}">
                                    <img class="icon-in-home" src="<?= asset('images/report.png') ?>">
                                    <!-- <span class="fa fa-file-text-o fa-2x"></span> -->
                                    <br/>
                                    รายงาน
                                </a>
                            </li>


                            <li class="nav-item">
                              <!--<a class="navbar-menu  text-center" href="#">
                                    <span class="fa fa-user fa-2x"></span>
                                    <br/>
                                    บัญชีของฉัน
                                </a>-->

                                <div class="dropdown">
                                    <div class="navbar-menu  text-center" data-toggle="dropdown">
                                    <img class="icon-in-home" src="<?= asset('images/account.png') ?>">
                                    <!-- <span class="fa fa-user fa-2x"></span> -->
                                    <br/>
                                        บัญชีของฉัน <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('profile') ?>')">ข้อมูลส่วนตัว</a></li>
                                            <li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('contact')  ?>')">ติดต่อเรา</a></li>
                                            <li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('profile-update')  ?>')">แจ้งเรื่องเปลี่ยนแปลงข้อมูล</a></li>
                                            <li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('customer')  ?>')">เปลี่ยนร้านค้า</a></li>
                                            <li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('password-update')  ?>')">เปลี่ยนรหัสผ่าน</a></li>
                                            <li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('faq')  ?>')">ปัญหาที่พบ</a></li>
                                            <li><a ng-click="$event.preventDefault(); logout()">ออกจากระบบ</a></li>
                                          </ul>
                                    </div>

                                </div>
                            </li>
                            <!--<li class="nav-item">
                                <a class="navbar-menu" ui-sref="checkout">
                                 <ngcart-summary template-url="/template/ngCart/summary.html"></ngcart-summary>
                                </a>
                            </li>-->
                          </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="input-group">
                            <input class="form-control top-search" placeholder="ค้นหาสินค้า" type="text" ng-model="searchstring">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="button"  ng-click="search()"><span class="fa fa-search"></span></button>
                            </span>
                      </div>
                    </div>
                </div>
            </div>


            </div>

        </div>

    </nav>
    <!-- Page Content -->

    <div class="wrapper container-fluid">
        @yield('content')
        @verbatim
        <script type="text/ng-template" id="myModalContent.html">
            <div class="modal-header">
                <label class="text-left col-sm-4" ><a href="#" ng-click="$event.preventDefault(); cancel()"><i class="fa fa-close"></i></a></label>
                <label class="col-sm-8"><h4 class="modal-title" id="modal-title">ตะกร้าของฉัน</h4></label>

            </div>
            <div class="modal-body" id="modal-body" style="padding:none;">

                <p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-3x fa-spin"></span></p>

                    <div class="col-sm-12" ng-repeat="item in items" style="margin-left:-10px;">

                        <label class="text-left col-sm-1" >
                            <a href="#" ng-click="$event.preventDefault(); removeCart(item.productId)"><i class="fa fa-trash"></i></a></label>
                        <label class="col-sm-11 text-left">{{item.productCode}}</label>
                        <label class="text-left col-sm-1" ></label>
                        <label class="col-md-11">{{item.productNameTh}}</label>
                        <div class="col-md-4 text-right"><img src="{{partImgProduct}}/{{item.btfCode}}.jpg" style="width:60%;" err-SRC="{{partImgProduct}}/Noimage.jpg"></div>
                        <div class="col-md-8">
                          <div class="col-md-12">
                            ราคา: {{item.price | number:2}}
                          </div>
                          <div class="form-group">


                          <div class="col-md-4">
                            จำนวน :
                          </div>
                          <div class="col-md-3">

                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default" ng-click="mremoveQty($index)">-</button>
                                </span>
                                <input type="text" class="form-controle text-center"  ng-model="item.qty" style="width:80px; padding:5px;" ng-blur="updateCart($index)">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default" ng-click="maddQty($index)">+</button>
                                </span>

                                      <p class="text-center" ng-show="loadingcart"><span class="fa fa-refresh  fa-spin"></span></p>
                            </div>
                          </div>
                          <div class="col-md-12">
                            หน่วย:{{item.unitNameTh}} <p class="text-center" ng-show="loadingcart"><span class="fa fa-refresh  fa-spin"></span></p>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-12"><hr></div>
                    </div>
                    <div class="col-sm-12" >
                        <label class="col-md-6">จำนวนเงินสุทธิ(ไม่รวม VAT)</label>
                        <label class="col-md-6 text-right" >{{totalAmount| number:2}} บาท</label>
                    </div>

                </div>
            </div>
            <div class="modal-footer text-center">
                <button class="col-md-3 btn btn-danger" type="button" ng-click="removeAll()">ลบทั้งหมด</button>
                <button class="col-md-3 btn btn-primary" type="button" ng-click="toShop()">เลือกซื้อต่อ</button>
                <button class=" col-md-3 btn btn-success" type="button" ng-click="order()">สั่งซื้อ</button>
            </div>
        </script>
        @endverbatim

    </div>



    <!-- Bootstrap core JavaScript -->

        <script type="text/javascript">
          var _base = "{{ url('/') }}";
        </script>
    <script src="<?= asset('js/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/popper.min.js') ?>"></script>
    <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <script src="<?= asset('node_modules/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('node_modules/angular-sanitize/angular-sanitize.min.js') ?>"></script>

    <script src="<?= asset('node_modules/angular-sweetalert/SweetAlert.min.js') ?>"></script>
    <script src="<?= asset('node_modules/sweetalert/lib/sweet-alert.min.js') ?>"></script>

    <script src="<?= asset('node_modules/ngCart/dist/ngCart.js') ?>"></script>

    <script src="<?= asset('node_modules/underscore/underscore-min.js') ?>"></script>
    <script src="<?= asset('node_modules/angular-bootstrap-multiselect/dist/angularjs-dropdown-multiselect.js') ?>"></script>

    <script src="<?= asset('vendors/jquery-steps/build/jquery.steps.min.js') ?>"></script>

    <script src="<?= asset('app/app.js') ?>"></script>
    <script src="<?= asset('app/services.js') ?>"></script>
    <script src="<?= asset('app/controllers/appController.js') ?>"></script>

    <script src="<?= asset('node_modules/moment/moment.js') ?>"></script>
    <script src="<?= asset('node_modules/angular-bootstrap-datetimepicker/src/js/datetimepicker.js') ?>"></script>
    <script src="<?= asset('node_modules/angular-bootstrap-datetimepicker/src/js/datetimepicker.templates.js') ?>"></script>

    <script src="<?= asset('node_modules/angular-ui-bootstrap/dist/ui-bootstrap.js') ?>"></script>
    <script src="<?= asset('node_modules/angular-ui-bootstrap/dist/ui-bootstrap-tpls.js') ?>"></script>

    <script type="text/javascript" src="<?= asset('node_modules/angular-recaptcha/release/angular-recaptcha.js') ?>"></script>

    <script src="<?= asset('node_modules/angular-utils-pagination/dirPagination.js') ?>"></script>

    @yield('footer')
</body>

</html>
