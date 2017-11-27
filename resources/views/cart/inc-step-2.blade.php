@verbatim
<h3>
  <i class="fa fa-credit-card cui-wizard--steps--icon"></i>
  <span class="cui-wizard--steps--title">Shipment / Billing Info</span>
</h3>
<section>
  <div class="alert alert-warning text-bold" ng-show="carts.length === 0">
    ไม่มีสินค้าในตะกร้า
  </div>
  <div class="x_panel">
    <div class="x_title">
      <h4 class="text-bold mb-5 pl-10">{{customer.customerCode}} : {{customer.customerName}}</h4>
    </div>
    <div class="x_content">
      <form class="form-horizontal pr-15 pt-30 pb-10" name="formcart">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-md-4 text-right">
                เลขที่ใบสั่งซื้อ :
              </label>
              <div class="col-md-8 form-control-static">
                <!-- CODE HERE -->
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4 text-right">
                วันที่สั่งซื้อ :
              </label>
              <div class="col-md-8 form-control-static">
                {{ cartDate }}
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4 text-right">
                การชำระเงิน :
              </label>
              <div class="col-md-8">
                <label class="radio-inline">
                  <input type="radio" name="optradio" ng-model="paymentTerm" ng-change="changePay( ( customer.paymentTerm == 'CA02' || customer.paymentTerm =='CASH') ? customer.paymentTerm : 'CASH')"
                    value="{{ ( customer.paymentTerm == 'CA02' || customer.paymentTerm =='CASH') ? customer.paymentTerm : 'CASH'}}"> เงินสด
                </label>
                <label class="radio-inline" ng-if="customer.paymentTerm !== 'CASH' && customer.paymentTerm !='CA02'">
                  <input type="radio" name="optradio" ng-model="paymentTerm" value="{{ customer.paymentTerm }}" ng-change="changePay(customer.paymentTerm)"> เครดิต
                </label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4 text-right">
                ที่อยู่ :
              </label>
              <div class="col-md-8 form-control-static">
                {{ customer.address }} {{ customer.street }} {{ customer.subDistrictName }}
                <br> {{ customer.districtName }} {{ customer.cityName }}
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4 text-right">
                อีเมล์ :
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
              <div class="col-md-6">
                <input class="form-control" type="input" ng-model="customerPO">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4 text-right">
                Request Date :
              </label>
              <div class="col-md-6">
                <select name="date_id" id="date_id" class="form-control" ng-model="ddlDate" ng-options="i as i.reqDate for i in requests track by i.reqDate | date:'dd/mm/yy'">
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4 text-right">
                สถานที่ส่ง :
              </label>
              <div class="col-md-6">
                <select name="ship_id" id="ship_id" class="form-control" ng-model="ddlShipTo" ng-change="changeShip(ddlShipTo.shipId)" ng-options="i as i.shipCode +' ' + i.shipName for i in ships track by i.shipCode">
                </select>
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
            <div class="form-group" ng-if="(ddlShipTo.shipCondition == '03'  || customer.shipCondition == '03') && shippingType=='show'">
              <label class="control-label col-md-4 text-right">
                จัดส่งโดย :
              </label>
              <div class="col-md-6">
                <select name="trans_id" ng-if="( ddlShipTo.shipCondition == '03' || customer.shipCondition == '03' ) && transports.length > 0"
                  id="trans_id" class="form-control" ng-model="ddlTransport" ng-change="changeTransport(ddlTransport)" ng-options="i.transportZone as i.transportZone +' ' + i.transportZoneDesc for i in transports">
                  <option value="" selected hidden/>
                </select>
                <select name="trans_id" ng-if="transports.length == 0 && ( ddlShipTo.shipCondition == '03' || customer.shipCondition == '03' )"
                  id="trans_id" class="form-control" ng-model="ddlTransport" ng-change="changeTransport(ddlTransport)">
                  <option value="" selected hidden />
                  <option value="{{ddlShipTo.transportZone}}">
                    {{ ddlShipTo.transportZone +' ' + ddlShipTo.transportZoneDesc }}
                  </option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="w100">
    <h5>รายละเอียดสินค้าที่สั่งซื้อ &nbsp; คุณมีสินค้าในตระกร้าจำนวน
      <strong>{{ totalQty }}</strong> รายการ</h5>
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
        <th class="text-center">ลบ</th>
      </tr>
    </thead>
    <tbody ng-repeat="item in carts track by $index">
      <tr class="text-bold">
        <td align="center">
          <img width="50" ng-src="{{partImgProductOrder}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg">
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
            {{item.unitNameTh}}
          </span>
        </td>
        <td align="right" style="line-height: 50px;">
          <span ng-if="bomRows(item.productCode) == 0" >
            {{ item.price | number:2}}
          </span>
        </td>
        <td align="right" style="line-height: 50px;">
          <span ng-if="bomRows(item.productCode) == 0">
            {{ +item.price*+item.qty | number:2 }}
          </span>
        </td>
        <td align="center" style="line-height: 50px;">
          <a ng-click="removeCart(item.productId)" style="cursor: pointer; color: red;">
            <span class="fa fa-trash fa-2x mt-10"></span>
          </a>
        </td>
      </tr>
      <tr ng-repeat="bom in boms track by $index" ng-if="bom.productRefCode == item.productCode">
        <td align="center">
            <img width="50" ng-src="{{ partImgProductOrder }}/{{ bom.btfCode }}.jpg" err-src="{{ partImgProduct }}/Noimage.jpg">
          </td>
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
          <td align="center" style="line-height: 50px;">
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
</section>
@endverbatim