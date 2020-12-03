@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
@section('title')
{{ __('Orders') }}
@endsection

@section('content')

<main class="main">
            <div class="ps-breadcrumb">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="icon-home"></i></a></li>
                        <li>{{ __('Orders') }}</li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <div class="row">
                        @include(\System::$ACTIVE_THEME_PATH.'.account.elements.sidebar')
                        <div class="col-lg-8">
                           <div class="ps-section__right">
                               <div class="ps-section--account-setting">
                                   @if(Auth::user()->orders->count() != 0)
                                        <div class="ps-section__header">
                                            <h3>{{ __('Orders') }}</h3>
                                        </div>
                                    @endif
                                   <div class="ps-section__content">
                                    @if(Auth::user()->orders->count() != 0)
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
                                                       <td><a href="{{ route('account.orders_detail',['id' => $order->id ]) }}">{{ $order->id }}</a></td>
                                                       <td>{{ $order->created_at->diffForHumans() }}</td>
                                                       <td>{{ $order->statue() }}</td>
                                                       <td>{{ $order->total }} {{ System::currency() }}</td>
                                                       <td><a href="{{ route('account.orders_detail',['id' => $order->id ]) }}">{{ __('order details') }}</a></td>
                                                   </tr>
                                                @endforeach
                                               </tbody>
                                           </table>
                                       </div>
                                       @else
                                        <div class="ps-table--invoices">
                                             <div class="row text-center">
                                                  <div class="empty-order">
                                                      <i class="icon-cart"></i>
                                                      <p>{{ __('You have no orders') }}</p>
                                                      <a class="ps-btn" href="/">{{ __('Order now') }}</a>
                                                  </div>
                                             </div>
                                          </div>
                                        @endif
                                   </div>
                               </div>
                           </div>
                        </div>
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->





@endsection



