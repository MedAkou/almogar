@extends('website/layout') 

@section('title') 

{{ __('Cart') }} 

@endsection 

@section('content')

<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
           <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home',['store' => $store ]) }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('cart') }}</li>
            </ol> 
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-table-container">
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th class="product-col">{{ __('Product') }}</th>
                                <th class="price-col">{{ __('Price') }}</th>
                                <th class="qty-col">{{ __('Qty') }}</th>
                                <th>{{ __('Subtotal') }}</th>
                                <th>{{ __('delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if(!empty(ShoppingCart::all())) @foreach(ShoppingCart::all() as $product)
                            <tr class="product-row">
                                <td class="product-col">
                                    <figure class="product-image-container">
                                        <a href="{{ route('shop.product',['id' => $product['id'] , 'store' => $store ]) }}" class="product-image">
                                            <img src="{{ $product['thumbnail'] }}" alt="product">
                                        </a>
                                    </figure>
                                    <h2 class="product-title">
                                <a href="">{{ $product['name'] }}</a>
                            </h2>
                                </td>
                                <td>{{ $symbol }}{{ $product['price'] }}</td>
                                <td>
                                    <input class="quantity-ajax vertical-quantity form-control" data-product-id='{{ $product['id'] }}' data-price='{{ $product['price'] }}' data-product="{{ $product->rawId() }}" id="vertical_btn" value="{{ $product['qty'] }}" type="text">
                                </td>
                                <td>{{ $symbol }} <span class="product-subtotal">{{ $product['total'] }}</span> </td>
                                <td><a href="{{ route('cart.remove', ['id' => $product->rawId() , 'store' => $store])  }}" class='btn-remove-cart'>{{ __('Delete') }}</a></td>
                            </tr>
                            @endforeach @endif

                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="5" class="clearfix">
                                    <div class="float-left">
                                        <a href="{{ route('shop', ['store' => $store]) }}" class="btn btn-outline-secondary">{{ __('Continue Shopping') }}</a>
                                    </div>

                                    <div class="float-right">
                                        <a href="{{ route('checkout', ['store' => $store]) }}" style='margin-left: 15px;' class="btn btn-block btn-sm btn-primary">{{ __('Go to Checkout') }}</a>
                                    </div>

                                    <div class="float-right">
                                        <a href="{{ route('cart_clear', ['store' => $store]) }}" class="btn btn-outline-secondary btn-clear-cart">{{ __('Clear Shopping Cart') }}</a>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="cart-discount d-none">
                    <h4>{{ __('Apply Discount Code') }}</h4>
                    <form action="coupons/activate">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Enter discount code" required>
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary" type="submit">{{ __('Apply Discount') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                @include('website/elements/cartsummary')
            </div>

        </div>
    </div>
    </div>

    <div class="mb-6"></div>
</main>

@endsection