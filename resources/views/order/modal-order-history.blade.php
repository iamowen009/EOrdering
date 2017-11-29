<div id="OrderHistoryModal" class="modal" role="dialog" tabindex="-1">
<div class="modal-dialog-invoice modal-lg invoice">
  <div class="modal-content">
    <div class="modal-header invoice__header">
      <img src="<?= asset('images/logo-TOA.png') ?>" style="width:30%;margin-left: -95px;">
      <button type="button" class="close" data-dismiss="modal" style="font-size:42px;color:red;">&times;</button>
      <div class="col-sm-6 text-right">
        <h3 class="modal-title"><b>Order / Billing Tracking</b></h3>
      </div>
    </div>
    <div class="modal-body invoice__body">
    <div class="invoice__body--infomation">
      <div class="left popbilling">
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
      <div class="right popbilling">
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
              <td>@{{ inv.paymentTerm === 'CASH'|| inv.paymentTerm === 'CA02' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' ) }}</td>
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

                
      <p style="margin-top: 20px;margin-bottom: 5px;"><strong >ออกบิล</strong></p>
      <table class="invoice__body--table scroll" style="margin-top: 0px;">
        <thead>
          <tr>
            <th width="10%" class="text-center text-blue">เลขที่บิล</th>
            <th width="10%" class="text-center text-blue">ใบนำส่ง/ วัน-เวลา รถออกจากบริษัท</th>
            <th width="10%" class="text-center text-blue">FWD Agent / ทะเบียนรถ</th>
            <th width="10%" class="text-center text-blue">ชื่อคนขับรถ / เบอร์ติดต่อ</th>
            <th width="10%" class="text-center text-blue">วัน-เวลารับบิล</th>
            <th width="24%" class="text-center text-blue">ผลิตภัณฑ์</th>
            <th width="8%" class="text-center text-blue">จำนวนสั่งซื้อ</th>
            <th width="8%" class="text-center text-blue">จำนวนออกบิล</th>
            <th width="10%" class="text-center text-blue">จำนวนเงิน</th>
          </tr>

        </thead>
        <tbody >
          <tr ng-repeat="item in haveBill">
            <td width="10%">@{{ item.billNo }} @{{item.billDate | date:'dd/MM/yyyy'}}</td>
            <td width="10%" class="text-center">@{{ item.startDat | date:'dd/MM/yyyy' }} <br> @{{ item.startTime}}</td>
            <td width="10%" class="text-center">@{{item.foragt}}</td>
            <td width="10%" class="text-center">@{{ item.driveName}} <br> @{{ item.telDrive}}</td>
            <td width="10%" class="text-right">@{{item.custRecDate | date:'dd/MM/yyyy'}}</td>
            <td width="24%" >@{{item.material}}  
                        <div class="">
                        @{{ item.freeGoods }} @{{ item.materialDes }}<div  class="text-danger" ng-style="item.freeGoods == ''   &&  {'display': 'none'}"> &nbsp;(ของแถม)</div>
                        </div>
            </td>
            <td width="8%" class="text-center">@{{item.targetQty | number}}</td>
            <td width="8%" class="text-center">@{{item.billQty | number}}</td>
            <td width="10%" class="text-right">@{{item.netwr2 | number}} บ.</td>
          </tr>
        </tbody>
        </table>

    
        <p style="margin-top: 20px;margin-bottom: 5px;"><strong >ยังไม่ออกบิล</strong></p>
        <table class="invoice__body--table scroll" style="margin-top: 0px;">
          <thead>
            <tr>
              <th width="40%;word-wrap:break-word;" class="text-center text-blue">ผลิตภัณฑ์</th>
              <th width="10%" class="text-center text-blue">จำนวนสั่งซื้อ</th>
              <th width="10%" class="text-center text-blue">จำนวนคงค้าง</th>
              <th width="10%" class="text-center text-blue">จำนวนยกเลิก</th>
              <th width="10%" class="text-center text-blue">จำนวนเงิน</th>
            </tr>

          </thead>
          <tbody >
            <tr ng-repeat="item in haveNoBill">
              <td ng-hide="item.netwr2== 0 && item.freeGoods == 'X'" width="40%;word-wrap:break-word;"> @{{ item.material }} @{{ item.materialDes }}</td>
              <td ng-if="item.netwr2== 0 && item.freeGoods == 'X'" width="40%;word-wrap:break-word;"><strong> @{{ item.material }} @{{ item.materialDes }}</strong></td>

              <td ng-hide="item.netwr2== 0 && item.freeGoods == 'X'" width="10%" class="text-center">@{{item.targetQty | number}}</td>
              <td ng-hide="item.netwr2== 0 && item.freeGoods == 'X'" width="10%" class="text-center">@{{ item.targetQty -  item.billQty | number}}</td>
              <td ng-hide="item.netwr2== 0 && item.freeGoods == 'X'" width="10%" class="text-center"></td>
              <td ng-hide="item.netwr2== 0 && item.freeGoods == 'X'" width="10%" class="text-right">@{{item.netwr2 | number}} บ.</td>
            </tr>
          </tbody>
          </table>         
        <tfoot>
   
        </tfoot>
      </table>
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
</div>