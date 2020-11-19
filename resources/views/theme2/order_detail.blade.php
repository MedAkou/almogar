@extends('theme2/layout')
@section('title')
{{ __('order details') }}
@endsection

@section('content')

<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home',['store' => $store ]) }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">{{ __('account') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('order details') }}</li>
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
                                    <h3>{{ __('order info') }}</h3>
                                </div>
                                <div class="ps-section__content">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <figure class="ps-block--invoice">
                                                <figcaption>{{ __('Adresse') }}</figcaption>
                                                <div class="ps-block__content"><strong>{{ $content->addresse->given_name }}</strong>
                                                    <p>Address: {{ $content->addresse->street }}, {{ $content->addresse->city }}, {{ $content->addresse->state }} , {{ $content->addresse->country_code }} , {{ $content->addresse->postal_code }}</p>
                                                    <p>Phone: {{ $content->addresse->phone }}</p>
                                                </div>
                                            </figure>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <figure class="ps-block--invoice">
                                                <figcaption>{{ __('order.shipping') }} : {{ $content->shipping->name }}</figcaption>
                                                <div class="ps-block__content">
                                                    <p>{{ __('order.shippingcost') }} : {{ $content->currency }} {{ $content->shipping->cost }}</p>
                                                </div>
                                            </figure>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <figure class="ps-block--invoice">
                                                <figcaption>{{ __('order.method') }}</figcaption>
                                                <div class="ps-block__content">
                                                    <p>{{ __('order.method') }} : {{ $content->payement->method }}</p>
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table ps-table">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('product') }}</th>
                                                    <th>{{ __('price') }}</th>
                                                    <th>{{ __('quantity') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($content->products as $product )
                                                <tr>
                                                    <td>
                                                        <div class="ps-product--cart">
                                                            <div class="ps-product__thumbnail">
                                                              @if($product->product)
                                                              {!! $product->product->presentThumbnail() !!}
                                                              @endif
                                                            </div>
                                                            <div class="ps-product__content">{{ $product->product->name }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><span><i>$</i>{{ $product->price }} </span></td>
                                                    <td> {{ $product->quantity }} </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->





@endsection



