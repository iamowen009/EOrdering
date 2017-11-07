<div id="OrderDetailModal" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="col-sm-12 text-center">
        	<h4 class="modal-title">รายละเอียดสถานะการสั่งซื้อ</h4>
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
              <p><strong>สถานที่ส่ง : </strong>@{{ inv.shipName }}</p>
              <p><strong>จัดส่ง : </strong>@{{ inv.transportZoneDesc }}</p>
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
                          <th class="text-left">รายการสินค้า</th>
                          <th class="text-center">สั่งซื้อ</th>
                          <th class="text-center">ออกบิล</th>
                          <th class="text-center">การจอง</th>
                          <th class="text-center">คงค้าง</th>
                          <th class="text-center text-danger">ยกเลิก</th>
                          <th class="text-center">หน่วย</th>
                      </tr>
                  </thead>

                  <tbody>
                  <tr ng-repeat="item in detail">
                      <td class="text-left"> @{{item.productCode}} @{{ item.productNameTh }}</td>
                      <td class="text-center">@{{ item.qty | number }}</td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center"></td>
                      <td class="text-center text-danger"></td>
                      <td class="text-center">@{{item.unitNameTh}}</td>
                  </tr>
                  </tbody>

									<thead class="thead-default">
                      <tr>
                          <th class="text-left">รวม</th>
                          <th class="text-center"></th>
                          <th class="text-center"></th>
                          <th class="text-center"></th>
                          <th class="text-center"></th>
                          <th class="text-center text-danger"></th>
                          <th class="text-center"></th>
                      </tr>
                  </thead>

              </table>

          </div>
          </br>

          <div class="row">
            <div class="col-sm-6 text-danger"> <strong>Note : </strong></div>
            <div class="col-sm-6 text-right"></div>
						<div class="col-sm-6 text-danger">สั่งซื้อ : จำนวนสินค้าที่สั่งซื้อ</div>
            <div class="col-sm-6 text-right"></div>
						<div class="col-sm-6 text-danger">ออกบิล : จำนวนสินค้าที่เปิดบิลแล้ว</div>
            <div class="col-sm-6 text-right"></div>
						<div class="col-sm-6 text-danger">การจอง : จำนวนสินค้าที่ได้รับการจองและรอการเปิดบิล</div>
            <div class="col-sm-6 text-right"></div>
						<div class="col-sm-6 text-danger">คงค้าง : จำนวนสินค้ารอดำเนินการ</div>
            <div class="col-sm-6 text-right"></div>
						<div class="col-sm-6 text-danger">ยกเลิก : จำนวนสินค้าที่ทำการยกเลิก</div>
            <div class="col-sm-6 text-right"></div>

          </div>
          </br>

      </div>
    </div>

  </div>
</div>
</div>

        <!-- <table class="table table-borderd">
			<thead>
				<tr class="info">
					<th>รายการสินค้า</th>
					<th>จำนวนสั่งซื้อ</th>
					<th>จำนวนออกบิล</th>
					<th>จำนวนการจอง</th>
					<th>จำนวนคงค้าง</th>
					<th>จำนวนยกเลอก</th>
					<th>หน่วย</th>
				</tr></thead>
			<tbody>
				<tr>
					<td>F100200300 ซุปเปอร์ชิลด์ สีน้ำกึ่งเงา ภายนอก 1 กล #G100</td>
					<td>8</td>
					<td>0</td>
					<td>0</td>
					<td>0</td>
					<td>8</td>
					<td>GL</td>
				</tr>
				<tr>
					<td>F100200300 ซุปเปอร์ชิลด์ สีน้ำกึ่งเงา ภายนอก 1 กล #G100</td>
					<td>8</td>
					<td>0</td>
					<td>0</td>
					<td>0</td>
					<td>8</td>
					<td>GL</td>
				</tr>
			</tbody>
    	</table>
    	<br/>
    	<p>Note: <br/>จำนวนสั่งซื้อ : จำนวนสินค้าที่สั่งซื้อ<br/>จำนวนออกบิล : จำนวนสินค้าที่เปิดบิลแล้ว
    	<br/>จำนวนการจอง : จำนวนสินค้าที่ได้รับการจองและรอการเปิดบิล<br/>จำนวนคงค้าง : จำนวนสินค้ารอดำเนินการ<br/>
    	จำนวนยกเลิก : จำนวนสินค้าที่ทำการยกเลิก</p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-info" data-dismiss="modal">พิมพ์</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div> -->

  <!-- </div>
</div> -->
