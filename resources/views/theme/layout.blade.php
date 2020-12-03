<!DOCTYPE html>
<html lang="ar" dir="{{ System::isRtl()?'rtl':'ltr' }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>{{ option('sitename') }} | @yield('title')  </title>
      <meta name="keywords" content="{{ option('metakeywords') }}" />
      <meta name="description" content="{{ __('tagline') }}">
      @php $favicon = option('favicon'); @endphp @if(!empty($favicon))
      <link rel="icon" type="image/x-icon" href="/uploads/{{ $favicon }}">
      @endif
      <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
      @if(System::isRtl())
         <link rel="stylesheet" href="{{ asset('assets/website/css/all_rtl.css') }}?v={{ env('ASSETS_VERSION') }}">
         <link rel="stylesheet" href="{{ asset('assets/website/css/styleindex_rtl.css') }}?v={{ env('ASSETS_VERSION') }}">
      @else
         <link rel="stylesheet" href="{{ asset('assets/website/css/all.css') }}?v={{ env('ASSETS_VERSION') }}">
         <link rel="stylesheet" href="{{ asset('assets/website/css/styleindex.css') }}?v={{ env('ASSETS_VERSION') }}">
      @endif
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css" />
   </head>
<body class="@yield('bodyClass')  @if(Auth::check())  has-logged   @endif" data-auth-id="{{ \System::userId() }}" data-slug="{{$store}}" data-store-id="{{ \System::currentStoreId() }}">
      @include(\System::$ACTIVE_THEME_PATH.'/elements/alerts')
      <header class="header header--standard header--market-place-1" data-sticky="true">
         <div class="header__top">
            <div class="container">
               <div class="header__left">
                  <p>{{ __('Welcome store') }}</p>
               </div>
               <div class="header__right">
                  <ul class="header__top-links">
                     @auth
                     <li><a href="/logout">{{ __('Logout') }}</a></li>
                     @endauth
                     <li><a href="{{ route('edit', ['store' => $store ]) }}">{{ __('My Account') }}</a></li>
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
                     <div class="menu__toggle"><i class="icon-menu"></i><span> {{ __('category') }}</span></div>
                     <div class="menu__content">
                        <ul class="menu--dropdown">
                           {!!  app('SiteSetting')->currentstorecategories() !!}
                        </ul>
                     </div>
                  </div>
                  @php
                  $logo = option('logo');
                  @endphp
                  @if(!empty($logo))
                  <a class="ps-logo" href="/{{ $store }}">
                  <img src="/uploads/{{ $logo }}" alt="">
                  </a>
                  @endif
               </div>
               <div class="header__content-center">
                    
                  <form class="ps-form--quick-search"
                        id="search-form"
                        autocomplete="off"
                        data-link="{{ route('search' ,[  'store' => $store] ) }}"
                        action="{{ route('searchSubmit' ,[  'store' => $store] ) }}"
                        method="post"
                  >
                     @csrf
                     <input   type="text"
                              class="form-control"
                              id="search-input"
                              name="q"
                              placeholder="{{ __('Search') }}"
                              required
                     >
                     <button class="btn" type="submit"><i class="icon-search"></i>{{ __('Search') }}</button>
                  </form>
                  <div id="results">
                  </div>
              </div>
               <div class="header__content-right">
                  <div class="header__actions">
                     <a class="header__extra" href="{{ route('wishlist' ,[  'store' => $store] ) }}"><i class="icon-heart"></i><span><i class="wishlist_count">{{ $wishlist_count ?? '' }}</i></span>
                     </a>
                     <div class="ps-cart--mini">
                        <a class="header__extra" href="{{ route('cart' ,[  'store' => $store] ) }}"><i class="icon-cart"></i><span><i>{{ ShoppingCart::count(false) }}</i></span></a>
                        <div class="ps-cart__content">
                           <div class="ps-cart__items">
                              @if(!empty(ShoppingCart::all())) @foreach(ShoppingCart::all() as $product)
                              <div class="ps-product--cart-mobile">
                                 <div class="ps-product__thumbnail"><a href="#"><img src="{{ $product['thumbnail'] }}" alt="product"></a></div>
                                 <div class="ps-product__content">
                                    <a class="ps-product__remove" href="{{ route('cart.remove', ['id' => $product->rawId() , 'store' => $store ])  }}"><i class="icon-cross"></i></a><a href="{{ route('shop.product',['id' => $product['id'] , 'store' => $store ]) }}">{{ $product['name'] }} </a>
                                    <p><strong> {{ __('Sold by') }} </strong> {{ $store }}</p>
                                    <small>{{ $product['qty'] }} x {{ System::currency() }} {{ $product['price'] }}</small>
                                 </div>
                              </div>
                              @endforeach @endif
                              @if(!\System::shoppingCartIsNotEmpty())
                                 <div class="ps-table--invoices">
                                    <div class="row text-center">
                                          <div class="empty-order">
                                             <i class="icon-cart"></i>
                                             <p>{{ __('You have no orders') }}</p>
                                             <a class="ps-btn" href="/{{ $store }}">{{ __('Order now') }}</a>
                                          </div>
                                    </div>
                                 </div>
                              @endif
                           </div>
			                  @if(\System::shoppingCartIsNotEmpty())
                              <div class="ps-cart__footer">
                                 <h3 class="jahnama">{{ __('Total') }}<strong>{{ System::currency() }}{{  number_format((float)ShoppingCart::total(), 2, '.', '') }}</strong></h3>
                                 <figure><a class="ps-btn" href="{{ route('cart', ['store' => $store ]) }}">{{ __('View Cart') }}</a><a class="ps-btn" href="{{ route('checkout', ['store' => $store ]) }}">{{ __('Checkout') }}</a></figure>
                              </div>
			                  @endif
                        </div>
                     </div>
                     @if(! auth::check())
                     <div class="ps-block--user-header">
                        <div class="ps-block__left"> <a href="{{ route('edit', ['store' => $store ]) }}"><i class="icon-user"></i></a></div>
                        <div class="ps-block__right"><a href="{{ route('user', ['store' => $store ]) }}">{{ __('Login') }}</a><a href="{{ route('user', ['store' => $store ]) }}"">{{ __('Register') }}</a></div>
                     </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <nav class="navigation">
            <div class="">
               <div class="navigation__left" style="display: none;">
                  <div class="menu--product-categories">
                     <div class="menu__toggle"><i class="icon-menu"></i><span> Shop by Department</span></div>
                     <div class="menu__content">
                        <ul class="menu--dropdown">
                           <li><a href="#"><i class="icon-star"></i> Hot Promotions</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="navigation__center">
                  <ul class="menu">
                     {!!  app('SiteSetting')->currentstorecategories() !!}
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      @if(System::ismobile())
      @include(\System::$ACTIVE_THEME_PATH.'//elements/mobile_elements')
      @endif


      @yield('content')
      @include(\System::$ACTIVE_THEME_PATH.'//elements/footer')
      <div id="back2top"><i class="pe-7s-angle-up"></i></div>
      <div class="ps-site-overlay"></div>
      <div id="loader-wrapper">
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <div class="ps-search" id="site-search">
         <a class="ps-btn--close" href="#"></a>
         <div class="ps-search__content">
            <form class="ps-form--primary-search" action="{{ route('search' ,[  'store' => $store] ) }}" method="get">
               <input class="form-control"type="{{ __('Search') }}" name="q" value="{{ app('request')->input('q') }}" placeholder="{{ __('Search') }}">
               <button><i class="aroma-magnifying-glass"></i></button>
            </form>
         </div>
      </div>
      <div class="modal fade bd-example-modal-sm" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
      </div>
      <div class="modal" id="addedTocCart" tabindex="-1" role="dialog" >
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-body">
                  <h5 class="modaltitle">{{ __('item.added.cart.modal') }}</h5>
                  <center>
                     <a href="{{ route('cart',['store'  => $store ]) }}"  class="ps-btn">{{ __('View Shopping Cart') }}</a>
                     <a href="#" data-toggle="modal" title="{{ __('Continue Shopping') }}" data-target="#addedTocCart" class="ps-btn">{{ __('Continue Shopping') }}</a>
                  </center>
               </div>
            </div>
         </div>
      </div>
      <div class="modal" id="modalwishlist" tabindex="-1" role="dialog" >
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-body">
                  <h5 class="modaltitle">{{ __('wishlist.added') }}</h5>
                  <center>
                     <a href="{{ route('wishlist',['store' => $store ]) }}"  class="ps-btn">{{ __('My Wishlist') }}</a>
                     <a href="#" data-toggle="modal" title="{{ __('Continue Shopping') }}" data-target="#modalwishlist" class="ps-btn">{{ __('Continue Shopping') }}</a>
                  </center>
               </div>
            </div>
         </div>
      </div>
      <div class="modal" id="modalUnauth" tabindex="-1" role="dialog" >
         <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-body">
                  <h5 class="modaltitle">{{ __('You have to login') }}</h5>
                  <center>
                     <a href="{{ route('account.user') }}" class="ps-btn">{{ __('Login') }}</a>
                  </center>
               </div>
            </div>
         </div>
      </div>
      <div id="overlay">
         <div class="cv-spinner">
            <span class="spinner"></span>
         </div>
      </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
      <script src="{{ asset('assets/website/js/all.js') }}?v={{ env('ASSETS_VERSION') }}"></script>
      <script src="{{ asset('assets/website/js/jquery.ez-plus.js') }}?v={{ env('ASSETS_VERSION') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery-creditcardvalidator@1.0.0/jquery.creditCardValidator.min.js"></script>
      <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
      <script src="{{ asset('assets/website/js/scripts.js') }}?v={{ env('ASSETS_VERSION') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
      @yield('scripts')
   </body>
   
   {{ option('thebottomofthesite') }}
   </body>
</html>