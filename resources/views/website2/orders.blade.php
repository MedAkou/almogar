@extends('website/layout')
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
                    <div class="col-lg-9 order-lg-last dashboard-content">
                        <h2>{{ __('Orders') }}</h2>
                        

                              <section class="account-content">
                               <div class="account-content-wrapper">
                                  <div class="container">
                                        <div id="customer_orders" >
                                           <table class="table">
                                              <thead class="card-header">
                                                 <tr>
                                                    <th class="order_number">{{ __('Order N°') }}</th>
                                                    <th class="fulfillment_status">{{ __('Date') }}</th>
                                                    <th class="fulfillment_status">{{ __('statue') }}</th>
                                                    <th class="total">{{ __('Total') }}</th>
                                                 </tr>
                                              </thead>
                                              <tbody>
                                                @foreach(Auth::user()->orders as $order )
                                                 <tr class="odd ">
                                                    <td class="td-name"><a href="" title="">#{{ $order->id }}</a></td>
                                                    <td class="td-note"><span class="note">{{ $order->created_at->diffForHumans() }}</span></td>
                                                    <td class="td-note"><span class="note">{{ $order->statue() }}</span></td>
                                                    <td class="td-total"><span class="total">{{ $order->total }}</span></span>
                                                    </td>
                                                 </tr>
                                                 @endforeach
                                              </tbody>
                                           </table>
                                        </div>
                                  </div>
                               </div>
                            </section>


                       
                    </div><!-- End .col-lg-9 -->
                        @include('website.elements.sidebar')
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->





@endsection