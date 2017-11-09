@extends('layouts.main') @section('head')
<style>
	select.form-control {
		height: auto !important;
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

	.input-group-addon {
		background-color: #fff;
		border-right: none;
		font-weight: bold;
	}

	.colorpicker-element .input-group-addon i {
		height: 20px;
		width: 30px;
	}

	.input-group-addon img {
		width: 30px;
		height: 20px;
	}

	.cui-ecommerce--catalog--item--img a img {
		min-height: 100px;
	}
	/* Hide HTML5 Up and Down arrows. */

	input[type="number"]::-webkit-outer-spin-button,
	input[type="number"]::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	input[type="number"] {
		-moz-appearance: textfield;
	}
</style>
@stop @section('content')
<div class="content">
	@verbatim
	<!-- LOADING ICON =============================================== -->
	<!-- show loading icon if the loading variable is set to true -->
	<div class="row " ng-controller="PromotionController">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel">
				<div class="panel-heading text-center" style="background-color:#000e85;color:#fff">รายละเอียดโปรโมชั่น </div>
				<!--<div class="panel-heading text-center">รายละเอียดโปรโมชั่น</div>-->
				<div class="panel-body">
					<br>
					<form>
						<div class="form-group col-md-12">
							<div class="form-group col-md-6">
								<div class="form-group col-md-12">
									<div class="col-md-4">
										<label>รหัสโปรโมชั่น : &nbsp;</label>
									</div>
									<div class="col-md-8">
										{{promotionHD[0].promotionCode}}
									</div>
								</div>
								<div class="form-group col-md-12">
									<div class="col-md-4">
										<label>ชื่อโปรโมชั่น : &nbsp;</label>
									</div>
									<div class="col-md-8">
										{{promotionHD[0].promotionName}}
									</div>
								</div>
								<div class="form-group col-md-12">
									<div class="col-md-4">
										<label>วันที่โปรโมชั่น : &nbsp;</label>
									</div>
									<div class="col-md-8">
										{{promotionHD[0].validFrom | date:'dd/MM/yyyy' }} - {{promotionHD[0].validTo | date:'dd/MM/yyyy' }}
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="col-md-4">
									<label>รายละเอียดโปรโมชั่น : &nbsp;</label>
								</div>
								<div class="col-md-8">
									<span ng-bind-html="promotionHD[0].promotionDesc"></span>
								</div>
							</div>
						</div>
					</form>
					<div ng-show="promotionHD[0].promotionType != 'Infomation'">
						<div class="col-md-12 col-sm-12 col-xs-12" ng-show="promotionHD[0].promotionSet">
							<div class="col-md-6">
							</div>
							<div class="col-md-1">
								<label>Promotion</label>
							</div>
							<div class="col-md-1">
								<label class="form-control text-center" ng-show="!promotionHD[0].promotionSetEdit">{{promotionHD[0].promotionSetTotal}}</label>
								<input class="form-control text-center" type="number" ng-model="promotionHD[0].promotionSetTotal" ng-show="promotionHD[0].promotionSetEdit"
								    ng-change="minSetTotal()">
							</div>
							<div class="col-md-1">
								<label>Set</label>
							</div>
							<div class="col-md-1">
								<i class="fa fa-arrow-right fa-2x" ng-click="selectedProductSet();" ng-hide="promotionHD[0].promotionSetOne"></i>
								<i class="fa fa-trash fa-2x" ng-click="deletedProductSet();" ng-show="promotionHD[0].promotionSetDelete"></i>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group col-md-6">
								<div class="panel panel-info">
									<div class="panel-heading">เลือกสินค้า</div>
									<div class="menu-body">
										<!-- <div class="panel-body menu-body"> -->
										<ul class="list-unstyled user_data">
											<table class="table table-bordered">
												<thead>
													<tr>
														<!-- <th>Brand</th>
														<th>Type</th>
														<th>Function</th>-->
														<th style="text-align : center;">สินค้า</th>
														<th style="text-align : center;">ขนาด</th>
														<th style="width:22%;text-align : center;">สี</th>
														<th style="width:27%;text-align : center;">จำนวน</th>
														<th ng-hide="promotionHD[0].isPromotionSet"></th>
													</tr>
												</thead>
												<tbody>
													<tr ng-repeat="p in promotionDT" ng-if="p.promotionHdId==promotionCode">
														<td>
															<label ng-hide="p.btfEdit">{{ p.btfDesc }}</label>
															<!--  <select class="form-control" ng-model="p.btfCode" ng-show="p.btfEdit" ng-change="findSize(p.promotionDtId,p.btfCode,p.listNo,p.format)">
																<option ng-repeat="s in btfList[p.listNo]" value="{{ s.btfCode}}">{{ s.btfDesc }}</option>
															</select>  -->
															<div class="form-group" ng-show="p.btfEdit">
																<div class="dropdown color-element">
																	<button style="width:100px;" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
																	    aria-expanded="true">
																		<!--<span class="frame-color" ng-show="p.btfCode!=''" style="background-image: url({{p.partImgProduct}}/{{p.btfCode}}.jpg);"></span>-->
																		<img class="frame-color" ng-show="p.btfCode!=''" src="{{p.partImgProduct}}/{{p.btfCode}}.jpg" err-SRC="{{p.partImgProduct}}/Noimage.jpg">
																		<img class="frame-color" ng-show="p.btfCode==''" src="{{p.partImgProduct}}/Noimage.jpg">{{ p.btfDesc}}
																	</button>
																	<ul class="dropdown-menu" style="width:500px;">
																		<li ng-repeat="s in btfList[p.listNo]">
																			<a ng-click="findSize(p.promotionDtId,s.btfCode,p.listNo,p.format)" ng-model="p.btfCode" value="{{ s.btfCode }}" style="height:60px;">
																				<img ng-show="s.btfCode!=''" class="frame-color" src="{{p.partImgProduct}}/{{s.btfCode}}.jpg" style="width:60px;" err-SRC="{{p.partImgProduct}}/Noimage.jpg">
																				<img ng-show="s.btfCode==''" class="frame-color" src="{{p.partImgProduct}}/Noimage.jpg" style="width:60px;">{{ s.btfDesc}}</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
														<td>
															<label ng-hide="p.sizeEdit">{{ p.sizeDesc }}</label>
															<select class="form-control" ng-model="p.sizeCode" ng-show="p.sizeEdit" ng-change="findColor(p.promotionDtId,p.sizeCode,p.listNo,p.format)">
																<option ng-repeat="s in sizeList[p.listNo]" value="{{ s.sizeCode}}">{{ s.sizeDesc }}</option>
															</select>
														</td>
														<td>
															<label ng-hide="p.colorEdit">{{ p.colorCode }} {{p.colorNameTh}}</label>
															<div class="form-group" ng-show="p.colorEdit">
																<div class="dropdown color-element">
																	<button style="width:100px;" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
																	    aria-expanded="true">
																		<span class="frame-color" ng-show="p.rgbCode!=''" style="background-color: rgb({{p.rgbCode}});"></span>
																		<img class="frame-color" ng-show="p.rgbCode==''" src="<?php echo asset('/images/none-color.png') ?>"> {{ p.colorCode}}
																	</button>
																	<ul class="dropdown-menu">
																		<li ng-repeat="s in colorList[p.listNo]">
																			<a ng-click="setColor(s.colorCode,p.listNo,s.rgbCode)" ng-model="p.colorCode" value="{{ s.colorCode }}">
																				<span class="frame-color" ng-show="s.rgbCode!=''" style="background-color: rgb({{s.rgbCode}});"></span>
																				<img ng-show="s.rgbCode==''" class="frame-color" src="<?php echo asset('/images/none-color.png') ?>"> {{ s.colorCode}}</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
														<td>
															<div class="input-group">
																<span class="input-group-btn">
																	<button type="button" class="btn btn-default" ng-click="removeQty(p.listNo)">
																		<i class="fa fa-minus"></i>
																	</button>
																</span>
																<input class="form-control text-center" type="number" ng-model="p.salesqty" ng-readonly="!p.qtyEdit">
																<span class="input-group-btn">
																	<button type="button" class="btn btn-default" ng-click="addQty(p.listNo)">
																		<i class="fa fa-plus"></i>
																	</button>
																</span>
															</div>
														</td>
														<td ng-hide="promotionHD[0].isPromotionSet">
															<i class="fa fa-arrow-right fa-2x" ng-click="selectedProduct(p.promotionDtId,p.listNo,p.format)" ng-show="p.salesqty > 0"></i>
															<i class="fa fa-arrow-right fa-2x" style="color:#bab2b2;" ng-show="p.salesqty == 0"></i>
														</td>
													</tr>
												</tbody>
											</table>
										</ul>
									</div>
								</div>
							</div>
							<div class="form-group col-md-6">
								<div class="panel panel-info">
									<div class="panel-heading" style="background-color: #b2e686;">รายการสินค้า</div>
									<div class="menu-body">
										<!-- <div class="panel-body menu-body"> -->
										<ul class="list-unstyled user_data">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th style="text-align : center;">รหัสสินค้า</th>
														<th style="width:20%;text-align : center;">สินค้า</th>
														<th style="text-align : center;">จำนวน</th>
														<th style="text-align : center;">หน่วย</th>
														<th style="text-align : center;">ราคา/หน่วย</th>
														<th style="text-align : center;">ราคารวม</th>
														<th ng-hide="promotionHD[0].isPromotionSet">ลบ</th>
													</tr>
												</thead>
												<tbody>
													<tr ng-repeat="p in promotionDT_Sel | orderBy:'-productNoSelected'" ng-show="p.selected" ng-if="p.promotionHdId==promotionCode">
														<td>
															<img class="img" src="{{p.partImgProduct}}/{{p.btf}}.jpg" err-SRC="{{p.partImgProduct}}/Noimage.jpg" width="50px"> {{p.productNoSelected}}
														</td>
														<td>{{p.productNameSelected}}</td>
														<td>{{p.salesqty_sel | number}}</td>
														<td>{{p.unitSelected }}</td>
														<td>{{p.priceSelected | number}}</td>
														<td>{{p.totalPrice | number }}</td>
														<td ng-hide="promotionHD[0].isPromotionSet">
															<i class="fa fa-trash fa-2x" ng-click="deletedProduct(p.listNo)"></i>
														</td>
													</tr>
												</tbody>
											</table>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="form-group col-md-6">

							</div>
							<div class="form-group col-md-2">
								จำนวนรวมทั้งหมด
							</div>
							<div class="form-group col-md-1">
								<label class="form-control text-center">{{totalQty() | number }}</label>
							</div>
							<div class="form-group col-md-2">
								ราคารวมทั้งหมด
							</div>
							<div class="form-group col-md-1">
								<label class="form-control text-center">{{totalPrice() | number }}</label>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12" ng-hide="promotionHD[0].promotionType == 'Discount'">
							<div class="form-group col-md-2">
								<button type="button" class="btn btn-icon btn-info btn-sm" ng-click="callCalFreeGoods()">
									คำนวนของแถม
								</button>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12" ng-hide="promotionHD[0].promotionType == 'Discount'">
							<div class="form-group col-md-6">
								<div class="panel panel-info">
									<div class="panel-heading">เลือกของแถม</div>
									<div class="menu-body">
										<!-- <div class="panel-body menu-body"> -->
										<ul class="list-unstyled user_data">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th style="text-align : center;">สินค้า</th>
														<th style="text-align : center;">ขนาด</th>
														<th style="text-align : center;">สี</th>
														<th style="width:15%;text-align : center;">จำนวน</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr ng-repeat="f in freeGoods">
														<td>
															<img class="img" src="{{f.partImgProduct}}/{{f.btfWeb}}.jpg" err-SRC="{{f.partImgProduct}}/Noimage.jpg" width="50px">
															<label ng-hide="f.btfFreegoodsEdit">{{ f.btfDesc }}</label>
															<select class="form-control" ng-model="f.btfCode" ng-show="p.btfEdit" ng-change="findSizeFreegoods(f.freeGoodsId,f.btfCode,f.listNo)">
																<option ng-repeat="s in btfFreegoodsList[f.listNo]" value="{{ s.btfCode}}">{{ s.btfDesc }}</option>
															</select>
														</td>
														<td>
															<label ng-hide="f.sizeFreegoodsEdit">{{ f.sizeDesc }}</label>
															<select class="form-control" ng-model="f.sizeCode" ng-show="f.sizeFreegoodsEdit" ng-change="findColorFreegoods(f.freeGoodsId,f.sizeCode,f.listNo)">
																<option ng-repeat="s in sizeFreegoodsList[f.listNo]" value="{{ s.sizeCode}}">{{ s.sizeDesc }}</option>
															</select>
														</td>
														<td>
															<label ng-hide="f.colorFreegoodsEdit">{{ f.colorCode }}</label>
															<div class="form-group" ng-show="f.colorFreegoodsEdit">
																<div class="dropdown color-element">
																	<button style="width:100px;" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
																	    aria-expanded="true">
																		<span class="frame-color" ng-show="f.rgbCode!=''" style="background-color: rgb({{f.rgbCode}});"></span>
																		<img class="frame-color" ng-show="f.rgbCode==''" src="<?php echo asset('/images/none-color.png') ?>"> {{ f.colorCode}}
																	</button>
																	<ul class="dropdown-menu">
																		<li ng-repeat="s in colorFreegoodsList[f.listNo]">
																			<a ng-click="setColorFreegoods(s.colorCode,f.listNo,s.rgbCode)" ng-model="f.colorCode" value="{{ s.colorCode }}">
																				<span class="frame-color" ng-show="s.rgbCode!=''" style="background-color: rgb({{s.rgbCode}});"></span>
																				<img ng-show="s.rgbCode==''" class="frame-color" src="<?php echo asset('/images/none-color.png') ?>"> {{ s.colorCode}}</a>
																		</li>
																	</ul>
																</div>
															</div>
														</td>
														<td>
															<input class="form-control text-center" type="text" ng-model="f.freeGoodsQty_Rt" ng-readonly="true">
														</td>
														<td>
															<i class="fa fa-arrow-right fa-2x" ng-click="selectedProductFreegoods(f.freeGoodsId,f.listNo,f.format)" ng-show="isCallFreegoods"></i>
															<i class="fa fa-arrow-right fa-2x" style="color:#bab2b2;" ng-show="!isCallFreegoods"></i>
														</td>
													</tr>
												</tbody>
											</table>
										</ul>
									</div>
								</div>
								<label style="color:red;">หมายเหตุ : เลือกของแถมได้ {{promotionHD[0].numFreeGoods}} รายการ</label>
							</div>
							<div class="form-group col-md-6">
								<div class="panel panel-info">
									<div class="panel-heading" style="background-color: #b2e686;">รายการแถม</div>
									<div class="menu-body">
										<!-- <div class="panel-body menu-body"> -->
										<ul class="list-unstyled user_data">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th style="text-align : center;">รหัสสินค้า</th>
														<th style="width:20%;text-align : center;">สินค้า</th>
														<th style="text-align : center;">จำนวน</th>
														<th style="text-align : center;">หน่วย</th>
														<th style="text-align : center;">ลบ</th>
													</tr>
												</thead>
												<tbody>
													<tr ng-repeat="f in freeGoods_Sel" ng-show="f.selected">
														<td>
															<img class="img" src="{{f.partImgProduct}}/{{f.btfWeb}}.jpg" err-SRC="{{f.partImgProduct}}/Noimage.jpg" width="50px"> {{f.productNoSelected}}
														</td>
														<td>
															<span ng-bind-html="f.productNameSelected"></span>
														</td>
														<td>{{f.freeQty}}</td>
														<td>{{f.unitSelected}}</td>
														<!--<td>{{f.priceSelected}}</td>
														<td>{{f.totalPrice}}</td>-->
														<td>
															<i class="fa fa-trash fa-2x" ng-click="deletedFreegoods(f.freeGoodsId,f.listNo)"></i>
														</td>
													</tr>
												</tbody>
											</table>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
							<div class="cui-ecommerce--product--controls">
								<!--<button type="button" class="btn btn-icon btn-default btn-sm margin-right-15" ng-click="toHistory(btf.marketingCode)">
									<i class="icmn-cart5 margin-right-5"></i>
									ย้อนกลับ
								</button>-->
								<button type="button" class="btn btn-icon btn-info btn-sm" ng-click="addCart()">
									<i class="fa fa-shopping-cart" style="font-size:18px;" aria-hidden="true"></i>
									<i>Add to Cart</i>
								</button>

								<button type="button" class="btn btn-icon btn-default btn-sm margin-right-15" ng-click="toHome()">
									<i class="icmn-cart5 margin-right-5"></i>
									กลับสู่หน้าหลัก
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endverbatim

<div class="row">
	<div class="col-md-12 text-center">© 2017 TOA Print (Thailand).Co.,Ltd All Rights reserved</div>
</div>
@stop @section('footer')

<script src="<?= asset('app/controllers/promotionController.js') ?>"></script>
@stop