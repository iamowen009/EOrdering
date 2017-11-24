<div id="OrderStatusModal" class="modal" role="dialog" tabindex="-1">
  <div class="modal-dialog-invoice modal-lg">
    <div class="modal-content inv-content">
      <div class="modal-header info">
       <img src="<?= asset('images/logo-TOA.png') ?>" style="width:30%;margin-left: -95px;">
        <button type="button" class="close" data-dismiss="modal" style="font-size:42px;color:red;">&times;</button>
        <div class="col-sm-6 text-right">
          <h3 class="modal-title"><b>รายละเอียดการสั่งซื้อ</b></h3>
        </div>
      </div>
      <div class="modal-body invoice__body">
        <div class="invoice__body--infomation">
          <div class="left">
            <table>
              <tbody>
                <tr>
                  <td width="110" class="text-bold text-blue">ร้านค้า</td>
                  <td class="text-bold text-blue" style="font-size:14px;"> @{{ inv.payerNo }} @{{ inv.payerName }}</td>
                </tr>
                <tr>
                  <td class="text-bold text-blue">ที่อยู่</td>
                  <td>@{{ inv.address }} &nbsp;@{{inv.street}} &nbsp;@{{inv.subDistrictName}}
                    <br>&nbsp;@{{inv.districtName}} &nbsp;@{{inv.cityName}}</td>
                </tr>
                <tr ng-hide="inv.customerEmail == '' || inv.customerEmail == null">
                  <td class="text-bold text-blue">อีเมล</td>
                  <td>@{{ inv.customerEmail }}</td>
                </tr>
                 <tr ng-if="inv.customerEmail == '' || inv.customerEmail == null">
                  <td class="text-bold text-blue">อีเมล</td>
                  <td>-</td>
                </tr>
                <tr ng-hide="inv.customerTelNo == '' || innv.customerTelNo == null">
                  <td class="text-bold text-blue">โทรศัพท์</td>
                  <td>@{{ inv.customerTelNo }}</td>
                </tr>
                <tr nng-if="inv.customerTelNo == '' || innv.customerTelNo == null">
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
                <tr>
                  <td width="110" class="text-bold text-blue">เลขที่ใบสั่งซื้อ </td>
                  <td>@{{ inv.woNumber }}
                    <span class="text-bold text-blue"> / วันที่</span> @{{ inv.documentDate | date:'dd/MM/yyyy' }}
                  </td>
                </tr>
                <tr ng-if="inv.poNumber == '' || inv.poNumber == null">
                  <td class="text-bold text-blue">PO number</td>
                  <td>-</td>
                </tr>
                <tr ng-hide="inv.poNumber == '' || inv.poNumber == null">
                  <td class="text-bold text-blue">PO number</td>
                  <td>@{{ inv.poNumber}}</td>
                </tr>
                <tr ng-hide="inv.poNumber == '' || inv.poNumber == null">
                  <td class="text-bold text-blue">เลขที่เอกสาร</td>
                  <td> @{{inv.salesDocument}} <span class="text-bold text-blue"> / วันที่</span>  @{{inv.requestedDeliveryDate | date:'dd/MM/yyyy'}}</td>
                </tr>
                <tr>
                  <td class="text-bold text-blue">Request Date</td>
                  <td>@{{ inv.requestDate | date:'dd/MM/yyyy' }}</td>
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
        <div>
        <br/>

          <div class="invoice-block row">
            <table class="table table-hover table-bordered">
              <thead class="thead-default">
                <tr>
                  <th class="text-center">รหัสสินค้า</th>
                  <th class="text-center">สินค้า</th>
                  <th class="text-center">จำนวน</th>
                  <th class="text-center">หน่วย</th>
                  <th class="text-center">ราคา/หน่วย</th>
                  <th class="text-center" style="width:5px">ส่วนลด</th>
                  <th class="text-center">ราคาหลังหักส่วนลด</th>
                  <th class="text-center">ราคารวม</th>
                </tr>
              </thead>

              <tbody>
                <tr ng-repeat="item in detail">
                  <td>
                    @{{item.material}}
                  </td>
                  <!-- <td class="text-left"> @{{ item.materialDes }}</td> -->

                  <td class="text-left">
                    <div class="row">
                      @{{ item.materialDes }}
                      <div class="text-danger" ng-style="item.freeGoods == ''  &&  {'display': 'none'}">
                      &nbsp;(ของแถม)</div>
                    </div>
                  </td>

                  <td class="text-center">@{{ item.targetQty | number }}</td>
                  <td class="text-center">@{{item.salesUnit}}</td>
                  <td class="text-right">@{{ item.pricePerUnit | number:2}}</td>
                  <td class="text-right">@{{item.discount }}</td>
                  <td class="text-right">@{{item.netwrPerUnit | number:2}}</td>
                  <td class="text-right">@{{item.amount | number:2}} บ.</td>
                </tr>
              </tbody>
            </table>
          </div>

          <p align="right">
            <strong>@{{inv.sumAmount | number:2}}&nbsp;</strong>
          </p>
          </br>




          <div class="invoice-block row">
            <table class="table table-hover">

              <tbody style="border-top: 2px solid #fff;">
                <tr ng-repeat="item in discount">
                  <td class="text-center" ng-style="item.type === 'หัก' &&  {'color': 'red'} ">@{{item.type}}</td>
                  <td class="text-left">@{{item.description}}</td>
                  <td class="text-right">@{{item.kwert | number:2}}</td>
                </tr>
              </tbody>
            </table>
          </div>





          <div class="row footer-popup">
            <div class="col-sm-6 text-danger"></div>
            <div class="col-sm-4 text-right">
              <strong>รวมมูลค่าสินค้า :</strong>
            </div>
            <div class="col-sm-2 text-right">
              @{{ inv.netValue2 | number:2}}
              <strong> บาท</strong>
            </div>
          </div>

          <div class="row footer-popup">
            <div class="col-sm-6 text-danger"> </div>
            <div class="col-sm-4 text-right">
              <strong>ภาษีมูลค่าเพิ่มอัตรา 7% :</strong>
            </div>

            <div class="col-sm-2 text-right">
              @{{ inv.vatAmount | number}}
              <strong> บาท</strong>
            </div>
          </div>

          <div class="row footer-popup">
            <div class="col-sm-6 text-danger"> </div>
            <div class="col-sm-4 text-right">
              <strong>ยอดรวม :</strong>
            </div>
            <div class="col-sm-2 text-right">
              @{{ inv.netValue2 + inv.vatAmount | number}}
              <strong> บาท</strong>
            </div>
          </div>

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