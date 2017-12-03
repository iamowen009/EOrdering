@extends('layouts.main')

@section('content')
<div ng-controller="CustomerController" ng-init="fetchCustomer()">
    <div class="content">
      <div class="row ">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <form name="form" ng-submit="updateProfile(form.$valid)" novalidate>
            <div class="panel">
              <div class="panel-heading text-center style-title">
                แจ้งเปลี่ยนแปลงข้อมูล 
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <label>รหัสร้านค้า</label>
                    <input type="text" class="form-control" name="customerCode"  ng-disabled="true" ng-required="true">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>ชื่อร้านค้า</label>
                    <input type="text" class="form-control" name="customerName" ng-model="input.customerName" ng-disabled="true" ng-required="true">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>ที่อยู่/เลขที่</label>
                    <input type="text" class="form-control" name="address" ng-model="input.address" ng-required="true">
                    <div ng-messages="form.address.$dirty && form.address.$error">  
                      <span class="text-danger" ng-message="required">
                        กรุณากรอกที่อยู่/เลขที่
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>ถนน</label>
                    <input type="text" class="form-control" name="street" ng-model="input.street" ng-required="true">
                    <div ng-messages="form.street.$dirty && form.street.$error">  
                      <span class="text-danger" ng-message="required">
                        กรุณากรอกถนน
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>ตำบล/แขวง</label>
                    <input type="text" class="form-control" name="subDistrictName" ng-model="input.subDistrictName" ng-required="true">
                    <div ng-messages="form.subDistrictName.$dirty && form.subDistrictName.$error">  
                      <span class="text-danger" ng-message="required">
                        กรุณากรอกตำบล/แขวง
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>อำเภอ/เขต</label>
                    <input type="text" class="form-control" name="districtName" ng-model="input.districtName" ng-required="true">
                    <div ng-messages="form.districtName.$dirty && form.districtName.$error">  
                      <span class="text-danger" ng-message="required">
                        กรุณากรอกอำเภอ/เขต
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>จังหวัด</label>
                    <input type="text" class="form-control" name="cityName" ng-model="input.cityName" ng-required="true">
                    <div ng-messages="form.cityName.$dirty && form.cityName.$error">  
                      <span class="text-danger" ng-message="required">
                        กรุณากรอกจังหวัด
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" name="postCode" ng-model="input.postCode" ng-required="true">
                    <div ng-messages="form.postCode.$dirty && form.postCode.$error">  
                      <span class="text-danger" ng-message="required">
                        กรุณากรอกรหัสไปรษณีย์
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>เบอร์โทรศัพท์, เบอร์มือถือ</label>
                    <input type="text" class="form-control" name="telNo" ng-model="input.telNo" ng-required="true">
                    <div ng-messages="form.telNo.$dirty && form.telNo.$error">  
                      <span class="text-danger" ng-message="required">
                        กรุณากรอกเบอร์โทรศัพท์
                      </span>
                    </div>
                  </div>
                  <div class="col-md-6 form-group">
                    <label>อีเมล</label>
                    <input type="text" class="form-control" name="email" ng-model="input.email">
                  </div>
                  
                  <div class="col-md-6 form-group">
                    <label>บัญชี BBL</label>
                    <input type="text" class="form-control" name="bblNo" ng-model="input.bblNo"  ng-required="true">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>ชื่อ BBL (TH & EN)</label>
                    <input type="text" class="form-control" name="bblName" ng-model="input.bblName" ng-required="true">
                  </div>

                  <div class="col-md-12 form-group">
                    <label>จัดส่ง</label>
                    <input type="text" class="form-control" name="transportZoneDesc" ng-model="input.transportZoneDesc" ng-disabled="true" ng-required="true">
                  </div>
                  <div class="col-md-12 form-group">
                    <label>หมายเหตุ</label>
                    <textarea name="remark" ng-model="input.remark" class="form-control" rows="5"></textarea>
                  </div>
                </div>
              </div>
              <div class="panel-footer text-center">
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
@stop
@section('footer')
    <script src="<?= asset('app/controllers/customerController.js') ?>"></script>
@stop