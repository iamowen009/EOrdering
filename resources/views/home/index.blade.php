@extends('layouts.main') @section('head')
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
          <div class="mb-5">
            <strong style="padding:20px 0 15px 0;font-size:12pt;">กลุ่มผลิตภัณฑ์</strong>
          </div>
          <ul class="list-unstyled mt-10" style="font-size:0.95em">
            <li ng-repeat="marketing in marketings" value="{{marketing.marketingCode}}" style="padding-bottom:10px;">
              <label style="cursor: pointer;">
                <input type="checkbox" ng-checked="marketingCode.indexOf(marketing.marketingCode) > -1" ng-click="toProductList(marketing.marketingCode)"> 
                {{ marketing.marketingDesc }}
              </label>
            </li>
          </ul>
        </div>
      </div>
      <div class="icon-left">
        <a href="javascript:void(0);">
          <img class="img-icon" src="../images/icon-news.jpg" alt="..." onclick="window.location='../news'">
        </a>
        <a href="javascript:void(0);">
          <img class="img-icon" src="../images/icon-doc.jpg" alt="..." onclick="window.location='../documents'">
        </a>
        <a href="javascript:void(0);">
          <img class="img-icon" src="../images/icon-report.jpg" alt="..." onclick="window.location='../report'">
        </a>
        <a href="../assets/UserManual.pdf" target="_blank">
          <img class="img-icon" src="../images/icon-Usermanual.jpg" alt="..."> </a>

      </div>
    </div>
    <div class="col-md-9">
      <!--
                        start Slider
                        =========================================================================================================
                 -->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" style="background-image: url('{{slideshows1}}')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item" style="background-image: url('{{slideshows2}}')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item" style="background-image: url('{{slideshows3}}')">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!--
                            End Slider
                            =========================================================================================================
                     -->
      <div class="panel-content panel panel-default">
        <!-- <div class="panel-heading"></div> -->
        <div class="panel-body">
          <p class="text-center" ng-show="loading">
            <span class="fa fa-refresh fa-3x fa-spin"></span>
          </p>
          <form class="form-horizontal form-label-left">
            <div class="panel-heading text-center style-title" style="margin-bottom:10px;">โปรโมชั่น</div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">กลุ่มผลิตภัณฑ์</label>
              <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="selectgroup" ng-dropdown-multiselect="" options="marketings" selected-model="marketingmodel" checkboxes="true"></div>
              </div>
              <div class="col-md-2 col-sm-2 col-xs-2">
                <input type="button" class="btn btn-info" value="refresh" ng-click="update()">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12">
                พบโปรโมชั่นจำนวน {{totalPromotion}} รายการ
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="form-group">
              <div class="form-group" ng-show="marketingmodel.length>0">
                <label class="control-label col-md-2 col-sm-2 col-xs-12">กรองจาก </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <span style="margin-right:5px;" class="label label-info" ng-repeat="m in marketings" ng-show="getResult(m.id).length>0">
                    {{m.marketingDesc}}
                    <a ng-click="removeFilter(m.id)" style="color:white; cursor: pointer;">
                      <i class="fa fa-times"></i>
                    </a>
                  </span>
                </div>
              </div>

            </div>

          </form>
          <div class="clearfix"></div>
          <br/>
          <div class="row">
            <div id="carousel-01" class="col-md-4" ng-repeat="promotion in promotions">
              <div class="bd-pomo" ng-click="toPromotionList(promotion.promotionId)" style="cursor: pointer;">
                <img ng-src="{{partImgPromotion + '/' + promotion.promotionImage}}" alt="..." ng-click="toPromotionList(promotion.promotionId)"
                  style="width:100%; height:200px;cursor: pointer;">
                <div style="padding:4px; height:86px; overflow:hidden;">
                  {{ promotion.promotionCode }}
                  <br /> {{ promotion.promotionName }}
                </div>
              </div>
            </div>
          </div>
          <div ng-repeat="marketing in marketings">
            <!--  <h6><span class="fa fa-arrow-down"></span> {{ marketing.marketingDesc }}</h6> -->
            <div class="row">
              <div id="carousel-02" class="media col-lg-6 col-md-6" ng-repeat="promotion in promotions" ng-show="promotion.marketingCode==marketing.marketingCode">
                <span class="media-left">
                  <img src="http://placehold.it/250x150" alt="..." ng-click="toPromotionList(promotion.promotionId)" style="cursor: pointer;">
                </span>
                <div class="media-body" ng-click="toPromotionList(promotion.promotionId)" style="cursor: pointer;">
                  <h6 class="media-heading">{{ promotion.promotionName }}</h6>
                  <div ng-bind-html="promotion.promotionDesc"></div>
                </div>
              </div>
            </div>
            <br/>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endverbatim
</div>
<div class="row">
  <div class="col-md-12 text-center">@ 2017 TOA Paint (Thailand) Public Company Limited. All Right Reserved.</div>
</div>
@stop 
@section('footer')

<script src="<?= asset('app/controllers/homeController.js') ?>"></script>
@stop