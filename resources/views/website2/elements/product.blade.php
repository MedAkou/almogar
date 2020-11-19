<figure>

    @php
        $link = !empty($product->slug) ? $product->slug : $product->id;
    @endphp

    <a href="{{ route('shop.product',['id' => $link , 'store' => $store ]) }}">
    {!! $product->presentThumbnail() !!}
    </a>
    <div class="product-details">
    <h2 class="product-title">
    <a href="{{ route('shop.product',['id' => $link , 'store' => $store ]) }}">{{$product->name }}</a>
    </h2>
    <div class="price-box">
    <span class="product-price">{{ $symbol }}{{$product->presentPrice()}}</span>
    </div>
    <div class="product-action">
        <a href="{{ route('wishlist.add', ['id' => $product->id , 'store' => $store ]) }}" class="btn-icon-wish">
            <i class="icon-heart"></i>
        </a>
        <a href="{{ route('cart.add', ['id' => $product->id , 'store' => $store]) }}"  data-product-id='{{$product->id}}' class="btn-icon btn-add-cart" >
            <i class="icon-bag"></i>{{ __('ADD TO CART') }}
        </a>
    </div>
    </div>
</figure>