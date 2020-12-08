<div class="col-lg-4">
    <div class="ps-section__left">
        <aside class="ps-widget--account-dashboard">
            <div class="ps-widget__content">
                <ul>
                    <li class="{{ \Request::is('account') ? 'active' : '' }}"><a href="{{ route('account.edit') }}"><i class="icon-user"></i> {{ __('Account Information') }}</a></li>
                    <li class="{{ request()->is('*/password') ? 'active' : '' }}"><a href="{{ route('account.password') }}"><i class="icon-papers"></i> {{ __('Password') }}</a></li>
                    <li class="@if(str_contains(url()->current(), 'adresses') || str_contains(url()->current(), 'shipping')) active  @endif"><a href="{{ route('account.adresses') }}"><i class="icon-map-marker"></i> {{ __('Address Book') }}</a></li>
                    <li class="@if(str_contains(url()->current(), '/orders')) active  @endif"><a href="{{ route('account.orders') }}"><i class="icon-store"></i> {{ __('My Orders') }}</a></li>
                    <li class="{{ request()->is('*/wishlist') ? 'active' : '' }}"><a href="{{ route('account.wishlist') }}"><i class="icon-heart"></i> {{ __('My Wishlist') }}</a></li>
                    <li><a href="/logout"><i class="icon-power-switch"></i>{{ __('logout') }}</a></li>
                </ul>
            </div>
        </aside>
    </div>
</div>