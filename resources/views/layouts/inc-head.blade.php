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
				<ul class="nav navbar-nav ul-search">
					<li>
						<form ng-submit="search()">
							<div class="input-group">
										<input class="form-control top-search" placeholder="ค้นหาสินค้า" type="text" ng-model="searchstring">
										<span class="input-group-btn">
											<button class="btn btn-default" type="button" ng-click="search()">
												<span class="fa fa-search"></span>
											</button>
										</span>
							</div>
						</form>
					</li>

				</ul>
				<ul class="nav navbar-nav ul-member navbar-right">
					<li>
						@verbatim
							<!-- <span>ยินดีต้อนรับ {{username}} ((customerCode.length == 10) ? customerCode | limitTo: -8 : customerCode)
							<span ng-show="!hidemenu">[{{customerCode}} : {{customerName}}]</span></span> -->
							ยินดีต้อนรับ {{ username }}
							<span ng-show="!hidemenu">
								[ {{ (usertype == 'Multi') ? ((customerCode.length == 10) ? (customerCode | limitTo: -8) : customerCode )  : username }} : {{customerName}}]
							</span>
						@endverbatim
					</li>
					<li class="nav-item" style="top: -10px; padding-left: 15px; cursor: pointer;">
						<div class="dropdown">
								<div class="navbar-menu" data-toggle="dropdown">
										<img class="icon-in-home" src="<?= asset('images/account.png') ?>">
										บัญชีของฉัน <span class="caret"></span></button>
										<ul class="dropdown-menu">
												<li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('profile') ?>')"><i class="fa fa-user"></i> ข้อมูลส่วนตัว</a></li>
												<li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('contact')  ?>')"><i class="fa fa-phone" ></i> ติดต่อ TOA</a></li>
												<li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('profile-update')  ?>')"><i class="fa fa-pencil"></i>  แจ้งเปลี่ยนแปลงข้อมูล</a></li>
												<li ng-hide="hidemenu" ng-if="usertype != 'Single'">
													<a href="#" ng-click="toPage('<?php echo url('customer')  ?>')"><i class="fa fa-home"></i> เปลี่ยนร้านค้า</a>
												</li>
												<li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('password-update')  ?>')"><i class="fa fa-key"></i> เปลี่ยนรหัสผ่าน</a></li>
												<li ng-hide="hidemenu"><a href="#" ng-click="toPage('<?php echo url('problem')  ?>')"><i class="fa fa-exclamation-circle"></i> แจ้งปัญหา</a></li>
												<li><a ng-click="$event.preventDefault(); logout()"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></li>
										</ul>
								</div>
						</div>
					</li>
				</ul>
					<ul class="navbar-nav ul-top-menu">
							<li class="nav-item active " ng-hide="hidemenu">
								@verbatim
								 <a class="navbar-menu " href="#" ng-click="toHome()">
											<img class="icon-in-home" src="<?= asset('images/home.png') ?>">
											หน้าแรก
									</a>
									@endverbatim
							</li>
							<li class="nav-item item-cart" ng-hide="hidemenu">
									<a class="navbar-menu  text-center"  href="#" ng-click="openModalCart('lg')">
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
					</ul>
			</div>
</div>
</nav>
@verbatim
<!-- ไอคอนตะกร้า ข้างจอ ซ่อนไว้ก่อน
<div class="cart-fab" ng-click="open('lg')" ng-hide="hidemenu">
<div class="cart-fab-content">
<span class="item-count">
{{carts.length}}
</span>
<img src="<?= asset('images/Blue-Cart.png') ?>">
</div>
</div>
-->
@endverbatim