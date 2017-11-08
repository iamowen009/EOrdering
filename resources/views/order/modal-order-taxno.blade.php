<div id="TaxModal" class="modal" role="dialog">
<div class="modal-dialog-invoice modal-lg">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header info">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="col-sm-12 text-center">
          <h4 class="modal-title">รายละเอียดใบกำกับภาษี</h4>
      </div>
    </div>
    <div class="modal-body">
          <div class="row inv-header">
        <div class="col-sm-8">
            <p><strong>ร้านค้า :</strong> @{{MBill.billno}} </p>
            <p><strong>เลขที่ใบสั่งซื้อ :</strong> @{{MBill.woNumber}} / @{{MBill.poNumber}}</p>
            <!-- <p><strong>เลขที่เอกสารอ้างอิง : </strong></p> -->
            <p><strong>เลขที่เอกสารอ้างอิง : </strong> @{{MBill.salesDocument}}  วันที่ : @{{MBill.requestedDeliveryDate | date:'dd/MM/yy'}}</p>
        </div>
        <div class="col-sm-4">
            <p><strong>สถานที่ส่ง : </strong>@{{ MBill.shipName }}</p>
            <p><strong>จัดส่ง : </strong>@{{ MBill.transportZoneDesc }}</p>
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
                        <th class="text-center" colspan="2">ใบสั่งซื้อ (P/O)</th>
                        <th class="text-center" rowspan="2">เอกสารอ้างอิง</th>
                        <th class="text-center" rowspan="2">กำหนดชำระ (วัน)</th>
                    </tr>
                    <tr>
                      <th class="text-center" rowspan="1">เลขที่</th>
                      <th class="text-center" rowspan="1">วันที่</th>
                    </tr>
                </thead>

                <tbody>
                <tr ng-repeat="item in detail">
                    <td class="text-left"> @{{item.shipmentDoc}}</td>
                    <td class="text-center">@{{ item.custRecDate | date:'dd/MM/yy' }} <br> @{{ item.custRecTime}}</td>
                    <td class="text-center">@{{ item.billQty | number }}</td>
                    <td class="text-center">@{{ item.startDat | date:'dd/MM/yy' }}</td>
                </tr>
                </tbody>

                  <!-- <thead class="thead-default">
                    <tr>
                        <th class="text-left">รวม</th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                    </tr>
                  </thead> -->
            </table>



            <table class="table table-hover table-bordered">
                <thead class="thead-default">
                    <tr>
                        <th class="text-center" rowspan="1">รหัสสินค้า</th>
                        <th class="text-center" rowspan="1">รายการสินค้า</th>
                        <th class="text-center" rowspan="1">จำนวน</th>
                        <th class="text-center" rowspan="1">ราคาส่งต่อหน่วย</th>
                        <th class="text-center" rowspan="1">ส่วนลด</th>
                        <th class="text-center" rowspan="1">ราคาสุทธิ/หน่วย</th>
                        <th class="text-center" rowspan="1">จำนวนเงิน</th>
                    </tr>
                    
                </thead>

                <tbody>
                <tr ng-repeat="item in detail">
                    <td class="text-center">@{{ item.material }}</td>
                    <td class="text-center">@{{ item.materialDes }}</td>
                    <td class="text-center">@{{ item.targetQty | number }}</td>
                    <td class="text-center">@{{ item.netwrPerUnit | number}}</td>
                    <td class="text-center">@{{ item.discount }}</td>
                    <td class="text-center">@{{ item.pricePerUnit | number}}</td>
                    <td class="text-center">@{{ item.amount | number }}</td>
                </tr>
                <tr>
                  <td class="text-right" colspan="6">รวมมูลค่าสินค้า</td>
                  <td class="text-left" colspan="1"></td>
                </tr>
                <tr>
                  <td class="text-right" colspan="6">ภาษีมูลค่าเพิ่ม 7%</td>
                  <td class="text-left" colspan="1"></td>
                </tr>
                <tr>
                  <td class="text-right" colspan="6">ยอดรวม</td>
                  <td class="text-left" colspan="1"></td>
                </tr>
                </tbody>

                  <!-- <thead class="thead-default">
                    <tr>
                        <th class="text-left">รวม</th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                    </tr>
                  </thead> -->
            </table>
        </div>
        </br>

   
       
    </div>
  </div>

</div>
</div>
</div>
