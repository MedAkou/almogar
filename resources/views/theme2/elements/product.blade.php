<style>
	.dress-card .product {
    max-width: 150px;
}

.dress-card .dress-card-head {
    text-align: center;
}

h4.dress-card-title {
    font-weight: 500;
    font-size: 15px;
    height: 49px;
}

.dress-card {
    border: 1px solid #00000021;
    border-radius: 0;
    padding: 0 20px;
}

.dress-card {
    margin-bottom: 25px;
        min-height: 371px;
}
.dress-card .dress-card-head {
    min-height: 204px;
}

@media (max-width: 600px) and (min-width: 0px) {
.nestele {
    width: 50%;
}

.nestele img {width: 100%;}

.dress-card-body {
    padding: 0;
}
}


</style>

<div class="dress-card">
	@php
        $link = !empty($product->slug) ? $product->slug : $product->id;
    @endphp
  <div class="dress-card-head">
    {!! $product->presentcalculateDiscount() !!}
  	<a href="{{ route('shop.product',['id' => $link , 'store' => $store ]) }}">{!! $product->presentThumbnail() !!}</a>    

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
      	<a id="quickview" href="javascript:;" data-link="{{ route('quickview',['id' => $link , 'store' => $store ]) }}">
      		<div class="card-button-inner wish-button"><i class="icon-eye"></i></div></a>
      </div>
    </div>
  </div>
</div>