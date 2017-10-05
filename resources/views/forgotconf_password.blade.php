<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Ordering System</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= asset('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/custom.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('./css/ecommerce.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/custom.css') ?>" rel="stylesheet">

    <link href="<?= asset('./css/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <link href="<?= asset('node_modules/sweetalert/lib/sweet-alert.css') ?>" rel="stylesheet">

</head>

<body ng-app="app" ng-controller="AppController">

    <div ng-controller="ForgotConfController">
        @verbatim
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-toa fixed-top">
          <a class="navbar-brand" href="#"><img src="<?= asset('images/logo-TOA.png') ?>" style="width:40%;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
        </nav>




         <!-- Page Content -->
      <div class="content">
        <div class="wrapper" >
            <br><br><br><br><br><br><br><br><br>
            <div class="col-sm-12">
                <div class="panel panel-default">

                      <div class="panel-body">
                        <h5>เรียน ผู้ใช้บริการระบบ TOA eOrdering</h5>
                        <p><br/>ท่าได้ทำการขอรหัสผ่านใหม่ สำหรับการใช้งานของระบบ TOA eOrdering<br/>
                          <a href="/recover-password">คลิกที่นี่</a> เพื่อเปลี่ยนรหัสผ่าน<br/><br/>
                          หากลิงค์ด้านบนไม่ทำงาน กรุณาคัดลอก url นี้ลงในหน้าต่างเบราเซอร์ของท่านเพื่อยืนยันขอรหัสผ่านใหม่<br/>
                          <label ng-show="port!=''"><a href="{{protocol}}://{{host}}:{{port}}/recover-password">{{protocol}}://{{host}}:{{port}}/recover-password</a></label>
                          <label ng-show="port==''"><a href="{{protocol}}://{{host}}/recover-password">{{protocol}}://{{host}}/recover-password</a></label><br/><br/>
                          <font color="red">หมายเหตุ: เมื่อทำการยืนยันรหัสผ่านแล้วท่านไม่สามารถใช้ลิงค์จากอีเมลล์นี้ได้</font></p>


                      </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row"><div class="col-md-12 text-center">© 2017 TOA Print (Thailand).Co.,Ltd All Rights reserved</div></div>
      </div>
        @endverbatim
    </div>





    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript">
      var _base = "{{ url('/') }}";
    </script>

    <script src="<?= asset('js/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/popper.min.js') ?>"></script>
    <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
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

    <script src="<?= asset('app/controllers/forgotConfController.js') ?>"></script>



</body>

</html>
