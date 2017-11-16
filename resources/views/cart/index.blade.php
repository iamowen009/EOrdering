@extends('layouts.main')

@section('head')
<style>
.total_price{color:#00BFFF;font-size: 18px;}

select.form-control{
  height: 34px !important;
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
  <input type="hidden" ng-model="customers" />
    <!-- Ecommerce Cart / Checkout -->
    <section class="panel panel-with-borders">
        <!-- <div class="panel-heading">
            <h2>
                Cart / Checkout
            </h2>
        </div> -->
        <div class="panel-body">
            <div class="cui-ecommerce--cart">

              <div class="alert alert-warning" role="alert" ng-show="carts.length === 0">
                          Your cart is empty
              </div>

                <div id="cart-checkout" class="cui-wizard" ng-show="carts.length > 0">
                    <h3>
                        <i class="fa fa-shopping-cart cui-wizard--steps--icon"></i>
                        <span class="cui-wizard--steps--title">Cart</span>
                    </h3>
                    <section>
                      <h6>คุณมีสินค้าในตระกร้าจำนวน  {{ carts.length | number }} รายการ</h6>
                      <div class="table-responsive col-lg-12" ng-show="carts.length > 0">
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
                                <tbody ng-repeat="item in carts track by $index">
                                <tr>
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-center"><img class="img-product" src="{{partImgProductOrder}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{item.productCode}}</td>
                                    <td class="text-center">{{ item.productNameTh }}</td>
                                    <td class="text-right">
                                      <div class="input-group">
                                          <span class="input-group-btn">
                                              <button type="button" class="btn btn-default" ng-click="removeQty(item)">-</button>
                                          </span>
                                          <input class="form-control ng-pristine ng-untouched ng-valid ng-empty"  type="text" value="{{ item.qty }}" ng-blur="updateCart($index)" ng-model="item.qty" numbers-only >
                                          <span class="input-group-btn">
                                              <button type="button" class="btn btn-default" ng-click="addQty(item)">+</button>
                                          </span>
                                          <p class="text-center" ng-show="loadingcart[$index]"><span class="fa fa-refresh  fa-spin"></span></p>
                                      </div>
                                      <!--
                                      <span class="glyphicon glyphicon-minus" ng-class="{'disabled':item.qty==1}"
                                              ng-click="item.setQuantity(-1, true)"></span>
                                              <input class="form-control width-50" value="{{ item.qty | number }}" type="text">

                                        <span class="glyphicon glyphicon-plus" ng-click="item.setQuantity(1, true)"></span>
                                      -->
                                    </td>
                                    <td>{{item.unitNameTh}}</td>
                                    <td>{{ item.price | number:2}}</td>
                                    <td>{{ +item.price*+item.qty | number:2 }}</td>
                                    <td><a href=""><span ng-click="$event.preventDefault(); removeCart(item.productId)" class="fa fa-trash fa-2x"></span></a></td>
                                </tr>
                                <tr ng-repeat="bom in boms track by $index" ng-if="bom.productRefCode == item.productCode">
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-center"><img class="img-product" src="{{partImgProductOrder}}/{{bom.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{bom.productCode}}</td>
                                    <td class="text-center">{{ bom.productNameTh }}</td>
                                    <td class="text-right">
                                      <div class="input-group">
                                          <span class="input-group-btn">
                                              <button type="button" class="btn btn-default disabled">-</button>
                                          </span>
                                          <input class="form-control ng-pristine ng-untouched ng-valid ng-empty disabled"  type="text" value="{{ item.qty }}" disabled ng-model="item.qty" numbers-only >
                                          <span class="input-group-btn">
                                              <button type="button" class="btn btn-default disabled">+</button>
                                          </span>
                                          <p class="text-center" ng-show="loadingcart[$index]"><span class="fa fa-refresh  fa-spin"></span></p>
                                      </div>
                                    </td>
                                    <td>{{item.unitNameTh}}</td>
                                    <td>{{ bom.price | number:2}}</td>
                                    <td>{{ +bom.price*+item.qty | number:2 }}</td>
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
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input class="form-control" type="input" ng-model="customerPO">
                                  </div>


                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">วันที่สั่งซื้อ :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ cartDate }}</label>
                                </div>
                                <div class="form-group col-md-6" ng-if="customer.isReceive ===true">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">ขนส่งโดย :  </label>
                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="checkbox-inline"><input type="checkbox" ng-click="pickUp(shipCondition)"  ng-model="shipCondition" name="shipCondition" value="01"> มารับเอง</label>
                                  </div>

                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">การชำระเงิน :</label>

                                  <div class="col-md-9 col-sm-9 col-xs-12">
                                    <label class="radio-inline">
                                      <input type="radio" name="optradio" ng-model="paymentTerm" ng-change="changePay( ( customer.paymentTerm == 'CA02' || customer.paymentTerm =='CASH') ? customer.paymentTerm : 'CASH')" value="{{ ( customer.paymentTerm == 'CA02' || customer.paymentTerm =='CASH') ? customer.paymentTerm : 'CASH'}}">เงินสด</label>
                                    <label class="radio-inline" ng-if="customer.paymentTerm !== 'CASH' && customer.paymentTerm !='CA02'">
                                      <input type="radio" name="optradio" ng-model="paymentTerm" value="{{ customer.paymentTerm }}" ng-change="changePay(customer.paymentTerm)">เครดิต</label>
                                  </div>
                                </div>
                                <div class="form-group col-md-6">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Request Date :</label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">

                                    <select
                                        name="date_id" id="date_id"
                                        class="form-control"
                                        ng-model="ddlDate"
                                        ng-options="i as i.reqDate for i in requests track by i.reqDate | date:'dd/mm/yy'">
                                        <option value=''></option>
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
                                <div class="form-group col-md-6" ng-show="shippingType=='show' " ng-class="{true: 'error'}[submitted && formcart.ddlTransport.$invalid]">

                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">สถานที่ส่ง :</label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">
                                    <select
                                        name="ship_id" id="ship_id"
                                        class="form-control"
                                        ng-model="ddlShipTo"
                                        ng-change="changeShip(ddlShipTo.shipId)"
                                        ng-options="i as i.shipCode +' ' + i.shipName for i in ships track by i.shipCode">
                                        <option value=''></option>
                                      </select>
<!-- {{ ddlShipTo.shipCondition }} -->
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

                                <!-- <div class="form-group col-md-6"  ng-if="(ddlShipTo.shipCondition == '03' || ddlShipTo.shipCondition == '08' || customer.shipCondition == '03') && shippingType=='show'"> -->
                                <div class="form-group col-md-6"  ng-if="(ddlShipTo.shipCondition == '03'  || customer.shipCondition == '03') && shippingType=='show'">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12">บริษัทขนส่ง : </label>
                                  <div class="col-md-8 col-sm-8 col-xs-12">

                                    <select
                                        ng-if="( ddlShipTo.shipCondition == '03' || customer.shipCondition == '03' ) && transports.length > 0"
                                        name="trans_id" id="trans_id"
                                        class="form-control"
                                        ng-model="ddlTransport"
                                        ng-change="changeTransport(ddlTransport)"
                                        ng-options="i as i.transportZone +' ' + i.transportZoneDesc for i in transports track by i.transportZone">
                                        <option value=''></option>
                                      </select>
                                    
                                    <select
                                        ng-if="transports.length == 0 && ( ddlShipTo.shipCondition == '03' || customer.shipCondition == '03' )"
                                        name="trans_id" id="trans_id"
                                        class="form-control"
                                        ng-model="ddlTransport"
                                        ng-change="changeTransport(ddlTransport)"
                                        >
                                        <option value=''></option>
                                        <option value="{{ddlShipTo.transportZone}}">
                                          {{ddlShipTo.transportZone +' ' + ddlShipTo.transportZoneDesc}}
                                        </option>
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
                <div class="col-md-12"><h6>รายละเอียดสินค้าที่สั่งซื้อ</h6></div>
                        

                        <!--<ngcart-cart></ngcart-cart>-->
                <div class="col-md-12"><h6>คุณมีสินค้าในตระกร้าจำนวน  {{ carts.length | number }} รายการ</h6></div>
                        

                      <div class="alert alert-warning" role="alert" ng-show="carts.length === 0">
                          Your cart is empty
                      </div>


                      <div class="table-responsive col-lg-12" ng-show="carts.length > 0">
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
                                <tbody ng-repeat="item in carts track by $index">
                                <tr>
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-center"><img class="img-product" src="{{partImgProductOrder}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{item.productCode}}</td>
                                    <td class="text-center">{{ item.productNameTh }}</td>
                                    <td class="text-right">{{ item.qty | number }}
                                    </td>
                                    <td class="text-center">{{item.unitNameTh}}</td>
                                    <td>{{ item.price | number:2}}</td>
                                    <td>{{ +item.price*+item.qty | number:2 }}</td>

                                </tr>
                                <tr ng-repeat="bom in boms track by $index" ng-if="bom.productRefCode == item.productCode">
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-center"><img class="img-product" src="{{partImgProductOrder}}/{{bom.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{bom.productCode}}</td>
                                    <td class="text-center">{{ bom.productNameTh }}</td>
                                    <td class="text-right">{{ item.qty }}</div>
                                    </td>
                                    <td>{{item.unitNameTh}}</td>
                                    <td>{{ bom.price | number:2}}</td>
                                    <td>{{ +bom.price*+item.qty | number:2 }}</td>
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
                                  <label ng-show="paymentTerm==='CASH' || paymentTerm ==='CA02'" class="col-md-9 col-sm-9 col-xs-12">เงินสด</label>
                                  <label ng-show="paymentTerm!=='CASH' && paymentTerm !=='CA02'" class="col-md-9 col-sm-9 col-xs-12">เครดิต</label>
                                </div>
                                <div class="form-group col-md-6">
                                  <label for="pwd" class="col-md-3 col-sm-3 col-xs-12 text-right">Request Date :</label>
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
                                <div class="form-group col-md-6" ng-if="(ddlShipTo.shipCondition == '03') && shippingType=='show'">
                                  <label for="pwd" class="col-md-3 col-sm-3 col-xs-12 text-right">บริษัทขนส่ง :</label>
                                  <label class="col-md-9 col-sm-9 col-xs-12">{{ddlShipTo.shipCondition == '08' ? ddlShipTo.transportZone + ' ' + ddlShipTo.transportZoneDesc : ddlTransport.transportZone}} {{ddlTransport.transportZoneDesc}}</label>
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
                        <h6>คุณมีสินค้าในตระกร้าจำนวน  {{ carts.length | number }} รายการ</h6>

                      <div class="alert alert-warning" role="alert" ng-show="carts.length === 0">
                          Your cart is empty
                      </div>


                      <div class="table-responsive col-lg-12" ng-show="carts.length > 0">
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
                                <tbody ng-repeat="item in carts track by $index">
                                <tr>
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-center"><img class="img-product" src="{{partImgProductOrder}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{item.productCode}}</td>
                                    <td class="text-center">{{ item.productNameTh }}</td>
                                    <td class="text-right">{{ item.qty | number }}
                                    </td>
                                    <td class="text-center">{{item.unitNameTh}}</td>
                                    <td>{{ item.price | number:2}}</td>
                                    <td>{{ +item.price*+item.qty | number:2 }}</td>

                                </tr>
                                <tr ng-repeat="bom in boms track by $index" ng-if="bom.productRefCode == item.productCode">
                                    <td class="text-center">{{$index+1}}</td>
                                    <td class="text-center"><img class="img-product" src="{{partImgProductOrder}}/{{bom.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{bom.productCode}}</td>
                                    <td class="text-center">{{ bom.productNameTh }}</td>
                                    <td class="text-right">{{ item.qty }}</td>
                                    <td>{{item.unitNameTh}}</td>
                                    <td>{{ bom.price | number:2}}</td>
                                    <td>{{ +bom.price*+item.qty | number:2 }}</td>
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
