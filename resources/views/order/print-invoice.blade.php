<div id="invoiceModal" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header info">
      	<div class="col-sm-12">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
    	  </div>
      </div>
      <div class="modal-body">
        <div class="row invoice-header">
          <div class="col-md-8">
            <img src="<?php echo asset('images/toa-logo-blank.png'); ?>" class="pull-left" style="height:80px;"/>
            <h4>บริษัท ทีโอเอ เพ้นท์ (ประเทศไทย) จำกัด (มหาชน)</h4>
            <p>สำนักงาน และศูนย์อุตสาหกรรม ทีโอเอ บางนา-ตราด 31/2 หมู่ 3 </p>
            <p>ถนนบางนา-ตราด ตำบลบางเสาธง อ.บางเสาธง จ.สมุทรปราการ 10570</p>
          </div>
          <div class="col-md-4 text-right">
            <p>วันที่ : <strong>@{{ inv.requestDate | date:'dd/MM/yy'  }}</strong></p>
            <p>เลขที่ใบสั่งซื้อ : <strong>@{{ inv.documentNumber }}</strong></p>
          </div>
        </div>
        <h4 class="text-center modal-title">ใบสั่งซื้อ</h4>
        <div class="" style="padding:0;">
          <div class="row form-horizontal">
            <div class="col-md-6" >
              <div class="x_panel">
              <h4 class="ng-binding inv-customer"> @{{ inv.customerName }}</h4>
              <div class="form-group">
                    <span for="pwd" class="col-md-4">ที่อยู่ :</span>
                    <span class="col-md-8 text-left ng-binding inv-address">@{{ inv.address }}@{{ inv.districtName }}@{{ inv.cityName }}@{{ inv.postCode }}</span>
              </div>
              <div class="form-group">
                    <span for="pwd" class="col-md-4">เบอร์โทรศัพท์ :</span>
                    <span class="col-md-8 text-left ng-binding inv-customerTelNo">@{{ inv.customerTelNo }}</span>
              </div>
              <div class="form-group">
                    <span for="pwd" class="col-md-4">อีเมลล์ :</span>
                    <span class="col-md-8 text-left ng-binding inv-email"></span>
              </div>
              <div class="form-group">
                    <span for="pwd" class="col-md-4">บริษัทขนส่ง :</span>
                    <span class="col-md-8 text-left ng-binding">@{{ inv.transportZoneDesc }}</span>
              </div>

            </div>
            </div>
            <div class="col-md-6 ">
              <div class="x_panel">
              <div class="form-group">
                    <span for="email" class="col-md-4">การจัดส่ง :</span>
                    <span class="col-md-8 text-left">@{{ shipto(inv.shipCondition) }}</span>
              </div>

              <div class="form-group">
                    <span for="email" class="col-md-4">การชำระเงิน :</span>
                    <span class="col-md-8 text-left inv-paymentTerm">@{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm === 'CREDIT' ? 'เครดิต' : '' ) }}</span>
              </div>



              <div class="form-group">
                    <span for="email" class="col-md-4">สถานที่ส่ง :</span>
                    <span class="col-md-8 text-left ng-binding">@{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }} @{{ inv.shipPostCode }}</span>
              </div>
              <div class="form-group">
                    <span for="email" class="col-md-4">ที่อยู่สถานที่ส่ง :</span>
                    <span class="col-md-8 text-left ng-binding">@{{ inv.shipName }}</span>
              </div>
              <div class="form-group">
                    <span for="pwd" class="col-md-4">วันที่ต้องการ :</span>
                    <span class="col-md-8 text-left ng-binding">@{{ inv.requestDate+543 | date:'dd/MM/yyyy' }}</span>
              </div>
              <div class="form-group">
                    <span for="pwd" class="col-md-4">เลขที่ PO :</span>
                    <span class="col-md-8 text-left ng-binding">@{{ inv.customerPO}}</span>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="invoice-block row">
            <table class="table table-hover table-bordered">
                <thead class="thead-default">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ผลิตภัณฑ์</th>
                        <th class="text-right">จำนวน</th>
                        <!-- <th class="text-center">หน่วย</th> -->
                        <th class="text-right">ราคาหน่วย</th>
                        <th class="text-right">ราคารวม</th>
                    </tr>
                </thead>

                <tbody>
                <tr ng-repeat="item in detail">
                    <td class="text-center">@{{$index+1}}</td>
                    <!-- <td class="text-center"><img class="img-product" src="@{{partImgProduct +'/'+ item.btfCode}}.jpg" err-SRC="@{{partImgProduct}}/Noimage.jpg"> </td> -->
                    <td class="text-left">@{{item.productCode}} @{{ item.productNameTh }}</td>
                    <td class="text-right">@{{ item.qty | number }} @{{item.unitNameTh}}</td>
                    <!-- <td class="text-center">@{{item.unitNameTh}}</td> -->
                    <td class="text-right">@{{ item.amount | number:2}}</td>

                    <td class="text-right">@{{ +item.amount*+item.qty | number:2 }}</td>

                </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td class="text-center"></td>
                    <td class="text-center page-invoice-amount"><strong>ยอดรวมมูลค่าสินค้า(ไม่รวม VAT):</strong></td>
                    <td class="text-center"><strong><span class="">@{{ totalQty | number:0 }} รายการ</span> </strong></td>
                    <td class="text-center"><strong><span class=""></span> </strong></td>
                    <td class="text-center"><strong><span class="">@{{ totalAmount | number:2 }}</span> </strong></td>
                </tr>
              </tfoot>
            </table>

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
