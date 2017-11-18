@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="{{ asset('css/home.css') }}" />
@stop

@section('content')
	<div class="content">
		@verbatim
		<!-- LOADING ICON =============================================== -->
    	<!-- show loading icon if the loading variable is set to true -->
		<div class="row " ng-controller="HomeController">
			<div class="col-md-3 sidedata">
					<div>
              <div class="panel-heading text-center" style="background-color:#80d8d8;color:#fff;font-size:14pt;">รายการสินค้า </div>
              <div class="category-home">
                  <ul class="list-unstyled user_data" style="font-size:0.95em">
                    	<li ><strong>กลุ่มผลิตภัณฑ์</strong></li>
	                    <li ng-repeat="marketing in marketings" value="{{marketing.marketingCode}}" style="padding-bottom:10px;">
	                     		<p class="title"><input type="checkbox" ng-click="toProductList(marketing.marketingCode)"> {{ marketing.marketingDesc }}</p>
											</li>
	                 </ul>
               </div>
          </div>
          <div class="icon-left">
                <a href="javascript:void(0);"><img class="img-icon" src="../images/icon-news.jpg" alt="..." onclick="window.location='../news'"></a>
								<a href="javascript:void(0);"><img class="img-icon" src="../images/icon-doc.jpg" alt="..." onclick="window.location='../documents'"></a>
								<a href="javascript:void(0);"><img class="img-icon" src="../images/icon-report.jpg" alt="..." onclick="window.location='../report'"></a>
								<a href="../assets/UserManual.pdf" target="_blank"><img class="img-icon" src="../images/icon-Usermanual.jpg" alt="..."> </a>
					</div>
			</div>
			<div class="col-md-9" ng-model="homeLayout">
					<div ng-include="templateURL"></div>
			</div>
	</div>
	<!-- Modal -->
  <div class="modal right fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
      <div class="modal-dialog" role="document">
        	<div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel2">ตะกร้าของฉัน</h4>
              </div>
              <div class="modal-body">
                  <ul>
                      <li ng-repeat="cart in carts">
                          <p>{{cart.productCode}}</p>
                      </li>
                  </ul>
              </div>
          </div><!-- modal-content -->
      </div><!-- modal-dialog -->
  </div><!-- modal -->
	@endverbatim
</div>
<div class="row"><div class="col-md-12 text-center">© 2017 TOA Print (Thailand).Co.,Ltd All Rights reserved</div></div>
@stop

@section('footer')

    <script src="<?= asset('app/controllers/homeController.js') ?>"></script>
@stop
