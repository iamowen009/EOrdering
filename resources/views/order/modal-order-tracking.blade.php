<div id="OrderTrackingModal" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">

    <div class="modal-content">
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
              <p><strong>ร้านค้า :</strong>  @{{ inv.customerName }}</p>
              <p><strong>เลขที่ใบสั่งซื้อ :</strong> @{{ inv.documentNumber }} / @{{ inv.customerPO}}</p>
              <p><strong>เลขที่เอกสารอ้างอิง : </strong></p>
          </div>
          <div class="col-sm-4">
              <p><strong>สถานที่ส่ง : </strong> @{{inv.shipCode.substring(2, 10)}} @{{ inv.shipName }}</p>
              <p><strong>จัดส่ง : </strong>@{{ inv.transportZoneDesc }}</p>
          </div>
        </div>
		
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
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-left">@{{item.productCode}}</td>
                            <td class="text-left">@{{ item.productNameTh }}</td>
                            <td class="text-center">@{{ item.qty | number }}</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                        </tr>
                    </tbody>

                </table>

            </div>
            </br>

			<div>
                <p class="text-danger">
                    <strong>ยังไม่ออกบิล</strong>
                </p>
            <div class="invoice-block row">
                <table class="table table-hover table-bordered">
                    <thead class="thead-default">
                        <tr>
                            <th class="text-center">รหัสสินค้า</th>
                            <th class="text-center">ชื่อสินค้า</th>
                            <th class="text-center">จำนวนสั่งซื้อ</th>
                            <th class="text-center">จำนวนออกบิล</th>
                            <th class="text-center">จำนวนเงิน</th>
                        </tr>
                    </thead>

                    <tbody>
                    <tr ng-repeat="item in detail">
                            <td class="text-left">@{{item.productCode}}</td>
                            <td class="text-left">@{{ item.productNameTh }}</td>
                            <td class="text-center">@{{ item.qty | number }}</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                    </tr>
                    </tbody>

                </table>

            </div>
            </br>

        </div>
    </div> 

  </div>
</div>
</div>
