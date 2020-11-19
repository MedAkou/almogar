@extends('website/layout')
@section('title')
{{ __('Home') }}
@endsection

@section('content')





<style> 
.main-product-categories-menu ul {
    padding: 10px;
    border-top: 1px solid #d1010e;
    text-align: center !important;
}

.main-product-categories-menu ul li {
    float: none;
    display: inline-block;
}

.a9jdaw figure a img {
    width: auto;
    min-height: 300px;
    text-align: center;
}

@media (max-width: 600px) and (min-width: 0px) {


.product-default {
    width: 50% !important;
}
.slide-bg {
    height: 180px;
}

.home-slider {
    height: 180px;
}

.home-slider-container, .home-slide {
    height: 180px;
}

.product-intro.divide-line.up-effect {
    margin-top: 43px;
}

.a9jdaw figure a img {
    width: auto;
    min-height: 200px;
    text-align: center;
}

}
</style>


   <div class="main-product-categories-menu">
    <ul class="menu sf-arrows main-header-menu">
                        {!!  app('SiteSetting')->MerchantMenu('homeCategories') !!}
                    </ul>
     
   </div>

   <main class="main">
        
        <div class="container"> 
            <div class="home-slider-container">
                <div class="home-slider owl-carousel owl-theme owl-theme-light">
                    @foreach($sliders as $slider)   
                    <div class="home-slide">
                        <a href="{{ $slider->link }}">
                            {!! $slider->presentSlider() !!}
                        </a>
                    </div>
                    @endforeach 
                </div>
            </div>
            </div>
            <div class="container product-wrapper">
                <div class="product-intro divide-line up-effect">

                @foreach($products->chunk(4) as $items)
                <div class="row">
                   @foreach($items as $product)
                   <div class="col-md-3  product-default col-xd-6 a9jdaw">
                           @include('website/elements/product')
                   </div>
                   @endforeach
                </div>
                @endforeach
                
                <div class="home-pagination">    
                    {{ $products->links() }}
                </div>


                </div>
            </div>
    </main>



@endsection