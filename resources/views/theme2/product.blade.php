@extends('theme2/layout')
@section('title')
{{ $product->name }}
@endsection

@section('content')

<nav class="navigation--mobile-product"><a class="ps-btn ps-btn--black" href="{{ route('cart.add', ['id' => $product->id , 'store' => $store ]) }}" data-product-id='{{$product->id}}'  title="{{ __('cart.add') }}">{{ __('cart.add') }}</a><a class="ps-btn" href="{{ route('checkout', ['store' => $store ]) }}">{{ __('Checkout') }}</a></nav>
<div class="ps-page--product">
    <div class="ps-container">
        <div class="ps-page__container">
            <div class="ps-page__left">
                <div class="ps-product--detail ps-product--fullwidth">
                    <div class="ps-product__header">



                      <div class="ps-product__thumbnail" data-vertical="true">
                          <figure>
                              <div class="ps-wrapper">
                                  <div class="ps-product__gallery" data-arrow="true">
                                    @foreach($product->gallery() as $image)
                                      <div class="item"><a href="{{ $image }}"><img class="zoomimgs" src="{{ $image }}" alt=""></a></div>
                                    @endforeach
                                  </div>
                              </div>
                          </figure>
                          <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                            @foreach($product->gallery() as $image)
                              <div class="item"><img src="{{ $image }}" alt=""></div>
                              @endforeach
                          </div>
                      </div>



                        
                        <div class="ps-product__info">
                            <h1>{{ $product->name }}</h1>
                            <h4 class="ps-product__price">{{ $symbol }}{{ $product->presentPrice() }}</h4>
                            <div class="ps-product__desc">
                                <ul class="ps-list--dot" style="display: none;">
                                    <p>{!! $product->description !!}</p>
                                </ul>
                            </div>
                            <div class="ps-product__shopping">
                                <figure>
                                    <figcaption>Quantity</figcaption>
                                    <div class="form-group--number zaydnaks">
                                        <button class="up">+</button>
                                        <button class="down">-</button>
                                        <input class="quantity-ajax form-control instantQuantity"  data-product-id='{{ $product['id'] }}' data-price='{{ $product['price'] }}'  type="text" placeholder="1" value="{{ $product['qty'] }}">
                                    </div>
                                </figure>
                                <a class="ps-btn ps-btn--black" href="{{ route('cart.add', ['id' => $product->id , 'store' => $store ]) }}" data-product-id='{{$product->id}}'  title="{{ __('cart.add') }}">                                    {{ __('cart.add') }}</a>
                                <a class="ps-btn" style="display: none;" href="#">Buy Now</a>
                                <div class="ps-product__actions"><a href="{{ route('wishlist.add', ['id' => $product->id, 'store' => $store  ]) }}" title="{{ __('wishlist.add') }}><i class="icon-heart"></i></a>                                    </div>                                
                            </div>

                            <div class="single-visitors"><span class="btnnbrview"><i class="fa fa-eye" aria-hidden="true"></i><span class="nbrvirws">78</span></span>  people watching this product</div>


                            <div class="ps-product__sharing">
                                <a class="facebook" target="_blank" href="http://www.facebook.com/sharer.php?u={{  Request::url() }}"><i class="fab fa-facebook-f"></i></a>
                                <a class="twitter" target="_blank" href="http://twitter.com/share?url={{  Request::url() }}"><i class="fab fa-twitter"></i></a></div>
                        </div>
                    </div>
                    <div class="ps-product__content ps-tab-root">
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-1">{{ __('Description') }}</a></li>
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-document">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-page__right">
                <aside class="widget widget_product widget_features">
                    <p><i class="icon-network"></i> Shipping worldwide</p>
                    <p><i class="icon-3d-rotate"></i> Free 7-day return if eligible, so easy</p>
                    <p><i class="icon-receipt"></i> Supplier give bills for this product.</p>
                    <p><i class="icon-credit-card"></i> Pay online or when receiving goods</p>
                </aside>
                <aside class="widget widget_ads" style="display: none !important;"><a href="#"><img src="img/ads/product-ads.png" alt="" style="display: none !important;"></a></aside>
            </div>
        </div>
        <div class="ps-section--default">
            <div class="ps-section__header">
               <h3>{{ __('Featured Products') }}</h3>
            </div>
            <div class="ps-section__content">
               <div class="ps-carousel--nav owl-slider owl-carousel owl-loaded owl-drag" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                  <div class="owl-stage-outer">
                     <div class="owl-stage" style="transform: translate3d(-1673px, 0px, 0px); transition: all 1s ease 0s; width: 4543px;">
                        
                        @foreach($related->chunk(1) as $items)
                        <div class="owl-item cloned related" style="width: 209.066px; margin-right: 30px;">
                                @foreach($items as $product)
                                    @include('theme2/elements/product')
                                @endforeach
                        </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="icon-chevron-left"></i></button><button type="button" role="presentation" class="owl-next"><i class="icon-chevron-right"></i></button></div>
                  <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
               </div>
            </div>
         </div>
    </div>

    <div at-magnifier-wrapper=""><div class="at-theme-light"><div class="at-base notranslate" translate="no"><div class="Z1-AJ" style="top: 0px; left: 0px;"></div></div></div></div>
    
</div>


@endsection



