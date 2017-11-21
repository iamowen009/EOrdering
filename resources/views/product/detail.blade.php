@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="{{ asset('css/product-detail.css') }}" />
@stop

@section('content')
	<div class="content">
		@verbatim
		<!-- LOADING ICON =============================================== -->
    	<!-- show loading icon if the loading variable is set to true -->
		<div class="row " ng-controller="ProductDetailController">

			<div class="col-md-12 col-sm-12 col-xs-12">

				<div class="panel-content panel panel-default">
                <!--   <div class="panel-heading"></div> -->
                  <div class="panel-body">

                    <div class="row">
		                <div class="col-lg-4">
		                    <div class="cui-ecommerce--catalog--item">
													<!--
														<span class="favorite-icon"><i class="fa fa-star"></i></span>
													-->
		                        <div class="cui-ecommerce--catalog--item--img">
		                            <!-- <div class="cui-ecommerce--catalog--item--status">
		                                <span class="cui-ecommerce--catalog--item--status--title">New</span>
									</div> -->
									<span class="favorite-icon" ng-click="(btf.isFavorite) ? removeFav(btf) : addFav(btf)" ng-class="{'active': btf.isFavorite}">
										<i class="fa fa-star"></i>
									</span>
																<!--
		                            <div class="cui-ecommerce--catalog--item--like cui-ecommerce--catalog--item--like__selected" ng-show="productSelect.productId">
		                            	<i class="fa fa-star-o" aria-hidden="true" style="text-shadow: 1px 1px 1px;font-size: 1.5em;cursor:pointer;" ng-click="addFav(btfId)" ng-show="productSelect.isFavorite==false"></i>
		                                <i class="fa fa-star" aria-hidden="true" style="color:#e6e600;text-shadow: 1px 1px 1px;font-size: 1.5em;cursor:pointer;" ng-click="removeFav(productSelect.productId)" ng-show="productSelect.isFavorite==true"></i>

		                            </div>
																<span class="favorite-icon"><i class="fa fa-star"></i></span>
															-->
		                            <a href="javascript: void(0);">
		                                <img class="img" ng-src="{{partImgProductDetail}}/{{btf.btf}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg">
		                            </a>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-lg-8">
		                    <div class="cui-ecommerce--product--sku">
		                        <span style="display:none">SKU: #{{btf.btf}}</span>
		                        <br>
		                        <div class="cui-ecommerce--product--rating">
		                            <i class="icmn-star-full"></i>
		                            <i class="icmn-star-full"></i>
		                            <i class="icmn-star-full"></i>
		                            <i class="icmn-star-full"></i>
		                            <i class="icmn-star-empty"></i>
		                        </div>
		                    </div>
		                    <h4 class="cui-ecommerce--product--main-title">{{btf.btfWebDescTh}}
													<a href="javascript:voice(0);" ng-click="promotionLink()" class="link-promotion">"คลิกสินค้าเพื่อดูรายการโปรโมชั่น"</a>
												</h4>
		                    <div class="cui-ecommerce--product--price">
		                    </div>
		                    <form action="/cart/add" name="add_to_cart" method="post" class="form-horizontal form-label-left" accept-charset="UTF-8">
													<input type="hidden" ng-model="onCart" />

                				<div class="form-group" ng-show="productSelect.productId">
			                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ราคาต่อหน่วย (บาท)</label>
			                        <div class="pdprice col-md-9 col-sm-9 col-xs-12">
			                         	<font color="red"><strong>{{productPrice | number:2 }}</strong></font>
			                        </div>
			                      </div>

		                    <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-6">ขนาด</label>
		                        <div class="col-md-4 col-sm-4 col-xs-6">
		                         	<select class="form-control" ng-model="cartSize" ng-change="getProduct()">
		                         		<option ng-repeat="p in sizes" value="{{ p.sizeCode}}" >{{ p.sizeName }} </option>
		                         	</select>
		                        </div>
		                      </div>

		                      <div class="form-group" ng-if="listColors.length > 0 ">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">สี / เบอร์ / รุ่น</label>
		                        <div class="col-md-4 col-sm-4 col-xs-6" >
															<div class="dropdown color-element">
															  <button class="btn btn-default dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
																	<span class="frame-color" ng-show="cartrgbColor!=''" style="background-color: rgb({{cartrgbColor}});"></span>
																	<span class="frame-color" ng-show="cartrgbColor==''" style="background-color: #fff;"></span>
																	{{ colorCodeName }}

															  </button>
															  <ul class="dropdown-menu">
															    <li ng-repeat="p in listColors">
																		<a ng-click="setProduct(p.colorCode)" ng-model="cartColor" value="{{ p.colorCode }}" >
																		<span class="frame-color" ng-show="p.cartrgbColor!=''" style="background-color: rgb({{p.cartrgbColor}});"></span>
																		<span ng-show="p.cartrgbColor==''" class="frame-color" style="background-color: #fff;"></span>
															      {{ p.colorCode}}</a>
															    </li>
															  </ul>
															</div>
		                        </div>
		                      </div>

		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">จำนวนสินค้า</label>
		                        <div class="col-md-3 col-sm-3 col-xs-12">
		                         	<div class="input-group">
                            			<span class="input-group-btn">
                                      <button type="button" class="btn btn-default" ng-click="removeQty()"><i class="fa fa-minus"></i></button>
                                  </span>
			                            <input class="form-control text-center" type="text" numbers-only ng-model="cartProductQty"  >
			                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-default" ng-click="addQty()"><i class="fa fa-plus"></i></button>
                                  </span>

			                        </div>
															<input type="hidden" ng-model="altUnit1Amount" value="{{ productSelect.altUnit1Amount }}"/>
		                        </div>
		                        <div class="col-md-4">
		                        	<div style="margin-top:10px; " ng-show="productSelect.productId">
																<!--<strong>หน่วย : </strong>-->{{productSelect.unitNameTh}} <span ng-if="productSelect.altUnit1Amount > 0">( 1 {{ productSelect.altUnit1NameTh }} : {{productSelect.altUnit1Amount }} {{ productSelect.unitNameTh }})</span></div>
		                    	</div>
		                      </div>

							  <div class="form-group" ng-show="productSelect.productId">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ราคารวม (บาท)</label>
		                        <div class="pdprice col-md-9 col-sm-9 col-xs-12">
		                         	<font color="#00BFFF"><strong>{{+productPrice * +cartProductQty | number:2}}</strong></font>
		                        </div>
		                      </div>
		                      <div>


		                    <div class="cui-ecommerce--product--controls">
		                        <button type="button" class="btn btn-icon btn-primary btn-sm margin-right-15" ng-click="toHistory(btf.marketingCode)">
		                            <i class="icmn-cart5 margin-right-5"></i>
		                            ย้อนกลับ
		                        </button>
														<button type="button" class="btn btn-icon btn-info btn-sm" ng-click="addCart()">

																<i class="fa fa-shopping-cart" style="font-size:18px;" aria-hidden="true"></i>
		                           	<i>หยิบใส่ตะกร้า</i>
		                        </button>

		                        <button type="button" class="btn btn-icon btn-primary btn-sm margin-right-15" ng-click="toHome()">
		                            <i class="icmn-cart5 margin-right-5"></i>
		                            กลับสู่หน้าหลัก
		                        </button>
		                    </div>
		                    </form>
		                    </div>
		                </div>

		                <div class="col-lg-12 remarkpd">
							<font color="red">หมายเหตุ: บริษัทสงวนสิทธิ์ในการเปลี่ยนแปลงรายการโดยมิต้องแจ้งให้ทราบล่วงหน้า ตลอดจนความผิดพลาดที่เกิดจากการพิมพ์</font>
		                </div>
		            </div>


					<div class="row">
						<div class="col-md-12">
							<div ng-if="product.productDesc" class="panel panel-default">
				          <div class="panel-heading">รายละเอียดสินค้า/โปรโมชั่น</div>
				              <div class="panel-body text-center .h-100" >
										<p>{{ product.productDesc }}</p>
				          </div>
				      </div>
							<div ng-if="product.productDesc" class="panel panel-default">
				          <div class="panel-body" style="border:1px solid #ddd; border-radius:4px; padding:4px;" >
										<p>File : <a href=""></a></p>
				          </div>
				      </div>
						</div>
					</div>

					<div class="row">

						<div class="panel-content panel panel-default" ng-if="promotions.length > 0">
                      		<div class="panel-heading"><h4>โปรโมชั่นที่เกี่ยวข้อง</h4></div>
                      		<div class="panel-body">


								<div class="cui-ecommerce--catalog">
					                <div class="row">
					                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12" dir-paginate="promotion in promotions | itemsPerPage: 6" pagination-id="promotion.id">
					                        <div class="cui-ecommerce--catalog--item" ng-click="toProductDetail(13124)">
					                            <div class="cui-ecommerce--catalog--item--img">
					                                <div class="cui-ecommerce--catalog--item--status">
					                                    <span class="cui-ecommerce--catalog--item--status--title">New</span>
					                                </div>

					                                <div class="cui-ecommerce--catalog--item--like cui-ecommerce--catalog--item--like__selected">
					                                    <i class="icmn-heart3 cui-ecommerce--catalog--item--like--liked"><!-- --></i>
					                                    <i class="icmn-heart4 cui-ecommerce--catalog--item--like--unliked"><!-- --></i>
					                                </div>
																					<span class="favorite-icon"><i class="fa fa-star"></i></span>
					                                <a href="javascript: void(0);">
					                                    <img ng-src="{{ asset('common/img/temp/ecommerce/001.jpg') }}" err-SRC="{{partImgProduct}}/Noimage.jpg">
					                                </a>
					                            </div>
					                            <div class="text-center">
													<h6 class="ng-binding">{{promotion.promotionName}}</h6>
													<br>

					                            </div>

					                        </div>
					                    </div>

					                </div>
					            </div>

		                          <dir-pagination-controls template-url="/template/dirPagination.tpl.html" pagination-id="promotion.id"></dir-pagination-controls>


                      		</div>
                      	</div>

					</div>

					<div class="row">

						<div class="panel-content panel panel-default">
                      		<div class="panel-heading text-center" style="background-color:#BFEBEE;padding: 2px 15px;"><h4>สินค้าที่เกี่ยวข้อง</h4></div>
                      		<div class="panel-body">


								<div class="cui-ecommerce--catalog">
					                <div class="row">
					                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12" dir-paginate="product in products | itemsPerPage: 6" pagination-id="product.id">
					                        <div class="cui-ecommerce--catalog--item">
																		<!--
					                            <div class="ribbon-wrapper">
																					<div class="ribbon">NEW</div>
																			</div>
																			 -->
																			<div class="cui-ecommerce--catalog--item--img-thumb">
					                                <div class="cui-ecommerce--catalog--item--like cui-ecommerce--catalog--item--like__selected">
					                                    <i class="icmn-heart3 cui-ecommerce--catalog--item--like--liked"><!-- --></i>
					                                    <i class="icmn-heart4 cui-ecommerce--catalog--item--like--unliked"><!-- --></i>
					                                </div>
													<span class="favorite-icon" ng-click="(product.isFavorite) ? removeFav(product) : addFav(product)" ng-class="{'active': product.isFavorite}">
														<i class="fa fa-star"></i>
													</span>
					                                <a href="javascript: void(0);" ng-click="toProductDetail(product.btf)">
					                                    <img ng-src="{{partImgProductList}}/{{product.btf}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"  class="img-responsive img-product product-list">
					                                </a>
					                            </div>
					                            <div class="text-center  product-desc">
																				<div class="product-name">
																					<h5 class="ng-binding">{{product.btfWebDescTh}}</h5>
																				</div>
																				<div class="product-price">
																					<strong>{{ product.price }}</strong>
																				</div>
					                            </div>

					                        </div>
					                    </div>

					                </div>
					            </div>

															<dir-pagination-controls class="e-paginate" template-url="/template/dirPagination.tpl.html" pagination-id="product.id"></dir-pagination-controls>




                      		</div>
                      	</div>

					</div>

                  </div>
            	</div>
			</div>

		</div>
		<!-- Start Modal -->

		<!-- /End Modal -->


	@endverbatim
</div>
@include('product.modal-promotion')
	<div class="row"><div class="col-md-12 text-center">© 2017 TOA Print (Thailand).Co.,Ltd All Rights reserved</div></div>


@stop

@section('footer')

    <script src="<?= asset('app/controllers/productController.js') ?>"></script>
@stop
