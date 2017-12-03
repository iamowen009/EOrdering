@extends('layouts.main')

@section('head')
<style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>

@stop

@section('content')
<div ng-controller="CustomerController" ng-init="fetchCustomer()">
  <div class="content">
    <div class="row ">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="panel">
          <div class="panel-heading text-center style-title">ข้อมูลส่วนตัว </div>
            <div class="panel-body">
              <fieldset disabled>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="name">รหัสร้านค้า</label>
                  <input type="text" class="form-control" name="name" ng-model="input.customerCode" id="name">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="name">ชื่อร้านค้า</label>
                    <input type="text" class="form-control" name="customerName" ng-model="input.customerName">
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="address">ที่อยู่/เลขที่</label>
                  <input type="text" class="form-control" name="address" id="address" ng-model="input.address">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="road">ถนน</label>
                  <input type="text" class="form-control" name="road" id="road" ng-model="input.street">
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="tambon">ตำบล/แขวง</label>
                  <input type="text" class="form-control" name="tambon" id="tambon" ng-model="input.subDistrictName">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="ampur">อำเภอ/เขต</label>
                  <input type="text" class="form-control" name="ampur" id="ampur" ng-model="input.districtName" >
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="province">จังหวัด</label>
                  <input type="text" class="form-control" name="province" id="province" ng-model="input.cityName">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="zipcode">รหัสไปรษณีย์</label>
                  <input type="text" class="form-control" name="zipcode" id="zipcode" ng-model="input.postCode">
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="tel">เบอร์โทรศัพท์, เบอร์มือถือ</label>
                  <input type="text" class="form-control" name="tel" id="tel" ng-model="input.telNo">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="email">อีเมล</label>
                  <input type="text" class="form-control" name="email" id="email"  ng-model="input.email">
                </div>

                <div class="col-md-6 form-group">
                    <label>บัญชี BBL</label>
                    <input type="text" class="form-control" name="bblNo" ng-model="input.bblNo"  ng-required="true">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>ชื่อ BBL (TH & EN)</label>
                    <input type="text" class="form-control" name="bblName" ng-model="input.bblName" ng-required="true">
                  </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="delivery">จัดส่ง</label>
                  <input type="text" class="form-control" name="delivery" id="delivery" ng-model="input.transportZoneDesc">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                  <label for="latlong">Latitude Longtitude</label>
                  <input type="text" class="form-control" name="latlong" id="latlong" value="">
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="map"></div>
                </div>
              </fieldset>
              <div class="clearfix"></div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                  <!-- <button type="button" class="btn btn-info" >แจ้งเปลี่ยนแปลงข้อมูล</button>
                  <button type="button" class="btn btn-default" >กลับสู่หน้าแรก</button> -->
                  <a href="{{ url('/profile-update') }}" class="btn btn-info">
                    แจ้งเปลี่ยนแปลงข้อมูล
                  </a>
                  <a href="{{ url('/home') }}" class="btn btn-default">
                    กลับสู่หน้าแรก
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div> <!-- .row -->
  </div> <!-- .content -->
</div>
@stop

@section('footer')
	 <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script> 
   <script src="<?= asset('app/controllers/customerController.js') ?>"></script>

    <script>
    	$(function(){
    		var mapOptions = {
		        center: new google.maps.LatLng(13.75633, 100.50177),
		        zoom: 10
		    }
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);	
    	})
	    
    </script>

@stop