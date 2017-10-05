@extends('layouts.main')

@section('head')
<style>
select.form-control{
	height:auto !important;
}
</style>
@stop
@section('content')
	<div class="row " ng-controller="ReportController">
		@verbatim
		<div class="col-md-3 col-sm-3 col-xs-12">
			<div class="panel">
				<div class="panel-heading text-center" style="background-color:#000e85;color:#fff">รายงาน </div>
                  <!--<div class="panel-heading text-center">รายงาน</div>-->
                  <div >
						<ul class="list-group" style="cursor:pointer;">
							<li class="list-group-item" ng-click="report_sale()">On sales Total and non-Dec Report</li>
							<li class="list-group-item" ng-click="report_achieve()">% Achieve (Active Stop) Report</li>
							<li class="list-group-item" ng-click="report_show()">New Shop Report</li>
							<li class="list-group-item" ng-click="report_summary()">Sales Summary Report</li>
						</ul>
                  </div>
            </div>
			
		</div>
		<div class="col-md-9 col-sm-3 col-xs-12">
			<div class="panel">
				<div class="panel-heading text-center" style="background-color:#000e85;color:#fff">{{title_report}} </div>
                  <!--<div class="panel-heading text-center">{{title_report}}</div>-->
                  <div class="panel-body">
						<div class="col-md-3">
							<select id="sales_group" class="form-control">
								<option value="">Sales Group</option>
								<option value="{{salegroup.saleGroupId}}" ng-repeat="salegroup in salegroups">{{salegroup.saleGroupCode}} {{salegroup.saleGroupName}}</option>
							</select>
						</div>
						<div class="col-md-3">
							<select id="customer_area" class="form-control"><option value="">Customer Area</option>
								<option value="{{customerarea.customerAreaId}}" ng-repeat="customerarea in customerareas">{{customerarea.customerAreaCode}} {{customerarea.customerAreaName}}</option>
							</select>
						</div>
						<div class="col-md-3">
							<select id="year" class="form-control"><option value="">Year</option></select>
						</div>
						<div class="col-md-3">
							<select id="month" class="form-control"><option value="">Month</option></select>
						</div>
						<br/><br/>
						<div class="text-center">
							<button class="btn btn-info">Preview</button>
							<button class="btn btn-default">Cancel</button>
							<button class="btn btn-default">Export Excel</button>
						</div>
                  </div>
            </div>
		</div>

		
	</div>


	@endverbatim
@stop

@section('footer')
	
    <script src="<?= asset('app/controllers/reportController.js') ?>"></script>
@stop