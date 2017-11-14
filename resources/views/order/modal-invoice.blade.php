<div id="invoiceModal" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">
    <!-- Modal content-->
    <div class="modal-content inv-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    	 	<div class="col-sm-12 text-center">
        	<h4 class="modal-title">ใบสั่งซื้อ</h4>
        </div>
      </div>
      <div class="modal-body">
        <div class="row inv-header">


        <!-- แบบ 3 col -->
          <!-- <div class="row col-sm-12">
            <div class="col-sm-4">
              <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>ร้านค้า :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.customerCode }},  @{{ inv.customerName }}</div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>วันที่ต้องการ :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.requestDate |  date:'dd/MM/yyyy' }}</p></div>
              </div>
            </div>

            <div class="col-sm-4">
            <div class="col-sm-12">
              <div class="col-sm-5 nonpaddingleft"><p><strong>เลขที่ PO :</strong></p></div>
              <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.customerPO }}</p></div>
            </div>
            </div>
          </div> -->



          <!-- <div class="row col-sm-12">
            <div class="col-sm-4">
              <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>เลขที่ใบสั่งซื้อ :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.documentNumber }}</p></div>
              </div>
            </div>

            <div class="col-sm-4">
            <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>วันทีสั่งซื่้อ :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.documentDate | date:'dd/MM/yyyy'  }}</p></div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>การชำระเงิน :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' )  }}</p></div>
              </div>
            </div>
          </div> -->

          <!-- <div class="row col-sm-12">
            <div class="col-sm-4">
              <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>ที่อยู่ :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.address }} &nbsp;@{{inv.street}}  &nbsp;@{{inv.subDistrictName}} &nbsp;@{{inv.districtName}} &nbsp;@{{inv.cityName}}</p></div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>อีเมล์ :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.customerEmail }}</p></div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>เบอร์โทรศัพท์ :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.customerTelNo }}</p></div>
              </div>
            </div>
          </div>

          <div class="row col-sm-12">
            <div class="col-sm-4">
            <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>สถานที่ส่ง :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{inv.districtCode}} <br> @{{ inv.shipName  }}</p></div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>ที่อยู่สถานที่ส่ง :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }}</p></div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="col-sm-12">
                <div class="col-sm-5 nonpaddingleft"><p><strong>บริษัทขนส่ง :</strong></p></div>
                <div class="col-sm-7 nonpaddingleft"><p>@{{ inv.transportZoneDesc }}</p></div>
              </div>
            </div>
          </div> -->

          <!-- แบบ 2 col -->
          <!-- <div class="col-sm-8">
              <div class="row">
              <div class="col-sm-3"><p><strong>ร้านค้า :</strong></p></div>
              <div class="col-sm-9 nonpaddingleft"><p>@{{ inv.customerCode }}:  @{{ inv.customerName }}</div>
              </div>

              <div class="row">
              <div class="col-sm-3"><p><strong>เลขที่ใบสั่งซื้อ :</strong></p></div>
              <div class="col-sm-9 nonpaddingleft"><p>@{{inv.documentNumber  }}</p></div>
              </div>
              
              <div class="row">
              <div class="col-sm-3"><p><strong>วันทีสั่งซื่้อ :</strong></p></div>
              <div class="col-sm-9 nonpaddingleft"><p>@{{ inv.documentDate | date:'dd/MM/yyyy'  }}</p></div>
              </div>

              <div class="row">
              <div class="col-sm-3"><p><strong>การชำระเงิน :</strong></p></div>
              <div class="col-sm-9 nonpaddingleft"><p>@{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' )  }}</p></div>
              </div>

              <div class="row">
              <div class="col-sm-3"><p><strong>ที่อยู่ :</strong></p></div>
              <div class="col-sm-9 nonpaddingleft"><p>@{{ inv.address }} &nbsp;@{{inv.street}}  &nbsp;@{{inv.subDistrictName}} &nbsp;@{{inv.districtName}} &nbsp;@{{inv.cityName}}</p></div>
              </div>

              <div class="row">
              <div class="col-sm-3"><p><strong>อีเมล์ :</strong></p></div>
              <div class="col-sm-9 nonpaddingleft"><p>@{{ inv.customerEmail }}</p></div>
              </div>

              <div class="row">
              <div class="col-sm-3"><p><strong>เบอร์โทรศัพท์ :</strong></p></div>
              <div class="col-sm-9 nonpaddingleft"><p>@{{ inv.customerTelNo }}</p></div>
              </div>
          </div> 
           <div class="col-sm-4">
              <div class="row">
              <div class="col-sm-6"><p><strong>เลขที่ PO :</strong></p></div>
              <div class="col-sm-6 nonpaddingleft"><p>@{{ inv.customerPO }}</p></div>
              </div>

              <div class="row">
              <div class="col-sm-6"><p><strong>วันที่ต้องการ :</strong></p></div>
              <div class="col-sm-6 nonpaddingleft"><p>@{{ inv.requestDate |  date:'dd/MM/yyyy' }}</p></div>
              </div>

              <div class="row">
              <div class="col-sm-6"><p><strong>สถานที่ส่ง :</strong></p></div>
              <div class="col-sm-6 nonpaddingleft"><p>@{{ inv.shipName  }}</p></div>
              </div>

              <div class="row">
              <div class="col-sm-6"><p><strong>ที่อยู่สถานที่ส่ง :</strong></p></div>
              <div class="col-sm-6 nonpaddingleft"><p>@{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }}</p></div>
              </div>

              <div class="row">
              <div class="col-sm-6"><p><strong>บริษัทขนส่ง :</strong></p></div>
              <div class="col-sm-6 nonpaddingleft"><p>@{{ inv.transportZoneDesc }}</p></div>
              </div>
          </div> -->

            <!-- แบบ 2 column ไม่ grid -->
            <!-- <div class="col-sm-7">
              <p><strong>ร้านค้า :</strong> @{{ inv.customerCode }}:  @{{ inv.customerName }}</p>
              <p><strong>ที่อยู่ :</strong>@{{ inv.address }} &nbsp;@{{inv.street}}  &nbsp;@{{inv.subDistrictName}} &nbsp;@{{inv.districtName}} &nbsp;@{{inv.cityName}}</p>
              <p><strong>อีเมล์ :</strong>@{{ inv.customerEmail }}</p>
              <p><strong>เบอร์โทรศัพท์ :</strong>@{{ inv.customerTelNo }}</p>
              <p><strong>สถานที่ส่ง :</strong> @{{ inv.shipName }}</p>
              <p><strong>ที่อยู่สถานที่ส่ง :</strong> @{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }}</p>
          </div> 
           <div class="col-sm-5">
              <p><strong>เลขที่ใบสั่งซื้อ :</strong> @{{ inv.documentNumber}}</p>
              <p><strong>วันทีสั่งซื่้อ :</strong> @{{ inv.documentDate | date:'dd/MM/yyyy'  }}</p>
              <p><strong>เลขที่ PO :</strong> @{{ inv.customerPO }}</p>
              <p><strong>Request Date :</strong> @{{ inv.requestDate |  date:'dd/MM/yyyy' }}</p>
              <p><strong>การชำระเงิน :</strong> @{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' )  }}</p>
              <p><strong>บริษัทขนส่ง :</strong> @{{ inv.transportZoneDesc }}</p>
          </div> -->

          <!-- row 1 -->
          <div class="col-sm-8">
            <p><strong>ร้านค้า :</strong> @{{ inv.customerCode }} &nbsp;:&nbsp;  @{{ inv.customerName }}</p>
          </div>
          <div class="col-sm-4">
            <p><strong>เลขที่ใบสั่งซื้อ :</strong> @{{ inv.documentNumber}}</p>
          </div>

          <!-- row 2 -->
          <div class="col-sm-8">
            <p><strong>ที่อยู่ :</strong>@{{ inv.address }} &nbsp;@{{inv.street}}  &nbsp;@{{inv.subDistrictName}} &nbsp;@{{inv.districtName}} &nbsp;@{{inv.cityName}}</p>
          </div>
          <div class="col-sm-4">
            <p><strong>วันทีสั่งซื่้อ :</strong> @{{ inv.documentDate | date:'dd/MM/yyyy'  }}</p>
          </div>

          <!-- row 3 -->
          <div class="col-sm-4">
            <p><strong>อีเมล์ :</strong>@{{ inv.customerEmail }}</p>
          </div>
          <div class="col-sm-4">
            <p><strong>เบอร์โทรศัพท์ :</strong>@{{ inv.customerTelNo }}</p>
          </div>
          <div class="col-sm-4">
            <p><strong>เลขที่ PO :</strong> @{{ inv.customerPO }}</p>
          </div>

          <!-- row 4 -->
          <div class="col-sm-4">
            <p><strong>สถานที่ส่ง :</strong> @{{inv.shipCode}} : @{{ inv.shipName }}</p>
          </div>
          <div class="col-sm-4">
            <p><strong>บริษัทขนส่ง :</strong>@{{ inv.transportZone }} :  @{{ inv.transportZoneDesc }}
            </p>
          </div>
          <div class="col-sm-4">
            <p><strong>Request Date :</strong> @{{ inv.requestDate |  date:'dd/MM/yyyy' }}</p>
          </div>

          <!-- row 5 -->
          <div class="col-sm-8">
          <p><strong>ที่อยู่สถานที่ส่ง :</strong> @{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }}</p>
          </div>
          <div class="col-sm-4">
          <p><strong>การชำระเงิน :</strong> @{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' )  }}</p>
          </div>

        </div>
        <div>
          <p>
            <strong>รายละเอียดสินค้า</strong>
          </p>
          <div class="invoice-block row">
              <table class="table table-hover table-bordered">
                  <thead class="thead-default">
                      <tr>
                          <th colspan="2" class="text-center">รหัสสินค้า</th>
                          <th class="text-center">สินค้า</th>
                          <th class="text-center">จำนวน</th>
                          <th class="text-center">หน่วย</th>
                          <th class="text-center">ราคาหน่วย</th>
                          <th class="text-center">ราคารวม</th>
                          <th class="text-center" style="display:none">ชื่อโปรโมชั่น</th>
                      </tr>
                  </thead>

                  <tbody>
                  <tr ng-repeat="item in detail">
                      <td class="text-center">
                         <img class="img-product" src="@{{ partImgProduct +'/'+ item.btf }}.jpg" err-SRC="@{{partImgProduct}}/Noimage.jpg" style="height:40px;">
                      </td>
                      <td>
                          @{{item.productCode}}
                      </td>
                      <td class="text-left"> @{{ item.productNameTh }} <p  class="text-danger" ng-style="item.isFreeGoods == '0' &&  {'display': 'none'}">(ของแถม)</p></td>
                      <td class="text-center">@{{ item.qty | number }}</td>
                      <td class="text-center">@{{item.unitNameTh}}</td>
                      <td class="text-right">@{{ item.amount | number:2}}</td>
                      <td class="text-right">@{{ +item.amount*+item.qty | number:2 }}</td>
                      <td class="text-center" style="display:none">@{{item.promotionName}}</td>
                  </tr>
                  </tbody>
              </table>

          </div>
          <div class="row">
            <div class="col-sm-6 text-danger">ราคาต่อหน่วยหลังหักราคามาตรฐานเท่านั้น </div>
            <div class="col-sm-6 text-right">
              <strong>ยอดรวมมูลค่าสินค้า(ไม่รวม VAT):</strong>
                @{{ totalAmount | number:2 }}
              <strong>บาท</strong>
            </div>
          </div>

      </div>
      <div class="modal-footer text-center">
      	<button type="button" class="btn btn-info" ng-click="OrderPrint(inv.id)">พิมพ์</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>

  </div>
</div>
</div>
<!--
:: print invoice
=====================================================================
-->
<div id="invoiceModal-print" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <!-- <div class="modal-header info">
      	<div class="col-sm-12">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
    	  </div>
      </div> -->
      <div class="modal-body">
        <div class="row invoice-header">
          <div class="col-md-8">
            <img src="<?php echo asset('images/toa-logo-blank.png'); ?>" class="pull-left" style="height:80px;"/>
            <h4>บริษัท ทีโอเอ เพ้นท์ (ประเทศไทย) จำกัด (มหาชน)</h4>
            <p>สำนักงาน และศูนย์อุตสาหกรรม ทีโอเอ บางนา-ตราด 31/2 หมู่ 3 </p>
            <p>ถนนบางนา-ตราด ตำบลบางเสาธง อ.บางเสาธง จ.สมุทรปราการ 10570</p>
          </div>
          <div class="col-md-4 text-right">

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
                        <th class="text-center">จำนวน</th>
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
                    <td class="text-center">@{{ item.qty | number }}</td>
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
      	<!-- <button type="button" class="btn btn-info" data-dismiss="modal">พิมพ์</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button> -->
      </div>
    </div>

  </div>
</div>
