<div id="invoiceModal" class="modal">
  <div class="modal-dialog-invoice modal-lg invoice">
    <div class="modal-content">
      <div class="modal-header invoice__header">
      <img src="<?= asset('images/logo-TOA.png') ?>" style="width:30%;margin-left: -95px;">
        <button type="button" class="close" data-dismiss="modal" style="font-size:72px;color:red;">&times;</button>
    	 	<div class="col-sm-6 text-right">
        	<h3 class="modal-title"><b>ใบสั่งซื้อ</b></h3>
        </div>
      </div>

      <div class="modal-body invoice__body">
        <div class="invoice__body--infomation">
          <div class="left">
            <table>
              <tbody>
                <tr>
                  <td width="120" class="text-bold text-blue">ร้านค้า</td>
                  <td class="text-bold text-blue" style="font-size:14px;">@{{ inv.customerCode }} : @{{ inv.customerName }}</td>
                </tr>
                <tr>
                  <td class="text-bold text-blue">ที่อยู่</td>
                  <td>@{{ inv.address }} &nbsp;@{{inv.street}}  &nbsp;@{{inv.subDistrictName}} <br>&nbsp;@{{inv.districtName}} &nbsp;@{{inv.cityName}}</td>
                </tr>
                <tr ng-hide="inv.customerEmail == '' || inv.customerEmail == null">
                  <td class="text-bold text-blue">อีเมล</td>
                  <td>@{{ inv.customerEmail }}</td>
                </tr>
                <tr ng-hide="inv.customerTelNo == '' || innv.customerTelNo == null">
                  <td class="text-bold text-blue">เบอร์โทรศัพท์</td>
                  <td>@{{ inv.customerTelNo }}</td>
                </tr>
                <tr nng-if="inv.customerTelNo == '' || innv.customerTelNo == null">
                  <td class="text-bold text-blue">เบอร์โทรศัพท์</td>
                  <td>-</td>
                </tr>
                <tr ng-hide="inv.shipName == '' || inv.shipName == null">
                  <td class="text-bold text-blue">สถานที่ส่ง</td>
                  <td> @{{inv.shipCode}} : @{{ inv.shipName }}</td>
                </tr>
                <tr ng-hide="inv.shipName == '' || inv.shipName == null">
                  <td class="text-bold text-blue">ที่อยู่สถานที่ส่ง</td>
                  <td>@{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }} @{{ inv.shipPostCode }}</td>
                </tr>
                <tr ng-if="inv.shipName == '' || inv.shipName == null">
                  <td class="text-bold text-blue">สถานที่ส่ง</td>
                  <td >-</td>
                </tr>
                <tr ng-if="inv.shipName == '' || inv.shipName == null">
                  <td class="text-bold text-blue">ที่อยู่สถานที่ส่ง</td>
                  <td>-</td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <div class="right">
            <table>
              <tbody>
                <tr>
                  <td width="130" class="text-bold text-blue">เลขที่ใบสั่งซื้อ</td>
                  <td>@{{ inv.documentNumber }}</td>
                </tr>
                <tr>
                  <td class="text-bold text-blue">วันที่สั่งซื้อ</td>
                  <td>@{{ inv.documentDate | date:'dd/MM/yyyy' }}</td>
                </tr>
                <tr ng-hide="inv.customerPO == '' || inv.customerPO == null">
                  <td class="text-bold text-blue">เลขที่ใบสั่งซื้อ / PO</td>
                  <td>@{{ inv.customerPO }}</td>
                </tr>
                <tr>
                  <td class="text-bold text-blue">Request Date</td>
                  <td>@{{ inv.requestDate |  date:'dd/MM/yyyy' }}</td>
                </tr>
                <tr>
                  <td class="text-bold text-blue">การชำระเงิน</td>
                  <td>@{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' )  }}</td>
                </tr>
                <tr ng-hide="inv.transportZoneDesc == '' || inv.transportZoneDesc == null">
                  <td class="text-bold text-blue">จัดส่งโดย</td>
                  <td >@{{ inv.transportZone }} : @{{ inv.transportZoneDesc }}</td>
                </tr>
                <tr ng-if="inv.isReceive !== null">
                  <td class="text-bold text-blue">จัดส่งโดย</td>
                  <td >ลูกค้ารับสินค้าเอง</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <table class="invoice__body--table scroll">
          <thead>
            <tr>
              <!-- <th width="30" class="text-center">#</th> -->
              <th width="638" class="text-center text-blue">ผลิตภัณฑ์</th>
              <th width="100" class="text-center text-blue">จำนวน</th>
              <th width="150" class="text-center text-blue">
                ราคาต่อหน่วย
                <span style="color:red">*</span>
              </th>
              <th width="100" class="text-center text-blue">ราคารวม</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="item in detail">
              <!-- <td width="30" class="text-center">@{{ $index+1 }}</td> -->
              <td width="638">@{{ item.productCode }} @{{ item.productNameTh }}</td>
              <td width="100" class="text-center">@{{ item.qty | number }} @{{item.unitNameTh}}</td>
              <td width="150" class="text-right">@{{ item.amount | number:2 }}</td>
              <td width="100" class="text-right">@{{ item.amount | number:2 }} บ.</td>
            </tr>
            <tr class="footer-table">
              <td class="text-center text-blue"><b>ยอดรวมมูลค่าสินค้า (ไม่รวม VAT) </b></td>
              <td colspan="2" class="text-center text-blue"><b>3 รายการ</b></td>
              <td class="text-right text-blue"><b>@{{ totalAmount | number:2 }} บ.</b></td>
            </tr>
          </tbody>
          <tfoot>
          <td>
            <div class="left" style="color:red;">
                  * ราคาต่อหน่วย หลังหักส่วนลดมาตรฐานเท่านั้น
            </div>
          </td>
            
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