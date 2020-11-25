<div class="order-summary">
    <h3>{{ __('Summary') }}</h3>
    <h4>
    <a data-toggle="collapse" href="#order-cart-section" class="" role="button" aria-expanded="false" aria-controls="order-cart-section">
        {{ ShoppingCart::count(false) }}
        {{ __(' products in Cart') }}
    </a>
    </h4>

    <div class="collapse show" id="order-cart-section">
        <table class="table table-mini-cart">
            <tbody>

                @if(!empty(ShoppingCart::all())) @foreach(ShoppingCart::all() as $product)
                <tr>
                    <td class="product-col product-col-{{ $product['id'] }}">
                        <figure class="product-image-container">
                            <a href="{{ route('shop.product',['id' => $product['id'] , 'store' => $store]) }}" class="product-image">
                                <img src="{{ $product['thumbnail'] }}">
                            </a>
                        </figure>
                        <div>
                            <h2 class="product-title">
                                <a href="{{ route('shop.product',['id' => $product['id'], 'store' => $store]) }}">{{ $product['name'] }}</a>
                            </h2>

                            <span class="product-qty">{{ __('Qty') }}: <i>{{ $product['qty'] }}</i></span>
                        </div>
                    </td>
                    <td class="price-col price-col-{{ $product['id'] }}">{{ System::currency() }} <span>{{ $product['total'] }}</span></td>
                </tr>

                @endforeach @endif

                <table class="table table-totals">
                    <tfoot>
                         <tr class="shippingRow d-none">
                            <td>{{ __('Shipping') }}</td>
                            <td>{{ System::currency() }} <span class="shippingPrice"></span></td>
                        </tr>
                        <tr>
                            <td>{{ __('Order Total') }}</td>
                            <td>{{ System::currency() }} <span class="TotalPrice">{{ ShoppingCart::totalPrice() }}</span></td>
                        </tr>
                    </tfoot>
                </table>
            </tbody>
        </table>
    </div>
</div>