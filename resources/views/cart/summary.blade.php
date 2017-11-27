@extends('layouts.main') 
@section('head')
<style>
  .total_price {
    color: #00BFFF;
  }

  select.form-control {
    height: auto !important;
  }

  .img-product {
    height: 50px;
    width: 50px;
  }
</style>
<link rel="stylesheet" href="<?= asset('css/cart-index.css') ?>"/>

@stop 
@section('content')
<section class="page-content" ng-controller="CartSummaryController">
@verbatim
<div class="page-content-inner">
  <section class="panel panel-with-borders">
    <div class="panel-body">
      <div class="cui-ecommerce--cart">
        <h3 class="text-bold mt-20 mb-20">
          รายละเอียดผู้สั่งซื้อ
        </h3> 
        <div class="alert alert-warning text-bold" ng-show="carts.length === 0">
          ไม่มีสินค้าในตะกร้า
        </div>
        <section>
        <div class="x_panel">
          <div class="x_title">
            <h4 class="text-bold mb-5 pl-10">{{customer.customerCode}} : {{customer.customerName}}</h4>
          </div>
          <div class="x_content">
            <div class="form-horizontal pr-15 pt-30 pb-10">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-4 text-right">
                      เลขที่ใบสั่งซื้อ : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      {{ order.documentNumber }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 text-right">
                      วันที่สั่งซื้อ : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      {{ order.documentDate }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 text-right">
                      การชำระเงิน : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      <span ng-show="order.paymentTerm==='CASH' || order.paymentTerm ==='CA02'">เงินสด</span>
                      <span ng-show="order.paymentTerm!=='CASH' && order.paymentTerm !=='CA02'">เครดิต</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 text-right">
                      ที่อยู่ : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      {{ order.address }} {{ order.street }} {{ order.subDistrictName }} <br> 
                      {{ order.districtName }} {{ order.cityName }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 text-right">
                      อีเมล : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      {{ customer.email }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 text-right">
                      โทรศัพท์ : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      {{ customer.telNo }}
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-4 text-right">
                      PO Number : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      {{ order.customerPO }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 text-right">
                      Request Date : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      {{ order.requestDate }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 text-right">
                      สถานที่ส่ง : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      {{ order.shipName }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4 text-right">
                      ที่อยู่สถานที่ส่ง : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      {{ shipaddress }}
                    </div>
                  </div>
                  <div class="form-group" ng-if="(order.shipCondition == '03'  || customer.shipCondition == '03') && order.shippingType=='show'">
                    <label class="control-label col-md-4 text-right">
                      จัดส่งโดย : 
                    </label>
                    <div class="col-md-8 form-control-static">
                      {{ order.shipCondition == '08' ? order.transportZone + ' ' + order.transportZoneDesc : objTransport.transportZone }}
                      {{ objTransport.transportZoneDesc }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="w100">
          <h5>รายละเอียดสินค้าที่สั่งซื้อ &nbsp; คุณมีสินค้าในตระกร้าจำนวน
            <strong>{{ totalQty }}</strong> รายการ
          </h5>
        </div>
        <table class="table mt-15" ng-show="carts.length != 0">
          <thead class="thead-default">
            <tr>
              <th></th>
              <th class="text-center">รหัสสินค้า</th>
              <th class="text-center">สินค้า</th>
              <th class="text-center">จำนวน</th>
              <th class="text-center">หน่วย</th>
              <th class="text-right">ราคาต่อหน่วย</th>
              <th class="text-right">ราคารวม</th>
            </tr>
          </thead>
          <tbody ng-repeat="item in carts track by $index">
            <tr ng-if="item.isBOM == true" class="text-bold">
              <td align="center">
                <img width="50" ng-src="{{partImgProductOrder}}/{{item.btfWeb}}.jpg" err-SRC="{{ partImgProduct }}/Noimage.jpg">
              </td>
              <td align="center" style="line-height: 50px;">
                {{ item.productCode }}
              </td>
              <td style="line-height: 50px;">
                {{ item.productNameTh }}
              </td>
              <td align="center" style="line-height: 50px;">
                <span ng-if="bomRows(item.productCode) == 0">
                  {{ item.qty | number }}
                </span>
              </td>
              <td align="center" style="line-height: 50px;">
                <span ng-if="bomRows(item.productCode) == 0">
                  {{ item.unitNameTh }}
                </span>
              </td>
              <td align="right" style="line-height: 50px;">
                <span ng-if="bomRows(item.productCode) == 0" >
                  {{ item.amount | number:2 }}
                </span>
              </td>
              <td align="right" style="line-height: 50px;">
                <span ng-if="bomRows(item.productCode) == 0">
                {{ +item.amount*+item.qty | number:2 }}
                </span>
              </td>
            </tr>
            <tr ng-hide="item.isBOM == true">
              <td align="center">
                <img width="50" ng-src="{{partImgProductOrder}}/{{item.btfWeb}}.jpg" err-SRC="{{ partImgProduct }}/Noimage.jpg">
              </td>
              <td align="center" style="line-height: 50px;">
                {{ item.productCode }}
              </td>
              <td style="line-height: 50px;">
                {{ item.productNameTh }}
              </td>
              <td align="center" style="line-height: 50px;">
                <span ng-if="bomRows(item.productCode) == 0">
                  {{ item.qty | number }}
                </span>
              </td>
              <td align="center" style="line-height: 50px;">
                <span ng-if="bomRows(item.productCode) == 0">
                  {{ item.unitNameTh }}
                </span>
              </td>
              <td align="right" style="line-height: 50px;">
                <span ng-if="bomRows(item.productCode) == 0" >
                  {{ item.amount | number:2 }}
                </span>
              </td>
              <td align="right" style="line-height: 50px;">
                <span ng-if="bomRows(item.productCode) == 0">
                {{ +item.amount*+item.qty | number:2 }}
                </span>
              </td>
            </tr>
            <tr ng-repeat="bom in boms track by $index" ng-if="bom.productRefCode == item.productCode">
              <td align="center">
                  <!-- <img width="50" ng-src="{{ partImgProductOrder }}/{{ bom.btfCode }}.jpg" err-src="{{ partImgProduct }}/Noimage.jpg">
                </td> -->
                <td align="center" style="line-height: 50px;">
                  {{ bom.productCode }}
                </td>
                <td style="line-height: 50px;">
                  {{ bom.productNameTh }}
                </td>
                <td align="center" style="line-height: 50px;">
                  {{ item.qty | number }}
                </td>
                <td align="center" style="line-height: 50px;">
                  <span ng-if="bomRows(bom.productCode) == 0">
                    {{ bom.unitNameTh }}
                  </span>
                </td>
                <td align="right" style="line-height: 50px;">
                  <span ng-if="bomRows(bom.productCode) == 0" >
                    {{ bom.price | number:2 }}
                  </span>
                </td>
                <td align="right" style="line-height: 50px;">
                  <span ng-if="bomRows(bom.productCode) == 0">
                    {{ +bom.price*+item.qty | number:2 }}
                  </span>
                </td>
              </tr>  
            </tr>
          </tbody>
        </table>
        <div class="w100 text-right">
          <strong>
            ยอดรวมมูลค่าสินค้า (ไม่รวม VAT) :
            <span class="total_price">{{ totalAmount | number:2 }}</span> บาท
          </strong>
        </div>
        <div class="w100 text-center mt-30 mb-20">
          <button class="btn btn-primary" ng-click="toHome()">กลับสู่หน้าแรก</button>
        </div>
      </div>
        </section>
      </div>
    </div>
  </section>
</div>
@endverbatim
@stop 
@section('footer')
<script src="<?= asset('app/controllers/cartSummaryController.js') ?>"></script>
@stop