<div id="OrderHistoryModal" class="modal" role="dialog">
    <div class="modal-dialog-invoice modal-lg">

    <div class="modal-content inv-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="col-sm-12 text-center">
        	<h4 class="modal-title">รายละเอียดสถานะการสั่งซื้อ</h4>
        </div>
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
        </div>
        

    </div>

  
    </div>
</div>