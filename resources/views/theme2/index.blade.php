@extends('theme2/layout')
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

   <div id="homepage-3">





    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">


        @foreach($sliders as $slider)
            <div class="carousel-item @if ($loop->first) active  @endif">
              {!! $slider->presentSlider() !!}
            </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


    
    
        <div class="container">
            <div class="ps-section__content">
                @foreach($products->chunk(4) as $items)
                <div class="ster">
                    <div class="row">
                        @foreach($items as $product)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-6 nestele">
                            @include('theme2/elements/product')
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <div class="ps-pagination">
                <ul class="pagination">
                    {{ $products->links() }}
                </ul>
            </div>
        </div>


</div>



@endsection
