@extends('theme2/layout')
@section('title')
{{ __('Orders') }}
@endsection

@section('content')

<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home',['store' => $store ]) }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">{{ __('account') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Orders') }}</li>
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
                                       <h3>{{ __('Orders') }}</h3>
                                   </div>
                                   <div class="ps-section__content">
                                       <div class="table-responsive">
                                           <table class="table ps-table ps-table--invoices">
                                               <thead>
                                                   <tr>
                                                       <th>{{ __('Order N°') }}</th>
                                                       <th>{{ __('Date') }}</th>
                                                       <th>{{ __('statue') }}</th>
                                                       <th>{{ __('Total') }}</th>
                                                       <th>{{ __('order details') }} </th>
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                @foreach(Auth::user()->orders as $order )
                                                   <tr>
                                                       <td><a href="{{ route('orders_detail',['id' => $order->id , 'store' => $store ]) }}">{{ $order->id }}</a></td>
                                                       <td>{{ $order->created_at->diffForHumans() }}</td>
                                                       <td>{{ $order->statue() }}</td>
                                                       <td>{{ $order->total }} €</td>
                                                       <td><a href="{{ route('orders_detail',['id' => $order->id , 'store' => $store ]) }}">{{ __('order details') }}</a></td>
                                                   </tr>
                                                @endforeach
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



