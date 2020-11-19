@extends('website/layout')
@section('title')
{{ __('wishlist') }}
@endsection

@section('content')


<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home',['store' => $store ]) }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">{{ __('account') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('wishlist') }}</li>
                    </ol> 
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-last dashboard-content">
                        <h2>{{ __('Wishlist') }}</h2>
                                
                                @if(count($wishlist)) 
                                    <a href="{{ route('wishlist.clear',['store' => $store ]) }}">{{ __('clear wishlist') }}</a>
                                @endif


                                @foreach($wishlist as $product)
                                <div class="product-intro row row-sm">
                                <div class="col-6 col-sm-12 product-default left-details product-list mb-4">
                                <figure>
                                    <a href="{{ route('shop.product',['id' => $product->id , 'store' => $store]) }}">
                                        {!! $product->product->presentThumbnail() !!}
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h2 class="product-title">
                                        <a href="{{ route('shop.product',['id' => $product->id , 'store' => $store ]) }}">{{$product->name }}</a>
                                    </h2>
                                    <p class="product-description">{{ $product->product->snippet() }}</p>
                                    <div class="price-box">
                                        <span class="product-price">{{ $symbol }} {{ $product->product->presentPrice() }}</span>
                                    </div>
                                    <div class="product-action">
                                        <button class="btn-icon btn-add-cart" ><i class="icon-bag"></i>{{ __('ADD TO CART') }}</button>
                                        <a href="{{ route('wishlist.remove', [ 'id' => $product->id , 'store' => $store ]) }}#" class="">{{ __('remove from Wishlist') }}</a>
                                      
                                    </div>
                                </div>
                                </div>
                                </div>
                                @endforeach
                        </div>
                        @include('website.elements.sidebar')
                </div>
            </div>

            <div class="mb-5"></div>
        </main>



@endsection