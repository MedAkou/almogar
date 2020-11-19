@extends('website/layout') @section('title') {{ __('Chekout') }} @endsection @section('content')

<input type="hidden" id='subtotal' value="{{ ShoppingCart::totalPrice() }}" />


<form action="{{ route('checkout.pay',['store' => $store]) }}" method='post'>


<style>
    input[name="exp_year"]{
    margin-top:0 !important;
}
</style>


<!-- Modal -->
<div class="modal fade" id="StripeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kreditkarte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            
              <div class="form-group">
                <label for="username">Vollständiger Name</label>
                <input type="text" name="username" placeholder=""  class="form-control">
              </div>
              <div class="form-group">
                <label for="cardNumber">Karte Nummer</label>
                <input type="text" name="card_no" placeholder="" class="form-control">                
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label><span class="hidden-xs">Gültig bis Ende</span></label>
                    <div class="input-group">
                      <input type="number" placeholder="MM" name="exp_month" class="form-control">
                      <input type="number" placeholder="YY" name="exp_year" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="form-group mb-8">
                  
                    <input type="text" class="form-control" placeholder="cvv" name="cvv">
                  </div>
                </div>



              </div>
              <button type="button" class=" btn btn-primary btn-block rounded-pill shadow-sm ConfirmCard"> Bestätigen  </button>
            
          </div>
          <!-- End -->

      </div>
      
    </div>
  </div>
</div>







    @csrf

    <main class="main">

        <div class="container">

            @auth

            <div class="row">
                <div class="col-lg-8">

                    <ul class="checkout-steps">

                        <li>
                            <h2 class="step-title">{{ __('Shipping Address') }}</h2>

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
                                        <a href="{{ route('shipping.set',['id' =>  $addresse->id , 'store' => $store]) }}" class="btn btn-sm btn-link"> {{ __('ship here') }}</a>
                                    </div>

                                </div>
                                @endforeach
                            </div>

                            <a href="{{ route('shipping.add',['store' => $store]) }}" class="btn btn-sm btn-outline-secondary btn-new-address">
                                {{ __('+ New Address') }}
                            </a>


                        </li>
                        

                        <li>
                           <table>
                               
                           </table>

                        </li>

                        <li>
                            <div class="checkout-step-shipping">
                                <h2 class="step-title">{{ __('Shipping Methods') }}</h2>

                                <table class="table table-step-shipping">
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
                            </div>

                            <div class="checkout-step-shipping payement">
                                <h2 class="step-title">{{ __('Payement Methode') }}</h2>

                                <table class="table table-step-shipping">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="radio" name="paymentmethod" value="paypal">
                                            </td>
                                            <td><strong>{{ __('Paypal') }}</strong></td>
                                            <td> <img src="/assets/front/images/paypal.png"  class="footer-payments"></td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="radio" name="paymentmethod" value="stripe">
                                            </td>
                                            <td><strong>{{ __('Credit Card') }}</strong></td>
                                            <td> <img src="/assets/front/images/cc.png"  class="footer-payments"> </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <input type="radio" name="paymentmethod" value="facture">
                                            </td>
                                            <td><strong>{{ __('facture') }}</strong></td>
                                            <td> </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </li>
                    </ul>

                </div>

                <div class="col-lg-4">
                    @include('website/elements/cartsummary')
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-steps-action">
                        <input type="submit" class="btn btn-primary btn-block" value="{{ __('Complete Checkout') }}">
                    </div>
                </div>
            </div>

            @endauth 

            @guest
            <div class="row">
                <div class="container needlogin">
                    <h1>{{ __('Please login or sign up to checkout') }}</h1>
                    <a href="{{ route('user',['store' => $store ]) }}" class=" btn btn-primary "> {{ __('Login & Register') }} </a>
                </div>
            </div>
            @endguest


        </div>

        <div class="mb-6"></div>
        
        @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif
    </main>
</form>



@endsection