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


<!-- RTL css style -->
      {!! app('SiteSetting')->DashboardCss()  !!}
      <link rel="stylesheet" type="text/css" href="/assets/admin/css/main.css?v={{ env('ASSETS_VERSION') }}" />


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/front/css/style.min.css">
    <link rel="stylesheet" href="/assets/front/css/main.css">
   
    {{ baseSetting('thetopofsite') }}

</head>

<body>
   

@include('elements/front-header')

    <style>
        h2.post-title {
    width: 100%;
    margin-top: 45px;
}

.post-content {
    width: 100%;
    margin-bottom: 55px;
}

input.form-control.rf {
    max-width: inherit !important;
}

textarea#description {
    max-width: initial !important;
}

.input-group-addon > i {
    right: 11px;
    top: 5px;
}

.input-group-addon:last-child {
    border-right: 1px solid #ddd;
    border-radius: 3px;
}
.pagetitle{
    text-align: center;
}
    </style>



    <div class="container">
        <div class="post-title"><h1></h1></div>
        <div class="post-content">
            <!-- Content area -->
    <div class="content">
        @include('manager/elements/form-messages')
        
        <form class="form-horizontal" action="{{ route('manager.stores.store') }}" method='POST' action="" autocomplete="off" enctype="multipart/form-data" >
            {!! csrf_field() !!}

            <div class="col-md-12">
                <div class=" panel-flat">
                    <div class="panel-body">

                        <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>
                        <fieldset class="content-group pagetitle">
                            <h1 >{{ __('joinus') }}</h1>
                            <hr>
                            <br>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('name') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control rf " value="{{ old('storename') }}" name="storename" placeholder="{{ __('name') }}" value="">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('url') }}</label>
                                <div class="hidden">
                                    {{ __('example :  ') }} {{ route('base') }}
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control rf" value="{{ old('url') }}" name="url" placeholder="{{ __('url') }}" value="">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('street') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" value="{{ old('street') }}" class="form-control rf " name="street" placeholder="{{ __('street') }}" value="">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('postal code') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" value="{{ old('postalcode') }}" class="form-control rf" value="" name="postalcode" placeholder="{{ __('postal code') }}">
                                        <span class="input-group-addon"><i class="icon-map5"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('description') }}</label>
                                <div class="col-lg-10">
                                    
                                <textarea class="form-control" placeholder="{{ __('description') }}" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                        
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('thumbnail') }}</label>
                                <div class="col-lg-10">

                                    <div class="input-group">
                                        <input type="file" class="form-control rf"  name="thumbnail" placeholder="{{ __('thumbnail') }}">
                                        <span class="input-group-addon"><i class="icon-blog"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div id='map_canvas'></div>
                                <div id="current"></div>
                            </div>


                            <input type="hidden" name="latitude" id="latitude"  /> 
                            <input type="hidden" name="longitude" id="longitude"  /> 




                        </fieldset>
                       

                    </div>
                </div>
                  <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ __('create new Store') }}
                                <i class="icon-arrow-left13 position-right"></i>
                            </button>
                        </div>
            </div>







        </form>

    </div>
        </div>
    </div>


    
      
   

<footer class="footer col-md-12">
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

      <script src="/assets/admin/ckeditor/ckeditor.js?v={{ env('ASSETS_VERSION') }}"></script>
    <script src="/assets/admin/js/nestable.js?v={{ env('ASSETS_VERSION') }}"></script>
    <script src="/assets/admin/js/nestable++.js?v={{ env('ASSETS_VERSION') }}"></script>
    <script type="text/javascript" src="/assets/admin/js/main.js?v={{ env('ASSETS_VERSION') }}"></script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;libraries=places&amp;key=AIzaSyDwFc97AGfeqzqBmL2eVFxgeHm-CQNnvNM"></script>

  <script>
    

  var map = new google.maps.Map(document.getElementById('map_canvas'), {
    zoom: 6,
    center: new google.maps.LatLng(50.877, 10.445),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});



var myMarker = new google.maps.Marker({
    position: new google.maps.LatLng(50.877, 10.445),
    draggable: true
});

google.maps.event.addListener(myMarker, 'dragend', function (evt) {
    
$('#latitude').val(evt.latLng.lat().toFixed(3));
$('#longitude').val(evt.latLng.lng().toFixed(3));
});


map.setCenter(myMarker.position);
myMarker.setMap(map);

  </script>
        </body>
</html>