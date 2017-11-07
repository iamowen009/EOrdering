@extends('layouts.main')

@section('head')
<link href="<?= asset('vendors/nestable/nestable.css') ?>" rel="stylesheet">
<link href="<?= asset('node_modules/ng-flat-datepicker/dist/ng-flat-datepicker.css') ?>" rel="stylesheet">
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
	                                <li class="nav-item" style="display:none">
	                                    <a class="nav-link tab2" href="javascript: void(0);" data-toggle="tab" data-target="#tab2" role="tab">ประวัติการสั่งซื้อ<br/>(History Process)</a>
	                                </li>
	                            </ul>
	                            <div class="tab-content padding-vertical-20">
	                                <div class="tab-pane active" id="tab1" role="tabpanel">

	                                    <div class="dd" id="nestable1">
																				<p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-3x fa-spin"></span></p>
                                        @include('order.inc-order-process')
				                              </div>
	                                </div>
	                                <div class="tab-pane" id="tab2" role="tabpanel">
	                                    <div class="dd" id="nestable1">
																				<p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-3x fa-spin"></span></p>
																				@include('order.inc-history-process')
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

@include('order.modal-invoice')
@include('order.modal-order-detail')
@include('order.modal-order-history')
@include('order.modal-order-status')

</section>
@stop

@section('footer')
	<script src="<?= asset('app/controllers/orderController.js') ?>"></script>
	<script src="<?= asset('node_modules/ng-flat-datepicker/dist/ng-flat-datepicker.js') ?>"></script>
	<script src="<?= asset('vendors/nestable/jquery.nestable.js') ?>"></script>

    <script>
    $(function(){

        $('#nestable1').nestable();

	});
	
	$('#OrderTrackingModal').each(function(){
	  var modalWidth = $(this).width(),
	      modalMargin = '-' + (modalWidth/2) + 'px!important';
	  $(this).css('margin-left',modalMargin);
	});

    $('#invoiceModal').each(function(){
	  var modalWidth = $(this).width(),
	      modalMargin = '-' + (modalWidth/2) + 'px!important';
	  $(this).css('margin-left',modalMargin);
	});

	$('#OrderDetailModal').each(function(){
	  var modalWidth = $(this).width(),
	      modalMargin = '-' + (modalWidth/2) + 'px!important';
	  $(this).css('margin-left',modalMargin);
	});

	$('#OrderStatusModal').each(function(){
	  var modalWidth = $(this).width(),
	      modalMargin = '-' + (modalWidth/2) + 'px!important';
	  $(this).css('margin-left',modalMargin);
	});

</script>
@stop
