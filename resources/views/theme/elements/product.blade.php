<div class="dress-card">
  <div class="dress-card-head">
    {!! $product->presentcalculateDiscount() !!}
  	<a href="{{ route('shop.product',['id' => $product->getSlug() , 'store' => $store ]) }}">{!! $product->presentThumbnail() !!}</a>    

  </div>
  <div class="dress-card-body">
    <h4 class="dress-card-title">{{$product->name }}</h4>    
    <div class="lflos"> {!! $product->presentRealPrice() !!} </div>
    <div class="row">
      <div class="col-md-6 card-button mobi50">
      	<a id="addtocard" href="{{ route('cart.add', ['id' => $product->id , 'store' => $store]) }}"  data-product-id='{{$product->id}}'>
      		<div class="card-button-inner bag-button"><i class="icon-bag2"></i></div></a>
      </div>
      <div class="col-md-3 card-button mobi25">
      	<a id="wishlist" href="javascript:;" data-link="{{ route('wishlist.add', ['id' => $product->id , 'store' => $store ]) }}">
      		<div class="card-button-inner wish-button"><i class="icon-heart"></i></div></a>
      </div>
      <div class="col-md-3 card-button mobi25">
      	<a id="quickview" href="javascript:;" data-link="{{ route('quickview',['id' => $product->getSlug() , 'store' => $store ]) }}">
      		<div class="card-button-inner wish-button"><i class="icon-eye"></i></div></a>
      </div>
    </div>
  </div>
</div>