@extends('layouts.main')

@section('content')
<div class="content">
		
	<div class="row ">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel">
            <div class="panel-heading text-center" style="background-color:#BFEBEE;">แจ้งเรื่องเปลี่ยนแปลงข้อมูล </div>
              
              <!--<div class="panel-heading text-center">แจ้งเรื่องเปลี่ยนแปลงข้อมูล</div>-->
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
