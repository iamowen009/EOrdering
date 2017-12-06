@extends('layouts.main') 
@section('head')
<!-- <link href="<?= asset('vendors/nestable/nestable.css') ?>" rel="stylesheet"> -->
<link href="<?= asset('/css/document.css') ?>" rel="stylesheet">

@stop 
@section('content')
<div class="content" ng-controller="homeContactController">
	<div class="row ">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-contact">
				<div class="panel-heading text-center style-title">ติดต่อ TOA</div>
				<div class="panel-body ">
					<div class="row">
						<div class="col-md-6 padding-left-0">
							<div class="panel-address">
								<h4>บริษัท ทีโอเอ เพ้นท์ (ประเทศไทย) จำกัด (มหาชน)</h4>
								<p>สำนักงาน และศูนย์อุตสาหกรรม ทีโอเอ บางนา-ตราด 31/2 หมู่ 3
									<br>ถนนบางนา-ตราด ตำบลบางเสาธง อ.บางเสาธง จ.สมุทรปราการ 10570</p>
								
								<h4>ฝ่ายบริการลูกค้า</h4>
								<p>ท่านสามารถติดตามสินค้า</p>
								<p>การสั่งซื้อ / การจัดส่ง ตามเขตพื้นที่</p>
								<p>ในเวลาทำการ จันทร์ขเสาร์ เวลา 08:00 - 17:00 น.</p>

								<br>
								<table class="table table-hover text-right">
								<thead class="thead-default">
									<tr>
										<th class="text-center">เขตพื้นที่</th>
										<th class="text-center">ติดต่อ : โทร</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center" >กรุงเทพฯ และ ปริมณฑล</td>
										<td class="text-center">02-335-5743</td>
									</tr>
									<tr>
										<td class="text-center"></td>
										<td class="text-center">02-335-5744</td>
									</tr>
									<tr>
										<td class="text-center"></td>
										<td class="text-center">02-335-5745</td>
									</tr>
									<tr>
										<td class="text-center"></td>
										<td class="text-center">02-335-5746</td>
									</tr>

									<tr>
										<td class="text-center">ต่างจังหวัด</td>
										<td class="text-center">02-335-5752</td>
									</tr>
									<tr>
										<td class="text-center"></td>
										<td class="text-center">02-335-5753</td>
									</tr>
									<tr>
										<td class="text-center"></td>
										<td class="text-center">02-335-5754</td>
									</tr>
								</tbody>
								</table>
							</div>
						</div>

						<div class="col-md-6 padding-right-0">
								<h4><strong >ผู้บริหารเขตขาย</strong></h4>
								<div class="modal-body invoice__body">
									<div class="contact__body--infomation">
										<div class="left ">
											<p>เขตขาย :</p>
											<p>เบอร์โทรศัพท์ : </p>
											<p>Email : </p>
										</div>
										<div class="right contact__content">
											<p>@{{customer.salesMgrName}}</p>
											<p ng-show="customer.salesMgrName == null || customer.salesMgrName == ''">-</p>
											
											<p>@{{customer.salesMgrTel}}</p>
											<p ng-show="customer.salesMgrTel == null || customer.salesMgrTel == ''">-</p>
											
											<p>@{{customer.salesMgrMail}}</p>
											<p ng-show="customer.salesMgrMail == null || customer.salesMgrMail == ''">-</p>
											
										</div>
									</div>
								</div>

								<h4><strong >ผู้แทนขาย</strong></h4>
								<div class="modal-body invoice__body">
									<div class="contact__body--infomation">
										<div class="left ">
											<p>เขตขาย :</p>
											<p>เบอร์โทรศัพท์ : </p>
											<p>Email : </p>
										</div>
										<div class="right contact__content" ng-hide="customer.salesTAName == '' || customer.salesTAName == null">
											<p>@{{customer.salesTAName}}</p>
											<p ng-show="customer.salesTAName == null || customer.salesTAName == ''">-</p>

											<p ng-show="customer.salesTATel">@{{customer.salesTATel}}</p>
											<p ng-show="customer.salesTATel == null || customer.salesTATel == ''">-</p>
											
											<p>@{{customer.salesTAMail}}</p>
											<p ng-show="customer.salesTAMail == null || customer.salesTAMail == ''">-</p>
										</div>
									</div>

									<div class="contact__body--infomation">
										<div class="left contact__content__child" ng-hide="customer.salesTBName == '' || customer.salesTBName == null">
											<p>เขตขาย :</p>
											<p>เบอร์โทรศัพท์ : </p>
											<p>Email : </p>
										</div>
										<div class="right contact__content contact__content__child">
											<p>@{{customer.salesTBName}}</p>
											<p ng-show="customer.salesTBName == null || customer.salesTBName == ''">-</p>

											<p ng-show="customer.salesTATel">@{{customer.salesTATel}}</p>
											<p ng-show="customer.salesTBTel == null || customer.salesTBTel == ''">-</p>
											
											<p>@{{customer.salesTAMail}}</p>
											<p ng-show="customer.salesTBMail == null || customer.salesTBMail == ''">-</p>
										</div>
									</div>

									<div class="contact__body--infomation" ng-hide="customer.salesTKName == '' || customer.salesTKName == null">
										<div class="left contact__content__child">
											<p>เขตขาย :</p>
											<p>เบอร์โทรศัพท์ : </p>
											<p>Email : </p>
										</div>
										<div class="right contact__content contact__content__child">
											<p>@{{customer.salesTKName}}</p>
											<p ng-show="customer.salesTKName == null || customer.salesTKName == ''">-</p>

											<p ng-show="customer.salesTKTel">@{{customer.salesTKTel}}</p>
											<p ng-show="customer.salesTKTel == null || customer.salesTKTel == ''">-</p>
											
											<p>@{{customer.salesTAMail}}</p>
											<p ng-show="customer.salesTKMail == null || customer.salesTKMail == ''">-</p>
										</div>
									</div>
								</div>

								<h4><strong >บัญชีสินเชื่อและลูกหนี้</strong></h4>
								<div class="modal-body invoice__body">
									<div class="contact__body--infomation">
										<div class="left ">
											<p>ชื่อ :</p>
											<p>เบอร์โทรศัพท์ : </p>
										</div>
										<div class="right contact__content">
											<p>@{{customer.arOff}}</p>
											<p ng-show="customer.arOff == null || customer.arOff == ''">-</p>

											<p ng-show="customer.accMemo">@{{customer.accMemo}}</p>
											<p ng-show="customer.accMemo == null || customer.accMemo == ''">-</p>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop 
@section('footer')
<script src="<?= asset('app/controllers/customerController.js') ?>"></script>
@stop