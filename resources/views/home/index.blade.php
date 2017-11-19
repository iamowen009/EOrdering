@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="{{ asset('css/home.css') }}" />
@stop

@section('content')
	<div class="content">
		@verbatim
		<!-- LOADING ICON =============================================== -->
    	<!-- show loading icon if the loading variable is set to true -->
		<div class="row " ng-controller="HomeController">
			<div class="col-md-3 sidedata">
					<div>
              <div class="panel-heading text-center" style="background-color:#80d8d8;color:#fff;font-size:14pt;">รายการสินค้า </div>
              <div class="category-home">
                  <ul class="list-unstyled user_data" style="font-size:0.95em">
                    	<li ><strong>กลุ่มผลิตภัณฑ์</strong></li>
	                    <li ng-repeat="marketing in marketings" value="{{marketing.marketingCode}}" style="padding-bottom:10px;">
	                     		<p class="title"><input type="checkbox" ng-click="toProductList(marketing.marketingCode)"> {{ marketing.marketingDesc }}</p>
											</li>
	                 </ul>
               </div>
          </div>
          <div class="icon-left">
                <a href="javascript:void(0);"><img class="img-icon" src="../images/icon-news.jpg" alt="..." onclick="window.location='../news'"></a>
								<a href="javascript:void(0);"><img class="img-icon" src="../images/icon-doc.jpg" alt="..." onclick="window.location='../documents'"></a>
								<a href="javascript:void(0);"><img class="img-icon" src="../images/icon-report.jpg" alt="..." onclick="window.location='../report'"></a>
								<a href="../assets/UserManual.pdf" target="_blank"><img class="img-icon" src="../images/icon-Usermanual.jpg" alt="..."> </a>
					</div>
			</div>
			<div class="col-md-9" ng-model="homeLayout">
				<!-- Start Slider  -->
					<div ng-include="templateURL"></div>
				<!-- /End Slider  -->

					<div class="panel-content panel panel-default">
							<!-- <div class="panel-heading"></div> -->
							<div class="panel-body">
									<p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-3x fa-spin"></span></p>
						<form class="form-horizontal form-label-left">
							<div class="panel-heading text-center style-title" style="margin-bottom:10px;">โปรโมชั่น</div>
						<div class="form-group">
												<label class="control-label col-md-2 col-sm-2 col-xs-12">กลุ่มผลิตภัณฑ์</label>
													<div class="col-md-3 col-sm-3 col-xs-12">
															<div class="selectgroup" ng-dropdown-multiselect="" options="marketings" selected-model="marketingmodel" checkboxes="true" ></div>
													</div>
													<div class="col-md-2 col-sm-2 col-xs-2"><input type="button" class="btn btn-info" value="refresh" ng-click="update()"></div>
													<div class="col-md-3 col-sm-3 col-xs-12">
															พบโปรโมชั่นจำนวน {{totalPromotion}} รายการ
													</div>

										</div>
						<div class="clearfix"></div>
											<div class="form-group">
													<div class="form-group" ng-show="marketingmodel.length>0">
													<label class="control-label col-md-2 col-sm-2 col-xs-12">กรองจาก </label>
													<div class="col-md-9 col-sm-9 col-xs-12">
													<span style="margin-right:5px;" class="label label-info" ng-repeat="m in marketings" ng-show="getResult(m.id).length>0">
										{{m.marketingDesc}}
										<a ng-click="removeFilter(m.id)" style="color:white; cursor: pointer;">
											<i class="fa fa-times"></i>
										</a>
									</span>
													</div>
													</div>

											</div>

									</form>
									<div class="clearfix"></div>
									<br/>
									<div class="row" >
											<div id="carousel-01" class="col-md-4 promotion-thumb" ng-repeat="promotion in promotions">
													<div class="bd-pomo" ng-click="toPromotionList(promotion.promotionId)" style="cursor: pointer;">
															<img src="{{partImgPromotion}}/{{promotion.promotionImage}}" alt="..." ng-click="toPromotionList(promotion.promotionId)" style="width:290px; height:200px;cursor: pointer;">
															<div style="padding:4px; height:86px; overflow:hidden;">
																	{{ promotion.promotionCode }}
																	<br />
																	{{ promotion.promotionName }}
															</div>
													</div>
											</div>
									</div>
									<div ng-repeat="marketing in marketings" >
										 <!--  <h6><span class="fa fa-arrow-down"></span> {{ marketing.marketingDesc }}</h6> -->
											<div class="row" >
													<div id="carousel-02" class="media col-lg-6 col-md-6" ng-repeat="promotion in promotions" ng-show="promotion.marketingCode==marketing.marketingCode">
															<span class="media-left">
																	<img src="http://placehold.it/250x150" alt="..." ng-click="toPromotionList(promotion.promotionId)" style="cursor: pointer;">
															</span>
															<div class="media-body" ng-click="toPromotionList(promotion.promotionId)" style="cursor: pointer;">
																	<h6 class="media-heading">{{ promotion.promotionName }}</h6>
																	<div ng-bind-html="promotion.promotionDesc"></div>
															</div>
													</div>
											</div>
											<br/>
									</div>
							</div>
					</div>

			</div>
	</div>
	<!-- Modal -->
  <div class="modal right fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
        	<div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel2">ตะกร้าของฉัน</h4>
              </div>
              <div class="modal-body">
                  <ul>
                      <li ng-repeat="cart in carts">
                          <p>{{cart.productCode}}</p>
                      </li>
                  </ul>
              </div>
          </div><!-- modal-content -->
      </div><!-- modal-dialog -->
  </div><!-- modal -->
	@endverbatim
</div>
<div class="row"><div class="col-md-12 text-center">© 2017 TOA Print (Thailand).Co.,Ltd All Rights reserved</div></div>
@stop

@section('footer')

    <script src="<?= asset('app/controllers/homeController.js') ?>"></script>
@stop
