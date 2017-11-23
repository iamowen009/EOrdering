<div id="OrderDetailModal" class="modal" role="dialog" tabindex="-1">
  <div class="modal-dialog-invoice modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header info">
        <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
        <div class="col-sm-6 text-center">
        	<h4 class="modal-title">สถานะการสั่งซื้อ</h4>
        </div>
      </div>
      <div class="modal-body">
			<div class="row inv-header">
          <div class="col-sm-8">
              <p><strong>ร้านค้า :</strong> @{{ inv.payerNo  }}  @{{ inv.payerName }}</p>
              <p><strong>เลขที่ใบสั่งซื้อ :</strong> @{{ inv.woNumber }} / @{{ inv.poNumber}}</p>
              <!-- <p><strong>เลขที่เอกสารอ้างอิง : </strong></p> -->
              <p><strong>เลขที่เอกสารอ้างอิง : </strong> @{{inv.salesDocument}}  วันที่ : @{{inv.requestedDeliveryDate | date:'dd/MM/yyyy'}}</p>
          </div>
          <div class="col-sm-4">
              <p><strong>สถานที่ส่ง : </strong>@{{ inv.shipName }}</p>
              <p><strong>จัดส่ง : </strong>@{{ inv.transportZoneDesc }}</p>
          </div>
        </div>
				<div>
         
          <div class="invoice-block row">
              <table class="table table-hover table-bordered">
                  <thead class="thead-default">
                      <tr>
                          <th class="text-center">รายการสินค้า</th>
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
                      <td class="text-left">
                        <div class="">
                          @{{ item.material }} @{{ item.materialDes }} <div  class="text-danger" ng-style="item.freeGoods == ''   &&  {'display': 'none'}"> &nbsp;(ของแถม)</div>
                        </div>
                      </td>
                      <td class="text-center">@{{ item.targetQty | number }}</td>
                      <td class="text-center">@{{ item.billQty | number }}</td>
                      <td class="text-center">@{{ item.deliQty | number }}</td>
                      <td class="text-center">@{{ item.balaQty | number }}</td>
                      <td class="text-center text-danger">@{{ item.rejeQty | number }}</td>
                      <td class="text-center">@{{item.unit}}</td>
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
            <style>
            .notetitle{
              width: 12%;
              display: block;
              float: left;
            }
            </style>
            <div class="col-sm-6 text-danger"> <strong>Note : </strong></div>
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
          </br>

      </div>
    </div>

  </div>
</div>
</div>
