@extends(\System::$ACTIVE_THEME_PATH.'/layout')
@section('title')
{{ __('order details') }}
@endsection

@section('content')

<main class="main">
            

            <div class="ps-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="http://almogar.test:82/matjar"><i class="icon-home"></i></a></li>
                        <li>{{ __('order details') }}</li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @include(\System::$ACTIVE_THEME_PATH.'/elements.sidebar')
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
                                                <div class="ps-block__content"><strong>{{ __('username') }} : {{ $content->addresse->given_name }}</strong>
                                                    <p>{{ __('adresse') }} : <br/> {{ $content->addresse->street }}, {{ $content->addresse->city }}, {{ $content->addresse->state }} , {{ $content->addresse->country_code }} , {{ $content->addresse->postal_code }}</p>
                                                    <p>{{ __('Phone') }} : <br/> {{ $content->addresse->phone }}</p>
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
                                                    <th>{{ __('quantity') }}</th>
                                                    <th>{{ __('price') }}</th>
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
                                                    <td> {{ $product->quantity }} </td>
                                                    <td><span><i>{{ System::currency() }}</i> {{ $product->product->price }} </span></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <thead>
                                                <tr>
                                                    <th>{{ __('total') }}</th>
                                                    <th class="text-center" colspan="2">{{ System::currency() }} {{ $content->total }}</th>
                                                </tr>
                                            </thead>
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



