@extends('theme2/pages-layout')
@section('title')
{{ __('wishlist') }}
@endsection

@section('content')


<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">{{ __('account') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('wishlist') }}</li>
                    </ol> 
                </div>
            </nav>

            <div class="container">
                <div class="row">                    
                        @include('theme2.account.elements.sidebar')
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
                                                     <td>
                                                         <div class="ps-product--cart">
                                                             <div class="ps-product__thumbnail"><a href="#">{!! $product->product->presentThumbnail() !!}</a></div>
                                                             <div class="ps-product__content"><a href="#">{{$product->product->name }}</a></div>
                                                         </div>
                                                     </td>
                                                     <td class="price">{{ System::currency() }} {{ $product->product->presentPrice() }}</td>
                                                 </tr>
                                                 @endforeach
                                             </tbody>
                                             <tbody>
                                                 <tr class="wishclearall">
                                                    <th colspan="4"><a href="{{ route('account.wishlist_clear') }}"><i class="fa fa-trash" aria-hidden="true"></i>
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
