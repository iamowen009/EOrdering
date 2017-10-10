@extends('layouts.main')

@section('head')
<link href="<?= asset('vendors/nestable/nestable.css') ?>" rel="stylesheet">
<style>
#nestable1 a{color:#00BFFF !important;}
.modal-lg {
    width: 1000px!important;
    margin: 0 auto;
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus{
	background-color:blue !important;
	border:none;
}
.modal-dialog-invoice {
    position: relative;
    width: auto;
    margin: 10px;
    width: 1000px;
	margin: 30px auto;
}
a.nav-link.tab2:hover,
a.nav-link.tab1:hover,
a.nav-link.tab2:active,
a.nav-link.tab1:active{
  background: #868e96 !important;
}

a.nav-link.tab2 {
    background: orange;
}
a.nav-link.tab1 {
    background: blue;
}
.datelbl{
  float: left;
  padding-top: 5px;
}
</style>
@stop

@section('content')
<div class="content">

	<div class="row " ng-controller="OrderController">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel">
				<div class="panel-heading text-center" style="background-color:#000e85;color:#fff">สถานะคำสั่งซื้อ </div>
              <div class="panel-body">
              	<br>


            	<form class="form-inline">
                  <div class="form-group col-md-4">
                  	<label class="datelbl">วันที่ : &nbsp;</label>
                        <div class="dropdown input-group dropdown-start-parent">
          						    <a  id="dropdownStart" role="button" data-toggle="dropdown" data-target=".dropdown-start-parent"
          						       href="#">
          						        <div class="input-group date">
          						            <input type="text" class="form-control" data-ng-model="dateRangeStart">
          						            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
          						        </div>
          						    </a>
          						    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
          						        <datetimepicker data-ng-model="dateRangeStart"
          						                        data-datetimepicker-config="{ dropdownSelector: '#dropdownStart', renderOn: 'end-date-changed' }"
          						                        data-on-set-time="startDateOnSetTime()"
          						                        data-before-render="startDateBeforeRender($dates)"></datetimepicker>
          						    </ul>
          						</div>
                  </div>
                  <div class="form-group col-md-4">
                      <label class="datelbl">ถึงวันที่ : &nbsp;</label>
                    <div class="col-md-9">
                        <div class="dropdown input-group dropdown-end-parent">
            						    <a  id="dropdownEnd" role="button" data-toggle="dropdown" data-target=".dropdown-end-parent"
            						       href="#">
            						        <div class="input-group date">
            						            <input type="text" class="form-control" data-ng-model="dateRangeEnd">
            						            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            						        </div>
            						    </a>
            						    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            						        <datetimepicker data-ng-model="dateRangeEnd"
            						                        data-datetimepicker-config="{ dropdownSelector: '#dropdownEnd', renderOn: 'start-date-changed' }"
            						                        data-on-set-time="endDateOnSetTime()"
            						                        data-before-render="endDateBeforeRender($view, $dates, $leftDate, $upDate, $rightDate)"></datetimepicker>
            						    </ul>
            						</div>
            					</div>
                  </div>

                </form>

                <div class="row">
					<div class="col-md-12">
						<div class="cui-ecommerce--product--info">
	                        <div class="nav-tabs-horizontal">
	                            <ul class="nav nav-tabs tab-order" role="tablist">
	                                <li class="nav-item active">
	                                    <a class="nav-link tab1" href="javascript: void(0);" data-toggle="tab" data-target="#tab1" role="tab">รับคำสั่งซื้อแล้ว<br/>(Order Process)</a>
	                                </li>
	                                <li class="nav-item">
	                                    <a class="nav-link tab2" href="javascript: void(0);" data-toggle="tab" data-target="#tab2" role="tab">ประวัติการสั่งซื้อ<br/>(History Process)</a>
	                                </li>
	                            </ul>
	                            <div class="tab-content padding-vertical-20">
	                                <div class="tab-pane active" id="tab1" role="tabpanel">

	                                    <div class="dd" id="nestable1">
                                        @include('order.inc-order-process')
				                              </div>
	                                </div>
	                                <div class="tab-pane" id="tab2" role="tabpanel">
	                                    <div class="dd" id="nestable1">
				                            <ol class="dd-list">

				                                <li class="dd-item" data-id="2">
				                                    <div class="dd-handle">2560</div>
				                                    <ol class="dd-list">
				                                        <li class="dd-item" data-id="3"><div class="dd-handle">มกราคม</div></li>
				                                        <li class="dd-item" data-id="4"><div class="dd-handle">กุมภาพันธ์</div></li>
				                                        <li class="dd-item" data-id="5">
				                                            <div class="dd-handle">มีนาคม</div>
				                                            <ol class="dd-list">
				                                                <!--<li class="dd-item" data-id="6"><div class="dd-handle">06/03/2560 09:00</div></li>
				                                                <li class="dd-item" data-id="7"><div class="dd-handle">06/03/2560 09:00</div></li>
				                                                <li class="dd-item" data-id="8"><div class="dd-handle">06/03/2560 09:00</div></li>-->
				                                                <li class="dd-item" data-id="6">
				                                                	<table class="table table-striped">
																		<thead>
																			<tr class="info">
																				<th>วันที่-เวลา</th>
																				<th>ผู้ดำเนินการ</th>
																				<th>เลขที่ใบสั่งซื้อ</th>
																				<th>เลขที่เอกสารอ้างอิง</th>
																				<th>จำนวนเงินสุทธิ <br/>(ไม่รวม VAT)</th>
																				<th width="10%">รายละเอียดใบกำกับภาษี</th>
																			</tr></thead>
																		<tbody>
																			<tr>
																				<td>06/03/2560 09:00</td>
																				<td>it_ornanong</td>
																				<td><a data-toggle="modal" data-target="#invoiceModal">W00200100</a></td>
																				<td>012001001</td>
																				<td>9,800</td>
																				<td><a data-toggle="modal" data-target="#taxModal"><i class="fa fa-newspaper-o"></a></td>
																			</tr>
																			<tr>
																				<td>07/03/2560 09:00</td>
																				<td>it_ornanong</td>
																				<td><a data-toggle="modal" data-target="#invoiceModal">W00200102</a></td>
																				<td>012001002</td>
																				<td>20,000</td>
																				<td><a data-toggle="modal" data-target="#taxModal"><i class="fa fa-newspaper-o"></a></td>
																			</tr>
																		</tbody>
				                                                	</table>
				                                                </li>
				                                            </ol>
				                                        </li>
				                                        <li class="dd-item" data-id="9"><div class="dd-handle">เมษายน</div></li>
				                                    </ol>
				                                </li>
				                                <li class="dd-item" data-id="11">
				                                    <div class="dd-handle">2559</div>
				                                </li>
				                            </ol>
				                            <p style="color:red;">จำนวนเงินทั้งหมดสุทธิหลังหักส่วนลดทั้งหมด รวมค่าบริการคลังและรวม VAT</p>
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
	</div>
</div>

<!-- Modal -->
<div id="invoiceModal" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header info">
      	<div class="col-sm-1">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    	</div>
    	<div class="col-sm-11 text-center">
        	<h4 class="modal-title">ใบสั่งซื้อ</h4>
        </div>
      </div>
      <div class="modal-body">
        <!--<div class="bg-gray">

        </div>-->
        <div class="x_panel">
                          <div class="x_title">
                            <h4 class="ng-binding">11016791 ร้านทรัพย์เพิ่มพูนค้าวัสดุ</h4>

                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <br>
                            <form class="form-horizontal ng-pristine ng-valid">
                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-5 text-right">เลขที่ใบสั่งซื้อ : </label>
                                <label class="col-md-7 text-left ng-binding">WI1709000027</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="pwd" class="col-md-5 text-right">ที่อยู่ :</label>
                                <label class="col-md-7 text-left ng-binding">223 หมู่ 9  ต.และ อ.ทุ่งช้าง น่าน</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-5 text-right">วันที่สั่งซื้อ :</label>
                                <label class="col-md-7 text-left ng-binding">23/09/2017</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="pwd" class="col-md-5 text-right">อีเมลล์ :</label>
                                <label class="col-md-7 text-left ng-binding"></label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-5 text-right">การชำระเงิน :</label>
                                <label ng-show="order.paymentTerm==='CASH'" class="col-md-7 text-left">เงินสด</label>
                                <label ng-show="order.paymentTerm==='CREDIT'" class="col-md-7 text-left ng-hide">เครดิต</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="pwd" class="col-md-5 text-right">เบอร์โทรศัพท์ :</label>
                                <label class="col-md-7 text-left ng-binding">080-567-6996</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-5 text-right">ขนส่งโดย :</label>
                                <label class="col-md-7 text-left">มารับเอง</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="pwd" class="col-md-5 text-right">บริษัทขนส่ง :</label>
                                <label class="col-md-7 text-left ng-binding">นิ่มซีเส็ง</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-5 text-right">สถานที่ส่ง :</label>
                                <label class="col-md-7 text-left ng-binding">หจก.ศรีสยาม เพ้นท์</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="pwd" class="col-md-5 text-right">วันที่ต้องการ :</label>
                                <label class="col-md-7 text-left ng-binding">24/09/2017</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-5 text-right">ที่อยู่สถานที่ส่ง :</label>
                                <label class="col-md-7 text-left ng-binding">หมู่ 3   ตำบล  ปัว   อ.ปัว น่าน</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="pwd" class="col-md-5 text-right">เลขที่ PO :</label>
                                <label class="col-md-7 text-left ng-binding"></label>
                              </div>
                            </form>
                          </div>
                        </div>

        <br/>

        <h6>รายละเอียดสินค้าที่สั่งซื้อ</h6>

        <ngcart-cart></ngcart-cart>
      </div>
      <p style="color:red;">ราคาต่อหน่วยหลังหักราคามาตรฐานเท่านั้น</p>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" data-dismiss="modal">พิมพ์</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>

  </div>
</div>


<div id="orderDetailModal" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">รายละเอียดสถานะการสั่งซื้อ</h4>
      </div>
      <div class="modal-body">
        <div>
             <h4>เจริญสิทธิภัณฑ์ฮาร์ดแวร์</h4>
             <br>
             <form class="form-horizontal">

              <div class="form-group col-md-12">
                <label for="pwd">ที่อยู่ :</label>
                <label>ถ.กิ่งแก้ว เขตลาดกระบัง</label>
              </div>

              <div class="form-group col-md-12">
                <label for="pwd">เบอร์โทรศัพท์ :</label>
                <label>089-9999999</label>
              </div>

              <div class="form-group col-md-12">
                <label for="pwd">บริษัทขนส่ง :</label>
                <label>กิจทองขนส่ง</label>
              </div>

            </form>
        </div>

        <br/>

        <table class="table table-borderd">
			<thead>
				<tr class="info">
					<th>รายการสินค้า</th>
					<th>จำนวนสั่งซื้อ</th>
					<th>จำนวนออกบิล</th>
					<th>จำนวนการจอง</th>
					<th>จำนวนคงค้าง</th>
					<th>จำนวนยกเลอก</th>
					<th>หน่วย</th>
				</tr></thead>
			<tbody>
				<tr>
					<td>F100200300 ซุปเปอร์ชิลด์ สีน้ำกึ่งเงา ภายนอก 1 กล #G100</td>
					<td>8</td>
					<td>0</td>
					<td>0</td>
					<td>0</td>
					<td>8</td>
					<td>GL</td>
				</tr>
				<tr>
					<td>F100200300 ซุปเปอร์ชิลด์ สีน้ำกึ่งเงา ภายนอก 1 กล #G100</td>
					<td>8</td>
					<td>0</td>
					<td>0</td>
					<td>0</td>
					<td>8</td>
					<td>GL</td>
				</tr>
			</tbody>
    	</table>
    	<br/>
    	<p>Note: <br/>จำนวนสั่งซื้อ : จำนวนสินค้าที่สั่งซื้อ<br/>จำนวนออกบิล : จำนวนสินค้าที่เปิดบิลแล้ว
    	<br/>จำนวนการจอง : จำนวนสินค้าที่ได้รับการจองและรอการเปิดบิล<br/>จำนวนคงค้าง : จำนวนสินค้ารอดำเนินการ<br/>
    	จำนวนยกเลิก : จำนวนสินค้าที่ทำการยกเลิก</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" data-dismiss="modal">พิมพ์</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="orderModal" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Order/Bill Tracking</h4>
      </div>
      <div class="modal-body">
        <div>
             <h4>เจริญสิทธิภัณฑ์ฮาร์ดแวร์</h4>
             <br>
             <form class="form-horizontal">

              <div class="form-group col-md-12">
                <label for="pwd">ที่อยู่ :</label>
                <label>ถ.กิ่งแก้ว เขตลาดกระบัง</label>
              </div>

              <div class="form-group col-md-12">
                <label for="pwd">เบอร์โทรศัพท์ :</label>
                <label>089-9999999</label>
              </div>

              <div class="form-group col-md-12">
                <label for="pwd">บริษัทขนส่ง :</label>
                <label>กิจทองขนส่ง</label>
              </div>

            </form>
        </div>

        <br/>

        <table class="table table-borderd">
			<thead>
				<tr class="info">
					<th>รายการสินค้า</th>
					<th>จำนวนสั่งซื้อ</th>
					<th>หน่วย</th>
					<th>จำนวนคงค้าง</th>
					<th>จำนวนการจอง</th>
					<th>เลขที่บิล</th>
					<th>ใบนำส่ง/วัน-เวลารถออกจากบริษัท</th>
					<th>Fwd Agent</th>
					<th>ทะเบียนรถ/ชื่อคนขับรถ</th>
				</tr></thead>
			<tbody>
				<tr>
					<td>F100200300 ซุปเปอร์ชิลด์ สีน้ำกึ่งเงา ภายนอก 1 กล #G100</td>
					<td>8</td>
					<td>GL</td>
					<td>0</td>
					<td>0</td>
					<td>8</td>
					<td>t123456</td>
					<td>0/00/00 00:00:00</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>F100200300 ซุปเปอร์ชิลด์ สีน้ำกึ่งเงา ภายนอก 1 กล #G100</td>
					<td>8</td>
					<td>GL</td>
					<td>0</td>
					<td>0</td>
					<td>8</td>
					<td>t123456</td>
					<td>0/00/00 00:00:00</td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
    	</table>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" data-dismiss="modal">พิมพ์</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="taxModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">รายละเอียดใบกำกับภาษี</h4>
      </div>
      <div class="modal-body">
        <div>
             <h4>เจริญสิทธิภัณฑ์ฮาร์ดแวร์</h4>
             <br>
             <form class="form-inline">

              <div class="form-group col-md-12">
                <label for="pwd">ที่อยู่ :</label>
                <label>ถ.กิ่งแก้ว เขตลาดกระบัง</label>
              </div>

              <div class="form-group col-md-12">
                <label for="pwd">เบอร์โทรศัพท์ :</label>
                <label>089-9999999</label>
              </div>

              <div class="form-group col-md-12">
                <label for="pwd">บริษัทขนส่ง :</label>
                <label>กิจทองขนส่ง</label>
              </div>

            </form>
        </div>

        <br/>

        <table class="table table-borderd">
			<thead>
				<tr class="info">
					<th>เลขที่บิล</th>
					<th>วันที่บิล</th>
					<th>รายการสินค้า</th>
					<th>จำนวนออกบิล</th>
					<th>หน่วย</th>
					<th>จำนวนเงินสุทธิ <br/>(รวม VAT)</th>

				</tr></thead>
			<tbody>
				<tr>
					<td>F100200300</td>
					<td>01/02/2560</td>
					<td>F100200300 ซุปเปอร์ชิลด์ สีน้ำกึ่งเงา ภายนอก 1 กล #G100</td>
					<td>5</td>
					<td>4</td>
					<td>1,644</td>

				</tr>

			</tbody>
    	</table>
      </div>
      <p style="color:red;">จำนวนเงินทั้งหมดสุทธิหลังหักส่วนลดทั้งหมด รวมค่าบริการคลังและรวม VAT</p>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" data-dismiss="modal">พิมพ์</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>


  </div>
</div>

@stop

@section('footer')
	<script src="<?= asset('app/controllers/orderController.js') ?>"></script>
	<script src="<?= asset('vendors/nestable/jquery.nestable.js') ?>"></script>

    <script>
    $(function(){

        $('#nestable1').nestable();

    });

    $('#invoiceModal').each(function(){
	  var modalWidth = $(this).width(),
	      modalMargin = '-' + (modalWidth/2) + 'px!important';
	  $(this).css('margin-left',modalMargin);
	});
</script>
@stop
