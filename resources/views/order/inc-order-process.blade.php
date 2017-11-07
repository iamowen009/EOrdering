<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">ปี</h4>
    </div>
    <div class="panel-body order-precess">
          <ul class="bar-year">
            <li class="title-year"  ng-repeat="y in ordersYear">
              <a href="javascript:;" data-toggle="collapse" data-parent="#accordion" data-target="#collapse-@{{y}}"><i class="fa fa-plus"></i></a> <strong>@{{y}}</strong>
              <ul class="bar-month" >
                <li id="collapse-@{{y}}" ng-repeat="m in ordersYm | orderBy:'-month' " ng-if="m.year == y">
                  @{{ txtmonth(m.month) }}
                    <ul class="bar-list">
                      <li>
                          <table class="table table-striped">
        											<thead>
        													<tr class="info">
        													<th>วันที่-เวลา</th>
        													<th>ผู้ดำเนินการ</th>
        													<th>เลขที่ใบสั่งซื้อ</th>
        													<th>เลขที่เอกสารอ้างอิง<br />หลังหักส่วนลด</th>
        													<th>จำนวนเงินสุทธิ <br/>(ไม่รวม VAT)</th>
        													<th style="width:110px;">สถานะสั่งซื้อ</th>
        													<th style="width:110px;">Order / <br/>Bill Tracking</th>
        													</tr>
                              </thead>
        											<tbody>
        													<tr ng-repeat="list in ordersList | orderBy:'-docDate'" ng-if="list.month === m.month && list.percentComplete < 100">
        															<td>@{{ list.docDate  | date:'dd/MM/yyyy HH:mm'}}</td>
        															<td>@{{ list.docName}}</td>
        															<td><a ng-click="OrderInfo(list.orderId)" href="javascript:void(0)">@{{ list.docNumber }}</a></td>
                                      <td><a ng-click="OrderStatusModal(list.orderId)" href="javascript:void(0)">@{{ list.salesOrderNumber }}</a></td>
        															<td>@{{ list.netAmount}}</td>
        															<td>
                                        <a ng-click="OrderDetailModal(list.orderId)" href="javascript:void(0)">
                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: @{{ list.percentComplete }}%;">
                                            @{{ list.percentComplete }}%
                                          </div>
                                        </div>
                                        </a>

                                      </td>
                                      <!-- <td><a ng-click="OrderTrackingModal(list.orderId)" href="javascript:void(0)"><i class="fa fa-newspaper-o"></a></td> -->
                                      
        															<td class="text-center">
                                        <a href="javascript:void(0)" class="text-success" ng-click="OrderTrackingModal(list.orderId)"><i class="fa fa-newspaper-o"></i></a>
                                        <a href="javascript:void(0)" class="text-success" ng-click="OrderTrackingModalAAA(list.orderId)"><i class="fa fa-newspaper-o" style="color:orange"></i></a>
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
