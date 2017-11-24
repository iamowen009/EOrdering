@extends('layouts.main') 
@section('head')
<link href="<?= asset('vendors/nestable/nestable.css') ?>" rel="stylesheet">

<link href="<?= asset('/css/document.css') ?>" rel="stylesheet">
<link href="<?= asset('/css/orders.css') ?>" rel="stylesheet"> 
@stop 
@section('content')
<section class="page-content" ng-controller="OrderController">
  <div class="content">

    <div class="row ">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel">
          <!-- background-color:#000e85;color:#fff -->
          <div class="panel-heading text-center style-title">สถานะคำสั่งซื้อ </div>
          <div class="">
            <br>


            <form class="form-inline">
              <div class="form-group col-md-3">
                <label class="datelbl">วันที่เริ่มต้น : &nbsp;</label>
                <input type="text" class="form-control" ng-model="dateRangeStart" datepicker ng-change="filterOrder()" />
              </div>
              <div class="form-group col-md-3" style="margin-left: -50px;">
                <label class="datelbl">ถึงวันที่ : &nbsp;</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" ng-model="dateRangeEnd" datepicker ng-change="filterOrder()">
                </div>
              </div>

            </form>

            <div class="row">
              <div class="col-md-12">
                <div class="cui-ecommerce--product--info">
                  <div class="nav-tabs-horizontal">
                    <ul class="nav nav-tabs tab-order" role="tablist">
                      <li class="nav-item active" style="display:none">
                        <a class="nav-link tab1" href="javascript: void(0);" data-toggle="tab" data-target="#tab1" role="tab">รับคำสั่งซื้อแล้ว
                          <br/>(Order Process)</a>
                      </li>
                      <li class="nav-item" style="display:none">
                        <a class="nav-link tab2" href="javascript: void(0);" data-toggle="tab" data-target="#tab2" role="tab">ประวัติการสั่งซื้อ
                          <br/>(History Process)</a>
                      </li>
                    </ul>
                    <div class="tab-content padding-vertical-20">
                      <div class="tab-pane active" id="tab1" role="tabpanel">

                        <div class="dd" id="nestable1">
                          <p class="text-center" ng-show="loading">
                            <span class="fa fa-refresh fa-3x fa-spin"></span>
                          </p>
                          @include('order.inc-order-process')
                        </div>
                      </div>
                      <div class="tab-pane" id="tab2" role="tabpanel">
                        <div class="dd" id="nestable1">
                          <p class="text-center" ng-show="loading">
                            <span class="fa fa-refresh fa-3x fa-spin"></span>
                          </p>
                          @include('order.inc-history-process')

                        </div>

                      </div>
                      <span style="color:red;position: absolute;margin: -53px 0px 0px 145px;">* จำนวนเงินสุทธิ หลังหักส่วนลดทั้งหมด ไม่รวมค่าบริการคลังและไม่รวม VAT</span>
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
  <footer>

  </footer>

  @include('order.modal-invoice') 
  @include('order.modal-order-detail') 
  @include('order.modal-order-history') 
  @include('order.modal-order-status')
  @include('order.modal-order-taxno')

</section>
@stop 
@section('footer')
<script src="<?= asset('app/controllers/orderController.js') ?>"></script>
<script src="<?= asset('node_modules/ng-flat-datepicker/dist/ng-flat-datepicker.js') ?>"></script>
<script src="<?= asset('vendors/nestable/jquery.nestable.js') ?>"></script>
<script>
  $(function () {

    $('#nestable1').nestable();

  });

  $('#OrderTrackingModal').each(function () {
    var modalWidth = $(this).width(),
      modalMargin = '-' + (modalWidth / 2) + 'px!important';
    $(this).css('margin-left', modalMargin);
  });

  $('#invoiceModal').each(function () {
    var modalWidth = $(this).width(),
      modalMargin = '-' + (modalWidth / 2) + 'px!important';
    $(this).css('margin-left', modalMargin);
  });

  $('#OrderDetailModal').each(function () {
    var modalWidth = $(this).width(),
      modalMargin = '-' + (modalWidth / 2) + 'px!important';
    $(this).css('margin-left', modalMargin);
  });

  $('#OrderStatusModal').each(function () {
    var modalWidth = $(this).width(),
      modalMargin = '-' + (modalWidth / 2) + 'px!important';
    $(this).css('margin-left', modalMargin);
  });
</script>
@stop