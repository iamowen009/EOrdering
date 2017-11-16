@extends('layouts.main')

@section('head')
<style>
.total_price{color:#00BFFF;}

select.form-control{
  height:auto !important;
}
.img-product{
  height: 50px;
  width: 50px;
}
</style>
@stop

@section('content')

<section class="page-content" ng-controller="CartSummaryController">
@verbatim
<div class="page-content-inner">

    <!-- Ecommerce Cart / Checkout -->
    <section class="panel panel-with-borders">
        <div class="panel-heading">
          <div class="page-title">
              <div class="title_left">
                <h3>รายละเอียดผู้สั่งซื้อ</h3>
              </div>

            </div>

        </div>
        <div class="panel-body">
            <div class="cui-ecommerce--cart">

              <div class="alert alert-warning" role="alert" ng-show="totalQty === 0">
                          Your cart is empty
                      </div>
                <p class="text-center" ng-show="loading"><span class="fa fa-refresh fa-3x fa-spin"></span></p>
                <div ng-show="totalQty > 0" class="cui-wizard">

                    <section>
                        <div class="x_panel">
                          <div class="x_title">
                            <h4>{{order.customerCode}} {{order.customerName}}</h4>

                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <br>
                            <form class="form-horizontal">
                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-4 text-right">เลขที่ใบสั่งซื้อ : </label>
                                <label class="col-md-8 text-left">{{order.documentNumber}}</label>
                              </div>
                              <div class="form-group col-md-6">
                              <label for="pwd" class="col-md-4 text-right">เลขที่ PO :</label>
                              <label class="col-md-8 text-left">{{order.customerPO}}</label>
                              </div>



                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-4 text-right">วันที่สั่งซื้อ :</label>
                                <label class="col-md-8 text-left">{{ order.documentDate }}</label>
                              </div>

                              <div class="form-group col-md-6" ng-show="order.shipCondition == '01'">
                                <label for="email" class="col-md-4 text-right">ขนส่งโดย :</label>
                                <label class="col-md-8 text-left">{{order.shipCondition === "01" ? 'รับสินค้าเอง' : ''}}</label>
                              </div>

<!--                                 
                              <div class="form-group col-md-6">
                              <label for="email" class="col-md-4 text-right">&nbsp;</label>
                                <label class="col-md-8 text-left"></label>
                              </div> -->

                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-4 text-right">การชำระเงิน :</label>
                                <label ng-show="order.paymentTerm==='CA02'" class="col-md-8 text-left">เงินสด</label>
                                <label ng-show="order.paymentTerm!=='CA02'" class="col-md-8 text-left">เครดิต</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="pwd" class="col-md-4 text-right">วันที่ต้องการ :</label>
                                <label class="col-md-8 text-left">{{order.requestDate}}</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="pwd" class="col-md-4 text-right">ที่อยู่ :</label>
                                <label class="col-md-8 text-left">{{order.address}} {{order.street}} {{order.subDistrictName}} {{order.districtName}} {{order.cityName}}</label>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="email" class="col-md-4 text-right">สถานที่ส่ง :</label>
                                <label class="col-md-8 text-left">{{order.shipName}}</label>
                              </div>

                              <div class="col-md-12">
                              <div class="form-group col-md-6">
                                <label for="pwd" class="col-md-4 text-right">อีเมลล์ :</label>
                                <label class="col-md-8 text-left">{{ customer.email}}</label>
                              </div>
                              <div class="form-group col-md-6" ng-hide="order.shipAddress === null || order.shipAddress === ''  ">
                                <label for="email" class="col-md-4 text-right" >ที่อยู่สถานที่ส่ง :</label>
                                <label class="col-md-8 text-left">{{order.shipAddress}}</label>
                              </div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="pwd" class="col-md-4 text-right">เบอร์โทรศัพท์ :</label>
                                <label class="col-md-8 text-left">{{ customer.telNo }}</label>
                              </div>

                              <div ng-show="customerInfo.isReceive==='1'" class="form-group col-md-6">
                                <label for="email" class="col-md-4 text-right">ขนส่งโดย :</label>
                                <label class="col-md-8 text-left">มารับเอง</label>
                              </div>
                              <div class="form-group col-md-6" ng-hide="order.transportZoneDesc === null || order.transportZoneDesc === '' ">
                                <label for="pwd" class="col-md-4 text-right">บริษัทขนส่ง :</label>
                                <label class="col-md-8 text-left">{{order.transportZoneDesc}}</label>
                              </div>
                              
                            </form>
                          </div>
                        </div>
                        <!--<div class="bg-gray">
                             <h6>{{order.customerCode}} {{order.customerName}}</h6>
                             <br>

                        </div>-->

                        <br/>


                        <h6>รายละเอียดสินค้าที่สั่งซื้อ</h6>

                        <!--<ngcart-cart></ngcart-cart>-->
                        <h6>คุณมีสินค้าในตระกร้าจำนวน  {{ totalQty }} รายการ</h6>

                      <div class="alert alert-warning" role="alert" ng-show="totalQty === 0">
                          Your cart is empty
                      </div>


                      <div class="table-responsive col-lg-12" ng-show="totalQty > 0">
                        <div class="invoice-block">
                            <table class="table table-hover text-right">
                                <thead class="thead-default">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">รหัสสินค้า</th>
                                        <th class="text-center">สินค้า</th>
                                        <th class="text-right">จำนวน</th>
                                        <th class="text-center">หน่วย</th>
                                        <th class="text-right">ราคาหน่วย</th>
                                        <th class="text-right">ราคารวม</th>
                                    </tr>
                                </thead>
                                <tfoot>

                                </tfoot>
                                <tbody>
                                <tr ng-repeat="item in carts track by $index">
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-center">
                                        <img class="img-product" src="{{partImgProduct + '/' + item.btf }}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg">
                                        {{item.productCode}}
                                    </td>
                                    <td class="text-center">{{ item.productNameTh }}</td>
                                    <td class="text-right">{{ item.qty | number }}
                                    </td>
                                    <td class="text-center">{{item.unitNameTh}}</td>
                                    <td>{{ item.amount | number:2}}</td>

                                    <td>{{ +item.amount*+item.qty | number:2 }}</td>

                                </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="text-right clearfix">
                            <div class="pull-right">
                                <!--<p>
                                    Sub - Total amount: <strong><span>$5,700.00</span></strong>
                                </p>
                                <p>
                                    VAT: <strong><span>$57.00</span></strong>
                                </p>-->
                                <p class="page-invoice-amount">
                                    <strong>ยอดรวมมูลค่าสินค้า(ไม่รวม VAT): <span class="total_price">{{ totalAmount | number:2 }}</span> บาท</strong>
                                </p>
                                <br>
                            </div>


                </div>

                <div class="col-md-12 text-center">
                  <button class="btn btn-primary" ng-click="toHome()">กลับสู่หน้าแรก</button>
                </div>
            </div>
        </div>
    </section>
    <!-- End Ecommerce Cart / Checkout -->

</div>

@endverbatim
</section>

@stop

@section('footer')
<script src="<?= asset('app/controllers/cartSummaryController.js') ?>"></script>

@stop
