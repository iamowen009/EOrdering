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
<div class="content" ng-Controller="FavoriteController">
  @verbatim
  <div class="row ">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="panel">
        <!-- background-color:#000e85;color:#fff -->
        <div class="panel-heading text-center style-title">รายการโปรด</div>
        <!--<div class="panel-heading text-center">รายการโปรด</div>-->
        <div class="panel-body">
          <br>
          <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 ng-scope" ng-repeat="fav in favorites">
              <div class="cui-ecommerce--catalog--item">
                <span class="favorite-icon" ng-click="removeFav(fav, $index)" ng-class="{'active': fav.isFavorite}">
                  <i class="fa fa-star"></i>
                </span>
                <div class="cui-ecommerce--catalog--item--img">
                  <!--<div class="cui-ecommerce--catalog--item--status">
                                    <span class="cui-ecommerce--catalog--item--status--title">New</span>
                                </div>-->
                  <div class="cui-ecommerce--catalog--item--like cui-ecommerce--catalog--item--like__selected">
                    <i class="icmn-heart3 cui-ecommerce--catalog--item--like--liked">
                      <!-- -->
                    </i>
                    <i class="icmn-heart4 cui-ecommerce--catalog--item--like--unliked">
                      <!-- -->
                    </i>
                  </div>
                  <a href="javascript: void(0);">
                    <img class="img-prod" ng-src="{{partImgProductDetail}}/{{fav.btf}}.jpg" err-src="{{partImgProduct}}/Noimage.jpg" ng-click="toProductDetail(fav.btf)">
                  </a>
                </div>
                <div class="text-center">
                  <h6 class="ng-binding">{{fav.btfWebDescTh}}</h6>
                  <br>
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
@stop
@section('footer')
<script src="<?= asset('app/controllers/favoriteController.js') ?>"></script>
@stop 