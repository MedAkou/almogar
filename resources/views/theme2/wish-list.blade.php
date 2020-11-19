@extends('theme2/layout')
@section('title')
{{ __('wishlist') }}
@endsection

@section('content')


<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home',['store' => $store ]) }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">{{ __('account') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('wishlist') }}</li>
                    </ol> 
                </div>
            </nav>

            <div class="container">
                <div class="row">                    
                        @include('theme2.elements.sidebar')
                        <div class="col-lg-8">
                            <div class="ps-section__right">
                                <div class="ps-section--account-setting">
                                    <div class="ps-section__header">
                                        <h3>{{ __('Wishlist') }}</h3>
                                    </div>
                                    <div class="ps-section__content">
                                     <div class="table-responsive">
                                         <table class="table ps-table--whishlist">
                                             
                                             <tbody>
                                                @foreach($wishlist as $product)
                                                 <tr>
                                                     <td><a href="{{ route('wishlist.remove', [ 'id' => $product->id , 'store' => $store ]) }}"><i class="icon-cross"></i></a></td>
                                                     <td>
                                                         <div class="ps-product--cart">
                                                             <div class="ps-product__thumbnail"><a href="{{ route('shop.product',['id' => $product->id , 'store' => $store]) }}">{!! $product->product->presentThumbnail() !!}</a></div>
                                                             <div class="ps-product__content"><a href="{{ route('shop.product',['id' => $product->id , 'store' => $store ]) }}">{{$product->product->name }}</a></div>
                                                         </div>
                                                     </td>
                                                     <td class="price">{{ $symbol }} {{ $product->product->presentPrice() }}</td>
                                                     <td><a class="ps-btn" href="{{ route('cart.add', ['id' => $product->id , 'store' => $store ]) }}"><i class="icon-bag2"></i></a></td>
                                                 </tr>
                                                 @endforeach
                                             </tbody>
                                             <tbody>
                                                 <tr class="wishclearall">
                                                    <th colspan="4"><a href="{{ route('wishlist.clear',['store' => $store ]) }}"><i class="fa fa-trash" aria-hidden="true"></i>
{{ __('clear wishlist') }}</a></th>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                                </div>
                            </div>
                         </div>
                </div>
            </div>

            <div class="mb-5"></div>
        </main>



@endsection
