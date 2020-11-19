<div class="sidebar sidebar-main">
    <div class="sidebar-content">
         <div class="sidebar-category sidebar-category-visible mt-15">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
					<li><a href="{{ route('manager.home') }}"><i class="icon-home4"></i> <span>{{ __('overview') }}</span></a></li>
					<li><a href="{{ route('manager.orders.home') }}"> <i class="icon-basket"></i> <span>  {{ __('orders') }} </span></a></li>
					<li><a href="{{ route('manager.stores.home') }}"><i class="icon-store2"></i> <span>  {{ __('stores') }}   </span></a></li>
					<li><a href="{{ route('manager.slider.home') }}"><i class="icon-images2"></i> <span>{{ __('slider') }}</span> </a></li>
                    <li><a href="{{ route('manager.users.home') }}"><i class="icon-users"></i> <span>{{ __('users') }}</span> </a></li>
                    <li><a href="{{ route('manager.ads.home') }}"><i class="icon-barcode2"></i> <span>{{ __('Ads') }}</span> </a></li>
                    <li><a href="{{ route('manager.settings') }}"><i class="icon-equalizer3"></i> <span>{{ __('Settings') }}</span> </a></li>
                    <li><a href="{{ route('manager.menus.home') }}"><i class="icon-list-unordered"></i> <span>  {{ __('Menus') }}  </span></a></li>
                    <li><a href="{{ route('manager.pages.home') }}"><i class="icon-file-text2"></i> <span>  {{ __('Pages') }}  </span></a></li>
                </ul>
            </div>
        </div>        
    </div>
</div>
