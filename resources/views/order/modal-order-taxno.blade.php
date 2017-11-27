<div id="TaxModal" class="modal" role="dialog" tabindex="-1">
<div class="modal-dialog-invoice modal-lg invoice">
  <div class="modal-content">
    <div class="modal-header invoice__header">
      <img src="<?= asset('images/logo-TOA.png') ?>" style="width:30%;margin-left: -95px;">
      <button type="button" class="close" data-dismiss="modal" style="font-size:42px;color:red;">&times;</button>
      <div class="col-sm-6 text-right">
        <h3 class="modal-title"><b>รายละเอียดใบกำกับภาษี</b></h3>
      </div>
    </div>
    <div class="modal-body invoice__body">
    <div class="invoice__body--infomation">
      <div class="left poptaxno">
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
      <div class="right poptaxno">
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
            <tr ng-hide="inv.salesDocument == '' || inv.salesDocument == null">
              <td class="text-bold text-blue">เลขที่เอกสาร</td>
            <td>@{{inv.salesDocument}}
            <span class="text-bold text-blue"> / วันที่</span> @{{ inv.requestDate | date:'dd/MM/yyyy' }}
            </td>
            </tr>
            <tr ng-if="inv.salesDocument == '' || inv.salesDocument == null">
              <td class="text-bold text-blue">เลขที่เอกสาร</td>
              <td>-</td>
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
                <th width="400" style="border-bottom:1px solid #ffffff; " class="text-center" colspan="2">ใบสั่งซื้อ (P/O)</th>
                <th width="400" class="text-center" rowspan="2">เอกสารอ้างอิง / TAX No.</th>
                <th width="200" class="text-center" rowspan="2">กำหนดชำระ <br/> DUE DATE</th>
            </tr>
            <tr>
                <th  width="200" class="text-center" rowspan="1">เลขที่</th>
                <th  width="200" class="text-center" rowspan="1">วันที่</th>
            </tr>

        </thead>
        <tbody >
            <tr>
                <td class="text-center" width="200"> @{{inv.purchNoC}}</td>
                <td class="text-center" width="200"> @{{ detail[0].custRecDate | date:'dd/MM/yyyy' }} </td>
                <td class="text-center" width="400">@{{ detail[0].billVbeln }} / @{{inv.taxNum}}</td>
                <td class="text-center" width="200">@{{inv.pmnttrms}}</td>
            </tr>
        </tbody>
        </table>

        <table class="invoice__body--table scroll">
        <thead>
            <tr>
                <th class="text-center" width="300">รายการสินค้า</th>
                <th class="text-center" width="100">จำนวน</th>
                <th class="text-center" width="150">ราคาต่อหน่วย</th>
                <th class="text-center" width="150">ส่วนลด %</th>
                <th class="text-center" width="150">ราคาสุทธิ/หน่วย</th>
                <th class="text-center" width="150">จำนวนเงิน</th>
            </tr>
        </thead>
        <tbody >
            <tr ng-repeat="item in detail">
                <td ng-hide="item.amount== 0 && item.freeGoods == 'X'" class="text-left" width="300">
                    @{{ item.material }}<br/>@{{ item.materialDes }} <div  class="text-danger" ng-style="item.freeGoods == ''   &&  {'display': 'none'}"> &nbsp;(ของแถม)</div>
                </td>
                <td ng-if="item.amount== 0 && item.freeGoods == 'X'" class="text-left" width="300">
                    <strong>@{{ item.material }}<br/>@{{ item.materialDes }} </strong><div  class="text-danger" ng-style="item.freeGoods == true   &&  {'display': 'none'}"> &nbsp;(ของแถม)</div>
                </td>
                <td ng-hide="item.amount== 0 && item.freeGoods == 'X'" class="text-center" width="100">@{{ item.targetQty | number }}</td>
                <td ng-hide="item.amount== 0 && item.freeGoods == 'X'" class="text-right" width="150">@{{ item.netwrPerUnit | number}}</td>
                <!-- <td ng-hide="item.amount== 0 && item.freeGoods == 'X'" class="text-center" width="150">@{{ item.discount }}</td> -->
                <td ng-hide="item.amount== 0 && item.freeGoods == 'X'" class="text-center" width="300" ng-bind-html="item.discount"></td>
                <td ng-hide="item.amount== 0 && item.freeGoods == 'X'" class="text-right" width="150"> @{{ item.pricePerUnit | number:2}}</td>
                <td ng-hide="item.amount== 0 && item.freeGoods == 'X'" class="text-right" width="150">@{{ item.amount | number }} บ.</td>
            </tr>
            
            <tr>
                <td colspan="6"></td>
            </tr>
            <tr ng-repeat="item in descountdetail">
                <td class="text-center" ng-style="{'color': (item.type == 'เพิ่ม') ? '#0000FF' : '#FF0000' }">
                    @{{ item.type }}
                </td>
                <td class="text-left" colspan="2">@{{item.descp}}</td>
                <td class="text-right" colspan="3">@{{item.kwert | number:2}} บ.</td>
            </tr> 


            <tr class="footer-table">
              <td></td>
              <td colspan="4" class="text-right text-blue" >
                <b>รวมมูลค่าสินค้า : </b>
              </td>
              <td colspan="2" class="text-right text-blue">
                <b>@{{ inv.headNetwr2 | number:2 }} บ.</b>
              </td>
            </tr>
            <tr class="footer-table">
              <td></td>
              <td colspan="4" class="text-right text-blue" >
                <b>ภาษีมูลค่าเพิ่มอัตรา 7% : </b>
              </td>
              <td colspan="2" class="text-right text-blue">
                <b>@{{ inv.headVat | number}} บ.</b>
              </td>
            </tr>
            <tr class="footer-table">
              <td></td>
              <td colspan="4" class="text-right text-blue" >
                <b>ยอดรวม : </b>
              </td>
              <td colspan="2" class="text-right text-blue">
                <b>@{{ inv.headNetwr2 + inv.headVat | number}} บ.</b>
              </td>
            </tr>   

            </tbody>
        </table>
                
        <tfoot>
   
        </tfoot>
      </table>
      <div class="modal-footer invoice__footer" style="display:none">
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
</div>