<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" dir="{{ System::isRtl()?'rtl':'ltr' }}">
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
      @if(System::isRtl())
         <link rel="stylesheet" href="{{ asset('assets/website/css/all_rtl.css') }}?v={{ env('ASSETS_VERSION') }}">
         <link rel="stylesheet" href="{{ asset('assets/website/css/stylehome_rtl.css') }}?v={{ env('ASSETS_VERSION') }}">
      @else
         <link rel="stylesheet" href="{{ asset('assets/website/css/all.css') }}?v={{ env('ASSETS_VERSION') }}">
         <link rel="stylesheet" href="{{ asset('assets/website/css/stylehome.css') }}?v={{ env('ASSETS_VERSION') }}">
      @endif
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
   </head>
   <body>
      @include(\System::$ACTIVE_THEME_PATH.'/elements/alerts')
      
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
                        <div class="ps-dropdown language">
                           <a href="javascript:;">{{  app('SiteSetting')->PresentLang() }}</a>
                           <ul class="ps-dropdown-menu">
                              @include(\System::$ACTIVE_THEME_PATH.'/elements/lang_list')
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
               <div class="row">
               @foreach($stores->chunk(3) as $items)
               
                  @foreach($items as $product)
                     @if(System::ismobile())
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 d-sm-none d-lg-none d-md-none">
                           <article class="ps-block--store-2">
                              <div class="ps-block__content bg--cover" data-background="https://i.imgur.com/YSn2gIJ.png">
                                 <figure>
                                    <h4>{{ $product->name }}</h4>
                                    <br>
                                    <p><i class="icon-map-marker"></i> {{ $product->street }}</p>
                                    <p>
                                       <i class="icon-telephone pull-left mt-1"></i>
                                       <a class="phone-link" href="tel:{{ $product->owner->phone }}">{{ $product->owner->phone }}</a>
                                    </p>
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
                     @else
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 hidden-xs inpconly ">
                           <article class="ps-block--store">
                              <div class="ps-block__thumbnail bg--cover" data-background="{!!  $product->presentThumbnailback() !!}"></div>
                              <div class="ps-block__content">
                                 <div class="ps-block__author"></a><a class="ps-btn" href="{{ $product->slug }}">{{ __('Visit Store') }}</a></div>
                                 <h4>{{ $product->name }}</h4>
                                 <ul class="ps-block__contact">
                                    <li><i class="icon-map-marker"></i> {{ $product->street }}</li>
                                    <li><i class="icon-envelope"></i><a href="mailto:{{ $product->owner->email }}" >{{ $product->owner->email }}</span></a></li>
                                    <li><i class="icon-telephone"></i><a href="tel:{{ $product->owner->phone }}">{{ $product->owner->phone }}</a></li>
                                 </ul>
                              </div>
                           </article>
                        </div>
                     @endif
                  
                  
                  @endforeach
               
               @endforeach
            </div>
            </div>
            <div class="home-pagination">
               {{ $stores->links() }}
            </div>
         </div>
      </div>
      @include(\System::$ACTIVE_THEME_PATH.'//elements/download-app')
      @include(\System::$ACTIVE_THEME_PATH.'//elements/footer')
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