<div id="invoiceModal" class="modal" role="dialog" tabindex="-1">
  <div class="modal-dialog-invoice modal-lg">
    <!-- Modal content-->
    <div class="modal-content inv-content">
      <div class="modal-header info" style="padding-top: 10px !important; padding-bottom: 10px !important;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    	 	<div class="col-sm-6 text-center">
        	<h4 class="modal-title" style="padding: 0px;">ใบสั่งซื้อ</h4>
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
            <p><strong>ที่อยู่ :</strong> @{{ inv.address }} &nbsp;@{{inv.street}}  &nbsp;@{{inv.subDistrictName}} &nbsp;@{{inv.districtName}} &nbsp;@{{inv.cityName}}</p>
          </div>
          <div class="col-sm-4">
            <p><strong>วันทีสั่งซื่้อ :</strong> @{{ inv.documentDate | date:'dd/MM/yyyy'  }}</p>
          </div>

          <!-- row 3 -->
          <div class="col-sm-4">
            <p ng-if="inv.customerEmail"><strong>อีเมล์ :</strong> @{{ inv.customerEmail }}</p>
          </div>
          <div class="col-sm-4">
            <p><strong>เบอร์โทรศัพท์ :</strong> @{{ inv.customerTelNo }}</p>
          </div>
          <div class="col-sm-4">
            <p><strong>เลขที่ PO :</strong> @{{ inv.customerPO }}</p>
          </div>

          <!-- row 4 -->
          <div class="col-sm-4">
            <p ng-if="inv.shipCode"><strong>สถานที่ส่ง :</strong> @{{inv.shipCode}} : @{{ inv.shipName }}</p>
          </div>
          <div class="col-sm-4">
            <p ng-if="inv.transportZone"><strong>บริษัทขนส่ง :</strong> @{{ inv.transportZone }} :  @{{ inv.transportZoneDesc }}
            </p>
          </div>
          <div class="col-sm-4">
            <p><strong>Request Date :</strong> @{{ inv.requestDate |  date:'dd/MM/yyyy' }}</p>
          </div>

          <!-- row 5 -->
          <div class="col-sm-8">
          <p ng-if="inv.shipHouseNo"><strong>ที่อยู่สถานที่ส่ง :</strong> @{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }}</p>
          </div>
          <div class="col-sm-4">
          <p><strong>การชำระเงิน :</strong> @{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' )  }}</p>
          </div>

        </div>
        <div>
          <div class="invoice-block row">
              <table class="table table-hover table-bordered">
                  <thead class="thead-default">
                      <tr>
                          <th class="text-center">รหัสสินค้า</th>
                          <th class="text-center">สินค้า</th>
                          <th class="text-center">จำนวน</th>
                          <th class="text-center">หน่วย</th>
                          <th class="text-center">
                            <span style="color: red;">*</span>
                            ราคาหน่วย
                          </th>
                          <th class="text-center">ราคารวม</th>
                          <th class="text-center" style="display:none">ชื่อโปรโมชั่น</th>
                      </tr>
                  </thead>

                  <tbody>
                  <tr ng-repeat="item in detail">
                      <td class="text-center">
                          @{{item.productCode}}
                      </td>
                      <td class="text-left">
                        <div class="row">
                          @{{ item.productNameTh }} <div  class="text-danger" ng-style="item.isFreeGoods == '0' &&  {'display': 'none'}"> &nbsp;(ของแถม)</div>
                        </div>
                      </td>
                      <td class="text-center"><p ng-show="item.isBOM != true">@{{ item.qty | number }}</p></td>
                      <td class="text-center"><p ng-show="item.isBOM != true">@{{item.unitNameTh}}</p></td>
                      <td class="text-right"><p ng-show="item.isBOM != true">@{{ item.isFreeGoods === true ? 0 : item.amount * 1 | number:2}}</p></td>
                      <td class="text-right" ><p ng-show="item.isBOM != true">@{{ item.isFreeGoods === true ? 0 : +item.amount*+item.qty | number:2 }}</p></td>
                      <td class="text-center" style="display:none">@{{item.promotionName}}</td>
                  </tr>
                  </tbody>
              </table>

          </div>
          <div class="row">
            <div class="col-sm-6 text-danger">*ราคาต่อหน่วยหลังหักส่วนลดมาตรฐานเท่านั้น </div>
            <div class="col-sm-6 text-right">
              <strong>ยอดรวมมูลค่าสินค้า (ไม่รวม VAT) :</strong>
                @{{ totalAmount | number:2 }}
              <strong>บาท</strong>
            </div>
          </div>

      </div>
      <div class="modal-footer text-center">
      	<button type="button" class="btn btn-info" style="width:63px;" ng-click="OrderPrint(inv.id)">พิมพ์</button>
        <button type="button" class="btn btn-default" style="width:63px;" data-dismiss="modal">ปิด</button>
      </div>
    </div>

  </div>
</div>
</div>
<!--
:: print invoice
=====================================================================
-->
