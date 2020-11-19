
<header class="header d-sm-none d-lg-none d-md-none">
            <div class="header-top">
                <div class="container">
                    <div class="header-left header-dropdowns">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i><span>{{ __('Search') }}</span></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="{{ __('Search') }}..." required="">
                                  
                                    <button class="btn" type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="header-right">
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
                                    $logo = baseSetting('logo');
                                @endphp
                                @if(!empty($logo))
                                <a href="/" class="logo">
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
                            <a href="tel:{{ baseSetting('phonenumber') }}">{{ baseSetting('phonenumber') }}</a>
                        </div>
                        <ul class="menu sf-arrows">
                           
                            
                            
                        </ul>
                        </div>
                    

                    </div>
                </div>

     

            <div class="menu-wrapper ">
            <div class="container">
                    <div class="row"  style="width:100%;">
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

                    <ul class="menu sf-arrows main-header-menu">
                        {!!  app('SiteSetting')->WebsiteMenu('main') !!}
                    </ul>

                  </div>
                </div>
            </div>
            </div>

        </header>








