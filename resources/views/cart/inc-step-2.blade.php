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
                    ng-model="ddlShipTos"
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
