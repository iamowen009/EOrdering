@extends('layouts.main') @section('head')
<link rel="stylesheet" href="{{ asset('css/product.css') }}" /> @stop @section('content')
<div class="content">
  @verbatim
  <!-- LOADING ICON =============================================== -->
  <!-- show loading icon if the loading variable is set to true -->
  <div class="row " ng-controller="ProductController">

    <div class="col-md-3 sidedata">
      <div>
        <div class="panel-heading text-center" style="background-color:#80d8d8;color:#fff;font-size:14pt;">รายการสินค้า </div>
        <div class="category-home">
          <div class="mb-5">
            <strong style="padding:20px 0 15px 0;font-size:12pt;">กลุ่มผลิตภัณฑ์</strong>
            <a ng-click="clearMarketingFilter()" style="cursor: pointer;float:right;color:blue;">
              ล้างทั้งหมด
            </a>
          </div>
          <ul class="list-unstyled mt-10" style="font-size:0.95em">
            <li ng-repeat="marketing in marketings" value="{{marketing.marketingCode}}" style="padding-bottom:10px;">
              <label style="cursor: pointer;">
                <input type="checkbox" ng-checked="marketingCode.indexOf(marketing.marketingCode) > -1" ng-click="marketingSelection(marketing.marketingCode)"> {{ marketing.marketingDesc }}
              </label>
            </li>
          </ul>
        </div>
      </div>
      <hr>
      <div>
        <!--<div class="panel-heading text-center">แบรนด์</div>-->
        <div class="category-home ">
          <div class="mb-5">
            <strong style="padding:20px 0 15px 0;font-size:12pt;">แบรนด์</strong>
            <a ng-click="clearBrandFilter()" style="cursor: pointer;float:right;color:blue;">
              ล้างทั้งหมด
            </a>
          </div>
          <div class="menu-body mt-10">
            <ul class="list-unstyled" style="font-size:0.95em">
              <li ng-repeat="brand in brandsFilter" ng-if="brand.brandDesc != ''" value="{{brand.brandCode}}" style="padding-bottom:10px;">
                <!-- <input type="checkbox" ng-checked="brandCode.length > 0 && brandCode.indexOf(brand.brandCode) > -1" ng-click="brandSelection(brand.brandCode)">  -->
                <label style="cursor: pointer;">
                  <input type="checkbox" ng-checked="brandCode.indexOf(brand.brandCode) > -1" ng-click="brandSelection(brand.brandCode)"> {{ brand.brandDesc }}
                </label>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <hr />
      <div>
        <div class="category-home">
          <div class="mb-5">
            <strong style="padding:20px 0 15px 0;font-size:12pt;">ประเภท</strong>
              <a ng-click="clearTypeFilter()" style="cursor: pointer;float:right;color:blue;">
                ล้างทั้งหมด
              </a>
          </div>
          <div class="menu-body mt-10">
            <ul class="list-unstyled" style="font-size:0.95em">
              <!-- <li ng-repeat="type in typesFilter | unique:'typeDesc'" ng-if="type.typeDesc != ''" value="{{type.typeCode}}" style="padding-bottom:10px;"> -->
              <li ng-repeat="type in typesFilter | orderBy:'typeCode'" ng-if="type.typeDesc != ''" value="{{type.typeCode}}" style="padding-bottom:10px;">
                <label>
                  <input type="checkbox" ng-checked="typeCode.length > 0 && typeCode.indexOf(type.typeCode) > -1" ng-click="typeSelection(type.typeCode)"> 
                  {{type.typeCode}} {{ type.typeDesc }}
                </label>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <hr />
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
      <div class="panel-content panel panel-default">
        <form class="form-horizontal form-label-left">
          <div class="form-group" style="margin-bottom:0px;margin-top:0px;">
            <label class="col-md-12 col-sm-12 col-xs-12">
              <h4 class="mt-0 mb-0">{{marketingDesc}}
                <small>พบสินค้าจำนวน {{totalProduct}} รายการ</small>
              </h4>
            </label>
          </div>
          <div class="form-group" style="margin-bottom:0px;margin-top:0px;">
            <label class="col-md-1 col-sm-1 col-xs-12 mb-0">กรองจาก </label>
            <div class="col-md-10 col-sm-10 col-xs-12">
              <span style="margin-right:5px;" class="label label-info" ng-repeat="m in marketings" ng-show="getFilter(marketingCode,m.marketingCode).length>0">
                {{m.marketingDesc}}
                <!-- <a ng-if="m.marketingCode != marketingCode[0]" ng-click="marketingSelection(m.marketingCode)" calss="pull-right" style="color:white;" -->
                <a ng-click="marketingSelection(m.marketingCode)" calss="pull-right" style="color:white;"
                  href="">
                  <i class="fa fa-times text-danger"></i>
                </a>
              </span>
              <span style="margin-right:5px;" class="label label-info" ng-repeat="b in brandsFilter" ng-show="getFilter(brandCode,b.brandCode).length>0">{{b.brandDesc}}
                <a ng-click="brandSelection(b.brandCode)" calss="pull-right" style="color:white;" href="">
                  <i class="fa fa-times text-danger"></i>
                </a>
              </span>
              <span style="margin-right:5px;" class="label label-info" ng-repeat="t in typesFilter" ng-show="getFilter(typeCode,t.typeCode).length>0">{{t.typeDesc}}
                <a ng-click="typeSelection(t.typeCode)" calss="pull-right" style="color:white;" href="">
                  <i class="fa fa-times text-danger"></i>
                </a>
              </span>
            </div>
          </div>
        </form>
        <div>
          <!-- <h4>โปรโมชั่น</h4> -->
          <div class="row">
            <div class="media col-lg-6 col-md-6" ng-repeat="promotion in promotions" ng-show="promotion.marketingCode==marketingCode">
              <span class="media-left">
                <img ng-src="http://placehold.it/250x150" alt="..." ng-click="toPromotionList(promotion.promotionHdId)">
              </span>
              <div class="media-body" ng-click="toPromotionList(promotion.promotionHdId)">
                <h6 class="media-heading">{{ promotion.promotionName }}</h6>
                <div ng-bind-html="promotion.promotionDesc"></div>
              </div>
            </div>
          </div>
          <br/>
        </div>
        <div class="w100">
          <div class="text-center" ng-show="loading">
            <span class="fa fa-refresh fa-3x fa-spin"></span>
          </div>
          <div class="cui-ecommerce--catalog">
            <div class="row">
              <div class="col-md-3" dir-paginate="product in products | itemsPerPage: 12" pagination-id="product.id">
                <div class="cui-ecommerce--catalog--item">
                  <span class="favorite-icon" ng-click="(product.isFavorite) ? removeFav(product) : addFav(product)" ng-class="{'active': product.isFavorite}">
                    <i class="fa fa-star"></i>
                  </span>
                  <div class="cui-ecommerce--catalog--item--img">
                    <a href="javascript: void(0);" ng-click="toProductDetail(product.btf)">
                      <img ng-src="{{partImgProductList}}/{{product.btf}}.jpg" err-src="{{partImgProduct}}/Noimage.jpg" style="height:180px;" class="img-responsive img-product">
                    </a>
                  </div>
                  <div class="text-center product-desc">
                    <h5 class="ng-binding">{{product.btfWebDescTh}}</h5>
                    <br>
                    <span class="price ng-binding">{{product.productPrice}}</span>
                  </div>
                </div>
              </div>
            </div>
            <dir-pagination-controls template-url="/template/dirPagination.tpl.html" pagination-id="product.id">
            </dir-pagination-controls>
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
@stop @section('footer')

<script src="<?= asset('app/controllers/productController.js') ?>"></script>
@stop