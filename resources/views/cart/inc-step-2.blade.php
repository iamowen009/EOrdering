@verbatim
<h3>
    <i class="fa fa-credit-card cui-wizard--steps--icon"></i>
    <span class="cui-wizard--steps--title">Shipment / Billing Info</span>
</h3>
<section>
    <div class="x_panel">
    <div class="x_title">
      <h4>{{customer.customerCode}} : {{customer.customerName}}</h4>

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
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Request Date:</label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <!--
                <select
                    name="date_id" id="date_id"
                    class="form-control"
                    ng-model="ddlDate"
                    ng-options="i as i.reqDate for i in requests track by i.reqDate | date:'dd/mm/yy'">
                    <option value=''></option>
                  </select>
                -->
                <select name="date_id" id="date_id" class="form-control" ng-model="ddlDate">
                  <option value="" disabled>
                    = เลือก Request Date =
                  </option>
                  <option ng-repeat="i in requests" ng-value="i">
                    {{ i.reqDate | date:'dd/mm/yy' }}
                  </option>
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
                <!-- <select
                    name="ship_id" id="ship_id"
                    class="form-control"
                    ng-model="ddlShipTo"
                    ng-change="changeShip(ddlShipTo.shipId)"
                    ng-options="i as i.shipCode +' ' + i.shipName for i in ships track by i.shipCode">
                    <option value=''></option>
                  </select> -->
<!-- {{ ddlShipTo.shipCondition }} -->
                <select name="ship_id" id="ship_id" class="form-control" ng-model="ddlShipTo" ng-change="changeShip(ddlShipTo.shipId)">
                  <option value="" disabled>
                    = เลือกสถานที่ส่ง =
                  </option>
                  <option ng-repeat="i in ships" ng-value="i" ng-selected="ddlShipTo == i">
                    {{ i.shipCode + ' ' + i.shipName }}
                  </option>
                </select>
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
              <label class="col-md-9 col-sm-9 col-xs-12 form-control-static">{{shipaddress}}</label>
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
                <!--
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
                -->
                <select 
                  ng-if="( ddlShipTo.shipCondition == '03' || customer.shipCondition == '03' ) && transports.length > 0" 
                  name="trans_id"
                  id="trans_id" 
                  class="form-control" 
                  ng-model="ddlTransport" 
                  ng-change="changeTransport(ddlTransport)">
                  <option value="" disabled>
                    = เลือกบริษัทขนส่ง =
                  </option>
                  <option ng-repeat="i in transports" ng-value="i" ng-selected="ddlTransport == i">
                    {{ i.transportZone + ' ' + i.transportZoneDesc }}
                  </option>
                </select>
                <select 
                  ng-if="transports.length == 0 && ( ddlShipTo.shipCondition == '03' || customer.shipCondition == '03' )" 
                  name="trans_id"
                  id="trans_id" 
                  class="form-control" 
                  ng-model="ddlTransport" 
                  ng-change="changeTransport(ddlTransport)">
                  <option value="" disabled>
                    = เลือกบริษัทขนส่ง =
                  </option>
                  <!-- ng-options="i as i.transportZone +' ' + i.transportZoneDesc for i in transports track by i.transportZone" -->
                  <option ng-repeat="i in transports" ng-value="i.transportZone" ng-selected="ddlTransport == i.transportZone ">
                    {{ i.transportZone + ' ' + i.transportZoneDesc }}
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
                    <th class="text-center">จำนวน</th>
                    <th class="text-center">หน่วย</th>
                    <th class="text-center">ราคาต่อหน่วย</th>
                    <th class="text-center">ราคารวม</th>
                    <th class="text-center">ลบ</th>
                </tr>
            </thead>
            <tfoot>

            </tfoot>
            <tbody ng-repeat="item in carts track by $index">
            <tr class="cart-product-{{ item.productId }}">
                <td class="text-center">{{$index+1}}</td>
                <td class="text-center"><img class="img-product" src="{{partImgProductOrder}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{item.productCode}}</td>
                <td class="text-left">{{ item.productNameTh }} | {{ bomRows(item.productCode)  }}</td>
                <td class="text-center"><span ng-if="bomRows(item.productCode) == 0">{{ item.qty | number }}</span></td>
                <td class="text-center"><span ng-if="bomRows(item.productCode) == 0">{{item.unitNameTh}}</span></td>
                <td><span ng-if="bomRows(item.productCode) == 0">{{ item.price | number:2}}</span></td>
                <td><span ng-if="bomRows(item.productCode) == 0">{{ +item.price*+item.qty | number:2 }}</span></td>
                <td><a href=""><span ng-click="$event.preventDefault(); removeCart(item.productId)" class="fa fa-trash fa-2x"></span></a></td>

            </tr>
            <tr class="cart-product-{{ item.productId }}" ng-repeat="bom in boms track by $index" ng-if="bom.productRefCode == item.productCode">
                <td class="text-center">{{$index+1}}</td>
                <td class="text-center"><img class="img-product" src="{{partImgProductOrder}}/{{bom.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{bom.productCode}}</td>
                <td class="text-left">{{ bom.productNameTh }}</td>
                <td class="text-center">{{ item.qty }}</td>
                <td class="text-center">{{item.unitNameTh}}</td>
                <td>{{ bom.price | number:2}}</td>
                <td>{{ +bom.price*+item.qty | number:2 }}</td>
                <td></td>
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
@endverbatim
