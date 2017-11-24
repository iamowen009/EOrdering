@verbatim
<h3>
  <i class="fa fa-check cui-wizard--steps--icon"></i>
  <span class="cui-wizard--steps--title">Confirmation</span>
</h3>
<section>
  <div class="x_panel">
    <div class="x_title">
      <h4 class="text-bold">{{customer.customerCode}} : {{customer.customerName}}</h4>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br>
      <form class="form-horizontal">
        <div class="col-md-12">
          <div class="form-group col-md-6">
            <label for="email" class="col-md-3 col-sm-3 col-xs-12 text-right">เลขที่ใบสั่งซื้อ :</label>
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
            <label for="pwd" class="col-md-3 col-sm-3 col-xs-12 text-right">Request Date:</label>
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
          <div class="form-group col-md-6" ng-if="(ddlShipTo.shipCondition == '03'  || customer.shipCondition == '03') && shippingType=='show'">
            <label for="pwd" class="col-md-3 col-sm-3 col-xs-12 text-right">จัดส่งโดย :</label>
            <label class="col-md-9 col-sm-9 col-xs-12">{{ddlShipTo.shipCondition == '08' ? ddlShipTo.transportZone + ' ' + ddlShipTo.transportZoneDesc : objTransport.transportZone}}
              {{objTransport.transportZoneDesc}}</label>
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
  <div class="col-md-12">
    <h6>
      รายละเอียดสินค้าที่สั่งซื้อ &nbsp; คุณมีสินค้าในตระกร้าจำนวน {{ cartNoBom.length + boms.length | number }} รายการ
    </h6>
  </div>


  <div class="alert alert-warning" role="alert" ng-show="carts.length === 0">
    Your cart is empty
  </div>


  <div class="table-responsive col-lg-12" ng-show="carts.length > 0">
    <div class="invoice-block">
      <table class="table table-hover text-right">
        <thead class="thead-default">
          <tr>
            <th class="text-center">รหัสสินค้า</th>
            <th class="text-center">สินค้า</th>
            <th class="text-center">จำนวน</th>
            <th class="text-center">หน่วย</th>
            <th class="text-center">ราคาต่อหน่วย</th>
            <th class="text-center">ราคารวม</th>
          </tr>
        </thead>
        <tfoot>

        </tfoot>
        <tbody ng-repeat="item in carts track by $index">
          <tr class="cart-product-{{ item.productId }}">
            <td class="text-center">
              <img class="img-product" ng-src="{{partImgProductOrder}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg">
              <strong>{{item.productCode}}</strong>
            </td>
            <td class="text-left">
              <strong>{{ item.productNameTh }}</strong>
            </td>
            <td class="text-center">
              <span ng-if="bomRows(item.productCode) == 0">{{ item.qty | number }}</span>
            </td>
            <td class="text-center">
              <span ng-if="bomRows(item.productCode) == 0">{{item.unitNameTh}}</span>
            </td>
            <td>
              <span ng-if="bomRows(item.productCode) == 0">{{ item.price | number:2}}</span>
            </td>
            <td>
              <span ng-if="bomRows(item.productCode) == 0">{{ +item.price*+item.qty | number:2 }}</span>
            </td>
            <!--
                <td><a href=""><span ng-click="$event.preventDefault(); removeCart(item.productId)" class="fa fa-trash fa-2x"></span></a></td>
                -->
          </tr>
          <tr class="cart-product-{{ item.productId }}" ng-repeat="bom in boms track by $index" ng-if="bom.productRefCode == item.productCode">
            <td class="text-center">
              <img class="img-product" src="{{partImgProductOrder}}/{{bom.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{bom.productCode}}</td>
            <td class="text-center">{{ bom.productNameTh }}</td>
            <td class="text-center">{{ item.qty }}</td>
            <td class="text-center">{{item.unitNameTh}}</td>
            <td>{{ bom.price | number:2}}</td>
            <td>{{ +bom.price*+item.qty | number:2 }}</td>
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
          <strong>ยอดรวมมูลค่าสินค้า(ไม่รวม VAT):
            <span class="total_price">{{ totalAmount | number:2 }}</span> บาท</strong>
        </p>
        <br>
      </div>

</section>
@endverbatim