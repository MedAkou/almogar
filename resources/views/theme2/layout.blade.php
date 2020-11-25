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
   </head>
<body class="@yield('bodyClass')  @if(auth::check())  has-logged   @endif" data-slug="{{$store}}" data-store-id="{{ $id ?? '' }}">
      @include('theme2/elements/alerts')
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
                     <div class="menu__toggle"><i class="icon-menu"></i><span> {{ __('category') }}</span></div>
                     <div class="menu__content">
                        <ul class="menu--dropdown">
                           {!!  app('SiteSetting')->MerchantMenu('homeCategories') !!}
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
                    
                  <form   class="ps-form--quick-search"
                          id="search-form"
                          autocomplete="off"
                          data-link="{{ route('search' ,[  'store' => $store] ) }}"
                          method="post"
                  >
                      <input  type="text"
                              class="form-control"
                              id="search-input"
                              name="q"
                              placeholder="{{ ('Search') }}"
                              required
                      >
                      <button class="btn" type="submit"><i class="icon-search"></i>{{ ('Search') }}</button>
                  </form>
                  <div id="results">
                  </div>
              </div>
               <div class="header__content-right">
                  <div class="header__actions">
                     <a class="header__extra" href="{{ route('wishlist' ,[  'store' => $store] ) }}"><i class="icon-heart"></i><span><i class="wishlist_count">{{ $wishlist_count }}</i></span>
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
                                    <p><strong>Sold by</strong> {{ $store }}</p>
                                    <small>{{ $product['qty'] }} x {{ System::currency() }} {{ $product['price'] }}</small>
                                 </div>
                              </div>
                              @endforeach @endif
                           </div>
                           <div class="ps-cart__footer">
                              <h3>{{ __('Total') }}<strong>{{ System::currency() }}{{  number_format((float)ShoppingCart::total(), 2, '.', '') }}</strong></h3>
                              <figure><a class="ps-btn" href="{{ route('cart', ['store' => $store ]) }}">{{ __('View Cart') }}</a><a class="ps-btn" href="{{ route('checkout', ['store' => $store ]) }}">{{ __('Checkout') }}</a></figure>
                           </div>
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
                     {!!  app('SiteSetting')->MerchantMenu('homeCategories') !!}
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <header class="header header--mobile" data-sticky="true">
         <div class="navigation--mobile">
            <div class="navigation__left">
               @php
               $logo = option('logo');
               @endphp
               @if(!empty($logo))
               <a class="ps-logo" href="/{{ $store }}">
               <img src="/uploads/{{ $logo }}" alt="">
               </a>
               @endif
            </div>
            <div class="navigation__right">
               <div class="header__actions">
                  <div class="ps-block--user-header">
                     <div class="ps-block__left"> 
                        <a class="header__extra" href="{{ route('edit', ['store' => $store ]) }}"><i class="icon-user"></i></a> 
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
      <div class="ps-panel--sidebar" id="cart-mobile">
         <div class="ps-panel__header">
            <h3>{{ __('Shopping Cart') }}</h3>
         </div>
         <div class="navigation__content">
            <div class="ps-cart--mobile">
               <div class="ps-cart__content">
                  @if(!empty(ShoppingCart::all())) @foreach(ShoppingCart::all() as $product)
                  <div class="ps-product--cart-mobile">
                     <div class="ps-product__thumbnail"><a href="{{ route('shop.product',['id' => $product['id'], 'store' => $store ]) }}"><img src="{{ $product['thumbnail'] }}" alt=""></a></div>
                     <div class="ps-product__content lhsabbdyaltele"><a class="ps-product__remove" href="{{ route('cart.remove', ['id' => $product->rawId() , 'store' => $store ])  }}"><i class="icon-cross"></i></a><a href="{{ route('shop.product',['id' => $product['id'] , 'store' => $store ]) }}">{{ $product['name'] }}</a><br>
                        <small class="product-col-tele-{{ $product['id'] }}"> <span class="prdqty">{{ $product['qty'] }}</span> x {{ System::currency() }} {{ $product['price'] }} <input type="hidden" class="preis" value="{{ $product['total'] }}"> </small>
                     </div>
                     <div class="form-group--number zaydnaks updowntintele">
                        <button class="up">+</button>
                        <button class="down">-</button>
                        <input class="quantity-ajax form-control instantQuantity"  data-product-id='{{ $product['id'] }}' data-price='{{ $product['price'] }}' data-product="{{ $product->rawId() }}" type="text" value="{{ $product['qty'] }}">
                     </div>
                  </div>
                  @endforeach @endif
                  @if (ShoppingCart::count() == 0)
                      <div class="container">
                         <div class="row text-center">
                            <div class="empty-cart">
                               <i class="icon-cart"></i>
                               <p>{{ __('Your shopping cart is empty') }}</p>
                               <a class="ps-btn" href="/{{ $store }}">{{ __('Continue Shopping') }}</a>
                            </div>
                         </div>
                      </div>
                  @endif
               </div>
               <div class="ps-cart__footer">
                  <h3>{{ __('Total') }}<strong>{{ System::currency() }} <span class="TotalPriceM">{{  number_format((float)ShoppingCart::total(), 2, '.', '') }}</span> </strong></h3>
                  <figure><a class="ps-btn" href="{{ route('checkout', ['store' => $store ]) }}">{{ __('Checkout') }}</a></figure>
               </div>
            </div>
         </div>
      </div>
      <div class="ps-panel--sidebar" id="navigation-mobile">
         <div class="ps-panel__header">
            <h3>Categories</h3>
         </div>
         <div class="ps-panel__content">
            <ul class="menu--mobile">
               {!!  app('SiteSetting')->storecategories() !!}
            </ul>
         </div>
      </div>
      <div class="navigation--list">
         <div class="navigation__content">
            <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile">
               <i class="icon-menu"></i>
               <span>{{ __('Menu') }}</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile">
               <i class="icon-list4"></i>
               <span>{{ __('Categories') }}</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar">
               <i class="icon-magnifier"></i>
               <span>{{ __('Search') }}</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile">
               <i class="icon-cart"></i>
               <span>{{ __('Cart') }}</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" onclick="window.location.href = '/';" href="/">
               <i class="icon-home"></i>
               <span>{{ __('Home') }}</span>
            </a>
         </div>
      </div>
      <div class="ps-panel--sidebar" id="search-sidebar">
         <div class="ps-panel__header">
            <form class="ps-form--search-mobile"
                  id="search-form-mobile"
                  autocomplete="off"
                  data-link="{{ route('search' ,[  'store' => $store] ) }}"
                  method="post">
               <div class="form-group--nest">
                  <input   type="text"
                           class="form-control"
                           id="search-input-mobile"
                           name="q"
                           value="{{ app('request')->input('q') }}"
                           placeholder="{{ __('Search') }}"
                           required
                  >
                  <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
               </div>
            </form>
            <div id="results-mobile">
            </div>
         </div>
         <div class="navigation__content"></div>
      </div>
      <div class="ps-panel--sidebar" id="menu-mobile">
         <div class="ps-panel__header">
            <h3>Menu</h3>
         </div>
         <div class="ps-panel__content">
            <ul class="menu--mobile">
               {!!  app('SiteSetting')->MerchantMenu('phone') !!}
            </ul>
         </div>
      </div>
      @yield('content')
      @include('/theme2/elements/footer')
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
                     <a href="#" data-toggle="modal" title="{{ __('Continue Shopping') }}" data-target="#addedTocCart" class="ps-btn">{{ __('Continue Shopping') }}</a>
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