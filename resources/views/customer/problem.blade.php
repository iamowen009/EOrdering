@extends('layouts.main')

@section('content')
<div class="content" ng-controller="CustomerController" ng-init="fetchCustomer()">	
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <form name="form" ng-submit="sendProblem(form.$valid)" novalidate>
          <div class="panel">
            <div class="panel-heading text-center style-title">
              แจ้งปัญหา 
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label>แจ้งปัญหา</label>
                <textarea name="problemText" class="form-control" ng-model="input.problemText" rows="10" ng-required="true"></textarea>
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
@endsection
@section('footer')
    <script src="<?= asset('app/controllers/customerController.js') ?>"></script>
@stop