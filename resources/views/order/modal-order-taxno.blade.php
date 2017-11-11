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
            <p><strong>ร้านค้า :</strong> @{{MBill.soldTo}} @{{MBill.pName}}</p>
            <p><strong>เลขที่ใบสั่งซื้อ :</strong> @{{MBill.runno}} / @{{MBill.purchNoC}}</p>
            <!-- <p><strong>เลขที่เอกสารอ้างอิง : </strong></p> -->
            <p><strong>เลขที่เอกสารอ้างอิง : </strong> @{{MBill.salesDocument}}  วันที่ : @{{MBill.billCreDte | date:'dd/MM/yy'}}</p>
        </div>
        <div class="col-sm-4">
            <div class="row">
            <p><strong>No. : </strong>@{{ MBill.taxNum }}</p>
            <p><strong>&nbsp;&nbsp;วันที่  </strong>@{{ MBill.billDate | date:'dd/MM/yy' }} เวลา @{{MBill.billCreTim }}</p>
            </div>
            <div class="row">
            <!-- <p><strong>สถานที่ส่ง : </strong>  @{{MBill.pName}}</p><p>  &nbsp;@{{MBill.pSubDistrict}}</p><p>  &nbsp;@{{MBill.pDistrict}}</p> -->
            </div>
            <div class="row">
            <p><strong>สถานที่จัดส่ง : </strong>
            <p>@{{MBill.pHouseNum}} &nbsp; @{{MBill.pName}} </p>
            </div>
            
            <div class="row">
            <p>@{{MBill.pSubDistrict}} &nbsp; @{{MBill.pDistrict}} </p>
            </div>

            <div class="row">
            <p>@{{MBill.pStreet}} &nbsp; @{{MBill.pPostCode}} </p>
            </div>
            
            
            
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
                    <td class="text-left"> @{{MBill.purchNoC}}</td>
                    <td class="text-center">@{{ item.custRecDate | date:'dd/MM/yy' }} </td>
                    <td class="text-center">@{{ item.billVbeln }}</td>
                    <td class="text-center"></td> <!-- ติดไม่มีข้อมูลรอพี่เปิ้ล ตาม SAP -->
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
                    <td class="text-right">@{{ item.pricePerUnit | number:2}}</td>
                    <td class="text-right">@{{ item.amount | number }}</td>
                </tr>
                <!-- <tr>
                  <td class="text-right" colspan="6">รวมมูลค่าสินค้า</td>
                  <td class="text-right" colspan="1">@{{totalsum_manual | number:2}}</td>
                </tr> -->
                <!-- <tr>
                  <td class="text-right" colspan="6">ภาษีมูลค่าเพิ่ม 7%</td>
                  <td class="text-right" colspan="1"> @{{ MBill.headVat | number:2}} </td>
                </tr> -->
                <!-- <tr>
                  <td class="text-right" colspan="6">ยอดรวม</td>
                  <td class="text-right" colspan="1">@{{ MBill.headNetwr2 | number:2}} </td>
                </tr> -->
                </tbody>
            </table>
        </div>
        </br>

        <div class="invoice-block row-12">
            <table class="table table-hover table-bordered">
                <thead class="thead-default ">
                      <!-- <tr>
                          <th class="text-center">ประเภท</th>
                          <th class="text-center">รายละเอียด</th>
                          <th class="text-center">ราคา</th>
                      </tr> -->
                  </thead>

                  <tbody>
                  <tr ng-repeat="item in descountdetail">
                      <td class="text-center">@{{item.type}}</td>
                      <td class="text-left">@{{item.descp}}</td>
                      <td class="text-right">@{{item.kwert | number:2}}</td>
                  </tr>
                  </tbody>
              </table>
          </div>



          <div class="row">
            <div class="col-sm-6 text-danger"></div>
            <div class="col-sm-4 text-right">
              <strong>รวมมูลค่าสินค้า :</strong>
            </div>
            <div class="col-sm-2 text-right">
              @{{ MBill.headNetwr2 | number}}<strong> บาท</strong>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6 text-danger"></div>
            <div class="col-sm-4 text-right">
            <strong>ภาษีมูลค่าเพิ่มอัตรา 7% :</strong>
            </div>
            <div class="col-sm-2 text-right">
            @{{ MBill.headVat | number:2}}<strong> บาท</strong>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6 text-danger"></div>
            <div class="col-sm-4 text-right">
            <strong>ยอดรวม :</strong>
            </div>
            <div class="col-sm-2 text-right">
            @{{ MBill.headVat + MBill.headNetwr2| number}}<strong> บาท</strong>
            </div>
          </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>
