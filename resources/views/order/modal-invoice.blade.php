<div id="invoiceModal" class="modal">
  <div class="modal-dialog-invoice modal-lg invoice">
    <div class="modal-content">
      <div class="modal-header invoice__header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    	 	<div class="col-sm-6 text-center">
        	<h4 class="modal-title invoice__header--title" style="padding: 0px;">
            ใบสั่งซื้อ
          </h4>
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
                <tr ng-hide="inv.customerEmail == '' || inv.customerEmail == null">
                  <td class="text-bold">อีเมล</td>
                  <td>@{{ inv.customerEmail }}</td>
                </tr>
                <tr>
                  <td class="text-bold">เบอร์โทรศัพท์</td>
                  <td>@{{ inv.customerTelNo }}</td>
                </tr>
                <tr ng-hide="inv.shipHouseNo == '' || inv.shipHouseNo == null">
                  <td class="text-bold">สถานที่ส่ง</td>
                  <td>@{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }} @{{ inv.shipPostCode }}</td>
                </tr>
                <tr ng-hide="inv.shipName == '' || inv.shipName == null">
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
                <tr ng-hide="inv.customerPO == '' || inv.customerPO == null">
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
                <tr ng-hide="inv.transportZoneDesc == '' || inv.transportZoneDesc == null">
                  <td class="text-bold">บริษัทขนส่ง</td>
                  <td>@{{ inv.transportZoneDesc }}</td>
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
                  * ราคาต่อหน่วยหลังหักส่วนลดมาตรฐานเท่านั้น
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