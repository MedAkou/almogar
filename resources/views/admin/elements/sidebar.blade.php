<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <div class="sidebar-category sidebar-category-visible mt-15">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li><a href="{{ route('admin.home') }}"><i class="icon-home4"></i> <span>{{ __('overview') }}</span></a></li>
                    <li style="display: none;"><a href="{{ route('admin.users.home') }}"><i class="icon-users"></i> <span>{{ __('users') }}</span></a></li>
                    <li style="display: none;"><a href="{{ route('admin.media.home') }}"><i class="icon-camera"></i> <span>{{ __('Media') }}</span></a></li>
                    <li><a href="{{ route('admin.menus.home') }}"><i class="icon-list-unordered"></i> <span>  {{ __('Menus') }}  </span></a></li>
                    <li style="display: none;"><a href="{{ route('admin.ads.home') }}"><i class="icon-barcode2"></i> <span>  {{ __('Ads') }} </span></a></li>
                    <li><a href="{{ route('admin.products.home') }}"><i class="icon-cart5"></i><span>  {{ __('Products') }} </span></a></li>
                    <li><a href="{{ route('admin.products.categories.home') }}"><i class="icon-price-tag3"></i><span> {{ __('Product categories') }}</span></a></li>
                    <li><a href="{{ route('admin.orders.home') }}"><i class="icon-basket"></i><span>  {{ __('orders') }} </span></a></li>
                    <li><a href="{{ route('admin.shipping.home') }}"> <i class="icon-truck"></i>  <span>{{ __('shipping') }}</span></a></li>
                    <li><a href="{{ route('admin.settings.home') }}"> <i class="icon-equalizer3"></i> <span>{{ __('general settings ') }}</span> </a></li>
                    <li style="display: none;><a href="{{ route('admin.settings.others') }}"><i class="icon-bucket"></i> <span>{{ __('other settings') }}</span></a></li>
                    <li><a href="{{ route('admin.slider.home') }}"><i class="icon-images2"></i> <span>{{ __('slider') }}</span> </a></li>
                    <li style="display: none;"><a href="{{ route('admin.pages.home') }}"><i class="icon-file-text2"></i> <span>{{ __('Pages') }}</span> </a></li>
                    <li><a href="{{ route('admin.coupons.home') }}"><i class="icon-percent"></i><span>  {{ __('coupons') }} </span></a></li>
                </ul>
            </div>
        </div>        
    </div>
</div>
