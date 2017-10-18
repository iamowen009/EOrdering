@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="{{ asset('css/product.css') }}" />
@stop

@section('content')
	<div class="content">
		@verbatim
		<!-- LOADING ICON =============================================== -->
    	<!-- show loading icon if the loading variable is set to true -->
		<div class="row " ng-controller="ProductController">


			<div class="col-md-2 col-sm-2 col-xs-12">
				<div>
                  <div class="panel-heading text-center" style="background-color:#000e85;color:#fff">รายการสินค้า </div>
                  <div class="menu-body">
                    <ul class="list-unstyled user_data" style="font-size:0.95em">
                    	<li style="padding:20px 0 15px 0;"><strong>กลุ่มผลิตภัณฑ์</strong></li>
	                    <li ng-repeat="marketing in marketings" value="{{marketing.marketingCode}}" style="padding-bottom:10px;"><input type="checkbox" ng-checked="marketingCode.indexOf(marketing.marketingCode) > -1" ng-click="marketingSelection(marketing.marketingCode)"> {{ marketing.marketingDesc }}</li>

	                 </ul>

                 </div>
                </div>
				<hr>
                <div >
                  <!--<div class="panel-heading text-center">แบรนด์</div>-->
                  <div class="menu-body">
                    <ul class="list-unstyled user_data" style="font-size:0.95em">
                    	<li style="padding:20px 0 15px 0;"><strong>แบรนด์</strong></li>
	                    <li ng-repeat="brand in brandsFilter" ng-if="brand.brandDesc != ''" value="{{brand.brandCode}}" style="padding-bottom:10px;"><input type="checkbox" ng-checked="brandCode.length > 0 && brandCode.indexOf(brand.brandCode) > -1" ng-click="brandSelection(brand.brandCode)"> {{ brand.brandDesc }}</li>

	                 </ul>
                 </div>
                </div>
				<hr>
                <div>
                  <!--<div class="panel-heading text-center">ประเภท</div>-->
                  <div class="menu-body">
                    <ul class="list-unstyled user_data" style="font-size:0.95em">
                    	<li style="padding:20px 0 15px 0;"><strong>ประเภท</strong></li>
	                    <li ng-repeat="type in typesFilter" ng-if="type.typeDesc != ''" value="{{type.typeCode}}" style="padding-bottom:10px;"><input type="checkbox" ng-checked="typeCode.length > 0 && typeCode.indexOf(type.typeCode) > -1" ng-click="typeSelection(type.typeCode)"> {{type.typeCode}} {{ type.typeDesc }}</li>

	                 </ul>
                 </div>
                </div>
				<hr>
			</div>
			<div class="col-md-10 col-sm-10 col-xs-9">

					<div class="panel-content panel panel-default">

						<form class="form-horizontal form-label-left">
							<div class="form-group">
		                        <label class="col-md-12 col-sm-12 col-xs-12"><h4>{{marketingDesc}} <small>พบสินค้าจำนวน {{totalProduct}} รายการ</small></h4></label>

		                      </div>
							<div class="form-group">
		                        <label class="col-md-1 col-sm-1 col-xs-12">กรองจาก </label>
		                        <div class="col-md-10 col-sm-10 col-xs-12">

		                        	<span style="margin-right:5px;" class="label label-info" ng-repeat="m in marketings" ng-show="getFilter(marketingCode,m.marketingCode).length>0">{{m.marketingDesc}} <a ng-if="m.marketingCode != marketingCode[0]" ng-click="marketingSelection(m.marketingCode)" calss="pull-right" style="color:white;" href=""><i class="fa fa-times"></i></a></span>

									<span style="margin-right:5px;" class="label label-info" ng-repeat="b in brandsFilter" ng-show="getFilter(brandCode,b.brandCode).length>0">{{b.brandDesc}}</span>

									<span style="margin-right:5px;" class="label label-info" ng-repeat="t in typesFilter" ng-show="getFilter(typeCode,t.typeCode).length>0">{{t.typeDesc}}</span>

		                        </div>
		                      </div>
						</form>

						<div>
						  <h4>โปรโมชั่น</h4>


	                     <div class="row" >
				            <div class="media col-lg-6 col-md-6" ng-repeat="promotion in promotions" ng-show="promotion.marketingCode==marketingCode">
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

                      <div class="panel-body">
						<p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-3x fa-spin"></span></p>
                         <div class="cui-ecommerce--catalog">
			                <div class="row">
			                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12" dir-paginate="product in products | itemsPerPage: 12" pagination-id="product.id">
			                        <div class="cui-ecommerce--catalog--item" ng-click="toProductDetail(product.btf)">
			                            <div class="cui-ecommerce--catalog--item--img">
			                                <!--<div class="cui-ecommerce--catalog--item--status">
			                                    <span class="cui-ecommerce--catalog--item--status--title">New</span>
			                                </div>-->
			                                <div class="cui-ecommerce--catalog--item--like cui-ecommerce--catalog--item--like__selected">
			                                    <i class="icmn-heart3 cui-ecommerce--catalog--item--like--liked"><!-- --></i>
			                                    <i class="icmn-heart4 cui-ecommerce--catalog--item--like--unliked"><!-- --></i>
			                                </div>
																			<span class="favorite-icon"><i class="fa fa-star"></i></span>
			                                <a href="javascript: void(0);">
			                                    <img src="{{partImgProduct}}/{{product.btf}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg" class="img-responsive img-product">
			                                </a>
			                            </div>
			                            <div class="text-center product-desc">
																			<h5 class="ng-binding">{{product.btfWebDescTh}}</h5>
																			<br>
			                            		<span class="price ng-binding">{{product.productPrice}}</span>
			                            </div>
			                        </div>
			                    </div>

			                </div>
			            </div>

                          <dir-pagination-controls template-url="/template/dirPagination.tpl.html" pagination-id="product.id"></dir-pagination-controls>

                      </div>
                </div>
			</div>

		</div>
	</div>
	@endverbatim

	<div class="row"><div class="col-md-12 text-center">© 2017 TOA Print (Thailand).Co.,Ltd All Rights reserved</div></div>
@stop

@section('footer')

    <script src="<?= asset('app/controllers/productController.js') ?>"></script>
@stop
