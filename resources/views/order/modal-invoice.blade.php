<div id="invoiceModal" class="modal" tabindex="-1">
  <div class="modal-dialog-invoice modal-lg invoice">
    <div class="modal-content">
      <div class="modal-header invoice__header">
        <img src="<?= asset('images/logo-TOA.png') ?>" style="width:30%;margin-left: -95px;">
        <button type="button" class="close" data-dismiss="modal" style="font-size:42px;color:red;">&times;</button>
        <div class="col-sm-6 text-right">
          <h3 class="modal-title"><b>ใบสั่งซื้อ</b></h3>
        </div>
      </div>
      <div class="modal-body invoice__body">
        <div class="invoice__body--infomation">
          <div class="left popinvoice">
            <table>
              <tbody>
                <tr>
                  <td width="110" class="text-bold text-blue">ร้านค้า</td>
                  <td class="text-bold text-blue" style="font-size:14px;">@{{ inv.customerCode }} : @{{ inv.customerName }}</td>
                </tr>
                <tr ng-hide="inv.cityCode =='' || inv.cityCode == null">
                  <td class="text-bold text-blue">ที่อยู่</td>
                  <td>@{{ inv.address }} &nbsp;@{{inv.street}} &nbsp;@{{inv.subDistrictName}}
                    <br>&nbsp;@{{inv.districtName}} &nbsp;@{{inv.cityName}}</td>
                </tr>
                <tr ng-if="inv.cityCode =='' || inv.cityCode == null">
                  <td class="text-bold text-blue">ที่อยู่</td>
                  <td>-</td>
                </tr>
                <tr ng-hide="inv.customerEmail == '' || inv.customerEmail == null">
                  <td class="text-bold text-blue">อีเมล</td>
                  <td>@{{ inv.customerEmail }}</td>
                </tr>
                 <tr ng-if="inv.customerEmail == '' || inv.customerEmail == null">
                  <td class="text-bold text-blue">อีเมล</td>
                  <td>-</td>
                </tr>
                <tr ng-hide="inv.customerTelNo == '' || inv.customerTelNo == null">
                  <td class="text-bold text-blue">โทรศัพท์</td>
                  <td>@{{ inv.customerTelNo }}</td>
                </tr>
                <tr ng-if="inv.customerTelNo == '' || inv.customerTelNo == null">
                  <td class="text-bold text-blue">โทรศัพท์</td>
                  <td>-</td>
                </tr>
                <tr ng-hide="inv.shipName == '' || inv.shipName == null">
                  <td class="text-bold text-blue">สถานที่ส่ง</td>
                  <td> @{{inv.shipCode.substring(2, 10)}} : @{{ inv.shipName }}</td>
                </tr>
                <tr ng-hide="inv.shipName == '' || inv.shipName == null">
                  <td class="text-bold text-blue">ที่อยู่สถานที่ส่ง</td>
                  <td>@{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }} @{{ inv.shipPostCode
                    }}</td>
                </tr>
                <tr ng-if="inv.shipName == '' || inv.shipName == null">
                  <td class="text-bold text-blue">สถานที่ส่ง</td>
                  <td>-</td>
                </tr>
                <tr ng-if="inv.shipName == '' || inv.shipName == null">
                  <td class="text-bold text-blue">ที่อยู่สถานที่ส่ง</td>
                  <td>-</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="right popinvoice">
            <table>
              <tbody>
                <tr ng-hide="inv.documentNumber == ''|| inv.documentNumber == null">
                  <td width="110" class="text-bold text-blue">
                  เลขที่ใบสั่งซื้อ 
                  </td>
                  <td>@{{ inv.documentNumber }} 
                    <span class="text-bold text-blue"> / วันที่</span> @{{ inv.documentDate | date:'dd/MM/yyyy' }}
                  </td>
                </tr>
                <tr ng-if="inv.customerPO == '' || inv.customerPO == null">
                  <td class="text-bold text-blue">PO number</td>
                  <td>-</td>
                </tr>
                <tr ng-hide="inv.customerPO == '' || inv.customerPO == null">
                  <td class="text-bold text-blue">PO number</td>
                  <td>@{{ inv.customerPO }}</td>
                </tr>
                <tr ng-hide="inv.requestDate == '' | inv.requestDate == null">
                  <td class="text-bold text-blue">Request Date</td>
                  <td>@{{ inv.requestDate | date:'dd/MM/yyyy' }}</td>
                </tr>
                <tr ng-if="inv.requestDate == '' || inv.requestDate == null">
                  <td class="text-bold text-blue">Request Date</td>
                  <td>-</td>
                </tr>
                <tr>
                  <td class="text-bold text-blue">การชำระเงิน</td>
                  <td>@{{ inv.paymentTerm === 'CASH' || inv.paymentTerm === 'CA02' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' ) }}</td>
                </tr>
                <tr ng-hide="inv.transportZoneDesc == '' || inv.transportZoneDesc == null">
                  <td class="text-bold text-blue">จัดส่งโดย</td>
                  <td>@{{ inv.transportZone }} : @{{ inv.transportZoneDesc }}</td>
                </tr>
                <tr ng-if="inv.shipCondition == '01' && inv.isReceive !== null">
                  <td class="text-bold text-blue">จัดส่งโดย</td>
                  <td>ลูกค้ารับสินค้าเอง</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <table class="invoice__body--table scroll">
          <thead>
            <tr>
              <th width="638" class="text-center text-blue">รายการสินค้า</th>
              <th width="100" class="text-center text-blue">จำนวน</th>
              <th width="100" class="text-center text-blue">หน่วย</th>
              <th width="150" class="text-center text-blue">
                ราคาต่อหน่วย
                <span style="color:red">*</span>
              </th>
              <th width="150" class="text-center text-blue">ราคารวม</th>
            </tr>
          </thead>
          <tbody ng-repeat="item in detail">
            <tr>
              <!-- <td width="30" class="text-center">@{{ $index+1 }}</td> -->
              <td ng-if="item.isBOM == true"  width="638" style="font-weight: bold">
                @{{ item.productCode }} @{{ item.productNameTh }}
              </td>
              <td ng-hide="item.isBOM == true"  width="638">
                @{{ item.productCode }} @{{ item.productNameTh }}
              </td>
              <td width="100" class="text-center" ng-hide="item.isBOM == true">@{{item.qty | number }}</td>
              <td width="100" class="text-center" ng-hide="item.isBOM == true">@{{item.unitNameTh }}</td>
              <td width="150" class="text-right" ng-hide="item.isBOM == true">@{{ item.amount | number:2 }}</td>
              <td width="150" class="text-right" ng-hide="item.isBOM == true">@{{ item.totalAmount | number:2 }} บ.</td>
            </tr>
            <tr ng-repeat="bom in boms track by $index" ng-if="bom.productRefCode == item.productCode">
              <td width="638">@{{ bom.productCode }} @{{ bom.productNameTh }}</td>
              <td width="100" class="text-center">@{{ bom.qty | number }}</td>
              <td width="100" class="text-center">@{{ bom.unitNameTh }}</td>
              <td width="150" class="text-right">@{{ bom.price | number:2 }}</td>
              <td width="150" class="text-right">@{{ bom.amount | number:2 }} บ.</td>
            </tr>
            <tr class="footer-table" ng-show="detail.length == $index + 1">
              <td class="text-center text-blue">
                <b>ยอดรวมมูลค่าสินค้า (ไม่รวม VAT) </b>
              </td>
              <td colspan="3" class="text-center text-blue">
                <b>@{{ itemNoBom.length + boms.length }} รายการ</b>
              </td>
              <td class="text-right text-blue">
                <b>@{{ totalAmount | number:2 }} บ.</b>
              </td>
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