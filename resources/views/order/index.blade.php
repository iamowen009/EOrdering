@extends('layouts.main')

@section('head')
<link href="<?= asset('vendors/nestable/nestable.css') ?>" rel="stylesheet">
<link href="<?= asset('/css/orders.css') ?>" rel="stylesheet">
@stop

@section('content')
<section class="page-content" ng-controller="OrderController" >
<div class="content">

	<div class="row ">
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
@include('order.modal-invoice')


@include('order.modal-order-detail')

<!-- Modal -->
@include('order.modal-tracking')

<!-- Modal -->
@include('order.modal-tax')
</section>
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
