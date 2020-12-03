@extends(\System::$ACTIVE_THEME_PATH.'/layout')
@section('title')
{{ __('Home') }}
@endsection

@section('content')


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
                <div class="ster">
                    <div class="row">
                @foreach($products->chunk(4) as $items)
                
                        @foreach($items as $product)
                            @if(!empty($product->presentRealPrice()))
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-xs-6 nestele">
                                    @include(\System::$ACTIVE_THEME_PATH.'/elements/product')
                                </div>
                            @endif
                        @endforeach
                    
                @endforeach
            </div>
        </div>
            </div>
            <div class="ps-pagination">
                <ul class="pagination">
                    {{ $products->links() }}
                </ul>
            </div>
        </div>


</div>



@endsection
