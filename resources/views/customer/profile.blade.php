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
<div class="content">
		
	<div class="row ">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel">
              <div class="panel-heading text-center" style="background-color:#000e85;color:#fff">ข้อมูลส่วนตัว </div>
              <!--<div class="panel-heading text-center">ข้อมูลส่วนตัว</div>-->
              <div class="panel-body">
              		
              		<form ng-submit="">
                        
                      <div class="col-md-12 col-sm-12 col-xs-12 form-group">
						<label for="name">ชื่อร้านค้า:</label>
    					<input type="text" class="form-control" name="name" id="name" value="เจริญสิทธิภัณฑ์ฮาร์ดแวร์">
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="address">ที่อยู่/เลขที่:</label>
    					<input type="text" class="form-control" name="address" id="address" value="1589">
                      </div>
                        
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="road">ถนน:</label>
    					<input type="text" class="form-control" name="road" id="road" value="กิ่งแก้ว">
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="tambon">ตำบล/แขวง:</label>
    					<input type="text" class="form-control" name="tambon" id="tambon" value="เจริญนคร">
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="ampur">อำเภอ/เขต:</label>
    					<input type="text" class="form-control" name="ampur" id="ampur" value="ลาดพร้าว">
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="province">จังหวัด:</label>
    					<input type="text" class="form-control" name="province" id="province" value="กรุงเทพมหานคร">
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="zipcode">รหัสไปรษณีย์:</label>
    					<input type="text" class="form-control" name="zipcode" id="zipcode" value="10060">
                      </div>
					
					 <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="tel">เบอร์โทรศัพท์:</label>
    					<input type="text" class="form-control" name="tel" id="tel" value="084-557-1234">
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="email">E-mail:</label>
    					<input type="text" class="form-control" name="email" id="email" value="example@mail.com">
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="delivery">จัดส่ง:</label>
    					<input type="text" class="form-control" name="delivery" id="delivery" value="กิจทองขนส่ง">
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="latlong">Latitude Longtitude:</label>
    					<input type="text" class="form-control" name="latlong" id="latlong" value="">
                      </div>
                       
                      <div class="col-md-12 col-sm-12 col-xs-12">
                      	<div id="map"></div>
					 </div>

                      <div class="clearfix"></div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                          <button type="button" class="btn btn-info" >แจ้งเปลี่ยนแปลงข้อมูล</button>
                          <button type="button" class="btn btn-default" >กลับสู่หน้าแรก</button>
                          
                        </div>
                      </div>

                    </form>

              </div>
            </div>
         </div>
	</div>
</div>
@stop

@section('footer')
	 <script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script> 

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