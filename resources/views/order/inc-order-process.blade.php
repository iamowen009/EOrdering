<style>
  .table>thead>tr.info>th {
    background-color: #D2C9E2;
  }

  .accordion-toggle:after {
    font-family: 'Glyphicons Halflings';
    content: '\e114';
    position: relative;
    top: 3px;
  }

  .accordion-toggle.collapsed:after {
    content: '\e080';
  }
</style>
<div class="panel panel-default">
  <div class="order-precess">
    <div ng-repeat="y in ordersYear">
      <a class="accordion-toggle" data-toggle="collapse" data-toggle="collapse" href="#year-@{{ y }}">
        @{{ y }}
      </a>
      <div id="year-@{{ y }}">
        <!--
        <div ng-repeat="m in ordersYm | orderBy:'-month' " ng-if="m.year == y">
          <a class="accordion-toggle" data-toggle="collapse" data-toggle="collapse" href="#month-@{{ m.month }}">
            @{{ txtmonth(m.month) }}
          </a>
          <ul>
            <li>
              s
            </li>
          </ul>
        </div>
        -->
        <ul ng-repeat="m in ordersYm | orderBy:'-month' " ng-if="m.year == y">
          <li class="accordion-toggle" style="cursor: pointer;" data-toggle="collapse" data-toggle="collapse" href="#month-@{{ m.month }}">
            @{{ txtmonth(m.month) }}
          </li>
          <li id="month-@{{ m.month }}">
            <table class="table table-striped" style="margin-left: 30px;">
              <thead>
                <tr class="info">
                  <th class="text-center" style="width:100px;">วันที่ - เวลา</th>
                  <th class="text-center" style="width:120px;">ผู้ดำเนินการ</th>
                  <th class="text-center" style="width:100px;">เลขที่ใบสั่งซื้อ</th>
                  <th class="text-center" style="width:100px;">เลขที่เอกสาร
                    <br />(หลังหักส่วนลด)</th>
                  <th class="text-center" style="width:120px;">จำนวนเงินสุทธิ
                    <span style="color:red;">*</span>
                    <br/>(ไม่รวม VAT)</th>
                  <th style="width:100px;" class="text-center">สถานะสั่งซื้อ</th>
                  <th style="width:200px;" class="text-center">Order /
                    <br/>Bill Tracking</th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr ng-repeat="list in ordersList | orderBy:'-createDate'" ng-if="list.month === m.month && list.percentComplete < 100"> -->
                <tr ng-repeat="list in ordersList | orderBy:'-createDate'" ng-if="list.month === m.month">
                  <td class="text-center">@{{ list.createDate | date:'dd/MM/yyyy'}}&nbsp;&nbsp;@{{ list.createDate | date:'HH:mm'}}</td>
                  <td class="text-center">@{{ list.docName}}</td>
                  <td class="text-center">
                    <a ng-click="OrderInfo(list.orderId)" href="javascript:void(0)">@{{ list.docNumber }}</a>
                  </td>
                  <td class="text-center">
                    <a ng-click="OrderStatusModal(list.salesOrderNumber)" href="javascript:void(0)">@{{ list.salesOrderNumber }}</a>
                  </td>
                  <td class="text-right" style="padding-right: 20px;">@{{ list.netAmount | number:2}}</td>
                  <td class="text-center" style="width:100px;">
                    <a ng-click="OrderDetailModal(list.salesOrderNumber)" href="javascript:void(0)" ng-show="list.percentComplete!==100 && list.rejectHStatus!=='C'">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: @{{ list.percentComplete }}%;">
                          @{{ list.percentComplete }}%
                        </div>
                      </div>
                    </a>
                    <a href="javascript:void(0)" ng-show="list.percentComplete===100" class="text-center" ng-click="OrderDetailModal(list.salesOrderNumber)">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:100%; background-color:green; ">Completed</div>
                      </div>
                      <!--   <span style="color:green">Complete</span> -->
                    </a>

                      <td class="text-center">
                        <a href="javascript:void(0);" class="text-success" ng-click="OrderHistoryModal(list.orderId,list.salesOrderNumber)" data-toggle="tooltip"
                          title="Order">
                          <i class="fa fa-newspaper-o" style="font-size:24px;"></i>
                        </a>

                        <a href="javascript:void(0);" ng-click="OrderBillHistory(list.salesOrderNumber)" class="text-success" data-toggle="collapse"
                          title="Bill Tracking" data-target="#collapse-@{{list.orderId}}" aria-expanded="false">
                          <i class="fa fa-newspaper-o" style="color:orange;font-size:24px;"></i>
                        </a>
                        <!-- <div class="collapse" id="collapseExample"> -->
                        <ul id="collapse-@{{list.orderId}}" style="display:none">
                          <li>
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
                                  <td>
                                    <a ng-click="OrderBillHistoryModal(list.orderId,list.salesOrderNumber)" href="javascript:void(0)">@{{ Bills.taxNum}}</a>
                                  </td>
                                </tr>
                              </tbody>

                    <a href="javascript:void(0);" ng-click="OrderBillHistory(list.salesOrderNumber)" class="text-success" data-toggle="collapse"
                      title="Bill Tracking" data-target="#collapse-@{{list.orderId}}" aria-expanded="false">
                      <i class="fa fa-newspaper-o" style="color:orange;font-size:24px;"></i>
                    </a>
                    <!-- <div class="collapse" id="collapseExample"> -->
                    <ul id="collapse-@{{list.orderId}}" style="display:none">
                      <li>
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
                              <td>
                                <a ng-click="OrderBillHistoryModal(list.salesOrderNumber)" href="javascript:void(0)">@{{ Bills.taxNum}}</a>
                              </td>
                            </tr>
                          </tbody>

                        </table>
                      </li>

                    </ul>
                  </td>
                </tr>
              </tbody>
            </table>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>