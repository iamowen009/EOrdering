@extends('layouts.main')
@section('header')
<style>
	.bg-white{
		padding:50px 10px 10px 10px;
		background-color:#fff;
	}
	.panel-content{
		border:none;
	}
	.panel-store .panel-body{
		min-height:100px;
	}

</style>
@stop

@section('content')
	<div class="content bg-white">
		<!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
		<div class="row " ng-controller="CustomerController">
			<div class="col-md-12 col-sm-12 col-xs-12">

				<div class="panel-content panel panel-default">
                      <!-- <div class="panel-heading">ร้านค้าบนระบบ</div> -->
          <h2 class="text-center titlestore">ร้านค้าบนระบบ</h2><hr>
          <div class="panel-body">
            <br/>
						<p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-3x fa-spin"></span></p>
            <div class="row panel-store">

							<div class="col-md-12">
							  <div dir-paginate="customer in customers | itemsPerPage: 18" pagination-id="customer.customerId">
							    <div ng-class="{'clearfix': $index%6 === 0}"></div>
							    <div class="col-md-2 col-sm-2 col-xs-6">

							    	<div class="panel panel-default brickbg" style="min-height:185px;">
				                     <!--  <div class="panel-heading"></div> -->
				                      @verbatim
				                      <div class="panel-body text-center storename .h-100" ng-click="toHome(customer.customerId)">
				                        <br/>
										<label>{{ customer.customerCode }}</label>
										<p style="font-size:1.1em;"><a style="cursor: pointer;">{{ customer.customerName }}</a></p>
				                      </div>
				                      @endverbatim
				                    </div>

							    </div>
							  </div>
							</div>
							<div class="col-md-12">
								<dir-pagination-controls template-url="/template/dirPagination.tpl.html" pagination-id="customer.customerId"></dir-pagination-controls>
							</div>
          </div>
				</div>
                </div>
			</div>

		</div>
	</div>


	<div class="row"><div class="col-md-12 text-center">© 2017 TOA Print (Thailand).Co.,Ltd All Rights reserved</div></div>
@stop

@section('footer')
    <script src="<?= asset('app/controllers/customerController.js') ?>"></script>
@stop
