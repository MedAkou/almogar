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
      <link rel="stylesheet" href="{{ asset('assets/website/css/custom.css') }}?v={{ env('ASSETS_VERSION') }}">
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
                     <div  class="ps-block__left"> 
                        <a class="header__extra" href="{{ route('account.edit') }}"><i class="icon-user"></i></a> 
                     </div>
                  </div>
                  <div class="ps-cart--mini">
                     <div class="ps-dropdown language">
                        <a href="javascript:;">{{  app('SiteSetting')->PresentLang() }}</a>
                        <ul class="ps-dropdown-menu">
                        @include(\System::$ACTIVE_THEME_PATH.'/elements/lang_list')
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div id="homepage-3">
         @yield('content')
      </div>
      @include(\System::$ACTIVE_THEME_PATH.'/elements/download-app')
      @include(\System::$ACTIVE_THEME_PATH.'/elements/footer')
      <div id="back2top"><i class="fas fa-angle-up"></i></div>
      <div class="ps-site-overlay"></div>
      <div id="loader-wrapper">
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <script src="{{ asset('assets/website/js/all.js') }}?v={{ env('ASSETS_VERSION') }}"></script>
      {{ option('thebottomofthesite') }}
   </body>
</html>