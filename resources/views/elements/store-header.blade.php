

<style>
    
@media (max-width: 600px) and (min-width: 0px) {
        
        div#addedTocCart {
            max-width: 100% !important;
            margin-top:50%;
        }

        #addedTocCart .modal-dialog {
            max-width: 96%;
        }
        .product-default {
            width: 100% !important;
            flex-basis: inherit;
        }


}
@media screen and ( max-width: 400px ){

    li.page-item {

        display: none;
    }

    .page-item:first-child,
    .page-item:nth-child( 2 ),
    .page-item:nth-last-child( 2 ),
    .page-item:last-child,
    .page-item.active,
    .page-item.disabled {

        display: block;
    }
    .home-pagination {
    margin: 0 auto;
}
}

</style>




<header class="header d-sm-none d-lg-none d-md-none">


<style>
	a.cartheader {
    margin-right: 30px;
}

</style>

            <div class="header-top">
                <div class="container">

                    <div class="header-left header-dropdowns">
                        <div class="header-search">
                            <a href="javascript:;" class="search-toggle" role="button"><i class="icon-search"></i><span>{{ __('Search') }}</span></a>
                            <form action="{{ route('search' ,[  'store' => $store] ) }}" method="get">
                                <div class="header-search-wrapper">
                                    <input type="{{ __('Search') }}" class="form-control" name="q" id="q" placeholder="{{ __('Search') }}" required>
                                    <button class="btn" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="header-right" >
                    	<a  class='cartheader' href="{{ route('cart' ,[  'store' => $store] ) }}"><i class="icon-cart"></i> {{ __('cart') }}  </a>

                        <div class="header-dropdown">
                            <a href="#">{{  app('SiteSetting')->PresentLang() }}</a>
                            <div class="header-menu">
                                <ul>
                                <li><a href="?lang=ar">العربية</a></li>
                                <li><a href="?lang=tr">Turkish</a></li>
                                <li><a href="?lang=de">Deutsch</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="sticky-wrapper"><div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                     
                    </div>

                    <div class="header-center">
                        
                                @php
                                    $logo = option('logo');
                                @endphp
                                @if(!empty($logo))
                                <a href="/{{ $store }}" class="logo">
                                    <img src="/uploads/{{ $logo }}" >
                                </a>
                                @endif
                        
                    </div>

                    <div class="header-right">
                        

                        <button class="mobile-menu-toggler active" type="button">
                            <i class="icon-menu"></i>
                        </button>
                    </div>
                </div>
            </div></div>
</header>






        <header class="header hidden-xs">
            <div class="header-top">
                <div class="container">
                    <div class="header-left header-dropdowns">
                            <ul class="lang-list">
                                <li><a href="?lang=ar">العربية</a></li>
                                <li><a href="?lang=tr">Turkish</a></li>
                                <li><a href="?lang=de">Deutsch</a></li>
                            </ul>
                    </div>

                    <div class="header-right">
                        <div class="header-contact">
                            <i class="icon-phone-1"></i>
                            <a href="tel:{{ option('phonenumber') }}">{{ option('phonenumber') }}</a>
                        </div>
                        <ul class="menu sf-arrows">
                            @auth
                            <li><a href="{{ route('checkout',['store'  => $store ]) }}">{{ __('CART') }}</a></li>
                            <li><a href="{{ route('wishlist' , ['store' => $store ]) }}">{{ __('MY WISHLIST ') }}</a></li>
                            <li><a href="{{ route('edit' , ['store' => $store ]) }}">{{ __('ACCOUNT') }}</a></li>
                            <li><a href="{{ route('logout' , ['store' => $store ]) }}">{{ __('LOGOUT') }}</a></li>
                            @endauth @guest
                            <li><a href="{{ route('user', ['store' => $store ]) }}">{{ __('LOGIN') }}</a></li>
                            @endguest

                        </ul>


                    
                    <div class="dropdown cart-dropdown">

                        <a href="javascript:;" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <span class="cart-count"> {{ ShoppingCart::count(false) }}</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdownmenu-wrapper">
                                <div class="dropdown-cart-header">
                                    <span> {{ ShoppingCart::count(false) }}{{ __(' Items') }}</span>
                                    <a href="{{ route('cart', ['store' => $store ]) }}">{{ __('View Cart') }}</a>
                                </div>
                                <div class="dropdown-cart-products">

                                    @if(!empty(ShoppingCart::all())) @foreach(ShoppingCart::all() as $product)
                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
                                                    <a href="{{ route('shop.product',['id' => $product['id'] , 'store' => $store ]) }}">  
                                                        {{ $product['name'] }} 
                                                    </a>
                                                </h4>

                                            <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{ $product['qty'] }}</span> x ${{ $product['price'] }}
                                            </span>
                                        </div>
                                        <figure class="product-image-container">
                                            <a href="{{ route('shop.product',['id' => $product['id'], 'store' => $store ]) }}" class="product-image">
                                                <img src="{{ $product['thumbnail'] }}" alt="product">
                                            </a>
                                            <a href="{{ route('cart.remove', ['id' => $product->rawId() , 'store' => $store ])  }}" class="btn-remove">
                                                <i class="icon-cancel"></i>
                                            </a>
                                        </figure>
                                    </div>
                                    @endforeach @endif

                                </div>

                                <div class="dropdown-cart-total">
                                    <span>{{ __('Total') }}</span>
                                    <span class="cart-total-price">{{ $symbol }}{{  ShoppingCart::total() }}</span>
                                </div>

                                <div class="dropdown-cart-action">
                                    <a href="{{ route('checkout', ['store' => $store ]) }}" class="btn btn-block">{{ __('Checkout') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>




                        </div>
                    </div>
                </div>

     
            <div class="menu-wrapper ">
            <div class="container">
                    <div class="row" style="width: 100%">
                      <div class="col-md-3">

                    
                    @php 
                    $logo = option('logo'); 
                    @endphp @if(!empty($logo))
                    <a href="/{{ $store }}" class="logo">
                        <img src="/uploads/{{ $logo }}">
                    </a>
                    @endif


                    </div>
                    <div class="col-md-9 text-left">

                    <ul class="menu sf-arrows main-header-menu">
                        {!!  app('SiteSetting')->MerchantMenu('main') !!}
                    </ul>

                  </div>
                </div>
            </div>
            </div>     

        </header>



