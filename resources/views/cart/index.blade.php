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
  margin: 0px 40px 0px -40px;
}
.wizard > .actions {
    text-align: center;
}
.cui-wizard .actions li a:hover,
.cui-wizard .actions li a {
    background-color:#2184be;
    border-color: #2184be;
}
</style>
@stop

@section('content')

<section class="page-content" ng-controller="ProductCheckoutController" data-ng-init="init()">
@verbatim
<div class="page-content-inner">

    <!-- Ecommerce Cart / Checkout -->
    <section class="panel panel-with-borders">
        <div class="panel-heading">
            <h2>
                Cart / Checkout
            </h2>
        </div>
        <div class="panel-body">
            <div class="cui-ecommerce--cart">

              <div class="alert alert-warning" role="alert" ng-show="totalQty === 0">
                          Your cart is empty
              </div>

                <div id="cart-checkout" class="cui-wizard" ng-show="totalQty > 0">
                    <h3>
                        <i class="fa fa-shopping-cart cui-wizard--steps--icon"></i>
                        <span class="cui-wizard--steps--title">Cart</span>
                    </h3>
                    <section>
                      <h6>คุณมีสินค้าในตระกร้าจำนวน  {{ totalQty }} รายการ</h6>
                      <div class="table-responsive col-lg-12" ng-show="totalQty > 0">
                        <div class="invoice-block">
                            <table class="table table-hover text-right">
                                <thead class="thead-default">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">รหัสสินค้า</th>
                                        <th class="text-center">สินค้า</th>
                                        <th class="text-center" width="15%">จำนวน</th>
                                        <th class="text-center">หน่วย</th>
                                        <th class="text-right">ราคาหน่วย</th>
                                        <th class="text-right">ราคารวม</th>
                                        <th class="text-center">ลบ</th>
                                    </tr>
                                </thead>
                                <tfoot>

                                </tfoot>
                                <tbody>
                                <tr ng-repeat="item in carts track by $index">
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-center"><img class="img-product" src="{{partImgProduct}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{item.productCode}}</td>
                                    <td class="text-center">{{ item.productNameTh }}</td>
                                    <td class="text-right">
                                      <div class="input-group">
                                          <span class="input-group-btn">
                                                      <button type="button" class="btn btn-default" ng-click="removeQty(item)">-</button>
                                                </span>
                                          <input class="form-control ng-pristine ng-untouched ng-valid ng-empty"  type="text" value="{{ item.qty | number }}" ng-blur="updateCart(item)">
                                          <span class="input-group-btn">
                                                      <button type="button" class="btn btn-default" ng-click="addQty(item)">+</button>
                                                </span>

                                                <p class="text-center" ng-show="loadingcart"><span class="fa fa-refresh  fa-spin"></span></p>
                                      </div>
                                      <!--<span class="glyphicon glyphicon-minus" ng-class="{'disabled':item.qty==1}"
                                              ng-click="item.setQuantity(-1, true)"></span>
                                              <input class="form-control width-50" value="{{ item.qty | number }}" type="text">

                                        <span class="glyphicon glyphicon-plus" ng-click="item.setQuantity(1, true)"></span>-->
                                    </td>
                                    <td>{{item.unitNameTh}}</td>
                                    <td>{{ item.price | number:2}}</td>
                                    <td>{{ +item.price*+item.qty | number:2 }}</td>
                                    <td><a href=""><span ng-click="$event.preventDefault(); removeCart(item.productId)" class="fa fa-trash fa-2x"></span></a></td>
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

                    </div>
						            <!--<ngcart-summary template-url="/template/ngCart/total.html"></ngcart-summary>

                        <ngcart-cart></ngcart-cart>-->

                    </section>

                    <h3>
                        <i class="fa fa-credit-card cui-wizard--steps--icon"></i>
                        <span class="cui-wizard--steps--title">Shipment / Billing Info</span>
                    </h3>
                    <section>
                        <div class="x_panel">
                        <div class="x_title">
                          <h4>{{customer.customerCode}} {{customer.customerName}}</h4>

                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <br>
                          <form class="form-horizontal form-label-left" name="formcart">

                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">เลขที่ใบสั่งซื้อ :</label>
                                </div>
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">เลขที่ PO :</label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input class="form-control" type="input" ng-model="customerPO">
                                  </div>


                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">วันที่สั่งซื้อ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ cartDate }}</label>
                                </div>
                                <div class="form-group col-md-6" ng-if="customer.shipCondition=='01'">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">ขนส่งโดย :  </label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="checkbox-inline"><input type="checkbox" ng-click="pickUp()"  ng-model="shipCondition" name="shipCondition" value="รับเอง"> มารับเอง</label>
                                  </div>

                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">การชำระเงิน :</label>

                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="radio-inline"><input type="radio" name="optradio" ng-model="paymentTerm" value="CASH">เงินสด</label>
                                    <label class="radio-inline" ng-if="customer.paymentTerm !== 'CASH'"><input type="radio" name="optradio" ng-model="paymentTerm" value="{{ customer.paymentTerm }}">เครดิต</label>
                                  </div>
                                </div>
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">วันที่ต้องการ :</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select
                                        name="date_id" id="date_id"
                                        class="form-control"
                                        ng-model="ddlDate"
                                        ng-options="i as i.reqDate for i in requests track by i.reqDate | date:'dd/mm/yy'">
                                      </select>


                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-12"><!--<span ng-show="formcart.date_id.$error.required"><font color="red" size="2px">Required Field</font></span>--></div>

                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">ที่อยู่ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{customer.address}} {{customer.street}} {{customer.subDistrictName}} {{customer.districtName}} {{customer.cityName}}</label>

                                </div>
                                <div class="form-group col-md-6" ng-show="shippingType=='show'" ng-class="{true: 'error'}[submitted && formcart.ddlTransport.$invalid]">

                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">สถานที่ส่ง :</label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select
                                        name="ship_id" id="ship_id"
                                        class="form-control"
                                        ng-model="ddlShipTo"
                                        ng-change="changeShip(ddlShipTo.shipId)"
                                        ng-options="i as i.shipCode +' ' + i.shipName for i in ships track by i.shipCode">
                                        <!--
                                        <option value=''>Select</option>
                                        -->
                                      </select>{{ddlShipTo.shipCondition}}
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-12"><!--<span ng-show="formcart.ship_id.$error.required"><font color="red" size="2px">Required Field</font></span>--></div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">อีเมลล์ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ customer.email}}</label>

                                </div>
                                <div class="form-group col-md-6" ng-show="shippingType=='show'">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">ที่อยู่สถานที่ส่ง :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{shipaddress}}</label>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">เบอร์โทรศัพท์ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ customer.telNo }}</label>
                                </div>

                                <div class="form-group col-md-6"  ng-if="(ddlShipTo.shipCondition == '03' || ddlShipTo.shipCondition == '08') && shippingType=='show'">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">บริษัทขนส่ง : </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select
                                        name="trans_id" id="trans_id"
                                        class="form-control"
                                        ng-model="ddlTransport"
                                        ng-options="i as i.transportZone +' ' + i.transportZoneDesc for i in transports track by i.transportZone">

                                      </select>
                                  </div>
                                  <div class="col-md-3 col-sm-3 col-xs-12"><!-- <span ng-show="formcart.trans_id.$error.required"><font color="red" size="2px">Required Field</font></span> --></div>
                                </div>
                              </div>

                            </form>
                        </div>
                      </div>

                        <!--<div class="bg-gray">
                             <h4>{{customer.customerCode}} {{customer.customerName}}</h4>
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
                                    <td class="text-center"><img class="img-product" src="{{partImgProduct}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{item.productCode}}</td>
                                    <td class="text-center">{{ item.productNameTh }}</td>
                                    <td class="text-right">{{ item.qty | number }}
                                    </td>
                                    <td class="text-center">{{item.unitNameTh}}</td>
                                    <td>{{ item.price | number:2}}</td>
                                    <td>{{ +item.price*+item.qty | number:2 }}</td>

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



                    </section>

                    <h3>
                        <i class="fa fa-check cui-wizard--steps--icon"></i>
                        <span class="cui-wizard--steps--title">Confirmation</span>
                    </h3>
                    <section>
                      <div class="x_panel">
                        <div class="x_title">
                          <h4>{{customer.customerCode}} {{customer.customerName}}</h4>

                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <br>
                          <form class="form-horizontal">
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label for="email" class="col-md-3 col-sm-3 col-xs-12 text-right" >เลขที่ใบสั่งซื้อ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12"></label>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="pwd" class="col-md-3 col-sm-3 col-xs-12 text-right">เลขที่ PO :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{customerPO}}</label>

                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label for="email" class="col-md-3 col-sm-3 col-xs-12 text-right">วันที่สั่งซื้อ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ cartDate }}</label>
                                </div>
                                <div class="form-group col-md-6" ng-show="shipCondition">
                                  <label for="email" class="col-md-3 col-sm-3 col-xs-12 text-right">ขนส่งโดย :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{shipCondition === true ? 'รับสินค้าเอง' : ''}}</label>

                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label for="email" class="col-md-3 col-sm-3 col-xs-12 text-right">การชำระเงิน :</label>
                                  <label ng-show="paymentTerm==='CASH'" class="col-md-9 col-sm-9 col-xs-12">เงินสด</label>
                                  <label ng-show="paymentTerm!=='CASH'" class="col-md-9 col-sm-9 col-xs-12">เครดิต</label>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="pwd" class="col-md-3 col-sm-3 col-xs-12 text-right">วันที่ต้องการ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ddlDate.reqDate}}</label>

                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label for="pwd" class="col-md-3 col-sm-3 col-xs-12 text-right">ที่อยู่ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{customer.address}} {{customer.street}} {{customer.subDistrictName}} {{customer.districtName}} {{customer.cityName}}</label>

                                </div>
                                <div class="form-group col-md-6" ng-show="shippingType=='show'">
                                  <label for="email" class="col-md-3 col-sm-3 col-xs-12 text-right">สถานที่ส่ง :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ddlShipTo.shipName}}</label>

                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label for="pwd" class="col-md-3 col-sm-3 col-xs-12 text-right">อีเมลล์ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ customer.email}}</label>

                                </div>
                                <div class="form-group col-md-6" ng-show="shippingType=='show'">
                                  <label for="email" class="col-md-3 col-sm-3 col-xs-12 text-right">ที่อยู่สถานที่ส่ง :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{shipaddress}}</label>

                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label for="pwd" class="col-md-3 col-sm-3 col-xs-12 text-right">เบอร์โทรศัพท์ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ customer.telNo }}</label>
                                </div>
                                <div class="form-group col-md-6" ng-if="(ddlShipTo.shipCondition == '03' || ddlShipTo.shipCondition == '08') && shippingType=='show'">
                                  <label for="pwd" class="col-md-3 col-sm-3 col-xs-12 text-right">บริษัทขนส่ง :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ddlTransport.transportZoneDesc}}</label>
                                </div>
                              </div>
                            </form>
                        </div>
                      </div>

                        <!--<div class="bg-gray">
                             <h4>{{customer.customerCode}} {{customer.customerName}}</h4>
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
                                    <td class="text-center"><img class="img-product" src="{{partImgProduct}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{item.productCode}}</td>
                                    <td class="text-center">{{ item.productNameTh }}</td>
                                    <td class="text-right">{{ item.qty | number }}
                                    </td>
                                    <td class="text-center">{{item.unitNameTh}}</td>
                                    <td>{{ item.price | number:2}}</td>
                                    <td>{{ +item.price*+item.qty | number:2 }}</td>

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

                    </section>
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
<script src="<?= asset('app/controllers/productCheckoutController.js') ?>"></script>

@stop
