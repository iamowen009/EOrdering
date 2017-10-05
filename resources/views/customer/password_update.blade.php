@extends('layouts.main')

@section('content')
<div class="content">
		
	<div class="row ">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel">
              <div class="panel-heading text-center" style="background-color:#000e85;color:#fff">เปลี่ยนรหัสผ่าน </div>
              <!--<div class="panel-heading text-center">เปลี่ยนรหัสผ่าน</div>-->
              <div class="panel-body">
              		
              		<form ng-submit="">
                        
                      <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3 form-group">
						            <label for="email">อีเมลล์:</label>
    					         <input type="text" class="form-control" name="email" id="email" value="example@mail.com">
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 form-group">
                        <label for="old_pwd">รหัสผ่านปัจจุบัน</label>
    					           <input type="text" class="form-control" name="old_pwd" id="old_pwd">
                      </div>
                        
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 form-group">
                        <label for="new_pwd">รหัสผ่านใหม่</label>
                         <input type="text" class="form-control" name="new_pwd" id="new_pwd">
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 form-group">
                        <label for="confirm_pwd">ยืนยันรหัสผ่าน</label>
                         <input type="text" class="form-control" name="confirm_pwd" id="confirm_pwd">
                      </div>

                      <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <a href="javascript: void(0);" class="pull-right link-blue link-underlined">ลืมรหัสผ่าน?</a>
                              <div class="checkbox pull-left">
                                  <label>
                                      <input name="example6" checked="" type="checkbox">
                                      แสดงรหัสผ่าน
                                  </label>
                              </div>
                          </div>
                        </div>

                     

                      <div class="clearfix"></div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                          <button type="button" class="btn btn-info" >บันทึก</button>
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
