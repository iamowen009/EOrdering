<div id="OrderHistoryModal" class="modal" role="dialog">
<div class="modal-dialog-invoice modal-lg">

    <div class="modal-content inv-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    	 	<div class="col-sm-12 text-center">
        	<h4 class="modal-title">รายละเอียดสถานะการสั่งซื้อ</h4>
        </div>
      </div>
      
      <div class="modal-body">
        <div class="row inv-header">
          <div class="col-sm-8">
              <p><strong>ร้านค้า :</strong>  @{{ inv.payerNo }} @{{ inv.payerName }}</p>
              <p><strong>เลขที่ใบสั่งซื้อ :</strong> @{{ inv.woNumber }} / @{{ inv.poNumber}}</p>
              <p><strong>เลขที่เอกสารอ้างอิง : </strong> @{{inv.salesDocument}}  วันที่ : @{{inv.requestedDeliveryDate | date:'dd/MM/yy'}}</p>
          </div>

          <div class="col-sm-4">
              <p><strong>สถานที่ส่ง : </strong>@{{ inv.shipName }}</p>
              <p><strong>จัดส่ง : </strong>@{{ inv.transportZoneDesc }}</p>
          </div>
        </div> <!-- .row inv-header-->

        <div>
          <p>
            <strong>รายละเอียดสินค้า</strong>
          </p>
          <div class="invoice-block row">
              <table class="table table-hover table-bordered">
                  <thead class="thead-default">
                      <tr>
                        <th class="text-center">เลขที่บิล</th>
                        <th class="text-center">ใบนำส่ง/ วัน-เวลา รถออกจากบริษัท</th>
                        <th class="text-center">FWD Agent / ทะเบียนรถ</th>
                        <th class="text-center">ชื่อคนขับรถ / เบออร์ติดต่อ</th>
                        <th class="text-center">วัน-เวลารับบิล</th>
                        <th class="text-center">รหัสสินค้า</th>
                        <th class="text-center">ชื่อสินค้า</th>
                        <th class="text-center">จำนวนสั่งซื้อ</th>
                        <th class="text-center">จำนวนออกบิล</th>
                        <th class="text-center">จำนวนเงิน</th>
                      </tr>
                  </thead>

                  <tbody>
                  <tr ng-repeat="item in detail">
                      <td class="text-left"> @{{ item.billDatebillNo }}</td>
                      <td class="text-center">@{{ item.startDatstartTime | number }}</td>
                      <td class="text-center">@{{item.foragt}}</td>
                      <td class="text-right">@{{ item.driveNametelDrive | number:2}}</td>
                      <td class="text-right">@{{item.custRecDatecustRecTime | number:2}}</td>
                      <td class="text-right">@{{item.material | number:2}}</td>
                      <td class="text-right">@{{item.materialDes | number:2}}</td>
                      <td class="text-right">@{{item.targetQty | number:2}}</td>
                      <td class="text-right">@{{item.billQty | number:2}}</td>
                      <td class="text-right">@{{item.netwr2 | number:2}}</td>
                  </tr>
                  


                  

                  </tbody>
              </table>

          </div>
          </br>

       

       
         
         

      </div>
    </div>

  </div>
</div>