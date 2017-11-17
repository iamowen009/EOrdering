<style>
    .table > thead > tr.info > th {
      background-color:#D2C9E2;
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#FFF8AA">
        <h4 class="panel-title" style="font-size:18px;">ปี</h4>
    </div>
    <div class="panel-body order-precess">
          <ul class="bar-year">
            <li class="title-year"  ng-repeat="y in ordersYear">
              <a href="javascript:;" data-toggle="collapse" data-parent="#accordion" data-target="#collapse-@{{y}}"><i class="fa fa-plus"></i></a> <strong>@{{y}}</strong>
              <ul class="bar-month">
                <li id="collapse-@{{y}}" ng-repeat="m in ordersYm | orderBy:'-month' " ng-if="m.year == y">
                  @{{ txtmonth(m.month) }}
                    <ul class="bar-list">
                      <li>
                          <table class="table table-striped">
        											<thead>
        													<tr class="info">
        													<th class="text-center" style="width:120px;">วันที่-เวลา</th>
        													<th class="text-center" style="width:120px;" >ผู้ดำเนินการ</th>
        													<th class="text-center" style="width:100px;">เลขที่ใบสั่งซื้อ</th>
        													<th class="text-center" style="width:100px;">เลขที่เอกสาร<br />(หลังหักส่วนลด)</th>
        													<th class="text-center" style="width:120px;">จำนวนเงินสุทธิ* <br/>(ไม่รวม VAT)</th>
        													<th style="width:100px;" class="text-center">สถานะสั่งซื้อ</th>
        													<th style="width:200px;" class="text-center">Order / <br/>Bill Tracking</th>
        													</tr>
                              </thead>
        											<tbody>
        													<tr ng-repeat="list in ordersList | orderBy:'-createDate'" ng-if="list.month === m.month && list.percentComplete < 100">
        															<td class="text-center">@{{ list.createDate  | date:'dd/MM/yyyy HH:mm'}}</td>
        															<td class="text-center">@{{ list.docName}}</td>
        															<td class="text-center"><a ng-click="OrderInfo(list.orderId)" href="javascript:void(0)">@{{ list.docNumber }}</a></td>
                                      <td class="text-center"><a ng-click="OrderStatusModal(list.salesOrderNumber)" href="javascript:void(0)">@{{ list.salesOrderNumber }}</a></td>
        															<td class="text-right">@{{ list.netAmount |number:2}}</td>
        															<td class="text-center" style="width:100px;">
                                        <a ng-click="OrderDetailModal(list.salesOrderNumber)" href="javascript:void(0)" ng-show="list.percentComplete!==100">
                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: @{{ list.percentComplete }}%;">
                                            @{{ list.percentComplete }}%
                                          </div>
                                        </div>
                                        </a>
                                        <a href="javascript:void(0)" ng-show="list.percentComplete===100" class="text-center" ng-click="OrderDetailModal(list.salesOrderNumber)">Complete</a>
                                        <a ng-show="(list.percentComplete===0  && list.rejectHStatus==='c')">Cancel</a>
                                      </td>
                                      <!-- <td><a ng-click="OrderTrackingModal(list.orderId)" href="javascript:void(0)"><i class="fa fa-newspaper-o"></a></td> -->

        															<td class="text-center">
                                        <a href="javascript:void(0);" class="text-success" ng-click="OrderHistoryModal(list.salesOrderNumber)" data-toggle="tooltip" title="Order"><i class="fa fa-newspaper-o" style="font-size:24px;"></i></a>

                                        <a href="javascript:void(0);"  ng-click="OrderBillHistory(list.salesOrderNumber)" class="text-success" data-toggle="collapse" title="Bill Tracking" data-target="#collapse-@{{list.orderId}}" aria-expanded="false"><i class="fa fa-newspaper-o" style="color:orange;font-size:24px;"></i></a>
                                        <!-- <div class="collapse" id="collapseExample"> -->
                                        <ul id="collapse-@{{list.orderId}}" style="display:none" >
                                          <li >
                                            <table class="table table-striped">
                                              <thead>
                                                  <tr class="info">
                                                  <th style="width:100px;" class="text-center">Billing No.</th>
                                                  <th style="width:100px;" class="text-center">TAX No.</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <tr ng-repeat="Bills in Bill">
                                                  <td>@{{ Bills.billno}}</td>
                                                  <td><a ng-click="OrderBillHistoryModal(list.salesOrderNumber)" href="javascript:void(0)">@{{ Bills.taxNum}}</a></td>
                                                </tr>
                                              </tbody>

                                            </table>
                                          </li>

                                        </ul>
                                        <!-- <a id="collapse-@{{list.orderId}}">Anim pariatur cliche reprehenderit.</a> -->
                                          <!-- <div class="card card-block">
                                            Anim pariatur cliche reprehenderit.
                                          </div> -->
                                        <!-- </div> -->

                                      </td>
                                  </tr>



        											</tbody>
                          </table>
                      </li>
                    </ul>
                </li>

              </ul>
            </li>
          </ul>
    </div>
</div>
