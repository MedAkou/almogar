<!DOCTYPE html>
<html lang="en">
   <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ baseSetting('sitename') }} | @yield('title')</title>
    <meta name="keywords" content="{{ option('metakeywords') }}" />
    <meta name="description" content="{{ __('tagline') }}">
    @php $favicon = option('favicon'); @endphp @if(!empty($favicon))
    <link rel="icon" type="image/x-icon" href="/uploads/{{ $favicon }}">
    @endif
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/website/css/all.css') }}?v={{ env('ASSETS_VERSION') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <style>
        .ps-block--site-features {
        border: none;
        }
        .ster {
        padding: 15px 0;
        }
    </style>
    <style>
      .header--standard.header--sticky .header__content {
    display: none;
}
    h3.stores-heading-h3 {
    text-align: center;
    margin-bottom: 55px;
    margin-top: -70px;
    font-size: 17px;
    line-height: 30px;
    color: #888;
    font-weight: 400;
    display: block;
    }
    h1.stores-heading-h1 {text-transform: capitalize;}
    .utf_star_rating_section {
    text-align: center;
    color: #dc3545;
    font-size: 19px;
    padding: 7px;
    }
    .store-listing-wrapper {
    margin-bottom: 75px;
    position: relative;
    }
    .utf_listing_item {
    background: #ccc;
    border-radius: 4px;
    height: 100%;
    display: block;
    position: relative;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50%;
    height: 300px;
    z-index: 100;
    cursor: pointer;
    }
    .utf_listing_item img {
    object-fit: cover;
    height: 100%;
    width: 100%;
    border-radius: 4px 4px 0 0;
    transition: transform 0.35s ease-out;
    transition: all 0.55s;
    }
    .utf_listing_item span.tag {
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.5px;
    font-weight: 600;
    background: #ff2222;
    border-radius: 4px;
    padding: 1px 6px;
    line-height: 20px;
    color: #fff;
    border: 2px solid #ff2222;
    margin-bottom: 9px;
    position: absolute;
    z-index: 9999;
    top: 20px;
    right: 20px;
    }
    .utf_listing_item span.featured_tag {
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.5px;
    font-weight: 500;
    background: #2cafe3;
    border-radius: 4px;
    padding: 1px 10px;
    line-height: 20px;
    color: #fff;
    border: 2px solid #2cafe3;
    margin-bottom: 9px;
    position: absolute;
    z-index: 9999;
    top: 58px;
    right: 20px;
    }
    .utf_listing_item_content {
    position: absolute;
    bottom: 45px;
    left: 0;
    padding: 0 20px;
    width: 100%;
    z-index: 50;
    box-sizing: border-box;
    }
    .utf_listing_item_content h3 {
    color: #fff;
    font-size: 20px;
    bottom: 2px;
    position: relative;
    font-weight: 400;
    margin: 0;
    line-height: 30px;
    }
    .utf_listing_item {
    position: relative;
    }
    .utf_listing_item_content span {
    display: block;
    }
    .utf_listing_item_content span i {
    color: red;
    margin-right: 10px;
    }
    .utf_listing_item_content {
    bottom: 33px;
    }
    .utf_listing_item {
    border-radius: 10px !important;
    overflow: hidden;
    }
    .utf_listing_item:before {
    content: "";
    top: 0;
    position: absolute;
    height: 100%;
    width: 100%;
    z-index: 9;
    background: linear-gradient(to top, rgba(0,0,0,0.9) 10%, rgba(0,0,0,0.60) 40%, rgba(22,22,23,0) 80%, rgba(0,0,0,0) 100%);
    background-color: rgba(0,0,0,0.2);
    border-radius: 4px 4px 0 0;
    opacity: 1
    }
    span.utf_meta_listing_price {
    color: white;
    }
    .utf_listing_prige_block span {
    color: white;
    }
    .utf_listing_item_content span {
    color: white;
    }
    .utf_listing_item_content span {
    display: block;
    }
    .utf_listing_item_content span i {
    color: red;
    margin-right: 10px;
    }
    .utf_listing_item_content {
    bottom: 33px;
    }
    .utf_listing_item {
    border-radius: 10px !important;
    overflow: hidden;
    }
    .utf_star_rating_section {
    padding: 15px;
    z-index: 99999;
    position: absolute;
    background: #fff;
    width: auto;
    bottom: -25px;
    left: 37px;
    right: 40px;
    border-radius: 4px;
    box-shadow: 0 1px 8px 0 rgba(0, 0, 0, 0.1);
    }
    .utf_listing_item_content {
    bottom: 51px;
    }
    .utf_star_rating_section {
    text-align: center;
    color: #dc3545;
    font-size: 19px;
    padding: 7px;
    }
    .restaurant {
    position: relative;
    display: flex;
    flex-direction: row;
    background-color: #fff;
    padding: 2px;
    border-radius: 2px;
    border: 1px solid #ebebeb;
    cursor: pointer;
    margin: 8px 0;
    min-height: 120px;
    overflow: hidden;
    }
    .restaurant .logowrapper {
    flex: 0 0 98px;
    text-align: center;
    border-right: 1px solid #ebebeb;
    min-height: 120px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    }
    .restaurant .logowrapper {
    flex: 0 0 138px;
    }
    .restaurant .restaurantname {
    font-family: Takeaway Sans,Avant Garde,Century Gothic,Helvetica,Arial,sans-serif;
    font-weight: 600;
    padding: 0;
    color: #0a3847;
    font-size: 18px;
    line-height: 22px;
    max-height: 66px;
    overflow: hidden;
    margin: 0 8px 0 0;
    }
    .restaurant .detailswrapper {
    flex: 1;
    min-height: 120px;
    line-height: 1.7;
    font-size: 15px;
    padding: 8px 0 0 8px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    }
    .restaurant .detailswrapper .kitchens {
    line-height: 22px;
    font-family: Roboto Slab,Arial,serif;
    font-size: 13px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0 8px 4px 0;
    color: #666;
    }
    .restaurant .detailswrapper .details .delivery div {
    margin-right: 16px;
    }
    .restaurant .detailswrapper .details .delivery div {
    margin-right: 16px;
    }
    .restaurant .detailswrapper .details .delivery {
    width: 100%;
    line-height: 18px;
    font-family: Roboto Slab,Arial,serif;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    }
    .delivery div {
    width: 100%;
    display: block;
    }
    .delivery span {
    display: block !important;
    width: 100%;
    margin-bottom: 10px;
    }
    .delivery.js-delivery-container {
    padding: 12px;
    }
    .delivery i {
    color: red;
    margin-right: 9px;
    }
    .restaurant {
    width: 96%;
    margin: 0 auto;
    margin-bottom: 19px;
    }
    @media only screen 
    and (min-device-width : 768px) 
    and (max-device-width : 1024px)  { 
    .d-sm-none.d-lg-none.d-md-none.js-restaurant.restaurant.restaurant__open {
    display: block !important;
    }
    
    .restaurant .logowrapper {
    width: 30%;
    float: left;
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
    }
    @media (max-width: 600px) and (min-width: 0px) {
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
    }





.ps-block--site-features .ps-block__item:first-child {
    padding-right: 0;
}


.ps-block--site-features .ps-block__item:nth-child(2) {
    padding: 0;
}

.ps-block--site-features .ps-block__item:nth-child(3) {
    padding-left: 0;
    padding-right: 0;
}

.ps-block--site-features .ps-block__item:last-child {
    padding-left: 0;
}

.ps-block__item {
    min-width: 280px;
    padding-left: 45px !important;
}



.home-pagination {
    text-align: center;
    margin-bottom: 45px;
}
@media all and (min-width:0px) and (max-width: 600px) {
.ps-block--site-features {
    padding: 0 !important;
}

.ps-block__item {
    padding-left: 10px !important;
}

aside.widget.widget_footer {
    width: 100% !important;
}

.carousel-item {
    height: 250px !important;
}

.carousel-item img {
    height: 100%;
    object-fit: cover;
}

}

.carousel-item {
    height: 740px;
}


img.stroephimg {
    width: 150px;
    height: 61px;
}

.ps-block--store-2 .ps-block__content {
    padding: 30px 20px 20px !important;
}

.ps-store-list, .ps-block--store-2 {
    margin-bottom: 30px;
}

a.ps-block__user {
    top: -10px;
    width: 150px;
    height: 150px;
}

.ps-block--store-2 .ps-block__author .ps-block__user {
    width: 90px;
    height: 90px;
    margin-bottom: -30px;
}

img.stroephimg {
    height: 84px !important;
}

.ps-block__content.bg--cover {
    padding-bottom: 0px !important;
}

.carousel-item {
    height: 600px;
}



@media (max-width: 600px) and (min-width: 0px) {
       .col-md-4.hidden-xs {
            display: none !important;
        }

}


    </style>

   </head>
   <body>
      <header class="header header--standard header--market-place-1" data-sticky="true">
         <div class="header__top">
            <div class="container">
               <div class="header__left">
                  <p>{{ __('Welcome to o-bazaar store') }}</p>
               </div>
               <div class="header__right">
                    <ul class="header__top-links">
                      @auth
                      <li><a href="/logout">{{ __('Logout') }}</a></li>
                      @endauth
                        <li><a href="{{ route('account.edit') }}">{{ __('My Account') }}</a></li>
                        <li>
                            <div class="ps-dropdown language"><a href="javascript:;">{{  app('SiteSetting')->PresentLang() }}</a>
                                <ul class="ps-dropdown-menu">
                                    <li><a href="?lang=ar"><img src="{{ asset('assets/website/img/flag/sa.png') }}" alt=""> العربية</a></li>
                                    <li><a href="?lang=tr"><img src="{{ asset('assets/website/img/flag/tr.png') }}" alt=""> Turkish</a></li>
                                    <li><a href="?lang=de"><img src="{{ asset('assets/website/img/flag/de.png') }}" alt=""> Deutsch</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
         </div>






         <div class="header__content">
            <div class="container">
               <div class="header__content-left">
                  <div class="menu--product-categories">
                     <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                     <div class="menu__content">
                        <ul class="menu--dropdown">
                           <li><a href="#"><i class="icon-star"></i> Hot Promotions</a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  @php
                  $logo = baseSetting('logo');
                  @endphp
                  @if(!empty($logo))
                  <a class="ps-logo" href="/">
                  <img src="/uploads/{{ $logo }}" alt="">
                  </a>
                  @endif
               </div>
               <div class="header__content-center">

               </div>
               <div class="header__content-right">

               </div>
            </div>
         </div>
      </header>

      <header class="header header--mobile" data-sticky="true">
         <div class="header__top">
            <div class="header__left">
               <p>{{ __('My Account') }}</p>
            </div>
            <div class="header__right">
                <ul class="navigation__extra">
                    <li><a href="{{ route('account.edit') }}">{{ __('My Account') }}</a></li>
                    <li>
                        <div class="ps-dropdown language"><a href="javascript:;">{{  app('SiteSetting')->PresentLang() }}</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="?lang=ar"><img src="{{ asset('assets/website/img/flag/sa.png') }}" alt=""> العربية</a></li>
                                <li><a href="?lang=tr"><img src="{{ asset('assets/website/img/flag/tr.png') }}" alt=""> Turkish</a></li>
                                <li><a href="?lang=de"><img src="{{ asset('assets/website/img/flag/de.png') }}" alt=""> Deutsch</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
         </div>
         <div class="navigation--mobile">
            <div class="navigation__left">
                @php
                    $logo = baseSetting('logo');
                @endphp
                @if(!empty($logo))
                <a class="ps-logo" href="/" class="logo">
                    <img src="/uploads/{{ $logo }}" >
                </a>
                @endif
            </div>
            <div class="navigation__right">
                <div class="header__actions">
                    <div class="ps-block--user-header">
                        <div class="ps-block__left"> 
                            <a class="header__extra" href="{{ route('account.edit') }}"><i class="icon-user"></i></a> 
                        </div>
                    </div>
                    <div class="ps-cart--mini">
                        <div class="ps-dropdown language">
                            <a href="javascript:;">{{  app('SiteSetting')->PresentLang() }}</a>
                            <ul class="ps-dropdown-menu">
                                <li><a href="?lang=ar"><img src="{{ asset('assets/website/img/flag/sa.png') }}" alt=""> العربية</a></li>
                                <li><a href="?lang=tr"><img src="{{ asset('assets/website/img/flag/tr.png') }}" alt=""> Turkish</a></li>
                                <li><a href="?lang=de"><img src="{{ asset('assets/website/img/flag/de.png') }}" alt=""> Deutsch</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
         </div>

      </header>

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
      
        <div class="container stores-wrapper" style="margin-top:50px;">
         <h1 class="stores-heading-h1 d-none">{{ __('home_latest') }}</h1>
         <h3 class="stores-heading-h3 d-none">{{ __('explore') }}</h3>
         <div class="product-intro divide-line up-effect">
            @foreach($stores->chunk(3) as $items)
            <div class="row">
               @foreach($items as $product)
               

               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 d-sm-none d-lg-none d-md-none">
                    <article class="ps-block--store-2">
                        <div class="ps-block__content bg--cover" data-background="https://i.imgur.com/YSn2gIJ.png">
                            <figure>
                                <h4>{{ $product->name }}</h4>
                                <br>
                                <p><i class="icon-map-marker"></i> {{ $product->street }}</p>
                                <p><i class="icon-telephone"></i> {{ $product->owner->phone }}</p>
                            </figure>
                        </div>
                        <div class="ps-block__author">
                          <a class="ps-block__user" href="{{ $product->slug }}">
                            <img class="stroephimg" src="{!!  $product->presentThumbnailback() !!}" alt="">
                          </a>
                          <a class="ps-btn" href="{{ $product->slug }}">{{ __('Visit Store') }}</a>
                        </div>
                    </article>
                </div>

               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 hidden-xs inpconly ">
                    <article class="ps-block--store">
                        <div class="ps-block__thumbnail bg--cover" data-background="{!!  $product->presentThumbnailback() !!}"></div>
                        <div class="ps-block__content">
                          <div class="ps-block__author"></a><a class="ps-btn" href="{{ $product->slug }}">{{ __('Visit Store') }}</a></div>
                            <h4>{{ $product->name }}</h4>
                            <ul class="ps-block__contact">
                              <li><i class="icon-map-marker"></i> {{ $product->street }}</li>
                                <li><i class="icon-envelope"></i><a href="mailto:{{ $product->owner->email }}" >{{ $product->owner->email }}</span></a></li>
                                <li><i class="icon-telephone"></i> {{ $product->owner->phone }}</li>
                            </ul>
                        </div>
                    </article>
                </div>

               
               @endforeach
            </div>
            @endforeach
         </div>
      
<div class="home-pagination">
  {{ $stores->links() }}
</div>

      </div>




     </div>
        <div class="ps-download-app">
            <div class="ps-container">
                <div class="ps-block--download-app">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <div class="ps-block__thumbnail"><img src="/App2.png" alt=""></div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                <div class="ps-block__content">
                                    <h3>Download o-bazaar App Now!</h3>
                                    <p>Shopping fastly and easily more with our app. Get a link to download the app on your phone</p>                                    

                                    <p>Shopping fastly and easily more with our app. Get a link to download the app on your phone</p>                                    <p>Shopping fastly and easily more with our app. Get a link to download the app on your phone</p>


                                   
                                    <p class="download-link">
                                      <a href="https://play.google.com/store/apps/details?id=com.shop.obazaar"><img src="/assets/website/img/google-play.png" alt=""></a>
                                      <a style="display: none;" href="#"><img src="/assets/website/img/app-store.png" alt=""></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('/theme2/elements/footer')


     
      <div id="back2top"><i class="pe-7s-angle-up"></i></div>
      <div class="ps-site-overlay"></div>
      <div id="loader-wrapper">
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <script src="{{ asset('assets/website/js/all.js') }}?v={{ env('ASSETS_VERSION') }}"></script>
   </body>
   {{ option('thebottomofthesite') }}
   </body>
</html>