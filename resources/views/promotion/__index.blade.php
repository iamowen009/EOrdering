@extends('layouts.main')


@section('content')
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
			                  	<div class="col-md-2">
			                    	<label>ชื่อโปรโมชั่น : &nbsp;</label>
			                    </div>
			                    <div class="col-md-10">
			                        {{promotion.promotionName}}
								</div>
			                  </div>
			                  <div class="form-group col-md-12">
			                  	<div class="col-md-2">
			                    <label>รายละเอียดโปรโมชั่น : &nbsp;</label>
			                    </div>
			                    <div class="col-md-10">
			                        {{promotion.promotionDesc}}
								</div>
			                  </div>

			             </form>

						<div class="form-group col-md-6">
							<div class="panel panel-info">
			                  <div class="panel-heading">เลือกสินค้า</div>
			                  <div class="panel-body menu-body">
			                    <ul class="list-unstyled user_data">
			                    	<table class="table table-bordered">
									    <thead>
									      <tr>
									        <th>สินค้า</th>
									        <th>ขนาด</th>
									        <th>สี</th>
									        <th>จำนวน</th>
									        <th></th>
									      </tr>
									    </thead>
									    <tbody>
											<tr ng-repeat="p in promotions" ng-if="p.promotionHdId==promotionCode">
												<td>{{p.productDescTH}}</td>
												<td>{{p.sizeDesc}}</td>
												<td></td>
												<td> <input class="form-control" type="text" >
												</td>
												<td><i class="fa fa-arrow-right fa-2x"></i></td>
											</tr>
									    </tbody>
									</table>

				                 </ul>
			                 </div>
			                </div>
						</div>
						<div class="form-group col-md-6">
							<div class="panel panel-success">
			                  <div class="panel-heading">รายการสินค้า</div>
			                  <div class="panel-body menu-body">
			                    
			                 </div>
			                </div>
						</div>
			             

	               </div>
	            </div>

			</div>
			
		</div>
	</div>
	@endverbatim

	<div class="row"><div class="col-md-12 text-center">@ 2017 TOA Paint (Thailand) Public Company Limited. All Right Reserved.</div></div>
@stop

@section('footer')
	
    <script src="<?= asset('app/controllers/promotionController.js') ?>"></script>
@stop

