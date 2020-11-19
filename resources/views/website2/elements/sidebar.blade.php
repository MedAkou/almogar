                    <aside class="sidebar col-lg-3">
                        <div class="widget widget-dashboard">
                            <h3 class="widget-title">{{ __('My Account') }}</h3>
                            <ul class="list">
                                <li><a href="{{ route('edit',['store' => $store ]) }}">{{ __('Account Information') }}</a></li>
                                <li><a href="{{ route('password',['store' => $store ]) }}">{{ __('Password') }}</a></li>
                                <li><a href="{{ route('adresses',['store' => $store ]) }}">{{ __('Address Book') }}</a></li>
                                <li><a href="{{ route('orders',['store' => $store ]) }}">{{ __('My Orders') }}</a></li>
                                <li><a href="{{ route('wishlist',['store' => $store ]) }}">{{ __('My Wishlist') }}</a></li>
                            </ul>
                        </div>
                    </aside>