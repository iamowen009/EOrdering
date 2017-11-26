@extends('layouts.main')

@section('head')
<link rel="stylesheet" href="<?= asset('css/cart-index.css') ?>"/>
@stop

@section('content')

<section class="page-content" ng-controller="ProductCheckoutController" data-ng-init="init()">
    <div class="page-content-inner">
        <input type="hidden" ng-model="customers" />
        <!-- Ecommerce Cart / Checkout -->
        <section class="panel panel-with-borders">
            <div class="panel-body">
                <div class="cui-ecommerce--cart">

                  <div class="alert alert-warning" role="alert" ng-show="carts.length === 0">
                              Your cart is empty
                  </div>

                    <div id="cart-checkout" class="cui-wizard" ng-show="carts.length > 0">
                        @include('cart.inc-step-1')
                        @include('cart.inc-step-2')
                        @include('cart.inc-step-3')
                    </div>
                </div>
            </div>
        </section>
        <!-- End Ecommerce Cart / Checkout -->

    </div>
</section>

@stop

@section('footer')
<script src="<?= asset('app/controllers/productCheckoutController.js') ?>"></script>

@stop
