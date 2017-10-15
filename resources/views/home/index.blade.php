@extends('layouts.main')

@section('head')
<style>
select.form-control{
	height:auto !important;
}

</style>
@stop

@section('content')
	<div class="content">
		@verbatim
		<!-- LOADING ICON =============================================== -->
    	<!-- show loading icon if the loading variable is set to true -->
		<div class="row " ng-controller="HomeController">
			<div class="col-md-2 col-sm-2 col-xs-12">
				<div>
                  <div class="panel-heading text-center" style="background-color:#80d8d8;color:#fff">รายการสินค้า </div>
                  <div class="category-home">

                    <ul class="list-unstyled user_data" style="font-size:0.95em">
                    	<li style="padding:20px 0 15px 0;"><strong>กลุ่มผลิตภัณฑ์</strong></li>
	                    <li ng-repeat="marketing in marketings" value="{{marketing.marketingCode}}" style="padding-bottom:10px;">
	                     <p class="title"><input type="checkbox" ng-click="toProductList(marketing.marketingCode)"> {{ marketing.marketingDesc }}</p></li>

	                 </ul>
                 </div>
                </div>
            <div class="icon-left">
                <img class="img-icon" src="../images/icon-news.jpg" alt="..." onclick="window.location='../news'">
				<img class="img-icon" src="../images/icon-doc.jpg" alt="..." onclick="window.location='../documents'">
				<img class="img-icon" src="../images/icon-report.jpg" alt="..." onclick="window.location='../report'">
			</div>

			</div>
			<div class="col-md-10 col-sm-10 col-xs-9">

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

					<div class="panel-content panel panel-default">
                      <div class="panel-heading"></div>
                      <div class="panel-body">


                        <p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-3x fa-spin"></span></p>
						<form class="form-horizontal form-label-left">
	                        <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">โปรโมชั่น</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                         พบโปรโมชั่นจำนวน {{totalPromotion}} รายการ
		                        </div>
		                      </div>
+
							 <div class="clearfix"></div>
		                     <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">กลุ่มผลิตภัณฑ์</label>
		                        <div class="col-md-3 col-sm-3 col-xs-9">
		                        	<div class="selectgroup" ng-dropdown-multiselect="" options="marketings" selected-model="marketingmodel" checkboxes="true" ></div>
		                         	<!--<select class="form-control" > extra-settings="example4settings"
		                         		<option ng-repeat="marketing in marketings" value="{{ marketing.marketingCodes}}"> {{ marketing.marketingDesc }}</option>
		                         	</select>-->
		                        </div>
		                        <div class="col-md-6 col-sm-6 col-xs-3"><input type="button" class="btn btn-info" value="refresh" ng-click="update()"></div>
		                      </div>

		                      <div class="form-group" ng-show="marketingmodel.length>0">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">กรองจาก </label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">

		                        	<span style="margin-right:5px;" class="label label-info" ng-repeat="m in marketings" ng-show="getResult(m.id).length>0">{{m.marketingDesc}}  <a  ng-click="" calss="pull-right" style="color:white;" href=""><i class="fa fa-times"></i></a></span>

		                        </div>
		                      </div>

                         </form>


                         <div class="clearfix"></div>
                         <br/>

						<div class="row" >
					            <div class="media col-lg-6 col-md-6" ng-repeat="promotion in promotions">
								    <span class="media-left">
								    	<img src="{{partImgPromotion}}/{{promotion.promotionImage}}" alt="..." ng-click="toPromotionList(promotion.promotionId)" style="width:250px; height:150px;">
								        <!--<img src="{{partImgPromotion}}/{{promotion.promotionImage}}" alt="..." ng-click="toPromotionList(promotion.promotionHdId)" style="width:70%;">-->
								    </span>
								    <div class="media-body" ng-click="toPromotionList(promotion.promotionHdId)">
								        <h4 class="media-heading">{{ promotion.promotionName }}</h4>
								        <!-- <div ng-bind-html="promotion.promotionDesc"></div> -->
								    </div>
								</div>
						</div>

						<div ng-repeat="marketing in marketings" >
	              <h6><span class="fa fa-arrow-down"></span> {{ marketing.marketingDesc }}</h6>
               	<div class="row" >
					          <div class="media col-lg-6 col-md-6" ng-repeat="promotion in promotions" ng-show="promotion.marketingCode==marketing.marketingCode">
										    <span class="media-left">
										        <img src="http://placehold.it/250x150" alt="..." ng-click="toPromotionList(promotion.promotionHdId)">
										    </span>
										    <div class="media-body" ng-click="toPromotionList(promotion.promotionHdId)">
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
