@extends('layouts.main')

@section('content')
<div class="content" ng-controller="ChangePasswordController">	
	<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel">
        <div class="panel-heading text-center style-title">
          เปลี่ยนรหัสผ่าน 
        </div>

        <form name="form" autocomplete="off" ng-submit="doChangePassword(form.$valid)" novalidate>
          <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">   
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>อีเมลล์:</label>
                    <input type="text" class="form-control" name="email" id="email" value="example@mail.com" disabled>
                  </div>
                  <div class="form-group">
                    <label for="old_pwd">รหัสผ่านปัจจุบัน</label>
                    <input type="password" class="form-control" name="oldpassword" ng-model="input.oldpassword" ng-required="true">
                    <div ng-messages="form.oldpassword.$dirty && form.oldpassword.$error">
                      <span class="text-danger" ng-message="required">
                        กรุณากรอกรหัสผ่านปัจจุบัน
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="new_pwd">รหัสผ่านใหม่</label>
                    <input type="password" class="form-control" name="newpassword" ng-minlength="8" ng-model="input.newpassword" ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])/" ng-required="true">
                    <div ng-messages="form.newpassword.$dirty && form.newpassword.$error">
                      <span class="text-danger" ng-message="required">
                        กรุณากรอกรหัสผ่านใหม่
                      </span>
                      <span class="text-danger" ng-message="minlength">
                        รหัสผ่านต้องไม่มีความยาวไม่น้อยกว่า 8 ตัวอักษา
                      </span>
                      <span class="text-danger" ng-message="pattern">
                        รูปแบบรหัสผ่านไม่ถูกต้อง
                      </span>
                    </div>
                  </div>    
                  <div class="form-group">
                    <label>ยืนยันรหัสผ่านใหม่</label>
                    <input type="password" class="form-control" name="newpassconf" ng-model="input.newpassconf" match="input.newpassword" ng-required="true">
                    <div ng-messages="form.newpassconf.$dirty && form.newpassconf.$error">
                      <span class="text-danger" ng-message="required">
                        กรุณากรอกยืนยันรหัสผ่านใหม่
                      </span>
                      <span class="text-danger" ng-message="match">
                         รหัสผ่านทั้งสองช่องไม่เหมือนกัน
                      </span>
                    </div>
                  </div>   
                </div>
                <div class="row-col-md-6">
                  <span style="padding-left: 24px;">
                    เงื่อนไขการตั้งรหัสผ่าน
                  </span>
                  <ol style="margin-top: 10px;">
                    <li class="form-group">
                      ต้องมีความยาว
                      <span style="color: green;">
                        ไม่ต่ำกว่า 8 ตัวอักษร
                      </span>
                    </li>
                    <li class="form-group">
                      ต้องมีตัวอักษร
                      <span style="color: green;">
                        ตัวพิมพ์ใหญ่
                      </span>
                      อย่างน้อย 1 ตัว
                     </li>
                     <li class="form-group">
                       ต้องมีตัวอักษร
                       <span style="color: green;">
                         ตัวพิมพ์เล็ก
                       </span>
                      อย่างน้อย 1 ตัว
                    </li>
                    <li class="form-group">
                      ต้องมี
                      <span style="color: green;">
                        ตัวเลข
                       </span>
                       อย่างน้อย 1 ตัว
                     </li>
                   </ol>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="panel-footer">
          <div class="text-center">
            <button type="submit" class="btn btn-info" ng-disabled="form.$invalid || btnLoading">
              <span ng-if="!btnLoading">
                  บันทึก
              </span>
              <span ng-if="btnLoading">
                  <i class="fa fa-circle-o-notch fa-spin"></i>
              </span>
            </button>
            <a href="{{ url('/home') }}" class="btn btn-default">
              กลับสู่หน้าแรก
             </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@section('footer')
    <script src="<?= asset('app/controllers/changePasswordController.js') ?>"></script>
@stop
@stop
