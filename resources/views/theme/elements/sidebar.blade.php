<div class="col-lg-4 list">
    <div class="ps-section__left">
        <aside class="ps-widget--account-dashboard">
            <div class="ps-widget__content">
                <ul>
                    <li class="{{ request()->is('*/account') ? 'active' : '' }}"><a href="{{ route('edit',['store' => $store ]) }}"><i class="icon-user"></i> {{ __('Account Information') }}</a></li>
                    <li class="{{ request()->is('*/password') ? 'active' : '' }}"><a href="{{ route('password',['store' => $store ]) }}"><i class="icon-papers"></i> {{ __('Password') }}</a></li>
                    <li class="@if(str_contains(url()->current(), 'adresses') || str_contains(url()->current(), 'shipping')) active  @endif"><a href="{{ route('adresses',['store' => $store ]) }}"><i class="icon-map-marker"></i> {{ __('Address Book') }}</a></li>
                    <li class="@if(str_contains(url()->current(), '/orders')) active  @endif"><a href="{{ route('orders',['store' => $store ]) }}"><i class="icon-store"></i> {{ __('My Orders') }}</a></li>
                    <li class="{{ request()->is('*/wishlist') ? 'active' : '' }}"><a href="{{ route('wishlist',['store' => $store ]) }}"><i class="icon-heart"></i> {{ __('My Wishlist') }}</a></li>
                    <li ><a href="/logout"><i class="icon-power-switch"></i>{{ __('logout') }}</a></li>
                </ul>
            </div>
        </aside>
    </div>
</div>