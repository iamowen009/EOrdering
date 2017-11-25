@extends('layouts.main')
@section('head')
<style>
.cui-ecommerce--catalog--item--img a .img-prod {
    min-height: 150px !important;
    max-width: 100%;
}
.cui-ecommerce--catalog--item--img {
    height: 170px !important;
}

</style>
@stop

@section('content')
<div class="content" ng-Controller="ProductHistoryController">
	@verbatim
	<div class="row ">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="panel">
            <!-- style="background-color:#000e85;color:#fff" -->
            <div class="panel-heading text-center style-title">สินค้าที่เคยสั่งซื้อ </div>
              <!--<div class="panel-heading text-center">สินค้าที่เคยสั่งซื้อ</div>-->
              <div class="">
              	<br>
				<div class="row">


                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 ng-scope" ng-repeat="fav in products">
                        <div class="cui-ecommerce--catalog--item"  ng-click="toProductDetail(fav.btf)">
                            <div class="cui-ecommerce--catalog--item--img">
                                <!--<div class="cui-ecommerce--catalog--item--status">
                                    <span class="cui-ecommerce--catalog--item--status--title">New</span>
                                </div>-->
                                <div class="cui-ecommerce--catalog--item--like cui-ecommerce--catalog--item--like__selected">
                                    <i class="icmn-heart3 cui-ecommerce--catalog--item--like--liked"><!-- --></i>
                                    <i class="icmn-heart4 cui-ecommerce--catalog--item--like--unliked"><!-- --></i>
                                </div>
                                <a href="javascript: void(0);">
                                    <img class="img-prod" src="{{partImgProductList}}/{{fav.btf}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg">
                                </a>
                            </div>
                            <div class="text-center">
                                <h6 class="ng-binding">{{fav.btfWebDescTh}}</h6>
                                <!--
                                <br>
                              -->
                                <span class="price ng-binding">{{fav.productPrice | number:2}}</span>
                            </div>
                        </div>
                    </div>


				</div>
			 </div>
			</div>
		</div>
	</div>
    @endverbatim
</div>

@section('footer')

    <script src="<?= asset('app/controllers/productHistoryController.js') ?>"></script>
@stop

@stop
