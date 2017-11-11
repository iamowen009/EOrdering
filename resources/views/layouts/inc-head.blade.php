<!-- Navigation -->
<nav class="navbar navbar-expand-lg top-menu navbar-dark bg-toa navbar-fixed-top">
	<div class="container-fluid ">
				<div class="navbar-header ">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#"><img src="<?= asset('images/logo-TOA-2.png') ?>"></a>
				</div>
				<div id="myNavbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav col-md-6">
						<li>
								<div class="input-group">
											<input class="form-control top-search" placeholder="ค้นหาสินค้า" type="text" ng-model="searchstring">
											<span class="input-group-btn">
												<button class="btn btn-default" type="button"  ng-click="search()"><span class="fa fa-search"></span></button>
											</span>
								</div>
						</li>

					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							@verbatim
								<span>ยินดีต้อนรับ {{username}} <span ng-show="!hidemenu">,{{customerCode}} {{customerName}}</span></span>
							@endverbatim
						</li>

					</ul>
						<ul class="navbar-nav ml-auto">
								<li class="nav-item active " ng-hide="hidemenu">
									 <a class="navbar-menu " href="#" ng-click="$event.preventDefault();toHome()">
												<img class="icon-in-home" src="<?= asset('images/home.png') ?>">
												หน้าแรก
										</a>
								</li>
								<li class="nav-item" ng-hide="hidemenu">
										<a class="navbar-menu  text-center"  href="#" ng-click="$event.preventDefault();open('lg')">
												<span class="bell">
														<img class="icon-in-home" src="<?= asset('images/cart.png') ?>">
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
												สถานะคำสั่งซื้อ
										</a>
								</li>
								<li class="nav-item" ng-hide="hidemenu">
										<a class="navbar-menu  text-center" href="{{ url('favorite') }}">
												<img class="icon-in-home" src="<?= asset('images/fav.png') ?>">
												รายการโปรด
										</a>
								</li>
								<li class="nav-item" ng-hide="hidemenu">
										<a class="navbar-menu  text-center" href="{{ url('product-history') }}">
												<img class="icon-in-home" src="<?= asset('images/history.png') ?>">
												สินค้าที่เคยสั่งซื้อ
										</a>
								</li>
								<li class="nav-item" ng-hide="hidemenu">
										<a class="navbar-menu  text-center" href="{{ url('news') }}">
												<img class="icon-in-home" src="<?= asset('images/news.png') ?>">
												ข่าวสาร-กิจกรรม
										</a>
								</li>
								<li class="nav-item" ng-hide="hidemenu">
										<a class="navbar-menu  text-center" href="{{ url('documents') }}">
												<img class="icon-in-home" src="<?= asset('images/doc.png') ?>">
												เอกสารทั่วไป
										</a>
								</li>
								<li class="nav-item" ng-hide="hidemenu">
										<a class="navbar-menu  text-center" href="{{ url('report') }}">
												<img class="icon-in-home" src="<?= asset('images/report.png') ?>">
												รายงาน
										</a>
								</li>
								<li class="nav-item">
										<div class="dropdown">
												<div class="navbar-menu  text-center" data-toggle="dropdown">
														<img class="icon-in-home" src="<?= asset('images/account.png') ?>">
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
						</ul>
				</div>
	</div>
</nav>
