<div id="invoiceModal" class="modal">
  <div class="modal-dialog-invoice modal-lg invoice">
    <div class="modal-content">
      <div class="modal-header invoice__header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    	 	<div class="col-sm-6 text-center">
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
              <p ng-if="inv.isReceive !== null"><strong>ขนส่งโดย :</strong> รับสินค้าเอง</p>
              <p ng-if="inv.transportZone"><strong>บริษัทขนส่ง :</strong> @{{ inv.transportZone }} :  @{{ inv.transportZoneDesc }}</p>
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
      </div>
      <div class="modal-body invoice__body">
        <div class="invoice__body--infomation">
          <div class="left">
            <table>
              <tbody>
                <tr>
                  <td width="120" class="text-bold">ร้านค้า</td>
                  <td>@{{ inv.customerCode }},  @{{ inv.customerName }}</td>
                </tr>
                <tr>
                  <td class="text-bold">ที่อยู่</td>
                  <td>@{{ inv.address }} &nbsp;@{{inv.street}}  &nbsp;@{{inv.subDistrictName}} &nbsp;@{{inv.districtName}} &nbsp;@{{inv.cityName}}</td>
                </tr>
                <tr>
                  <td class="text-bold">อีเมล</td>
                  <td>@{{ (inv.customerEmail == '') ? '-' : inv.customerEmail }}</td>
                </tr>
                <tr>
                  <td class="text-bold">เบอร์โทรศัพท์</td>
                  <td>@{{ inv.customerTelNo }}</td>
                </tr>
                <tr>
                  <td class="text-bold">สถานที่ส่ง</td>
                  <td>@{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }} @{{ inv.shipPostCode }}</td>
                </tr>
                <tr>
                  <td class="text-bold">ที่อยู่สถานที่ส่ง</td>
                  <td>@{{ inv.shipName }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="right">
            <table>
              <tbody>
                <tr>
                  <td width="130" class="text-bold">เลขที่ใบสั่งซื้อ</td>
                  <td>@{{ inv.documentNumber }}</td>
                </tr>
                <tr>
                  <td class="text-bold">วันที่สั่งซื้อ</td>
                  <td>@{{ inv.documentDate | date:'dd/MM/yyyy' }}</td>
                </tr>
                <tr>
                  <td class="text-bold">เลขที่ใบสั่งซื้อ / PO</td>
                  <td>@{{ inv.customerPO }}</td>
                </tr>
                <tr>
                  <td class="text-bold">Request Date</td>
                  <td>@{{ inv.requestDate |  date:'dd/MM/yyyy' }}</td>
                </tr>
                <tr>
                  <td class="text-bold">การชำระเงิน</td>
                  <td>@{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' )  }}</td>
                </tr>
                <tr>
                  <td class="text-bold">บริษัทขนส่ง</td>
                  <td>@{{ (inv.transportZoneDesc == null) ? '-' : inv.transportZoneDesc }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <table class="invoice__body--table scroll">
          <thead>
            <tr>
              <th width="30" class="text-center">#</th>
              <th width="638">ผลิตภัณฑ์</th>
              <th width="100">จำนวน</th>
              <th width="100">
                <span style="color:red">*</span>
                ราคาหน่วย
              </th>
              <th width="100">ราคารวม</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in detail">
              <td width="30" class="text-center">@{{ $index+1 }}</td>
              <td width="638">@{{ item.productCode }} @{{ item.productNameTh }}</td>
              <td width="100">@{{ item.qty | number }}</td>
              <td width="100">@{{ item.amount | number:2 }}</td>
              <td width="100">@{{ item.amount | number:2 }}</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>
                <div class="left" style="color:red;">
                  ราคาต่อหน่วยหลังหักราคามาตรฐานเท่านั้น
                </div>
                <div class="right text-right">
                  <b>ยอดรวมมูลค่าสินค้า(ไม่รวม VAT) @{{ totalAmount | number:2 }}</b>
                </div>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="modal-footer invoice__footer">
        <button type="button" class="btn btn-info" style="width:63px; margin-right: 5px;" ng-click="OrderPrint(inv.id)">
          พิมพ์
        </button>
        <button type="button" class="btn btn-default" style="width:63px;" data-dismiss="modal">
          ปิด
        </button>
      </div>
    </div>
  </div>
</div>