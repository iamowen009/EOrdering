<div id="OrderStatusModalx" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">
    <!-- Modal content-->
    <div class="modal-content inv-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    	 	<div class="col-sm-12 text-center">
        	<h4 class="modal-title">ใบสั่งซื้อ</h4>
        </div>
      </div>
      <div class="modal-body">
        <div class="row inv-header">
          <div class="col-sm-8">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="OrderStatusModal" class="modal" role="dialog">
  <div class="modal-dialog-invoice modal-lg">

    <!-- Modal content-->
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

              <!-- <p><strong>วันทีสั่งซื่้อ : </strong>@{{ inv.requestDate | date:'dd/MM/yy'  }}</p>
              <p><strong>การชำระเงิน :</strong> @{{ inv.paymentTerm === 'CASH' ? 'เงินสด' :( inv.paymentTerm !== 'CASH' ? 'เครดิต' : '' )  }}</p>
              <p><strong>ที่อยู่ :</strong> @{{ inv.address }}</p>
              <p><strong>อีเมล์ : </strong> @{{ customers.email }}</p>
              <p><strong>เบอร์โทรศัพท์ : </strong> @{{ inv.customerTelNo }}</p>  -->
          </div>
          <div class="col-sm-4">
              <p><strong>สถานที่ส่ง : </strong>@{{ inv.shipName }}</p>
              <p><strong>จัดส่ง : </strong>@{{ inv.transportZoneDesc }}</p>

              <!-- <p><strong>เลขที่ PO : </strong>@{{ inv.customerPO}}</p>
              <p><strong>วันที่ต้องการ : </strong>@{{ inv.requestDate | date:'dd/MM/yyyy' }}</p>
              <p><strong>สถานที่ส่ง : </strong>@{{ inv.shipName }}</p>
              <p><strong>ที่อยู่สถานที่ส่ง : </strong>@{{ inv.shipHouseNo }} @{{ inv.shipAddress }} @{{ inv.shipDistrictName }} @{{ inv.shipCityName }}</p>
               <p><strong>บริษัทขนส่ง : </strong>@{{ shipto(inv.transportZoneDesc) }}</p>
              <p><strong>บริษัทขนส่ง : </strong>@{{ inv.transportZoneDesc }}</p> -->
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
                          <th colspan="2" class="text-center">รหัสสินค้า</th>
                          <th class="text-center">สินค้า</th>
                          <th class="text-center">จำนวน</th>
                          <th class="text-center">หน่วย</th>
                          <th class="text-right">ราคา/หน่วย</th>
                          <th class="text-right">ส่วนลด</th>
                          <th class="text-right">ราคาหลังหักส่วนลด</th>
                          <th class="text-right">ราคารวม</th>
                      </tr>
                  </thead>

                  <tbody>
                  <tr ng-repeat="item in detail">
                      <td class="text-center">
                         <img class="img-product" src="@{{ partImgProduct +'/'+ item.btf }}.jpg" err-SRC="@{{partImgProduct}}/Noimage.jpg" style="height:40px;">
                      </td>
                      <td>
                          @{{item.material}}
                      </td>
                      <td class="text-left"> @{{ item.materialDes }}</td>
                      <td class="text-center">@{{ item.targetQty | number }}</td>
                      <td class="text-center">@{{item.salesUnit}}</td>
                      <td class="text-right">@{{ item.pricePerUnit | number:2}}</td>
                      <td class="text-right">@{{item.discount }}</td>
                      <td class="text-right">@{{item.netwrPerUnit | number:2}}</td>
                      <td class="text-right">@{{item.amount | number:2}}</td>
                  </tr>
                  </tbody>
              </table>

          </div>
          </br>

          <div class="row">
            <div class="col-sm-6 text-danger"> <strong>หัก </strong></div>
            <div class="col-sm-6 text-right">

            </div>
            <div class="col-sm-6 text-danger"> Description หัก </div>
            <div class="col-sm-6 text-right">
                @{{ totalAmount | number:2 }}
            </div>
          </div>
          </br>

          <div class="row">
            <div class="col-sm-6 text-danger"><strong>บวก </strong></div>
            <div class="col-sm-6 text-right">

            </div>
            <div class="col-sm-6 text-danger"> Description บวก </div>
            <div class="col-sm-6 text-right">
                @{{ totalAmount | number:2 }}
            </div>
          </div>
          </br>

          <div class="row">
            <div class="col-sm-6 text-danger"></div>
            <div class="col-sm-6 text-right">
              <strong>รวมมูลค่าสินค้า :</strong>
                @{{ totalAmount | number:2 }}
              <strong>บาท</strong>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 text-danger"> </div>
            <div class="col-sm-6 text-right">
              <strong>ภาษีมูลค่าเพิ่มอัตรา 7% :</strong>
                <!-- @{{ totalAmount | number:2 }} -->
              <strong>บาท</strong>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 text-danger"> </div>
            <div class="col-sm-6 text-right">
              <strong>ยอดรวม :</strong>
                <!-- @{{ totalAmount | number:2 }} -->
              <strong>บาท</strong>
            </div>
          </div>

      </div>
    </div>

  </div>
</div>
</div>
