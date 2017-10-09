<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">ปี</h4>
    </div>
    <div class="panel-body order-precess">
          <ul class="bar-year">
            <li class="title-year"  ng-repeat="y in ordersYear">
              <a href="javascript:;" data-toggle="collapse" data-parent="#accordion" data-target="#collapse-@{{y}}"><i class="fa fa-plus"></i></a> <strong>@{{y}}</strong>
              <ul class="bar-month" >
                <li id="collapse-@{{y}}" ng-repeat="month in ordersYearMonth " >
                  <a href="javascript:;" data-toggle="collapse" data-parent="#accordion" data-target="#collapse-@{{month}}"><i class="fa fa-plus"></i></a> @{{ txtmonth(month) }}
                    <ul class="bar-list">
                      <li id="collapse-@{{month}}">
                          <table class="table table-striped">
        											<thead>
        													<tr class="info">
        													<th>วันที่-เวลา</th>
        													<th>ผู้ดำเนินการ</th>
        													<th>เลขที่ใบสั่งซื้อ</th>
        													<th>เลขที่เอกสารอ้างอิง<br />หลังหักส่วนลด</th>
        													<th>จำนวนเงินสุทธิ <br/>(ไม่รวม VAT)</th>
        													<th style="width:110px;">สถานะสั่งซื้อ</th>
        													<th style="width:110px;">Order/Bill Tracking</th>
        													</tr>
                              </thead>
        											<tbody>
        													<tr ng-repeat="list in ordersList | orderBy:docDate" ng-if="list.month == month">
        															<td>@{{ list.docDate  | date:'dd/MM/yyyy HH:mm'}}</td>
        															<td>@{{ list.docName}}</td>
        															<td><a data-toggle="modal" data-target="#invoiceModal">@{{ list.docNumber }}</a></td>
        															<td>@{{ list.orderId }}</td>
        															<td>@{{ list.netAmount}}</td>
        															<td><div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="@{{ list.percentComplete }}" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span class="sr-only">@{{ list.percentComplete }}% </span>
                                          </div>
                                        </div>
                                      </td>
        															<td class="text-center"><a data-toggle="modal" class="text-success" data-target="#orderModal"><i class="fa fa-newspaper-o"></a></td>
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
