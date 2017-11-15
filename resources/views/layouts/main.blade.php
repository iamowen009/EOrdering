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
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"/>
    <link rel="stylesheet" href="<?= asset('css/layouts.css') ?>"/>

    <!--<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>-->
    <style>

    </style>
    @yield('head')
</head>

<body ng-app="app" ng-controller="AppController">

    <!-- Navigation -->
    @include('layouts.inc-head')
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
                          <a href="#" ng-click="$event.preventDefault(); removeCart(item.productId)"><i class="fa fa-trash"></i></a>
                      </label>
                      <label class="col-sm-11 text-left">{{item.productCode}}</label>
                      <label class="text-left col-sm-1" ></label>
                      <label class="col-md-11">{{item.productNameTh}}</label>
                      <div class="col-md-4 text-right"><img src="{{partImgProductCard}}/{{item.btfCode}}.jpg" style="width:60%;" err-SRC="{{partImgProduct}}/Noimage.jpg"></div>
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
                        <!--
                        :: start bom list
                        =======================================================================================================
                        -->
                        <div class="col-sm-12" ng-repeat="bom in boms" ng-if="bom.productRefCode == item.productCode" style="margin-left:10px; margin-top:20px;">
                            <label class="text-left col-sm-1" >
                                <a href="#" ><i class="fa fa-trash"></i></a></label>
                            <label class="col-sm-11 text-left">{{bom.productCode}}</label>
                            <label class="text-left col-sm-1" ></label>
                            <label class="col-md-11">{{bom.productNameTh}}</label>
                            <div class="col-md-4 text-right"><img src="{{partImgProductCard}}/{{bom.btfCode}}.jpg" style="width:60%;" err-SRC="{{partImgProduct}}/Noimage.jpg"></div>
                            <div class="col-md-8">
                              <div class="col-md-12">
                                ราคา: {{bom.price | number:2}}
                              </div>
                              <div class="form-group">


                              <div class="col-md-4">
                                จำนวน :
                              </div>
                              <div class="col-md-3">

                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default disabled" >-</button>
                                    </span>
                                    <input type="text" class="form-controle text-center disabled" disabled style="width:80px; padding:5px;" value="{{ item.qty }}" >
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-defaul disabledt" disabled>+</button>
                                    </span>
                                </div>
                              </div>
                              <div class="col-md-12">
                                หน่วย:{{bom.unitNameTh}} <p class="text-center" ng-show="loadingcart"><span class="fa fa-refresh  fa-spin"></span></p>
                              </div>
                            </div>
                            </div>
                        </div>
                        <!--
                        :: End bom list
                        =======================================================================================================
                        -->
                        <div class="col-md-12"><hr></div>
                  </div>

                  <div class="col-sm-12" >
                        <label class="col-md-6">จำนวนเงินสุทธิ(ไม่รวม VAT)</label>
                        <label class="col-md-6 text-right" >{{totalAmount| number:2}} บาท</label>
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
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
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
