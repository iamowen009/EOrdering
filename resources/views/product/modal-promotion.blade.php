@verbatim
<div id="modal-promotion" class="modal" ng-controller="ProductDetailController">
    <div class="modal-lg"> 
        <!-- modal-dialog-promotion  -->
        <div class="modal-content">
            <div class="modal-header info">
                <h4 class="col-sm-12 text-center" style="margin: 0px;">
                    โปรโมทชั่น
                </h4>
                <button type="button" class="close pull-right" data-dismiss="modal" style="font-size: 40px;">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <div class="form-horizontal" ng-repeat="promotion in promotions">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <strong>ชื่อโปรโมชั่น : </strong>
                        </label>
                        <div class="col-sm-9 form-control-static">
                            {{ promotion.promotionName }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <strong>วันที่โปรโมชั่น : </strong>
                        </label>
                        <div class="col-sm-9 form-control-static">
                            {{ promotion.validFrom }} - {{ promotion.validTo }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">
                            <strong>รายละเอียดโปรโมชั่น : </strong>
                        </label>
                        <div class="col-sm-9 form-control-static" ng-bind-html="promotion.promotionDesc">
                        </div>
                    </div>
                    <hr style="margin-bottom: 20px !important; margin-top: 10px;" ng-hide="promotions.length == $index + 1">
                </div>
                <div style="color:red">
                    หมายเหตุ: บริษัทฯ ขอสงวนสิทธิ์ในการเปลี่ยนแปลงรายการ โดยมิต้องแจ้งให้ทราบล่วงหน้า ตลอดจนความผิดพลาดที่เกิดจากการพิมพ์
                </div>
              <!-- <div class="row">
                  <div class="col-md-3"><strong>ชื่อโปรโมชั่น : </strong></div>
                  <div class="col-md-9"></div>
              </div>
              <div class="row">
                  <div class="col-md-3"><strong>วันที่โปรโมชั่น : </strong></div>
                  <div class="col-md-9"></div>
              </div>
              <div class="row">
                  <div class="col-md-3"><strong>รายละเอียดโปรโมชั่น : </strong></div>
                  <div class="col-md-9"></div>
              </div> -->
            </div>
        </div>
    </div>
</div>
@endverbatim