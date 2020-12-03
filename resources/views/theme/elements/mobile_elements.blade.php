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
                        @include(\System::$ACTIVE_THEME_PATH.'/elements/lang_list')
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
                     <div class="tachbkat align-self-center">
                        <div class="removit align-self-center">
                        <a class="ps-product__remove" href="{{ route('cart.remove', ['id' => $product->rawId() , 'store' => $store ])  }}"><i class="icon-cross"></i></a>
                     </div>
                     <div class="ps-product__thumbnail"><a href="{{ route('shop.product',['id' => $product['id'], 'store' => $store ]) }}"><img src="{{ $product['thumbnail'] }}" alt=""></a></div>
                     <div class="ps-product__content lhsabbdyaltele"><a href="{{ route('shop.product',['id' => $product['id'] , 'store' => $store ]) }}">{{ $product['name'] }}</a><br>
                        <small class="product-col-tele-{{ $product['id'] }}"> <span class="prdqty">{{ $product['qty'] }}</span> x {{ System::currency() }} {{ $product['price'] }} <input type="hidden" class="preis" value="{{ $product['total'] }}"> </small>
                     </div>
                     <div class="form-group--number zaydnaks updowntintele align-self-center">
                        <button class="up fix-pos">+</button>
                        <button class="down fix-pos">-</button>
                        <input class="quantity-ajax form-control instantQuantity"  data-product-id='{{ $product['id'] }}' data-price='{{ $product['price'] }}' data-product="{{ $product->rawId() }}" type="text" value="{{ $product['qty'] }}">
                     </div>
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
               @if(\System::shoppingCartIsNotEmpty())
                  <div class="ps-cart__footer">
                     <h3>{{ __('Total') }}<strong>{{ System::currency() }} <span class="TotalPriceM">{{  number_format((float)ShoppingCart::total(), 2, '.', '') }}</span> </strong></h3>
                     <figure><a class="ps-btn" href="{{ route('checkout', ['store' => $store ]) }}">{{ __('Checkout') }}</a></figure>
                  </div>
               @endif
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
            <a class="navigation__item ps-toggle--sidebar" onclick="window.location.href = '/';" href="/">
               <i class="icon-home"></i>
               <span>{{ __('Home') }}</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile">
               <i class="icon-list4"></i>
               <span>{{ __('Categories') }}</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile">
               <i class="icon-cart"></i>
               <span>{{ __('Cart') }}</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar">
               <i class="icon-magnifier"></i>
               <span>{{ __('Search') }}</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile">
               <i class="icon-menu"></i>
               <span>{{ __('Menu') }}</span>
            </a>
         </div>
      </div>
      <div class="ps-panel--sidebar" id="search-sidebar">
         <div class="ps-panel__header">
            <form class="ps-form--search-mobile"
                  id="search-form-mobile"
                  autocomplete="off"
                  data-link="{{ route('search' ,[  'store' => $store] ) }}"
                  action="{{ route('searchSubmit' ,[  'store' => $store] ) }}"
                  method="post"
            >
               @csrf
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
               {!!  app('SiteSetting')->currentstorecategories() !!}
            </ul>
         </div>
      </div>