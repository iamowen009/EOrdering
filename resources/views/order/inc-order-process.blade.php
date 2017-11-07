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
        													<th class="text-center">วันที่-เวลา</th>
        													<th class="text-center">ผู้ดำเนินการ</th>
        													<th class="text-center">เลขที่ใบสั่งซื้อ</th>
        													<th class="text-center">เลขที่เอกสารอ้างอิง<br />หลังหักส่วนลด</th>
        													<th class="text-center">จำนวนเงินสุทธิ <br/>(ไม่รวม VAT)</th>
        													<th style="width:100px;" class="text-center">สถานะสั่งซื้อ</th>
        													<th style="width:110px;" class="text-center">Order / <br/>Bill Tracking</th>
        													</tr>
                              </thead>
        											<tbody>
        													<tr ng-repeat="list in ordersList | orderBy:'-docDate'" ng-if="list.month === m.month && list.percentComplete < 100">
        															<td class="text-center">@{{ list.docDate  | date:'dd/MM/yyyy HH:mm'}}</td>
        															<td class="text-center">@{{ list.docName}}</td>
        															<td class="text-center"><a ng-click="OrderInfo(list.orderId)" href="javascript:void(0)">@{{ list.docNumber }}</a></td>
                                      <td class="text-center"><a ng-click="OrderStatusModal(list.salesOrderNumber)" href="javascript:void(0)">@{{ list.salesOrderNumber }}</a></td>
        															<td class="text-right">@{{ list.netAmount |number:2}}</td>
        															<td class="text-center" style="width:100px;">
                                        <a ng-click="OrderDetailModal(list.salesOrderNumber)" href="javascript:void(0)">
                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: @{{ list.percentComplete }}%;">
                                            @{{ list.percentComplete }}%
                                          </div>
                                        </div>
                                        </a>

                                      </td>
                                      <!-- <td><a ng-click="OrderTrackingModal(list.orderId)" href="javascript:void(0)"><i class="fa fa-newspaper-o"></a></td> -->
                                      
        															<td class="text-center">
                                        <a href="javascript:void(0)" class="text-success" ng-click="OrderHistoryModal(list.salesOrderNumber)"><i class="fa fa-newspaper-o"></i></a>

                                        <a class="text-success" data-toggle="collapse" href="#collapse-@{{list.orderId}}" aria-expanded="false"><i class="fa fa-newspaper-o" style="color:orange"></i></a>
                                        <!-- <div class="collapse" id="collapseExample"> -->
                                        <ul id="collapse-@{{list.orderId}}">
                                          <li >1. Test </li>
                                          <li >2. Test </li>
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
