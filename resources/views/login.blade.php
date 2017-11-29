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
    <link href="<?= asset('css/login.css') ?>" rel="stylesheet">

    <link href="<?= asset('./css/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Maitree:200,200i,300,300i,600,600i">
    <link href="<?= asset('node_modules/sweetalert/lib/sweet-alert.css') ?>" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style>
    body {
        font-family: 'Maitree', sans-serif !important;
    }
    </style>
</head>

<body ng-app="app" ng-controller="AppController">
    <div ng-controller="LoginController">
        @verbatim
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-toa fixed-top">
        <div class="row">
          <a class="navbar-brand" href="#"><img src="<?= asset('images/logo-TOA.png') ?>" style="width:30%;"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        </nav>

        <p class="text-center" ng-show="loading_config"><span class="fa fa-refresh fa-3x fa-spin"></span></p>
        <header>


        </header>
        <div class="section2">
        <div class="row">
            <div class="col-md-8">
                <section>
                 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <!-- Slide One - Set the background image for this slide in the line below -->
                                <div class="carousel-item active" style="background-image: url('{{slideshows1}}')">
                                    <div class="carousel-caption d-none d-md-block">
                                        <!--<h3>First Slide</h3>
                                        <p>This is a description for the first slide.</p>-->
                                    </div>
                                </div>
                                <!-- Slide Two - Set the background image for this slide in the line below -->
                                <div class="carousel-item" style="background-image: url('{{slideshows2}}')">
                                    <div class="carousel-caption d-none d-md-block">
                                        <!--<h3>Second Slide</h3>
                                        <p>This is a description for the second slide.</p>-->
                                    </div>
                                </div>
                                <!-- Slide Three - Set the background image for this slide in the line below -->
                                <div class="carousel-item" style="background-image: url('{{slideshows3}}')">
                                    <div class="carousel-caption d-none d-md-block">
                                        <!--<h3>Third Slide</h3>
                                        <p>This is a description for the third slide.</p>-->
                                    </div>
                                </div>
                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
            </section>

            </div>
            <div class="col-md-4">

        <div class="card card-container form-login">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="<?php echo asset('images/iconlogin.png'); ?>" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-horizontal form-label-left input_mask" ng-submit="dologin()">
                            <p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-3x fa-spin"></span></p>

                          <div class="col-md-12 form-group has-feedback">
                            <input class="form-control has-feedback-left" id="username" placeholder="Username" type="text" ng-model="loginData.username" style="margin-top:6px;">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true" style="padding-top:6px;"></span>
                          </div>
                          <div class="col-md-12 form-group has-feedback">
                            <small class="pull-right">
                                <a style="cursor: pointer;" ng-click="showPassword()">
                                    แสดงรหัสผ่าน
                                </a>
                            </small>
                            <input type="{{ passwordInputType }}" class="form-control has-feedback-left" id="password" placeholder="Password" type="text" ng-model="loginData.password">
                            <span class="fa fa-lock form-control-feedback left" aria-hidden="true" style="padding-top:18px;"></span>
    
                          </div>

                          <div class="clearfix"></div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                            <div class="col-md-9 col-sm-9 col-xs-12"></div>
                          </div>

                          <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <a href="<?php echo url('forgot-password'); ?>" class="pull-right link-blue link-underlined">ลืมรหัสผ่าน?</a>
                                <div class="checkbox pull-left">
                                    <label>
                                        <input name="example6" type="checkbox" ng-model="rememberme">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="ln_solid"></div>

                         <div ng-show="logintime>=3">
                            <!-- <div class="g-recaptcha" data-sitekey="6LeZTjQUAAAAAJvXr2P_Acir9D5T8YwcBQTcCQyh"></div> -->
                          </div>

                          <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                              <button style="background: #169bd4;border-radius: 5px;min-width: 100%;" type="submit" class="btn btn-sm btn-primary" >Login</button>
                            </div>
                          </div>

            </form>

        </div><!-- /card-container -->





            </div>

        </div><!--row-->
        </div><!--section2-->

         <!-- Page Content -->
      <div class="content login-description">
        <div class="row" >
            <div class="col-md-12">
                <div class="panel panel-default">
                      <div class="panel-heading text-center">รายละเอียดเพิ่มเติม </div>
                      <div class="panel-body">
                        <br/>
                        <div ng-bind-html="loginDescription"></div>
                      </div>
                </div>

            </div>
            <div class="col-sm-4">
                <!--Login-->
            </div>
        </div>
        <!-- /.row -->
        <div class="row"><div class="col-md-12 text-center">@ 2017 TOA Paint (Thailand) Public Company Limited. All Right Reserved.</div></div>
      </div>
        @endverbatim
    </div>





    <!-- Bootstrap core JavaScript -->

    <script type="text/javascript">
        var _base = '{{ url('/') }}';
    </script>
    <script src="<?= asset('js/jquery.min.js') ?>"></script>
    <script src="<?= asset('js/popper.min.js') ?>"></script>
    <script src="<?= asset('js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="<?= asset('node_modules/angular/angular.min.js') ?>"></script>
    <script src="<?= asset('bower_components/angular-messages/angular-messages.min.js') ?>"></script>
    <script src="<?= asset('bower_components/angular-validation-match/dist/angular-validation-match.js') ?>"></script>
    
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

    <script src="<?= asset('app/controllers/loginController.js') ?>"></script>
</body>

</html>
