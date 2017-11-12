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
                    <span class="pull-right">ยินดีต้อนรับ {{username}} <span ng-show="!hidemenu">,{{customerCode}} {{customerName}}</span></span>
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
