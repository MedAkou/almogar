
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <span class="modal-close" data-dismiss="modal"><i class="icon-cross2"></i></span>
            <div class="">
                <div class="ps-product__header">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="ps-product__thumbnail" data-vertical="false">
                                <div class="ps-product__images" data-arrow="true">
                                    
                                    <div class="item">
                                        {!! $product->presentThumbnail() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="ps-product__info">
                                <h3>{{ $product->name }}</h3>
                                <h4 class="ps-product__price">{{ System::currency() }}{{ $product->presentPrice() }}</h4>
                                <div class="ps-product__desc">
                                    <ul class="ps-list--dot">
                                        <p>{!! $product->description !!}</p>
                                    </ul>
                                </div>
                                <div class="ps-product__shopping" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 card-button mobi50">
                                        <a id="addtocard" href="{{ route('cart.add', ['id' => $product->id , 'store' => $store]) }}"  data-product-id='{{$product->id}}'>
                                            <div class="card-button-inner bag-button"><i class="icon-bag2"></i></div></a>
                                      </div>
                                      <div class="col-md-3 card-button mobi50">
                                        <a id="wishlist" href="javascript:;" data-link="{{ route('wishlist.add', ['id' => $product->id , 'store' => $store ]) }}">
                                            <div class="card-button-inner wish-button"><i class="icon-heart"></i></div></a>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>