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
