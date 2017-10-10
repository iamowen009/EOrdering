@extends('layouts.main')

@section('head')
<style>
select.form-control{
	height:auto !important;
}
.cui-ecommerce--product--controls .btn {
    padding: 4px 40px !important;
		font-weight: bold;
}

.cui-ecommerce--catalog--item--img a .img {
    min-height: 250px;
    max-height: 250px;
    max-width: 100%;
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
}
.cui-ecommerce--catalog--item--img a img {
    min-height: 150px;
    max-width: 100%;
    -webkit-transition: all 0.4s ease-in-out;
    transition: all 0.4s ease-in-out;
}

.colorpicker-element .input-group-addon i {
    display: inline-block;
    cursor: pointer;
    height: 16px;
    vertical-align: text-top;
    width: 16px;
}
.input-group-addon{
	background-color:#fff;
	border-right:none;
	font-weight: bold;
}
.colorpicker-element .input-group-addon i {
    height: 20px;
    width: 30px;
}
.input-group-addon img{
	width:30px;
	height:20px;
}
.cui-ecommerce--catalog--item--img a img {
	min-height: 100px;
}
</style>
@stop

@section('content')
	<div class="content">
		@verbatim
		<!-- LOADING ICON =============================================== -->
    	<!-- show loading icon if the loading variable is set to true -->
		<div class="row " ng-controller="ProductDetailController">

			<div class="col-md-12 col-sm-12 col-xs-12">

				<div class="panel-content panel panel-default">
                  <div class="panel-heading"></div>
                  <div class="panel-body">

                    <div class="row">
		                <div class="col-lg-4">
		                    <div class="cui-ecommerce--catalog--item">
		                        <div class="cui-ecommerce--catalog--item--img">
		                            <div class="cui-ecommerce--catalog--item--status">
		                                <span class="cui-ecommerce--catalog--item--status--title">New</span>
		                            </div>

		                            <div class="cui-ecommerce--catalog--item--like cui-ecommerce--catalog--item--like__selected" ng-show="productSelect.productId">
		                            	<i class="fa fa-star-o" aria-hidden="true" style="text-shadow: 1px 1px 1px;font-size: 1.5em;cursor:pointer;" ng-click="addFav(btfId)" ng-show="productSelect.isFavorite==false"></i>
		                                <i class="fa fa-star" aria-hidden="true" style="color:#e6e600;text-shadow: 1px 1px 1px;font-size: 1.5em;cursor:pointer;" ng-click="removeFav(productSelect.productId)" ng-show="productSelect.isFavorite==true"></i>

		                            </div>
		                            <a href="javascript: void(0);">
		                                <img class="img" src="{{partImgProduct}}/{{btf.btf}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg">
		                            </a>
		                        </div>
		                    </div>
		                    <!--<div class="cui-ecommerce--product--photos clearfix">
		                        <div class="cui-ecommerce--product--photos-item cui-ecommerce--product--photos-item__active">
		                            <img src="../assets/common/img/temp/ecommerce/001.jpg">
		                        </div>
		                        <div class="cui-ecommerce--product--photos-item">
		                            <img src="../assets/common/img/temp/ecommerce/002.jpg">
		                        </div>
		                        <div class="cui-ecommerce--product--photos-item">
		                            <img src="../assets/common/img/temp/ecommerce/003.jpg">
		                        </div>
		                        <div class="cui-ecommerce--product--photos-item">
		                            <img src="../assets/common/img/temp/ecommerce/004.jpg">
		                        </div>
		                        <div class="cui-ecommerce--product--photos-item">
		                            <img src="../assets/common/img/temp/ecommerce/002.jpg">
		                        </div>
		                        <div class="cui-ecommerce--product--photos-item">
		                            <img src="../assets/common/img/temp/ecommerce/003.jpg">
		                        </div>
		                    </div>-->
		                </div>
		                <div class="col-lg-8">
		                    <div class="cui-ecommerce--product--sku">
		                        SKU: #{{btf.btf}}
		                        <br>
		                        <div class="cui-ecommerce--product--rating">
		                            <i class="icmn-star-full"></i>
		                            <i class="icmn-star-full"></i>
		                            <i class="icmn-star-full"></i>
		                            <i class="icmn-star-full"></i>
		                            <i class="icmn-star-empty"></i>
		                        </div>
		                    </div>
		                    <h4 class="cui-ecommerce--product--main-title">{{btf.btfWebDescTh}}</h4>
		                    <div class="cui-ecommerce--product--price">
		                        <!--ราคา (บาท) {{product[0].productPrice}}
		                        <div class="cui-ecommerce--product--price-before">
		                            {{product[0].productPrice}}
		                        </div>-->
		                    </div>
		                    <form action="/cart/add" name="add_to_cart" method="post" class="form-horizontal form-label-left" accept-charset="UTF-8">

                				<div class="form-group" ng-show="productSelect.productId">
			                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ราคา(บาท)</label>
			                        <div class="pdprice col-md-9 col-sm-9 col-xs-12">
			                         	<font color="red"><strong>{{productSelect.productPrice | number:2 }}</strong></font>
			                        </div>
			                      </div>

		                    <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ขนาด</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12">
		                         	<select class="form-control" ng-model="cartSize" ng-change="getProduct()">
		                         		<option ng-repeat="p in sizes" value="{{ p.sizeCode}}" >{{ p.sizeName }}</option>
		                         	</select>
		                        </div>
		                      </div>

		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">สี</label>
		                        <div class="col-md-9 col-sm-9 col-xs-12" >
															<div class="dropdown color-element">
															  <button class="btn btn-default dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
																	<span class="frame-color" ng-show="cartrgbColor!=''" style="background-color: rgb({{cartrgbColor}});"></span>
																	<img class="frame-color" ng-show="cartrgbColor==''" src="<?php echo asset('/images/none-color.png') ?>">
																	{{ productSelect.colorCode}}

															  </button>
															  <ul class="dropdown-menu">
															    <li ng-repeat="p in colors">
																		<a ng-click="setProduct(p.colorCode)" ng-model="cartColor" value="{{ p.colorCode }}" >
																		<span class="frame-color" ng-show="p.cartrgbColor!=''" style="background-color: rgb({{p.cartrgbColor}});"></span>
																		<img  ng-show="p.cartrgbColor==''" class="frame-color" src="<?php echo asset('/images/none-color.png') ?>">
															      {{ p.colorCode}}</a>
															    </li>
															  </ul>
															</div>
															<!--
		                        	<div class="input-group demo2 colorpicker-element">
		                        		<span class="input-group-addon" ng-show="cartrgbColor!=''"><i style="background-color: rgb({{cartrgbColor}});"></i></span>
		                        		<span class="input-group-addon" ng-show="cartrgbColor==''"><img src="/images/none-color.png"></span>
			                          <select class="form-control" ng-model="cartColor" ng-change="getProduct()">
		                         				<option ng-repeat="p in colors" value="{{ p.colorCode}}">{{ p.colorCode}}</option>
		                         		</select>

			                        </div>
														-->


		                        </div>
		                      </div>

		                      <div class="form-group">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">จำนวน</label>
		                        <div class="col-md-3 col-sm-3 col-xs-12">
		                         	<div class="input-group">
                            			<span class="input-group-btn">
                                      <button type="button" class="btn btn-default" ng-click="removeQty()"><i class="fa fa-minus"></i></button>
                                  </span>
			                            <input class="form-control text-center" type="text" ng-model="cartProductQty" >
			                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-default" ng-click="addQty()"><i class="fa fa-plus"></i></button>
                                  </span>

			                        </div>

		                        </div>
		                        <div class="col-md-3 col-sm-3 col-xs-12">
		                        	<label ng-show="productSelect.productId">หน่วยนับ : {{productSelect.unitNameTh}}</label>
		                    	</div>
		                      </div>

							  <div class="form-group" ng-show="productSelect.productId">
		                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ราคารวม(บาท)</label>
		                        <div class="pdprice col-md-9 col-sm-9 col-xs-12">
		                         	<font color="#00BFFF"><strong>{{+productSelect.productPrice * +cartProductQty | number:2}}</strong></font>
		                        </div>
		                      </div>

								<!--<ngcart-addtocart id="{{product[0].productId}}" quantity="1" quantity-max="9" name="{{product[0].productNameTh}}" price="{{product[0].productPrice}}" template-url="/template/ngCart/addtocart_total.html" data="product">Add to Cart</ngcart-addtocart>-->

		                      <div>


		                    <!--<div class="cui-ecommerce--product--descr">
		                        <p>A chair is a piece of furniture with a raised surface, commonly used to seat a single person.
		                            Chairs are supported most often by four legs and have a back; however, a chair can have three
		                            legs or can have a different shape.</p>
		                    </div>
		                    <div class="row">
		                        <div class="col-lg-6">
		                            <div class="cui-ecommerce--product--option_title">
		                                Color
		                            </div>
		                            <div class="cui-ecommerce--product--option">
		                                <select class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
		                                    <optgroup label="Group 1">
		                                        <option selected="">Option 1</option>
		                                        <option>Option 2</option>
		                                    </optgroup>
		                                    <optgroup label="Group 2">
		                                        <option selected="">Option 3</option>
		                                        <option>Option 4</option>
		                                        <option>Option 5</option>
		                                    </optgroup>
		                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 76px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-u5vw-container"><span class="select2-selection__rendered" id="select2-u5vw-container" title="Option 3">Option 3</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
		                            </div>
		                            <div class="cui-ecommerce--product--option_title">
		                                Available Size
		                            </div>
		                            <div class="cui-ecommerce--product--option">
		                                <div class="cui-ecommerce--catalog--item--descr--sizes">
		                                    <span data-toggle="tooltip" data-placement="right" title="" data-original-title="Size S">S</span>
		                                    <span data-toggle="tooltip" data-placement="right" title="" data-original-title="Size M">M</span>
		                                    <span data-toggle="tooltip" data-placement="right" title="" data-original-title="Size XL">XL</span>
		                                </div>
		                            </div>
		                        </div>
		                    </div>-->

		                    <div class="cui-ecommerce--product--controls">
		                        <button type="button" class="btn btn-icon btn-primary btn-sm margin-right-15" ng-click="toHistory(btf.marketingCode)">
		                            <i class="icmn-cart5 margin-right-5"></i>
		                            ย้อนกลับ
		                        </button>
		                        <!--<a href="javascript: void(0);" class="btn btn-icon btn-info btn-sm">
		                            <i class="icmn-heart4"></i>
		                            Add to Cart
		                        </a>-->
		                        <!--<ngcart-addtocart id="{{product[0].productId}}" quantity="1" quantity-max="9" name="{{product[0].productNameTh}}" price="{{product[0].productPrice}}" template-url="/template/ngCart/addtocart.html" data="product">Add to Cart</ngcart-addtocart>-->
														<button type="button" class="btn btn-icon btn-info btn-sm" ng-click="addCart()">

																<i class="fa fa-shopping-cart" style="font-size:18px;" aria-hidden="true"></i>
		                           	<i>Add to Cart</i>
		                        </button>

		                        <button type="button" class="btn btn-icon btn-primary btn-sm margin-right-15" ng-click="toHome()">
		                            <i class="icmn-cart5 margin-right-5"></i>
		                            กลับสู่หน้าหลัก
		                        </button>
		                        <!--<a href="javascript: void(0);" class="btn btn-icon btn-default btn-sm">
		                            <i class="icmn-stats-bars2"></i>
		                            กลับสู่หน้าหลัก
		                        </a>-->



		                    </div>
		                    </form>
		                    <!--<div class="cui-ecommerce--product--info">
		                        <div class="nav-tabs-horizontal">
		                            <ul class="nav nav-tabs" role="tablist">
		                                <li class="nav-item">
		                                    <a class="nav-link active" href="javascript: void(0);" data-toggle="tab" data-target="#tab1" role="tab">Information</a>
		                                </li>
		                                <li class="nav-item">
		                                    <a class="nav-link" href="javascript: void(0);" data-toggle="tab" data-target="#tab2" role="tab">Description</a>
		                                </li>
		                            </ul>
		                            <div class="tab-content padding-vertical-20">
		                                <div class="tab-pane active" id="tab1" role="tabpanel">
		                                    <dl class="dl-horizontal user-profile-dl">
		                                        <dt>Description lists</dt>
		                                        <dd>A description list is perfect for defining terms</dd>
		                                        <dt>Euismod</dt>
		                                        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia
		                                            odio sem nec elit</dd>
		                                        <dd>Donec id elit non mi porta gravida</dd>
		                                        <dt>Malesuada porta</dt>
		                                        <dd>Etiam porta sem malesuada magna mollis euismod</dd>
		                                        <dt>Qui eiusmod magna</dt>
		                                        <dd>Lorem ipsum In enim nostrud ut in mollit sint cillum laborum
		                                            ea quis qui</dd>
		                                    </dl>
		                                </div>
		                                <div class="tab-pane" id="tab2" role="tabpanel">
		                                    <p>
		                                        Mnesarchum velit cumanum utuntur tantam deterritum, democritum vulgo contumeliae
		                                        abest studuisse quanta telos. Inmensae. Arbitratu dixisset
		                                        invidiae ferre constituto gaudeat contentam, omnium nescius,
		                                        consistat interesse animi, amet fuisset numen graecos incidunt
		                                        euripidis praesens, homines religionis dirigentur postulant.
		                                        Magnum utrumvis gravitate appareat fabulae facio perveniri
		                                        fruenda indicaverunt texit, frequenter probet diligenter
		                                        sententia meam distinctio theseo legerint corporis quoquo,
		                                        optari futurove expedita.
		                                    </p>
		                                    <p>
		                                        Cumanum utuntur tantam deterritum, democritum vulgo contumeliae
		                                        abest studuisse quanta telos. Inmensae. Arbitratu dixisset
		                                        invidiae ferre constituto gaudeat contentam, omnium nescius,
		                                        consistat interesse animi, amet fuisset numen graecos incidunt
		                                        euripidis praesens.
		                                    </p>
		                                </div>
		                            </div>
		                        </div>-->
		                    </div>
		                </div>

		                <div class="col-lg-12 remarkpd">
							<font color="red">หมายเหตุ: บริษัทสงวนสิทธิ์ในการเปลี่ยนแปลงรายการใดโดยมิต้องแจ้งให้ทราบล่วงหน้า ตลอดจนความผิดพลาดที่เกิดจากการพิมพ์</font>
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
					                                <a href="javascript: void(0);">
					                                    <img src="../assets/common/img/temp/ecommerce/001.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg">
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
                      		<div class="panel-heading"><h4>สินค้าที่เกี่ยวข้อง</h4></div>
                      		<div class="panel-body">


								<div class="cui-ecommerce--catalog">
					                <div class="row">
					                    <div class="col-xl-2 col-lg-4 col-md-6 col-sm-12" dir-paginate="product in products | itemsPerPage: 6" pagination-id="product.id">
					                        <div class="cui-ecommerce--catalog--item" ng-click="toProductDetail(product.btf)">
					                            <div class="ribbon-wrapper">
																					<div class="ribbon">NEW</div>
																			</div>
																			<div class="cui-ecommerce--catalog--item--img-thumb">
																					<!--
					                                <div class="cui-ecommerce--catalog--item--status">
					                                    <span class="cui-ecommerce--catalog--item--status--title">New</span>
					                                </div>
																				-->
					                                <div class="cui-ecommerce--catalog--item--like cui-ecommerce--catalog--item--like__selected">
					                                    <i class="icmn-heart3 cui-ecommerce--catalog--item--like--liked"><!-- --></i>
					                                    <i class="icmn-heart4 cui-ecommerce--catalog--item--like--unliked"><!-- --></i>
					                                </div>
					                                <a href="javascript: void(0);">
					                                    <img src="{{partImgProduct}}/{{product.btf}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg" class="img-responsive">
					                                </a>
					                            </div>
					                            <div class="text-center">
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
	</div>

	@endverbatim
	<div class="row"><div class="col-md-12 text-center">© 2017 TOA Print (Thailand).Co.,Ltd All Rights reserved</div></div>


@stop

@section('footer')

    <script src="<?= asset('app/controllers/productController.js') ?>"></script>
@stop
