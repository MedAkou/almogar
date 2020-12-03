<!DOCTYPE html>
<html lang="ar">
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
    <link rel="stylesheet" href="{{ asset('assets/website/css/all.css') }}?v={{ env('ASSETS_VERSION') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />






    <style>
        .ps-block--site-features {
    border: none;
}
.ster {
    padding: 15px 0;
}


.ps-cart__footer a {
    width: 46%;
    float: left;
    text-align: center;
}

.ps-cart--mini .ps-cart__footer {overflow: hidden;}

.ps-cart--mini figure {
    padding-right: 0 !important;
    display: initial !important;
    align-items: initial !important;
}

.ps-cart__footer a:first-child {
    margin-right: 17px;
    text-align: center;
}

.ps-product--cart-mobile {
    border-bottom: 1px solid #00000021;
    padding-bottom: 15px;
}

.ps-cart__items {
    max-height: 380px;
    overflow-x: hidden;
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
@media  all and (min-width:0px) and (max-width: 600px) {
.ps-block--site-features {
    padding: 0 !important;
}

.ps-block__item {
    padding-left: 10px !important;
}

aside.widget.widget_footer {
    width: 100% !important;
}
}

.ps-section__content {
    margin-top: 100px;
}

.header--mobile.header--sticky .navigation--mobile {
    background-color: rgb(195, 20, 50) !important;
    color: white !important;
}

.header--mobile .navigation--mobile {
    color: white;
}

.carousel-item {
    height: 600px;
}

.navigation--list a:nth-child(2) {
    display: none;
}

.catimg {
    width: 30px;
    margin-left: 30px;
    margin-top: 7px;
}

@media (max-width: 600px) and (min-width: 0px) {
    .navigation--list {
    padding: 10px;
}

a.navigation__item.ps-toggle--sidebar {
    width: 20%;
    margin: 0 5px;
}
.carousel-item {
    height: 220px !important;
}
.dress-card-head img {
    max-height: 150px;
}

.form-group--number.zaydnaks.updowntintele {
    width: 35%;
    display: inline-table;
}

.ps-cart__footer2 {
    display: none;
}

.ps-cart__footer.ps-cart__footer2 {
    display: none;
}

.ps-cart__items {
    max-height: initial;
}

.form-group--number.zaydnaks.updowntintele {
    display: inline-table !important;
}

.sidebar-shop ul {
    display: none;
}

}

.form-group--number.zaydnaks.updowntintele {
    display: none;
}

.alert.alert-error {
    background: #f33434;
    border-radius: 0;
    color: white;
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    height: 40px;
    z-index: 99999;
}

    </style>
</head>

<body class="@yield('bodyClass')  @if(auth::check())  has-logged   @endif" >    

    @include('admin/elements/alerts')

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
                        <li><a href="{{ route('edit') }}">{{ __('My Account') }}</a></li>
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
                    
                    <form class="ps-form--quick-search" action="{{ route('search' ,[  'store' => $store] ) }}" method="get">
                        <input type="{{ __('Search') }}" class="form-control" name="q" value="{{ app('request')->input('q') }}"  placeholder="{{ __('Search') }}" required>
                        <button class="btn" type="submit"><i class="icon-search"></i>{{ __('Search') }}</button>
                    </form>
                </div>
                <div class="header__content-right">
                    <div class="header__actions">
                        <a class="header__extra" href="{{ route('wishlist' ,[  'store' => $store] ) }}"><i class="icon-heart"></i><span><i class="wishlist_count">{{ $wishlist_count }}</i></span>
                        </a>
                        <div class="ps-cart--mini"><a class="header__extra" href="{{ route('cart' ,[  'store' => $store] ) }}"><i class="icon-cart"></i><span><i>{{ ShoppingCart::count(false) }}</i></span></a>
                            <div class="ps-cart__content">
                                <div class="ps-cart__items">
                                    @if(!empty(ShoppingCart::all())) @foreach(ShoppingCart::all() as $product)
                                    <div class="ps-product--cart-mobile">
                                        <div class="ps-product__thumbnail"><a href="#"><img src="{{ $product['thumbnail'] }}" alt="product"></a></div>
                                        <div class="ps-product__content"><a class="ps-product__remove" href="{{ route('cart.remove', ['id' => $product->rawId() , 'store' => $store ])  }}"><i class="icon-cross"></i></a><a href="{{ route('shop.product',['id' => $product['id'] , 'store' => $store ]) }}">{{ $product['name'] }} </a>
                                            <p><strong>Sold by</strong> {{ $store }}</p>
                                            <small>{{ $product['qty'] }} x {{ System::currency() }}{{ $product['price'] }}</small>
                                        </div>
                                    </div>
                                    @endforeach @endif
                                </div>
                                <div class="ps-cart__footer">
                                    <h3>{{ __('Total') }}<strong>{{ System::currency() }}{{  ShoppingCart::total() }}</strong></h3>
                                    <figure><a class="ps-btn" href="{{ route('cart') }}">{{ __('View Cart') }}</a><a class="ps-btn" href="{{ route('checkout') }}">{{ __('Checkout') }}</a></figure>
                                </div>
                            </div>
                        </div>

                        @if(! auth::check())
                        <div class="ps-block--user-header">
                            <div class="ps-block__left"> <a href="{{ route('edit') }}"><i class="icon-user"></i></a></div>
                            <div class="ps-block__right"><a href="{{ route('user') }}">{{ __('Login') }}</a><a href="{{ route('user') }}"">{{ __('Register') }}</a></div>
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
                            <a class="header__extra" href="{{ route('edit') }}"><i class="icon-user"></i></a> 
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
        <div class="ps-search--mobile">
            <form class="ps-form--search-mobile" action="{{ route('search' ,[  'store' => $store] ) }}" method="get">
                <div class="form-group--nest">
                    <input class="form-control"type="{{ __('Search') }}" name="q" value="{{ app('request')->input('q') }}"  placeholder="{{ __('Search') }}">
                    <button><i class="icon-magnifier" type="submit"></i></button>
                </div>
            </form>
        </div>
    </header>
    <div class="ps-panel--sidebar" id="cart-mobile">
        <div class="ps-panel__header">
            <h3>Shopping Cart</h3>
        </div>
        <div class="navigation__content">
            <div class="ps-cart--mobile">
                <div class="ps-cart__content">
                    @if(!empty(ShoppingCart::all())) @foreach(ShoppingCart::all() as $product)
                    <div class="ps-product--cart-mobile">
                        <div class="ps-product__thumbnail"><a href="{{ route('shop.product',['id' => $product['id'], 'store' => $store ]) }}"><img src="{{ $product['thumbnail'] }}" alt=""></a></div>
                        <div class="ps-product__content lhsabbdyaltele"><a class="ps-product__remove" href="{{ route('cart.remove', ['id' => $product->rawId() , 'store' => $store ])  }}"><i class="icon-cross"></i></a><a href="{{ route('shop.product',['id' => $product['id'] , 'store' => $store ]) }}">{{ $product['name'] }}</a><br>
                            <small class="product-col-tele-{{ $product['id'] }}"> <span class="prdqty">{{ $product['qty'] }}</span> x €{{ $product['price'] }} <input type="hidden" class="preis" value="{{ $product['total'] }}"> </small>
                        </div>
                        <div class="form-group--number zaydnaks updowntintele">
                            <button class="up">+</button>
                            <button class="down">-</button>
                            <input class="quantity-ajax form-control instantQuantity"  data-product-id='{{ $product['id'] }}' data-price='{{ $product['price'] }}' data-product="{{ $product->rawId() }}" type="text" value="{{ $product['qty'] }}">
                        </div>
                    </div>
                    @endforeach @endif
                </div>
                <div class="ps-cart__footer">
                    <h3>{{ __('Total') }}<strong>{{ System::currency() }} <span class="TotalPriceM">{{  ShoppingCart::total() }}</span> </strong></h3>
                    <figure><a class="ps-btn" href="{{ route('checkout') }}">{{ __('Checkout') }}</a></figure>
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
            <form class="ps-form--search-mobile" action="{{ route('search' ,[  'store' => $store] ) }}" method="get">
                <div class="form-group--nest">
                    <input class="form-control"type="{{ __('Search') }}" name="q" value="{{ app('request')->input('q') }}"  placeholder="{{ __('Search') }}">
                    <button><i class="icon-magnifier" type="submit"></i></button>
                </div>
            </form>
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
    

        @include(\System::$ACTIVE_THEME_PATH.'//elements/footer')



    <div id="back2top"><i class="pe-7s-angle-up"></i></div>
    <div class="ps-site-overlay"></div>
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
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
                fr
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



<style>
#overlay {
    position: fixed;
    top: 0;
    z-index: 100;
    width: 100%;
    height: 100%;
    display: none;
    background: rgba(0,0,0,0.6);
    z-index: 2000;
}
.cv-spinner {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;  
}
.spinner {
    width: 40px;
    height: 40px;
    border: 4px #ddd solid;
    border-top: 4px #2e93e6 solid;
    border-radius: 50%;
    animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
    100% { 
        transform: rotate(360deg); 
    }
}
.is-hide{
    display:none;
}
</style>

<div id="overlay">
    <div class="cv-spinner">
        <span class="spinner"></span>
    </div>
</div>


    <script src="{{ asset('assets/website/js/all.js') }}?v={{ env('ASSETS_VERSION') }}"></script>
    <script src="{{ asset('assets/website/js/jquery.ez-plus.js') }}?v={{ env('ASSETS_VERSION') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-creditcardvalidator@1.0.0/jquery.creditCardValidator.min.js"></script>
</body>

<script>

        $('body').on('click','.ps-product__remove',function(e){
      
      e.preventDefault();
      e.stopPropagation();
      var link = $(this).attr('href');
      $.get(link, function(){ });
      $(this).closest('.ps-product--cart-mobile').remove();
      
    });

$(".zoomimgs").ezPlus();


     window.setInterval(function(){
          $(".single-visitors .nbrvirws").text(parseInt($(".single-visitors .nbrvirws").text()) + Math.floor((Math.random() * 5) + 1));
},3000);


function colorReplace(findHexColor, replaceWith) {
  // Convert rgb color strings to hex
  // REF: https://stackoverflow.com/a/3627747/1938889
  function rgb2hex(rgb) {
    if (/^#[0-9A-F]{6}$/i.test(rgb)) return rgb;
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    function hex(x) {
      return ("0" + parseInt(x).toString(16)).slice(-2);
    }
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
  }

  // Select and run a map function on every tag
  $('*').map(function(i, el) {
    // Get the computed styles of each tag
    var styles = window.getComputedStyle(el);

    // Go through each computed style and search for "color"
    Object.keys(styles).reduce(function(acc, k) {
      var name = styles[k];
      var value = styles.getPropertyValue(name);
      if (value !== null && name.indexOf("color") >= 0) {
        // Convert the rgb color to hex and compare with the target color
        if (value.indexOf("rgb(") >= 0 && rgb2hex(value) === findHexColor) {
          // Replace the color on this found color attribute
          $(el).css(name, replaceWith);
        }
      }
    });
  });
}
colorReplace('#fcb800', '#c31432');

// #654ea3 , #456780 , 







$(document).on('click', 'body #quickview', function(e) {

    var token   = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    var formData = new FormData();
    formData.append('_token', token);  

    $.ajax({
        url: link,
        type: 'GET',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "HTML",
         beforeSend:function(){
                $("#overlay").fadeIn(300);　
        },
        success: function(data) {
         $("#overlay").fadeOut(0);　
                $('body #product-quickview').html(data);
                $('#product-quickview').modal('show');
        },
        error : function(response){
        	console.log('error');
        	console.log(response);
        }
     });

});

$(document).on('click', 'body #wishlist', function(e) {

    if( ! $('body').hasClass('has-logged') )  {
        return false;
    }

    var token   = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    var formData = new FormData();
    formData.append('_token', token);

    $.ajax({
        url: link,
        type: 'GET',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "HTML",

        beforeSend:function(){
                $("#overlay").fadeIn(300);　
        },

        success: function(data) {
            $("#overlay").fadeOut(0);　     
            $('body .wishlist_count').html(data);
            $('#modalwishlist').modal('show');
        },
        error : function(response){
            console.log('error');
            console.log(response);
        }
     });

});



function updatequantitiy(input){
    var slug = $('#slug').val();
        var token   = $('meta[name="csrf-token"]').attr('content');
        var rawId    = input.attr('data-product');
        var quantity = input.val();
        var product = input.attr('data-product-id');

        var formData = new FormData();

        formData.append('_token', token);  
        formData.append('rawId', rawId);  
        formData.append('quantity', quantity);  

        $.ajax({
        type: 'POST',
        url: '/'+slug+'/cart/update',
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        });  
}

$(document).on('click', 'body .zaydnaks .up', function(e) {
    var num = + $(this).closest('.zaydnaks').find('.instantQuantity').val() + 1;
    $(this).closest('.zaydnaks').find('.instantQuantity').val(num);
var input = $(this).closest('.zaydnaks').find('.instantQuantity');
    updatequantitiy(input);
      ikhaaaaan(input);

});

$(document).on('click', 'body .zaydnaks .down', function(e) {
    var num = +$(this).closest('.zaydnaks').find('.instantQuantity').val() - 1;
    if(num>0){
        $ (this).closest('.zaydnaks').find('.instantQuantity').val(num);
        var input = $(this).closest('.zaydnaks').find('.instantQuantity');
        updatequantitiy(input);
        ikhaaaaan(input);
    }





});


var olua =  "<span class='home_back' style='marign-right:10px;'><a href='/'><i class='icon-home'></i></a></span>";
$('.header-top .header-left.header-dropdowns').prepend(olua);





$('.ConfirmCard').click(function(){
    $('#StripeModal').modal('hide');
});

$('body [name="paymentmethod"]').on('change', function() {
    var method = $(this).val();
    if(method == 'stripe'){
        $('#StripeModal').modal('show');
    }
});




$('body .shipping-method-radio').on('change', function() {

    var subtotal = parseFloat ( $('#subtotal').val(), 10).toFixed(2);
    var price = parseFloat ( $('input[name=shippingMethod]:checked').attr('data-price'), 10).toFixed(2);
    var total = subtotal + price ;
	var total =  parseFloat ( total , 10 ).toFixed(2);

    $('body .shippingRow').removeClass('d-none');
    $('body .shippingRow .shippingPrice').html(price);
    $('body .TotalPrice').html(total);

});



function getTotal(){

    
    var numbersFi = [];
    var total = 0;
    $('#order-cart-section .preis').each(function(){
        var number = parseFloat($(this).text()).toFixed(2);
       // alert(number);
        numbersFi.push(number);
    });

    var total = 0;
    for (var i = 0; i < numbersFi.length; i++) {
        total += Number(numbersFi[i]);
    }

    return total;
}


function getTotalM(){

    
    var numbersFi = [];
    var total = 0;
    $('#cart-mobile .preis').each(function(){
        var number = parseFloat($(this).val()).toFixed(2);
       // alert(number);
        numbersFi.push(number);
    });

    var total = 0;
    for (var i = 0; i < numbersFi.length; i++) {
        total += Number(numbersFi[i]);
    }

    return total;
}





    function ikhaaaaan(input) {

            var token   = $('meta[name="csrf-token"]').attr('content');
            var rawId    = input.attr('data-product');

            var quantity = input.val();
            var product = input.attr('data-product-id');

            // change the price instant
            var price    = input.attr('data-price');
        
            var subtotal = parseFloat (quantity, 10).toFixed(2) * parseFloat (price, 10).toFixed(2);
            input.closest('tr').find('.price').html(parseFloat (subtotal, 10).toFixed(2) );
            
          
            $('#order-cart-section .product-col-'+product+'  span.preis').html(subtotal);

            $('.product-col-tele-'+product+'  input.preis').val(subtotal);
            $('.product-col-tele-'+product+'  span.prdqty').html(quantity);


            // change the price in the right sidbar summry
            $('#order-cart-section .product-col-'+product+' .product-qty i').html(quantity);
            $('#order-cart-section .price-col-'+product+' .preis').html(parseFloat (subtotal, 10).toFixed(2) );

            var total = getTotal();
            $('#order-cart-section .TotalPrice').html(total.toFixed(2));

            var totalM = getTotalM();
            $('.TotalPriceM').html(totalM.toFixed(2));

            var formData = new FormData();

            formData.append('_token', token);  
            formData.append('rawId', rawId);  
            formData.append('quantity', quantity);  
            
            $.ajax({
              type: 'POST',
              url: '{{ route('cart.update', ['store' => $store ]) }}',
              data:formData,
              cache:false,
              contentType: false,
              processData: false,
            });                             
}




// add product to cart
$(document).on('click', 'body #addtocard', function(e) {

 

    e.preventDefault();
     var formData = new FormData();
     var product = $(this).attr('data-product-id');   
     var token   = $('meta[name="csrf-token"]').attr('content');
     formData.append('product', product);   


    var attr = $(this).attr('name');

    // For some browsers, `attr` is undefined; for others,
    // `attr` is false.  Check for both.
    if (typeof attr !== typeof undefined && attr !== false) {
        // ...
    }


     var quantity = 1;

     if(('#instantQuantity').length){
        quantity = $('#instantQuantity').val();
     }

     if (quantity == null){
        quantity = 1;
     }

 

     formData.append('quantity', quantity);   

     formData.append('_token', token);  
     $.ajax({
        url: '/{{ $store }}/cart/add/'+product,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "JSON",
        beforeSend:function(){
                $("#overlay").fadeIn(300);　
        },
        success: function(data) {
        	  $("#overlay").fadeOut(0);　   
            $('#addedTocCart').modal('show');
               var formData = new FormData();
            formData.append('_token', token);  
             $.ajax({
                url: '/loadcartAgain/{{ $store }}',
                type: 'GET',
                processData: false, // important
                contentType: false, // important
                data: formData,
                cache:false,
                dataType: "HTML",
                success: function(data) {
                        $('body .ps-cart__content').html(data);
                        var quantity = $('#cartcount').val();
                      // $('body .TotalPriceM').html('');
                       // $('.TotalPriceM').html('');
                        //$('#cart-mobile .ps-cart__footer').html('');




                        $('#cart-mobile .TotalPriceM').html($('#cart-mobile .jahnama').text());


                        
                        $('.ps-cart--mini .header__extra span i').html(quantity);
                },
             });
    
        },
        
     });





 
     return false;





});


/*

    function alignModal(){
        var modalDialog = $(this).find(".modal-dialog");
        // Applying the top margin on modal dialog to align it vertically center
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }

    $(".modal").on("shown.bs.modal", alignModal);


 // Align modal when user resize the window
    $(window).on("resize", function(){
        $(".modal:visible").each(alignModal);
    }); 



/*
// remove product from cart
$(document).on('click', 'body .btn-remove-cart', function() {
     var formData = new FormData();
     var product = $(this).attr('data-product-id');   
     var rowID = $(this).attr('data-row-id');   
     var token   = $('meta[name="csrf-token"]').attr('content');
     formData.append('product', product);   
     formData.append('_token', token);  
     formData.append('rowID', rowID);  
     $.ajax({
        url: '/cart/remove',
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "JSON",
        success: function(data) {
            window.location.reload();
        },
     });
});
*/













$("#shipbtn").click(function(){


});


$('#btnsubmite').click(function(){
var name = $('#contact-name').val();
var email = $('#contact-email').val();
var phone = $('#contact-phone').val();
  
  if (name=='' || email=='' || phone==''){
      alert('tous les champ sont obligatoire');
  }
    else {
      $('#formcontact').submit()
  }

});
</script>




<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form         = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   
});

$('#facturem').click(function(){
  $('#inputpaymentmethod').val('facture');
});

$('#paypalm').click(function(){
  $('#inputpaymentmethod').val('paypal');
});

$('#visam').click(function(){
  $('#inputpaymentmethod').val('stripe');
});

$('.carousel').carousel()


$('body .shipping-method-radio').on('change', function() {

    var subtotal = parseFloat ( $('#subtotal').val(), 10).toFixed(2);
    var price = parseFloat ( $('input[name=shippingMethod]:checked').attr('data-price'), 10).toFixed(2);
    var total = parseFloat (subtotal) + parseFloat (price) ;


    $('.shippingPrice').text(price);
    $('body .TotalPrice').html(total+'€');
    $('body #shippingPriceV').val(price);

    calcultotalcoupon();

});

// apply coupon
$(document).on('click', 'body #applyCoupon', function() {
     var formData = new FormData();  
     var token   = $('meta[name="csrf-token"]').attr('content');
     var coupon   = $('#couponvalue').val();
     var total =  parseFloat ( $('.TotalPrice').html().substring(2) , 10 ).toFixed(2);
     formData.append('_token', token);
     formData.append('coupon', coupon);
     formData.append('total', total);
     $.ajax({
        url: '/couponcheck',
        type: 'post',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "JSON",
        success: function(data) {
            //$('.TotalPrice').html("€ "+data.total);
            $('#couponV').val(data.discount);
            $('#typeDiscount').val(data.type);
            if(data.success==true){
                $('.dyalcouponS').html(data.notification).show();
                $('.dyalcouponA').html(data.notification).hide();
            }else{
                $('.dyalcouponA').html(data.notification).show();
                $('.dyalcouponS').html(data.notification).hide();
            }
                        
            calcultotalcoupon();
        }
     });
});

function calcultotalcoupon(){
    var couponV = $('#couponV').val();
    var typeDiscount = $('#typeDiscount').val();
    var shippingPriceV = $('#shippingPriceV').val();
    var totalPriceV = $('#totalPriceV').val();
    var shipandprice = (parseFloat(totalPriceV, 10) + parseFloat(shippingPriceV, 10));

    if(typeDiscount=="percent"){
        var total = (parseFloat(shipandprice, 10) - ((parseFloat(shipandprice, 10)*parseFloat(couponV, 10))/100)).toFixed(2);
        console.log(total);
        $('body .TotalPrice').html(total+'€');
    }

}


var $cardinput = $('#checkout_card_number');
var $card = $('#talcartat');
    $('#checkout_card_number').validateCreditCard(function(result)
    {       
        //console.log(result);
        if (result.card_type != null)
        {               
            switch (result.card_type.name)
            {
                case "visa":
                    $card.attr("src",'https://i.imgur.com/5Ce5rAk.png');
                    break;

                case "visa_electron":
                    $card.attr("src",'https://i.imgur.com/5Ce5rAk.png');
                    break;

                case "mastercard":
                    $card.attr("src",'https://i.imgur.com/ywCvqaC.png');
                    break;

                case "maestro":
                    $card.attr("src",'https://i.imgur.com/5Ce5rAk.png');
                    break;

                case "discover":
                    $card.attr("src",'https://i.imgur.com/m1a57aa.png');
                    break;

                case "amex":
                    $card.attr("src",'https://i.imgur.com/5Ce5rAk.png');
                    break;

                default:
                    $card.attr("src",'https://i.imgur.com/zZu9enW.png');
                    break;                  
            }
        } else {
            $card.attr("src",'https://i.imgur.com/zZu9enW.png');
        }

        // Check for valid card numbere - only show validation checks for invalid Luhn when length is correct so as not to confuse user as they type.
        if (result.length_valid || $cardinput.val().length > 16)
        {
            if (result.luhn_valid) {
                $cardinput.parent().removeClass('has-error').addClass('has-success');
            } else {
                $cardinput.parent().removeClass('has-success').addClass('has-error');
            }
        } else {
            $cardinput.parent().removeClass('has-success').removeClass('has-error');
        }
});


</script>



  {{ option('thebottomofthesite') }}
        </body>
</html>