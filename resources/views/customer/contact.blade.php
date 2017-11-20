@extends('layouts.main')

@section('content')
<div class="content" ng-controller="homeContactController">

	<div class="row " >
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-contact">
			<div class="panel-heading text-center style-title">ติดต่อ TOA</div>
            <!-- <div class="panel-heading style-title"><h3>ติดต่อ TOA</h3> </div> -->

              <!--<div class="panel-heading text-center">ติดต่อเรา</div>-->
              <div class="panel-body ">
								<div class="row">
										<div class="col-md-6 padding-left-0">
											<div class="panel-address">
													<h4>บริษัท ทีโอเอ เพ้นท์ (ประเทศไทย) จำกัด (มหาชน)</h4>
													<p>สำนักงาน และศูนย์อุตสาหกรรม ทีโอเอ บางนา-ตราด 31/2 หมู่ 3 <br>ถนนบางนา-ตราด ตำบลบางเสาธง อ.บางเสาธง จ.สมุทรปราการ 10570</p>

													<h4>CALL CENTER </h4>
													<p>(สายตรงบริการลูกค้าสัมพันธ์) 02-335-5777</p>

													<h4>AUTOTINT SERVICE CENTER</h4>
													<p>(ฝ่ายบริการเครื่องผสมสีอัตโนมัติ) 02-335-5666</p>

											</div>
										</div>

										<div class="col-md-6 padding-right-0">
											<div class="panel-address">
													<h4>Sale Manager</h4>
													<p>@{{ customer.telNo }}</p>

													<h4>Sale</h4>
													<p>@{{ customer.telNo }}</p>

													<h4>AR</h4>
													<p>02-335-2222</p>
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
