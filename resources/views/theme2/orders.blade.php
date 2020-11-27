@extends('theme2/layout')
@section('title')
{{ __('Orders') }}
@endsection

@section('content')

<main class="main">

            <div class="ps-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="http://almogar.test:82/matjar"><i class="icon-home"></i></a></li>
                        <li>{{ __('Orders') }}</li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">
                        @include('theme2.elements.sidebar')
                        <div class="col-lg-8">
                           <div class="ps-section__right">
                               <div class="ps-section--account-setting">
                                    @if (Auth::user()->orders->count() != 0)
                                        <div class="ps-section__header">
                                            <h3>{{ __('Orders') }}</h3>
                                        </div>
                                    @endif
                                   <div class="ps-section__content">
                                       <div class="table-responsive">
                                           <table class="table ps-table ps-table--invoices">
                                                @if (Auth::user()->orders->count() != 0)
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('Order N°') }}</th>
                                                            <th>{{ __('Date') }}</th>
                                                            <th>{{ __('statue') }}</th>
                                                            <th>{{ __('Total') }}</th>
                                                            <th>{{ __('order details') }} </th>
                                                        </tr>
                                                    </thead>
                                                @endif
                                               <tbody>
                                                @forelse(Auth::user()->orders as $order )
                                                   <tr>
                                                       <td><a href="{{ route('orders_detail',['id' => $order->id , 'store' => $store ]) }}">{{ $order->id }}</a></td>
                                                       <td>{{ $order->created_at->diffForHumans() }}</td>
                                                       <td>{{ $order->statue() }}</td>
                                                       <td>{{ $order->total }} {{ System::currency() }}</td>
                                                       <td><a href="{{ route('orders_detail',['id' => $order->id , 'store' => $store ]) }}">{{ __('order details') }}</a></td>
                                                   </tr>
                                                @empty
                                                    <div class="row text-center">
                                                        <div class="empty-cart mt-0">
                                                            <i class="icon-cart"></i>
                                                            <p>{{ __('Your shopping cart is empty') }}</p>
                                                            <a class="ps-btn" href="/{{ $store }}">{{ __('Continue Shopping') }}</a>
                                                        </div>
                                                    </div>
                                                @endforelse
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        </div>
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->





@endsection



