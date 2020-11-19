@extends('theme2/layout') 

@section('title') 

{{ __('Cart') }} 

@endsection 

@section('bodyClass')  cart @endsection 



@section('content')

<main class="main">
    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__header">
                <h1>{{ __('cart') }}</h1>
            </div>
    
            <div class="ps-section__content">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 ">
                        <div class="table-responsive">
                        <input type="hidden" id="slug" value="{{ $store }}">
                            <table class="table ps-table--shopping-cart">
                                <thead>
                                    <tr>
                                        <th>{{ __('Product') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Qty') }}</th>
                                        <th>{{ __('Subtotal') }}</th>
                                        <th>{{ __('delete') }}</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @if(!empty(ShoppingCart::all())) @foreach(ShoppingCart::all() as $product)
                                    <tr >
                                        <td>
                                            <div class="ps-product--cart">
                                                <div class="ps-product__thumbnail"><a href="{{ route('shop.product',['id' => $product['id'] , 'store' => $store ]) }}"><img src="{{ $product['thumbnail'] }}" alt=""></a></div>
                                                <div class="ps-product__content"><a href="{{ route('shop.product',['id' => $product['id'] , 'store' => $store ]) }}">{{ $product['name'] }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $symbol }}{{ $product['price'] }}</td>
                                        <td>
                                            <div class="form-group--number zaydnaks">
                                                <button class="up">+</button>
                                                <button class="down">-</button>
                                                <input class="quantity-ajax form-control instantQuantity"  data-product-id='{{ $product['id'] }}' data-price='{{ $product['price'] }}' data-product="{{ $product->rawId() }}" type="text" value="{{ $product['qty'] }}">
                                            </div>
                                        </td>
                                        <td>{{ $symbol }} <span class="price">{{ $product['total'] }}</span></td>
                                        <td><a href="{{ route('cart.remove', ['id' => $product->rawId() , 'store' => $store])  }}"><i class="icon-cross"></i></a></td>
                                    </tr>
                                    @endforeach @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="ps-section__cart-actions">
                            <a class="ps-btn" href="{{ route('shop', ['store' => $store]) }}"><i class=""></i> {{ __('Continue Shopping') }}</a><a class="ps-btn ps-btn--outline" href="{{ route('cart_clear', ['store' => $store]) }}"><i class="icon-cross"></i> {{ __('Clear Shopping Cart') }}</a></div>
                    </div>
    
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 "  id='order-cart-section'>
                        <div class="ps-block--shopping-total">
                            <div class="ps-block__header">
                                <p>{{ __('Summary') }} </p>
                            </div>

                         
                            <style>
                                span.preis::after {content: ' € ';}
                            </style>


                            <div class="ps-block__content">
                                <ul class="ps-block__product">
                                    @if(!empty(ShoppingCart::all())) @foreach(ShoppingCart::all() as $product)
                                    <li class="product-col-{{ $product['id'] }}">
                                        <span class="ps-block__estimate"> 
                                            <span class="preis">{{ $product['total'] }}</span>  
                                        </span>
                                        <span class="ps-block__shipping product-qty ">
                                            <a href="{{ route('shop.product',['id' => $product['id'], 'store' => $store]) }}"> 
                                            {{ $product['name'] }} × <i>{{ $product['qty'] }} </i>
                                        </a>
                                    </span>
                                    </li>
                                    @endforeach @endif
                                </ul>
                                <h3>{{ __('Order Total') }} <span>{{ $symbol }} <i class="TotalPrice"> {{ ShoppingCart::totalPrice() }}</i></span></h3>
                            </div>
                        </div>
                        <a class="ps-btn ps-btn--fullwidth" href="{{ route('checkout', ['store' => $store]) }}">{{ __('Go to Checkout') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

@endsection
