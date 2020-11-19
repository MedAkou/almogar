@extends('website/layout')
@section('title')
{{ $product->name }}
@endsection

@section('content')



<style>

.product-single-container button.owl-dot {
    display: none;
}

.product-slider-container.product-item {
    max-height: 490px;
}


@media (max-width: 600px) and (min-width: 0px) {



.product-single-details .product-title {
    font-size: 22px;
}

span.product-price {
    font-size: 10px;
}

.product-single-details .product-price {
    display: inline-block;
    font-size: 25px !important;
}

.product-single-details .add-cart span {
    display: none;
}

.product-single-details .add-cart {
    min-width: 51px !important;
    padding-top: 7px;
}

.featured-products h2.product-title a {
    font-size: 16px;
    margin-top: 12px;
    display: block;
}
.featured-products  .product-action {
    display: none;
}

.featured-products  span.product-price {
    font-size: 15px;
}


}







</style>

<main class="main">
<nav aria-label="breadcrumb" class="breadcrumb-nav">

    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home',['store' => $store ]) }}"><i class="icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('shop',['store' => $store ]) }}">{{ __('shop') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol> 
    </div>



</nav>
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="product-single-container product-single-default">
<div class="row">
<div class="col-lg-5 col-md-6 product-single-gallery">
<div class="product-slider-container product-item">
<div class="product-single-carousel owl-carousel owl-theme">

@foreach($product->gallery() as $image)
<div class="product-item">
<img class="product-single-image" src="{{ $image }}" data-zoom-image="{{ $image }}"/>
</div>
@endforeach

</div>

<span class="prod-full-screen">
<i class="icon-plus"></i>
</span>
</div>
<div class="prod-thumbnail row owl-dots" id='carousel-custom-dots'>

@php
        $x =1;
@endphp
@foreach($product->gallery() as $image)
@php
        if($x < 5 ):
@endphp
<div class="col-3 owl-dot">
<img src="{{ $image }}" />
</div>
@php
     endif;
        $x++;
@endphp
@endforeach

</div>
</div>


<div class="col-lg-6 col-md-6">
<div class="product-single-details">
<h1 class="product-title">{{ $product->name }}</h1>


<div class="price-box">
<span class="product-price">{{ $symbol }}{{ $product->presentPrice() }}</span>
<span class="product-price discountPrice d-none">{{ $symbol }}{{ $product->presentDiscountPrice() }}</span>
<span class="product-price presentDiscount d-none">{{ $product->presentDiscount() }}</span>
</div>

<div class="product-desc">
<p>{!! $product->description !!}</p>
</div>

<div class="product-action product-all-icons">
<div class="product-single-qty">
<input class="horizontal-quantity form-control" id="instantQuantity" type="text">
</div>

<a href="{{ route('cart.add', ['id' => $product->id , 'store' => $store ]) }}" class="paction add-cart btn-add-cart" data-product-id='{{$product->id}}'  title="{{ __('cart.add') }}">
<span>{{ __('cart.add') }}</span>
</a>

<a href="{{ route('wishlist.add', ['id' => $product->id, 'store' => $store  ]) }}" class="paction add-wishlist" title="{{ __('wishlist.add') }}">
<span>Add to Wishlist</span>
</a>

</div>

<div class="product-single-share">
<label>{{ __('Share:') }}</label>

<div class="addthis_inline_share_toolbox">
<a class="sharebtn fb"  target="_blank" href="http://www.facebook.com/sharer.php?u={{  Request::url() }}" >
	<span class="icon icon-facebook"></span>
	<span class="share-count is-loaded">Share</span>     
</a>
<a  class="sharebtn tw" target="_blank" href="http://twitter.com/share?url={{  Request::url() }}">
	<span class="icon icon-twitter"></span>
	<span class="share-count is-loaded">Tweet</span>
</a>


</div>
</div>
</div>
</div>
</div>
</div>


</div>

<div class="sidebar-overlay"></div>

</div>






        </main>



</div>
</div>
</div>
</main>

<style>
.featured-products h2.product-title {
    font-size: 21px !important;
    margin-top: 11px;
}
</style>


    <div class="featured-section">
        <div class="container">
            <h2 class="carousel-title">{{ __('Featured Products') }}</h2>
            <div class="featured-products owl-carousel owl-theme owl-dots-top divide-line up-effect ">
               @foreach($related  as $product )
			   	@include('website/elements/product')
               @endforeach
            </div>
        </div>
    </div>



@endsection