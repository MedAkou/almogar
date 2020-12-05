@extends(\System::$ACTIVE_THEME_PATH.'/layout') 

@section('title') {{ __('Chekout') }}
@endsection 

@section('content')

<input type="hidden" id='subtotal' value="{{ ShoppingCart::totalPrice() }}" />


<form action="{{ route('checkout.pay',['store' => $store]) }}" method='post'>



    <main class="main">
        <section class="ps-section--account ps-checkout">
            <div class="container">
            @if(\System::shoppingCartIsNotEmpty())  
                <div class="ps-section__header">
                    <h3>{{__('Payment')}}</h3>
                </div>
                <div class="ps-section__content">
             
                    <form class="ps-form--checkout" action="{{ route('checkout.pay',['store' => $store]) }}" method="post">
                        <div class="ps-form__content">
                            @csrf
                            @auth
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--shipping">
                                        <div class="ps-block__panel">
                                            <figure><small>{{ __('Shipping Address') }}</small>
                                                <div class="row " style="margin-top:25px;">
                                                    @foreach(Auth::user()->addresses as $addresse)
                                                    <div class="col-md-6">
                    
                                                        <div class="shipping-address-box @if($addresse->is_shipping) active @endif" style="width: 100%">
                                                            {{ $addresse->given_name }}
                                                            <br> {{ $addresse->street }}
                                                            <br> {{ $addresse->state }}, {{ $addresse->city }} , {{ $addresse->postal_code }}
                                                            <br> {{ $addresse->country_code }}
                                                            <br> {{ $addresse->phone }}
                                                            <br>
                                                            <a href="{{ route('shipping.set',['id' =>  $addresse->id , 'store' => $store]) }}" class="ps-btn"> {{ __('ship here') }}</a>
                                                        </div>
                    
                                                    </div>
                                                    @endforeach
                                                </div>
                    
                                                <a href="{{ route('shipping.add',['store' => $store]) }}" class="ps-btn ps-btn--sm">
                                                    {{ __('+ New Address') }}
                                                </a>
                                            </figure>
                                        </div>
                                        <h4>{{ __('Shipping Methods') }}</h4>
                                        <div class="ps-block__panel">
                                            <figure>
                                                <table class="table table-striped table-step-shipping">
                                                    <tbody>
                                                        <tr>
                                                           <td><input type="radio" class="shipping-method-radio" data-price="0" name="shippingMethod" value="pickup"></td>
                                                           <td colspan="3">{{ __('pickup') }}</td>
                                                        </tr>
                
                                                        @foreach($shipping as $method)
                                                        <tr>
                                                            <td>
                                                                <input type="radio" class="shipping-method-radio" data-price="{{ $method->cost }}" name="shippingMethod" value="{{ $method->id }}">
                                                            </td>
                                                            <td><strong>{{ @$method->PresentCost() }}</strong></td>
                                                            <td>{{ $method->name }}</td>
                                                            <td>{{ $method->delivery_days }} {{ __('delivery days') }}</td>
                                                        </tr>
                                                        @endforeach
                
                                                    </tbody>
                                                </table>
                                            </figure>
                                        </div>
                                        <h4>{{ __('Payment Methods') }}</h4>
                                        <div class="ps-block--payment-method">
                                            <ul class="ps-tab-list">
                                                <li class="active"><a class="ps-btn ps-btn--sm" id="facturem" href="#fatora">{{ __('facture') }}</a></li>
                                                <li><a class="ps-btn ps-btn--sm" id="paypalm" href="#paypal">{{ __('Paypal') }}</a></li>
                                                <li><a class="ps-btn ps-btn--sm" id="visam" href="#visa">{{ __('Credit Card') }}</a></li>
                                                
                                            </ul>
                                            <div class="ps-tabs">
                                                <div class="ps-tab" id="visa">
                                                        <div class="form-group">
                                                            <label for="username">Kontoinhaber</label>
                                                            <input type="text" name="username" placeholder=""  class="form-control">
                                                        </div>
                                                        <div class="form-group--icon form-group">
                                                            <label for="cardNumber">Karte Nummer</label>
                                                            <input type="text" id="checkout_card_number" name="card_no" placeholder="" class="form-control">
                                                            <span class="input-group-addon">
                                                                <i>
                                                                    <img id="talcartat" src="" alt="">
                                                                </i>
                                                                
                                                            </span>
 
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <div class="form-group">
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-6">

                                                                            <label>Gültig bis</label>
                                                                            <div class="form-group">
                                                                                <input type="number" placeholder="MM" name="exp_month" class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <label>Jahr</label>
                                                                            <div class="form-group">
                                                                                <input type="number" placeholder="YY" name="exp_year" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <label>CVV</label>
                                                                <div class="form-group">                                                        
                                                                    <input type="text" class="form-control" placeholder="cvv" name="cvv">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group submit">
                                                            <input type="submit" class="ps-btn checkoutbtn" value="{{ __('Complete Checkout') }}">
                                                        </div>
                                                </div>
                                                <div class="ps-tab" id="paypal">
                                                    <input type="submit" class="ps-btn checkoutbtn" value="{{ __('Complete Checkout') }}">
                                                </div>
                                                <div class="ps-tab active" id="fatora">
                                                    <input type="submit" class="ps-btn checkoutbtn" value="{{ __('Complete Checkout') }}">
                                                </div>
                                                <input type="hidden" id="inputpaymentmethod" name="paymentmethod" value="facture">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                                        <div class="ps-block--shopping-total">
                                            <div class="ps-block__header">
                                                <p>{{ __('Summary') }} </p>
                                            </div>
                                            <div class="ps-block__content">
                                                <ul class="ps-block__product">
                                                    @if(!empty(ShoppingCart::all())) @foreach(ShoppingCart::all() as $product)
                                                    <li><span class="ps-block__shipping"><a href="{{ route('shop.product',['id' => $product['id'], 'store' => $store]) }}"> {{ $product['name'] }} ×{{ $product['qty'] }}</a></span></li>
                                                    @endforeach @endif                                                    
                                                </ul>
                                                <tr class="shippingRow d-none">
                                                    <td>{{ __('Shipping') }}</td>
                                                    <td>{{ System::currency() }} <span class="shippingPrice"></span></td>
                                                </tr>
                                                <h3>{{ __('Order Total') }} <span class="TotalPrice">{{ System::currency() }} {{ ShoppingCart::totalPrice() }}</span></h3>
                                            </div>
                                        </div>
                                        <div class="ps-block--shopping-total">
                                            <div class="ps-block__header">
                                                <p>{{ __('Coupon') }} </p>
                                            </div>

                                            <div class="alert alert-success dyalcouponS" style="display: none;"></div>
                                            <div class="alert alert-warning dyalcouponA" style="display: none;"></div>

                                            <input type="hidden" id="totalPriceV" value="{{ ShoppingCart::totalPrice() }}">
                                            <input type="hidden" id="shippingPriceV" value="0">
                                            <input type="hidden" id="couponV" value="0">
                                            <input type="hidden" id="typeDiscount" value="0">
                                            <div class="ps-block__content">
                                                    <div class="form-group--nest">
                                                        <input class="form-control" id="couponvalue" name="coupon"  placeholder="{{ __('coupon') }}">
                                                        <a href="javascript:;" class="ps-btn ps-btn--sm couponbtn" id="applyCoupon" type="submit"><i class="icon-chevron-right"></i></a>
                                                    </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            @endauth 
        
                            @guest
                            <div class="row">
                                <div class="container needlogin">
                                    <h1>{{ __('Please login or sign up to checkout') }}</h1>
                                    <a href="{{ route('user',['store' => $store ]) }}" class=" ps-btn "> {{ __('Login & Register') }} </a>
                                </div>
                            </div>
                            @endguest
        
                        </div>
                    </form>
                @else
                <div class="ps-table--invoices">
                    <div class="row text-center">
                            <div class="empty-order">
                                <i class="icon-cart"></i>
                                <p>{{ __('Your shopping cart is empty') }}</p>
                                <a class="ps-btn" href="/{{ $store }}">{{ __('Home') }}</a>
                            </div>
                    </div>
                    </div>
                @endif
                
                </div>
            </div>
        </section>

        @if($errors->any())
            {{ implode('', $errors->all('<div>:message</div>')) }}
        @endif
    </main>



@endsection
@section('scripts') 
    <script src="{{ asset('assets/website/js/ccvalidate.js') }}?v={{ env('ASSETS_VERSION') }}"></script>
@endsection 