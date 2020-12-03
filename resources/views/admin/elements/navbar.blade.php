

    <!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('admin.home') }}">{{ __('control panel') }}</a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs "><i class="icon-paragraph-justify3"></i></a></li>
    
            @php
                    $store = \Auth::User()->store->slug;
            @endphp

            <li><a class="goout" target="_blank" href="{{ route('home',['store' => $store]) }}">
            <i class="icon-enter"></i>
            {{ __('visite website') }}</a></li>


             

                <li class="dropdown language-switch">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="/assets/admin/images/lang/{{ App::getLocale() }}.png" class="position-left" alt="">
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu ">
                    <li>
                        <a href="?lang=ar"><img src="/assets//admin/images/lang/ar.png" alt=""> {{ __('العربية ') }}</a>
                    </li>
                   
                    <li>
                        <a href="?lang=de"><img src="/assets//admin/images/lang/de.png" alt=""> {{ __('Deutsch') }}</a>
                    </li>
                    <li>
                        <a href="?lang=tr"><img src="/assets//admin/images/lang/tr.png" alt=""> {{ __('Turkish') }}</a>
                    </li>

                    <li>
                        <a href="?lang=ir"><img src="/assets//admin/images/lang/ir.png" alt=""> {{ __('فارسى') }}</a>
                    </li>

                </ul>
            </li>

         


                
            
        </ul>
        <ul class="nav navbar-nav navbar-right">
           
           <li class="hidden-xs">
                    <a href="#" onClick="go_full_screen();" ><i class="icon-enlarge"></i></a>
                </li>
         
           

      
           
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    
                    <span>
                        {{ Auth::user()->name }}
                    </span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{ route('admin.account') }}"><i class="icon-cog5"></i> {{ __('account settings') }}</a></li>
                    <li><a href="/logout"><i class="icon-switch2"></i>{{ __('logout') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->