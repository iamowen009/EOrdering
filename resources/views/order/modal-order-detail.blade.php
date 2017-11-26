<div id="OrderDetailModal"  class="modal" role="dialog" tabindex="-1">
<div class="modal-dialog-invoice modal-lg invoice">
  <div class="modal-content">
    <div class="modal-header invoice__header">
      <img src="<?= asset('images/logo-TOA.png') ?>" style="width:30%;margin-left: -95px;">
      <button type="button" class="close" data-dismiss="modal" style="font-size:42px;color:red;">&times;</button>
      <div class="col-sm-6 text-right">
        <h3 class="modal-title"><b>สถานะการสั่งซื้อ</b></h3>
      </div>
    </div>
    <div class="modal-body invoice__body">
    <div class="invoice__body--infomation">
      <div class="left">
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
              <td> @{{inv.shipCode}} : @{{ inv.shipName }}</td>
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
      <div class="right">
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
              <td>@{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' ) }}</td>
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
            <th width="50%" class="text-center text-blue">รายการสินค้า</th>
            <th width="100" class="text-center text-blue">สั่งซื้อ</th>
            <th width="100" class="text-center text-blue">ออกบิล</th>
            <th width="100" class="text-center text-blue">การจอง</th>
            <th width="100" class="text-center text-blue">คงค้าง</th>
            <th width="100" class="text-center text-danger">ยกเลิก</th>
            <th width="150" class="text-center text-blue">หน่วย</th>
          </tr>
        </thead>
        <tbody >
          <tr ng-repeat="item in detail">
            <td width="50%">@{{ item.material }} @{{ item.materialDes }}</td>
            <td width="100" class="text-center">@{{ item.targetQty | number }}</td>
            <td width="100" class="text-center">@{{ item.billQty | number }}</td>
            <td width="100" class="text-center">@{{ item.deliQty  | number }}</td>
            <td width="100" class="text-center">@{{ item.balaQty | number}}</td>
            <td width="100" class="text-center text-danger">@{{ item.rejeQty | number }}</td>
            <td width="150" class="text-center">@{{item.unit}}</td>
          </tr>

          <tr class="footer-table" ng-show="detail.length > 0">
            <td class="text-center text-blue" >
            <b>รวม : </b>
            </td>
            <td class="text-center text-blue" >
              @{{TotaltargetQty}}
            </td>
            <td class="text-center text-blue" >
              @{{TotalbillQty}}
            </td>
            <td class="text-center text-blue" >
              @{{TotaldeliQty}}
            </td>
            <td class="text-center text-blue" >
              @{{TotalbalaQty}}
            </td>
            <td class="text-center text-blue" >
              @{{TotalrejeQty}}
            </td>
            <td class="text-center text-blue" >
            </td>
          </tr>
        </tbody>
        <tfoot>
        </tfoot>
      </table>

      <br>
      <div class="row">
            <style>
            .notetitle{
              width: 12%;
              display: block;
              float: left;
            }
            </style>
            <div class="col-sm-6 text-danger"> <strong>Note  </strong></div>
            <div class="col-sm-6 text-right"></div>
						<div class="col-sm-6 text-danger"><span class="notetitle">สั่งซื้อ</span>: จำนวนสินค้าที่สั่งซื้อ</div>
            <div class="col-sm-6 text-right"></div>
						<div class="col-sm-6 text-danger"><span class="notetitle">ออกบิล</span>: จำนวนสินค้าที่เปิดบิลแล้ว</div>
            <div class="col-sm-6 text-right"></div>
						<div class="col-sm-6 text-danger"><span class="notetitle">การจอง</span>: จำนวนสินค้าที่ได้รับการจองและรอการเปิดบิล</div>
            <div class="col-sm-6 text-right"></div>
						<div class="col-sm-6 text-danger"><span class="notetitle">คงค้าง</span>: จำนวนสินค้ารอดำเนินการ</div>
            <div class="col-sm-6 text-right"></div>
						<div class="col-sm-6 text-danger"><span class="notetitle">ยกเลิก </span>: จำนวนสินค้าที่ทำการยกเลิก</div>
            <div class="col-sm-6 text-right"></div>

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
</div>