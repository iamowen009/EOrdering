<h3>
    <i class="fa fa-shopping-cart cui-wizard--steps--icon"></i>
    <span class="cui-wizard--steps--title">Cart</span>
</h3>
<section>
  <h6>คุณมีสินค้าในตระกร้าจำนวน  {{ carts.length | number }} รายการ</h6>
  <div class="table-responsive col-lg-12" ng-show="carts.length > 0">
    <div class="invoice-block">
        <table class="table table-hover text-right">
            <thead class="thead-default">
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">รหัสสินค้า</th>
                    <th class="text-center">สินค้า</th>
                    <th class="text-center" width="15%">จำนวน</th>
                    <th class="text-center">หน่วย</th>
                    <th class="text-right">ราคาหน่วย</th>
                    <th class="text-right">ราคารวม</th>
                    <th class="text-center">ลบ</th>
                </tr>
            </thead>
            <tfoot>

            </tfoot>
            <tbody>
            <tr ng-repeat="item in carts track by $index">
                <td class="text-center">{{$index+1}}</td>
                <td class="text-center"><img class="img-product" src="{{partImgProduct}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{item.productCode}}</td>
                <td class="text-center">{{ item.productNameTh }}</td>
                <td class="text-right">
                  <div class="input-group">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-default" ng-click="removeQty(item)">-</button>
                      </span>
                      <input class="form-control ng-pristine ng-untouched ng-valid ng-empty"  type="text" value="{{ item.qty }}" ng-blur="updateCart($index)" ng-model="item.qty" numbers-only >
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-default" ng-click="addQty(item)">+</button>
                      </span>
                      <p class="text-center" ng-show="loadingcart[$index]"><span class="fa fa-refresh  fa-spin"></span></p>
                  </div>
                  <!--
                  <span class="glyphicon glyphicon-minus" ng-class="{'disabled':item.qty==1}"
                          ng-click="item.setQuantity(-1, true)"></span>
                          <input class="form-control width-50" value="{{ item.qty | number }}" type="text">

                    <span class="glyphicon glyphicon-plus" ng-click="item.setQuantity(1, true)"></span>
                  -->
                </td>
                <td>{{item.unitNameTh}}</td>
                <td>{{ item.price | number:2}}</td>
                <td>{{ +item.price*+item.qty | number:2 }}</td>
                <td><a href=""><span ng-click="$event.preventDefault(); removeCart(item.productId)" class="fa fa-trash fa-2x"></span></a></td>
            </tr>
            </tbody>
        </table>

    </div>

    <div class="text-right clearfix">
        <div class="pull-right">
            <!--<p>
                Sub - Total amount: <strong><span>$5,700.00</span></strong>
            </p>
            <p>
                VAT: <strong><span>$57.00</span></strong>
            </p>-->
            <p class="page-invoice-amount">
                <strong>ยอดรวมมูลค่าสินค้า(ไม่รวม VAT): <span class="total_price">{{ totalAmount | number:2 }}</span> บาท</strong>
            </p>
            <br>
        </div>
    </div>

</div>
    <!--<ngcart-summary template-url="/template/ngCart/total.html"></ngcart-summary>

    <ngcart-cart></ngcart-cart>-->

</section>
