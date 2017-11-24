@verbatim
<h3>
  <i class="fa fa-shopping-cart cui-wizard--steps--icon"></i>
  <span class="cui-wizard--steps--title">Cart</span>
</h3>
<section>
  <h6>คุณมีสินค้าในตระกร้าจำนวน {{ carts.length | number }} รายการ</h6>
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
            <th class="text-center">ราคาต่อหน่วย</th>
            <th class="text-center">ราคารวม</th>
            <th class="text-center">ลบ</th>
          </tr>
        </thead>
        <tbody ng-repeat="item in carts track by $index">
          <tr class="cart-product-{{ item.productId }}">
            <td class="text-center">{{$index+1}}</td>
            <td class="text-center">
              <img class="img-product" src="{{partImgProductOrder}}/{{item.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{item.productCode}}</td>
            <td class="text-left">{{ item.productNameTh }}</td>
            <td class="text-right">
              <div class="input-group">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-default" ng-click="removeQty(item)">-</button>
                </span>
                <input class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" value="{{ item.qty }}" ng-blur="updateCart($index)"
                  ng-model="item.qty" numbers-only>
                <span class="input-group-btn">
                  <button type="button" class="btn btn-default" ng-click="addQty(item)">+</button>
                </span>
                <p class="text-center" ng-show="loadingcart[$index]">
                  <span class="fa fa-refresh  fa-spin"></span>
                </p>
              </div>
            </td>
            <td class="text-center">
              <span ng-if="bomRows(item.productCode) == 0">{{item.unitNameTh}}</span>
            </td>
            <td>
              <span ng-if="bomRows(item.productCode) == 0">{{ item.price | number:2}}</span>
            </td>
            <td>
              <span ng-if="bomRows(item.productCode) == 0">{{ +item.price*+item.qty | number:2 }}</span>
            </td>
            <td>
              <a href="">
                <span ng-click="$event.preventDefault(); removeCart(item.productId)" class="fa fa-trash fa-2x"></span>
              </a>
            </td>
          </tr>
          <tr class="cart-product-{{ item.productId }}" ng-repeat="bom in boms track by $index" ng-if="bom.productRefCode == item.productCode">
            <td class="text-center">{{$index+1}}</td>
            <td class="text-center">
              <img class="img-product" src="{{partImgProductOrder}}/{{bom.btfCode}}.jpg" err-SRC="{{partImgProduct}}/Noimage.jpg"> {{bom.productCode}}</td>
            <td class="text-left">{{ bom.productNameTh }}</td>
            <td class="text-right">
              <div class="input-group">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-defaul disabled" disabled>-</button>
                </span>
                <input class="form-control ng-pristine ng-untouched ng-valid ng-empty disabled" type="text" value="{{ item.qty }}" disabled
                  ng-model="item.qty" numbers-only>
                <span class="input-group-btn">
                  <button type="button" class="btn btn-defaul disabled" disabled>+</button>
                </span>
                <p class="text-center" ng-show="loadingcart[$index]">
                  <span class="fa fa-refresh  fa-spin"></span>
                </p>
              </div>
            </td>
            <td class="text-center">{{item.unitNameTh}}</td>
            <td>{{ bom.price | number:2}}</td>
            <td>{{ +bom.price*+item.qty | number:2 }}</td>
            <td></td>
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
          <strong>ยอดรวมมูลค่าสินค้า(ไม่รวม VAT):
            <span class="total_price">{{ totalAmount | number:2 }}</span> บาท</strong>
        </p>
        <br>
      </div>
    </div>

  </div>
  <!--<ngcart-summary template-url="/template/ngCart/total.html"></ngcart-summary>

    <ngcart-cart></ngcart-cart>-->

</section>
@endverbatim