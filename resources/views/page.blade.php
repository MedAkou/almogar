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

</head>

<body>
   

<div class="page-wrapper">
        <header class="header ">
            <div class="header-top">
                <div class="container">
                    <div class="header-left header-dropdowns">
                            <ul class="lang-list">
                                <li><a href="?lang=ar">العربية</a></li>
                                <li><a href="?lang=fr">Francais</a></li>
                                <li><a href="?lang=en">English</a></li>
                                <li><a href="?lang=tr">Turkish</a></li>
                                <li><a href="?lang=de">Deutsch</a></li>
                            </ul>
                    </div>

                    <div class="header-right">
                        <div class="header-contact">
                            <i class="icon-phone-1"></i>
                            <a href="tel:{{ baseSetting('phonenumber') }}">{{ baseSetting('phonenumber') }}</a>
                        </div>
                        <ul class="menu sf-arrows">
                           
                            
                            
                        </ul>
                        </div>
                    

                    </div>
                </div>
            </div>

          
        </header>


<style>

</style>
<div class="menu-wrapper">
<div class="container">
        <div class="row">
          <div class="col-md-3">



                                @php
                                    $logo = baseSetting('logo');
                                @endphp
                                @if(!empty($logo))
                                <a href="/" class="logo">
                                    <img src="/uploads/{{ $logo }}" >
                                </a>
                                    
                                @endif


  			</div>
			<div class="col-md-9 text-left">
	                                            
	         </ul>
  </div>
  
  
</div>
</div>
</div>




    <style>
        h2.post-title {
    width: 100%;
    margin-top: 45px;
}

.post-content {
    width: 100%;
    margin-bottom: 55px;
}
    </style>



    <div class="container">
        <div class="post-title"><h1>{{ $page->title }}</h1></div>
        <div class="post-content">
            {!! $page->content !!}
        </div>
    </div>
      
   

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
                    <div class="row">
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
                        @if(!empty($youtube))
                                    <a href="{{ $youtube }}" class="social-icon" target="_blank"><i class="icon-youtube"></i></a>
                        @endif
                        @if(!empty($linkedIn))
                                    <a href="{{ $linkedIn }}" class="social-icon" target="_blank"><i class="icon-linkedin"></i></a>
                        @endif                                                                        
                        
                    </div>
                </div>
            </div>
        </footer>




    @include('cookieConsent::index')

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
    <script src="/assets/front/js/All.js"></script>

  {{ baseSetting('thebottomofthesite') }}
        </body>
</html>