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

    <div ng-controller="RecoverPasswordController">
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
                        <h4>ตั้งรหัสผ่านใหม่</h4>
                        <div class="row">
                        <div class="col-sm-8">
                          <form class="form-horizontal form-label-left input_mask" methos="POST" action="/forgotconf-password" name="myForm">
                              <p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-3x fa-spin"></span></p>
                              <div class="form-group col-md-12">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">ชื่อผู้ใช้งาน :</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    
                                  </div>
                                </div>

                              <div class="form-group col-md-12">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">รหัสผ่านใหม่ :</label>
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                              
                                       <input class="form-control" type="password" id="password" name="password" ng-model="formData.password" ng-minlength="8" ng-maxlength="20" ng-pattern="/(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z])/" required  />
                                  </div>
                                  <div class="col-md-5 col-sm-5 col-xs-12">

                                        <span ng-show="myForm.password.$error.required && myForm.password.$dirty"><font color="red">Request Field</font></span>
                                        <span ng-show="!myForm.password.$error.required && (myForm.password.$error.minlength || myForm.password.$error.maxlength) && myForm.password.$dirty"><font color="red">ต้องมีความยาวไม่ต่ำกว่า 8 ตัวอักษร</font></span>

                                        
                                        <span ng-show="!myForm.password.$error.required && !myForm.password.$error.minlength && !myForm.password.$error.maxlength && myForm.password.$error.pattern && myForm.password.$dirty"><font color="red">ต้องมีตัวอักษรตัวพิมพ์ใหญ่ อย่างน้อย 1 ตัวอักษร<br/>ต้องมีตัวอักษรตัวพิมพ์เล็ก อย่างน้อย 1 ตัวอักษร<br>ต้องมีตัวเลข อย่างน้อย 1 ตัว</font></span>
                                  </div>
                                </div>

                                <div class="form-group col-md-12">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">พิมพ์อีกครั้ง :</label>
                                  <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input class="form-control" type="password" id="password_c" name="password_c" ng-model="formData.password_c" valid-password-c required>
                                  </div>
                                  <div class="col-md-5 col-sm-5 col-xs-12">
                                    <span ng-show="myForm.password_c.$error.required && myForm.password_c.$dirty"><font color="red">Request Field</font></span>
                                    <span ng-show="!myForm.password_c.$error.required && myForm.password_c.$error.noMatch && myForm.password.$dirty"><font color="red">Passwords do not match.</font></span>
                                  </div>
                                </div>

                           
   
                            <div class="clearfix"></div>

                            <div class="form-group">
                              <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                <button type="submit" class="btn btn-sm btn-primary" >บันทึกการเปลี่ยนแปลง</button>
                              </div>
                            </div>

                          </form>
                        </div>
                        <div class="col-sm-4">
                          <form class="form-horizontal form-label-left input_mask" methos="POST" action="/forgotconf-password">
                              
                              <div class="form-group col-md-12">
                                  <label class="control-label col-md-6 col-sm-6 col-xs-12">เงื่อนไขการตั้งรหัสผ่าน</label>
                                  
                                </div>

                              <div class="form-group col-md-12">
                                  <label class="control-label col-md-10 col-sm-10 col-xs-12">1. ต้องมี<font color="green">ความยาวไม่ต่ำกว่า 8 ตัวอักษร</font></label>
                                  
                                </div>

                                <div class="form-group col-md-12">
                                  <label class="control-label col-md-10 col-sm-10 col-xs-12">2. ต้องมีตัวอักษร<font color="green">ตัวพิมพ์ใหญ่</font> อย่างน้อย 1 ตัวอักษร</label>
                                </div>

                                <div class="form-group col-md-12">
                                  <label class="control-label col-md-10 col-sm-10 col-xs-12">3. ต้องมีตัวอักษร<font color="green">ตัวพิมพ์เล็ก</font> อย่างน้อย 1 ตัวอักษร</label>
                                </div>

                                <div class="form-group col-md-12">
                                  <label class="control-label col-md-10 col-sm-10 col-xs-12">4. ต้องมี<font color="green">ตัวเลข</font> อย่างน้อย 1 ตัว</label>
                                </div>
   
                            <div class="clearfix"></div>

                            

                          </form>
                        </div>
                      </div>
                      </div>
                </div>
            </div>
            
        </div>
        <!-- /.row -->
        <div class="row"><div class="col-md-12 text-center">@ 2017 TOA Paint (Thailand) Public Company Limited. All Right Reserved.</div></div>
      </div>
        @endverbatim
    </div>

    

    

    <!-- Bootstrap core JavaScript -->
    
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
    
    <script src="<?= asset('app/controllers/recoverPasswordController.js') ?>"></script>
    
    

</body>

</html>