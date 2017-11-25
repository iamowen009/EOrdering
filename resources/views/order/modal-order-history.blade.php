<div id="OrderHistoryModal" class="modal" role="dialog" tabindex="-1">
<div class="modal-dialog-invoice modal-lg">

    <div class="modal-content inv-content">
      <div class="modal-header info">
        <img src="<?= asset('images/logo-TOA.png') ?>" style="width:30%;margin-left: -95px;">
        <button type="button" class="close" data-dismiss="modal" style="font-size:42px;color:red;">&times;</button>
        <div class="col-sm-6 text-right">
          <h3 class="modal-title"><b>Order / Billing Tracking</b></h3>
        </div>
      </div>

      <div class="modal-body">
        <div class="row inv-header">
          <div class="col-sm-8">
              <p><strong>ร้านค้า :</strong>  @{{ inv.payerNo }} @{{ inv.payerName }}</p>
              <p><strong>เลขที่ใบสั่งซื้อ :</strong> @{{ inv.woNumber }} / @{{ inv.poNumber}}</p>
              <p><strong>เลขที่เอกสารอ้างอิง : </strong> @{{inv.salesDocument}}  วันที่ : @{{inv.requestedDeliveryDate | date:'dd/MM/yyyy'}}</p>
          </div>

          <div class="col-sm-4">
              <p><strong>สถานที่ส่ง : </strong>@{{ inv.shipName }}</p>
              <p><strong>จัดส่งโดย : </strong>@{{ inv.transportZoneDesc }}</p>
          </div>
        </div> <!-- .row inv-header-->

        <div>
          <p>
            <strong>ออกบิล</strong>
          </p>
          <div class="invoice-block row">
              <table class="table table-hover table-bordered">
                  <thead class="thead-default">
                      <tr>
                        <th class="text-center">เลขที่บิล</th>
                        <th class="text-center">ใบนำส่ง/ วัน-เวลา รถออกจากบริษัท</th>
                        <th class="text-center">FWD Agent / ทะเบียนรถ</th>
                        <th class="text-center">ชื่อคนขับรถ / เบอร์ติดต่อ</th>
                        <th class="text-center">วัน-เวลารับบิล</th>
                        <th class="text-center">สินค้า</th>
                        <th class="text-center">จำนวนสั่งซื้อ</th>
                        <th class="text-center">จำนวนออกบิล</th>
                        <th class="text-center">จำนวนเงิน</th>
                      </tr>
                  </thead>

                  <tbody>
                  <tr ng-repeat="item in haveBill">
                      <td class="text-left"> @{{ item.billNo }} @{{item.billDate | date:'dd/MM/yyyy'}}</td>
                      <td class="text-center">@{{ item.startDat | date:'dd/MM/yyyy' }} <br> @{{ item.startTime}}</td>
                      <td class="text-center">@{{item.foragt}}  </td>
                      <td class="text-right">@{{ item.driveName}} <br> @{{ item.telDrive}}</td>
                      <td class="text-right">@{{item.custRecDate | date:'dd/MM/yyyy'}}</td>
                      <td class="text-left">@{{item.material}}  
                        <div class="">
                        @{{ item.freeGoods }} @{{ item.materialDes }}<div  class="text-danger" ng-style="item.freeGoods == ''   &&  {'display': 'none'}"> &nbsp;(ของแถม)</div>
                        </div>
                      </td>
                      <!-- <td class="text-right">@{{item.materialDes}}</td> -->
                     
                      <td class="text-center">@{{item.targetQty | number}}</td>
                      <td class="text-center">@{{item.billQty | number}}</td>
                      <td class="text-right">@{{item.netwr2 | number}}</td>
                  </tr>
                  </tbody>
              </table>

          </div>
          </br>

          <p>
            <strong>ยังไม่ออกบิล</strong>
          </p>
          <div class="invoice-block row">
              <table class="table table-hover table-bordered">
                  <thead class="thead-default">
                      <tr>
                        <th class="text-center">รหัสสินค้า</th>
                        <th class="text-center">ชื่อสินค้า</th>
                        <th class="text-center">จำนวนสั่งซื้อ</th>
                        <th class="text-center">จำนวนคงค้าง</th>
                        <th class="text-center">จำนวนยกเลิก</th>
                        <th class="text-center">จำนวนเงิน</th>
                      </tr>
                  </thead>

                  <tbody>
                  <tr ng-repeat="item in haveNoBill">
                      <td class="text-left"> @{{ item.material }}</td>
                      <td class="text-left">
                        <div class="row">
                          @{{ item.materialDes }}<div  class="text-danger" ng-style="item.freeGoods == ''   &&  {'display': 'none'}"> &nbsp;(ของแถม)</div>
                        </div>
                      </td>
                      <td class="text-center">@{{item.targetQty | number}}</td>
                      <td class="text-center">@{{ item.targetQty -  item.billQty | number}}</td>
                      <td class="text-center"></td>
                      <td class="text-right">@{{item.netwr2 | number}}</td>
                  </tr>
                  </tbody>
              </table>
              </div>





      </div>
    </div>

  </div>
</div>
</div>
