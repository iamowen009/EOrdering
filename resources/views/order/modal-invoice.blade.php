<div id="invoiceModal" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header info">
      	<div class="col-sm-1">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    	</div>
    	<div class="col-sm-11 text-center">
        	<h4 class="modal-title">ใบสั่งซื้อ</h4>
        </div>
      </div>
      <div class="modal-body">
        <!--<div class="bg-gray">

        </div>-->
        <div class="x_panel" style="padding:0;">
            <div class="x_title" style="margin:0;">
                <h4 class="ng-binding inv-customer"> @{{ inv.customerCode + ' ' + inv.customerName}}</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="padding:10px; margin:0;">
                  <form class="form-horizontal ng-pristine ng-valid">
                      <div class="form-group col-md-6">
                          <label for="email" class="col-md-5 text-right">เลขที่ใบสั่งซื้อ : </label>
                          <label class="col-md-7 text-left ng-binding inv-documentNumber">@{{ inv.documentNumber }}</label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="pwd" class="col-md-5 text-right">ที่อยู่ :</label>
                            <label class="col-md-7 text-left ng-binding inv-address">@{{ inv.address }}@{{ inv.districtName }}@{{ inv.cityName }}@{{ inv.postCode }}</label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="email" class="col-md-5 text-right">วันที่สั่งซื้อ :</label>
                            <label class="col-md-7 text-left ng-binding inv-documentDate">@{{ inv.requestDate | date:'dd/mm/yyy' }}</label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="pwd" class="col-md-5 text-right">อีเมลล์ :</label>
                            <label class="col-md-7 text-left ng-binding inv-email"></label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="email" class="col-md-5 text-right">การชำระเงิน :</label>
                            <label class="col-md-7 text-left inv-paymentTerm">@{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm === 'CREDIT' ? 'เครดิต' : '' ) }}</label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="pwd" class="col-md-5 text-right">เบอร์โทรศัพท์ :</label>
                            <label class="col-md-7 text-left ng-binding inv-customerTelNo">@{{ inv.customerTelNo }}</label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="email" class="col-md-5 text-right">ขนส่งโดย :</label>
                            <label class="col-md-7 text-left">@{{ shipto(inv.shipCondition) }}</label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="pwd" class="col-md-5 text-right">บริษัทขนส่ง :</label>
                            <label class="col-md-7 text-left ng-binding">@{{ inv.transportZoneDesc }}</label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="email" class="col-md-5 text-right">สถานที่ส่ง :</label>
                            <label class="col-md-7 text-left ng-binding">@{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }} @{{ inv.shipPostCode }}</label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="pwd" class="col-md-5 text-right">วันที่ต้องการ :</label>
                            <label class="col-md-7 text-left ng-binding">@{{ inv.requestDate | date:'dd/mm/yyyy' }}</label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="email" class="col-md-5 text-right">ที่อยู่สถานที่ส่ง :</label>
                            <label class="col-md-7 text-left ng-binding">@{{ inv.shipName }}</label>
                      </div>
                      <div class="form-group col-md-6">
                            <label for="pwd" class="col-md-5 text-right">เลขที่ PO :</label>
                            <label class="col-md-7 text-left ng-binding">@{{ inv.customerPO}}</label>
                      </div>
                  </form>
              </div>
        </div>

        <h6>รายละเอียดสินค้าที่สั่งซื้อ</h6>
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
                <tr ng-repeat="item in detail">
                    <td class="text-center">@{{$index+1}}</td>
                    <td class="text-center"><img class="img-product" src="@{{partImgProduct}}/@{{item.btfCode}}.jpg" err-SRC="@{{partImgProduct}}/Noimage.jpg"> @{{item.productCode}}</td>
                    <td class="text-center">@{{ item.productNameTh }}</td>
                    <td class="text-right">@{{ item.qty | number }}
                    </td>
                    <td class="text-center">@{{item.unitNameTh}}</td>
                    <td>@{{ item.amount | number:2}}</td>

                    <td>@{{ +item.amount*+item.qty | number:2 }}</td>

                </tr>
                </tbody>
            </table>

        </div>
        <div class="text-right clearfix">
            <div class="pull-right">
                <p class="page-invoice-amount">
                    <strong>ยอดรวมมูลค่าสินค้า(ไม่รวม VAT): <span class="total_price">@{{ totalAmount | number:2 }}</span> บาท</strong>
                </p>
                <br>
            </div>
          </div>
          <p style="color:red;">ราคาต่อหน่วยหลังหักราคามาตรฐานเท่านั้น</p>
      </div>

      <div class="modal-footer">
      	<button type="button" class="btn btn-info" data-dismiss="modal">พิมพ์</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>

  </div>
</div>
