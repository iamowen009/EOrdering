@extends('layouts.main')

@section('content')

<style>
.total_price{color:#00BFFF;}
</style>
<section class="panel panel-with-borders" ng-controller="CartController">
    @verbatim
    <div class="panel-heading">
        <h2>
            Cart / Checkout
        </h2>
    </div>
    <div class="panel-body">
        <div class="cui-ecommerce--cart">


            <div id="cart-checkout" class="cui-wizard wizard clearfix" role="application">
                <div class="steps clearfix">
                    <ul role="tablist">
                        <li role="tab" class="first current" aria-disabled="false" aria-selected="true">
                            <a id="cart-checkout-t-0" href="#cart-checkout-h-0" aria-controls="cart-checkout-p-0">
                                <span class="current-info audible">current step: </span>
                                <span class="number">1.</span> 
                                <i class="icmn-cart5 cui-wizard--steps--icon"></i>
                                <span class="cui-wizard--steps--title">Cart</span>
                            </a>
                        </li>
                        <li role="tab" class="disabled" aria-disabled="true">
                            <a id="cart-checkout-t-1" href="#cart-checkout-h-1" aria-controls="cart-checkout-p-1">
                                <span class="number">2.</span> 
                                <i class="icmn-wallet cui-wizard--steps--icon"></i>
                                <span class="cui-wizard--steps--title">Shipment / Billing Info</span>
                            </a>
                        </li>
                        <li role="tab" class="disabled last" aria-disabled="true">
                            <a id="cart-checkout-t-2" href="#cart-checkout-h-2" aria-controls="cart-checkout-p-2">
                                <span class="number">3.</span> 
                                <i class="icmn-checkmark cui-wizard--steps--icon"></i>
                                <span class="cui-wizard--steps--title">Confirmation</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="content clearfix">
                    <h3 id="cart-checkout-h-0" tabindex="-1" class="title current">
                        <i class="icmn-cart5 cui-wizard--steps--icon"></i>
                        <span class="cui-wizard--steps--title">Cart</span>
                    </h3>
                    <section id="cart-checkout-p-0" role="tabpanel" aria-labelledby="cart-checkout-h-0" class="body current" aria-hidden="false">
                        <ngcart-summary template-url="/template/ngCart/total.html"></ngcart-summary>
                        

                        <ngcart-cart></ngcart-cart>

                         <!--<div class="invoice-block">

                           <table class="table table-hover text-right">
                                <thead class="thead-default">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>รหัสสินค้า</th>
                                    <th>สินค้า</th>
                                    <th class="text-right">จำนวน</th>
                                    <th class="text-right">หน่วย</th>
                                    <th class="text-right">ราคาหน่วย</th>
                                    <th class="text-right">ราคารวม</th>
                                    <th>ลบ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-left">
                                        <a href="javascript: void(0);" class="link-underlined">Server hardware purchase</a>
                                    </td>
                                    <td class="text-right">
                                        <input class="form-control width-50" value="2" type="text">
                                    </td>
                                    <td class="text-right">$75.00</td>
                                    <td>$2,152.00</td>
                                    <td>
                                        <a href="javascript: void(0);" class="link-underlined"><i class="icmn-cross2"></i> Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td class="text-left">
                                        <a href="javascript: void(0);" class="link-underlined">Office furniture purchase</a>
                                    </td>
                                    <td class="text-right">
                                        <input class="form-control width-50" value="3" type="text">
                                    </td>
                                    <td class="text-right">$169.00</td>
                                    <td>$4,169.00</td>
                                    <td>
                                        <a href="javascript: void(0);" class="link-underlined"><i class="icmn-cross2"></i> Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td class="text-left">
                                        <a href="javascript: void(0);" class="link-underlined">Company Anual Dinner Catering</a>
                                    </td>
                                    <td class="text-right">
                                        <input class="form-control width-50" value="14" type="text">
                                    </td>
                                    <td class="text-right">$49.00</td>
                                    <td>$1,260.00</td>
                                    <td>
                                        <a href="javascript: void(0);" class="link-underlined"><i class="icmn-cross2"></i> Remove</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4</td>
                                    <td class="text-left">
                                        <a href="javascript: void(0);" class="link-underlined">Payment for Jan 2016</a>
                                    </td>
                                    <td class="text-right">
                                        <input class="form-control width-50" value="10" type="text">
                                    </td>
                                    <td class="text-right">$12.00</td>
                                    <td>$866.00</td>
                                    <td>
                                        <a href="javascript: void(0);" class="link-underlined"><i class="icmn-cross2"></i> Remove</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-right clearfix">
                            <div class="pull-right">
                                <p>
                                    Sub - Total amount: <strong><span>$5,700.00</span></strong>
                                </p>
                                <p>
                                    VAT: <strong><span>$57.00</span></strong>
                                </p>
                                <p class="page-invoice-amount">
                                    <strong>Grand Total: <span>$5,757.00</span></strong>
                                </p>
                                <br>
                            </div>
                        </div>-->
                    </section>

                    <h3 id="cart-checkout-h-1" tabindex="-1" class="title">
                        <i class="icmn-wallet cui-wizard--steps--icon"></i>
                        <span class="cui-wizard--steps--title">Shipment / Billing Info</span>
                    </h3>
                    <section id="cart-checkout-p-1" role="tabpanel" aria-labelledby="cart-checkout-h-1" class="body" style="display: none;" aria-hidden="true">
                        <div class="row">
                            <div class="col-md-8">
                                <form>
                                    <h4>Shipment Details</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="l31">Email</label>
                                                <input class="form-control" id="l31" placeholder="Email" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="l32">Phone Number</label>
                                                <input class="form-control" id="l32" placeholder="Phone Number" required="" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="l33">Name</label>
                                                <input class="form-control" id="l33" placeholder="Name" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="l34">Surname</label>
                                                <input class="form-control" id="l34" placeholder="Surname" required="" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="l35">City</label>
                                        <input class="form-control" id="l35" placeholder="City" required="" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="l36">Address</label>
                                        <input class="form-control margin-bottom-15" id="l36" placeholder="Address" required="" type="text">
                                        <input class="form-control" placeholder="Address" required="" type="text">
                                    </div>

                                    <br>
                                    <br>

                                    <h4>Billing Details</h4>
                                    <div class="form-group">
                                        <label for="l41">Card Number</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="icmn-credit-card"></i>
                                            </span>
                                            <input class="form-control" placeholder="Card Number" id="l41" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="l44">Expiration Date</label>
                                                <input class="form-control" id="l44" placeholder="MM / YY" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-5 pull-right">
                                            <div class="form-group">
                                                <label for="l43">CVC Code</label>
                                                <input class="form-control" id="l43" placeholder="CVC" required="" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="l42">Card Name</label>
                                        <input class="form-control" id="l42" placeholder="Name and Surname" type="text">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <h4 class="box-title m-t-10">General Info</h4>
                                <h2>
                                    <i class="fa fa-cc-visa color-primary"></i>
                                    <i class="fa fa-cc-mastercard color-default"></i>
                                    <i class="fa fa-cc-amex color-default"></i>
                                </h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            </div>
                        </div>
                    </section>

                    <h3 id="cart-checkout-h-2" tabindex="-1" class="title">
                        <i class="icmn-checkmark cui-wizard--steps--icon"></i>
                        <span class="cui-wizard--steps--title">Confirmation</span>
                    </h3>
                    <section id="cart-checkout-p-2" role="tabpanel" aria-labelledby="cart-checkout-h-2" class="body" style="display: none;" aria-hidden="true">

                        <div class="invoice-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>
                                        <img class="margin-right-10" src="../assets/common/img/temp/amazon.jpg" alt="Amazon" height="50">
                                    </h4>
                                    <address>
                                        795 Folsom Ave, Suite 600
                                        <br>
                                        San Francisco, CA, 94107
                                        <br>
                                        <abbr title="Mail">E-mail:</abbr>&nbsp;&nbsp;example@amazon.com
                                        <br>
                                        <abbr title="Phone">Phone:</abbr>&nbsp;&nbsp;(123) 456-7890
                                        <br>
                                        <abbr title="Fax">Fax:</abbr>&nbsp;&nbsp;800-692-7753
                                        <br>
                                        <br>
                                    </address>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p>
                                        <a class="font-size-20" href="javascript:void(0)">W32567-2352-4756</a>
                                        <br>
                                        <span class="font-size-20">Artour Arteezy</span>
                                    </p>
                                    <address>
                                        795 Folsom Ave, Suite 600
                                        <br> San Francisco, CA, 94107
                                        <br>
                                        <abbr title="Phone">P:</abbr>&nbsp;&nbsp;(123) 456-7890
                                        <br>
                                    </address>
                                    <span>Invoice Date: January 20, 2016</span>
                                    <br>
                                    <span>Due Date: January 22, 2016</span>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover text-right">
                                    <thead class="thead-default">
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Description</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Unit Cost</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td class="text-left">Server hardware purchase</td>
                                        <td>35</td>
                                        <td>$75.00</td>
                                        <td>$2,152.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td class="text-left">Office furniture purchase</td>
                                        <td>21</td>
                                        <td>$169.00</td>
                                        <td>$4,169.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td class="text-left">Company Anual Dinner Catering</td>
                                        <td>58</td>
                                        <td>$49.00</td>
                                        <td>$1,260.00</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4</td>
                                        <td class="text-left">Payment for Jan 2016</td>
                                        <td>231</td>
                                        <td>$12.00</td>
                                        <td>$866.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right clearfix">
                                <div class="pull-left">
                                    <button type="button" class="btn btn-default-outline margin-top-20">
                                        <i class="icmn-printer"></i>
                                        Print
                                    </button>
                                </div>
                                <div class="pull-right">
                                    <p>
                                        Sub - Total amount: <strong><span>$5,700.00</span></strong>
                                    </p>
                                    <p>
                                        VAT: <strong><span>$57.00</span></strong>
                                    </p>
                                    <p class="page-invoice-amount">
                                        <strong>Grand Total: <span>$5,757.00</span></strong>
                                    </p>
                                    <br>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
                <div class="actions clearfix">
                    <ul role="menu" aria-label="Pagination">
                        <li class="disabled" aria-disabled="true">
                            <a href="#previous" role="menuitem">Previous</a>
                        </li>
                        <li aria-hidden="false" aria-disabled="false">
                            <a href="#next" role="menuitem">Next</a>
                        </li>
                        <li style="display: none;" aria-hidden="true">
                            <a href="#finish" role="menuitem">Finish</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endverbatim
</section>


<ngcart-checkout service="http" settings="{ url:'/checkout' }"></ngcart-checkout>


@stop
@section('footer')
<script>
    $(function() {



        $("#cart-checkout").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: 0,
            autoFocus: true
        });

    });
</script>
@stop