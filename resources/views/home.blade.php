<html lang='{{ app()->getLocale() }}'>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ baseSetting('sitename') }} | @yield('title')</title>

    <meta name="keywords" content="{{ baseSetting('metakeywords') }}" />
    <meta name="description" content="{{ __('tagline') }}">
    
    @php
            $favicon = baseSetting('favicon');
    @endphp
    @if(!empty($favicon))
        <link rel="icon" type="image/x-icon" href="/uploads/{{ $favicon }}">
    @endif

    
    <link rel="stylesheet" href="/assets/front/css/style.min.css">
    <link rel="stylesheet" href="/assets/front/css/main.css">

    {{ baseSetting('thetopofsite') }}

    <script src="https://kit.fontawesome.com/30c39060a5.js" crossorigin="anonymous"></script>


@php
    if(app()->getLocale() == 'ar' ):
@endphp


<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=jazeera" type='text/css' media='all' />
<style>
body,h1,h2,h3,h4,h5,h6,p,a,span,ul li a {font-family:'jazeera !important'}
</style>

@php
    endif;
@endphp




<style>
    .stores-wrapper {
    margin-bottom: 105px;
}
    .menu-wrapper {border-bottom: 2px solid #454545;}
    h1.stores-heading-h1 {
    text-align: center;
    margin: 85px 0;
    }
    .storeWrapper {
    border: 1px solid;
    margin: 9px;
    min-height: 290px;
}

.storeWrapper h2 {
    text-align: center;
    margin-top: 25px;
}



</style>
</head>

<body>
    

<div class="page-wrapper">




@include('elements/front-header')















   <main class="main">
    

            <div class="container">
            <div class="home-slider-container">
                <div class="home-slider owl-carousel owl-theme owl-theme-light">
                    @foreach($sliders as $slider)   
                    <div class="home-slide">
                        <a href="{{ $slider->link }}">
                            {!! $slider->presentSlider() !!}
                        
                        </a>
                    </div>
                    @endforeach 
                </div>
            </div>
            </div>
            

            <div class="updateswrapper underSlider">
            <div class="container text-center">
                @foreach($ads as $ad)
                      {!!  $ad->underSlider()  !!}
                @endforeach
            </div>
            </div>




            <div class="container stores-wrapper" style="margin-top:50px;">

                <h1 class="stores-heading-h1 d-none">{{ __('home_latest') }}</h1>
                <h3 class="stores-heading-h3 d-none">{{ __('explore') }}</h3>
                <div class="product-intro divide-line up-effect">

               


                    @foreach($stores->chunk(3) as $items)
                <div class="row">
                   @foreach($items as $product)




<div class="d-sm-none d-lg-none d-md-none js-restaurant restaurant restaurant__open">

            <div class="logowrapper">
                <div class="baloon-container restaurantlabel ">
                </div>
                <div class="logo-n">
                    <a href="{{ $product->slug }}" class="img-link">
                            {!!  $product->presentThumbnail() !!}
                    </a>
                </div>

         
            </div>
            <div class="detailswrapper">
                <h2 class="restaurantname">
                    <a class="restaurantname" href="{{ $product->slug }}" itemprop="name">
                        {{ $product->namme }}                    
                    </a>
                </h2>

                              
                
                <div class="kitchens">
                    

                     </div>
                <div class="bottomwrapper details">
                    <div class="delivery js-delivery-container">
                            <span><i class="fas fa-search-location"></i>{{ $product->street }}</span>
                    <span><i class="fas fa-phone"></i> {{ $product->owner->phone }}</span>                                                
                    <span><i class="fas fa-envelope"></i> {{ $product->owner->email }}</span>                                                     
                  </div>

                                      
                                    </div>
            </div>
        </div>













<style>
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

.col-md-4.hidden-xs {
    display: none !important;
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


.carousel-item {
    height: 250px !important;
}

.carousel-item img {
    height: 100%;
    object-fit: cover;
}

}


</style>



                  <div class="col-md-4 hidden-xs">
                    <a href="{{ $product->slug }}">
                       <div class="store-listing-wrapper">
                            <div class="utf_listing_item"> 
                        
                            {!!  $product->presentThumbnail() !!}
                        
                        
                    <div class="utf_listing_item_content">
                    <div class="utf_listing_prige_block">                           
                        <span class="utp_approve_item"><i class="utf_approve_listing"></i></span>
                    </div>
                    
                    <span><i class="fas fa-search-location"></i>{{ $product->street }}</span>
                    <span><i class="fas fa-phone"></i> {{ $product->owner->phone }}</span>                                                
                    <span><i class="fas fa-envelope"></i> {{ $product->owner->email }}</span>                                                
                    </div>
                    </div>
                    <div class="utf_star_rating_section" data-rating="4.5">
                        
                        {{ $product->name }}
                    

                </div>

                       </div>
                    </a>

                  </div>



                   @endforeach
                </div>
                @endforeach


                </div>
            </div>


            <div class="updateswrapper underStors">
            <div class="container text-center">
                @foreach($ads as $ad)
                      {!!  $ad->underStors()  !!}
                @endforeach
            </div>
            </div>

    </main>



<footer class="footer">
            <div class="footer-top info-boxes-container">
                <div class="container">
                    <div class="info-box">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>{{ __('FREE SHIPPING & RETURN') }}</h4>
                            <p>{{ __('Free shipping on all orders over $99.') }}</p>
                        </div>
                    </div>

                    <div class="info-box">
                        <i class="icon-us-dollar"></i>

                        <div class="info-box-content">
                            <h4>{{ __('MONEY BACK GUARANTEE') }}</h4>
                            <p>{{ __('100% money back guarantee') }}</p>
                        </div>
                    </div>

                    <div class="info-box">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>{{ __('ONLINE SUPPORT 24/7') }}</h4>
                            <p>{{ __('Lorem ipsum dolor sit amet.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-middle">
                <div class="container">
                    <div class="row" style="display: none;">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="widget">
                                        <h4 class="widget-title">{{ __('My Account') }}</h4>

                                      
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="widget">
                                        <ul class="contact-info">
                                            <li>
                                                <span class="contact-info-label">{{ __('Address:') }}
                                                </span>

                                                {{ baseSetting('adresse') }}
                                            </li>
                                            <li>
                                                <span class="contact-info-label">{{ __('Phone:') }}</span><a href="tel:{{ baseSetting('phonenumber') }}">
                                                    
                                                    {{ baseSetting('phonenumber') }}

                                                </a>
                                            </li>
                                            <li>
                                                <span class="contact-info-label">{{ __('Email:') }}</span> <a href="mailto:{{ baseSetting('email') }}">{{ baseSetting('email') }}</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="widget">
                                        <h4 class="widget-title">{{ __('Main Features') }}</h4>
                                        
                                        <ul class="links">
                                            <li><a href="#">Super Fast Magento Theme</a></li>
                                            <li><a href="#">1st Fully working Ajax Theme</a></li>
                                            <li><a href="#">20 Unique Homepage Layouts</a></li>
                                            <li><a href="#">Powerful Admin Panel</a></li>
                                            <li><a href="#">Mobile & Retina Optimized</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="footer-bottom">

                    <p class="footer-copyright">
                            @php
                                $copyright = baseSetting('footer_copyright');
                            @endphp
                            @if(!empty($copyright))
                                    {{ $copyright }}
                            @else
                            &copy; <script>   var CurrentYear = new Date().getFullYear(); document.write(CurrentYear); </script> All Rights Reserved
                            @endif
                    </p>

                    <img src="/assets/front/images/payments.png" alt="payment methods" class="footer-payments">

                    <div class="social-icons">
                        @php
                                $facebook = baseSetting('facebook');
                                $twitter = baseSetting('twitter');
                                $instagram = baseSetting('instagram');
                                $youtube = baseSetting('youtube');
                                $linkedIn = baseSetting('linkedIn');
                        @endphp
                        @if(!empty($facebook))
                                    <a href="{{ $facebook }}" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                        @endif
                        @if(!empty($twitter))
                                    <a href="{{ $twitter }}" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                        @endif
                        @if(!empty($instagram))
                                    <a href="{{ $instagram }}" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
                        @endif
                                                                                   
                        
                    </div>
                </div>
            </div>
        </footer>



@include('cookieConsent::index')

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
<script src="/assets/front/js/All.js"></script>

{{ baseSetting('thebottomofthesite') }}



<div class="mobile-menu-overlay"></div>
<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-cancel"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                {!!  app('SiteSetting')->WebsiteMenu('phone') !!}
            </ul>
        </nav>
        <div class="social-icons">

            @if(!empty($facebook))
            <a href="{{ $facebook }}" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
            @endif

            @if(!empty($twitter))
            <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
            @endif

            @if(!empty($instagram))
            <a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
            @endif

        </div>
    </div>
</div>




</body>
</html>

