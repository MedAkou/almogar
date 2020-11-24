 @extends('admin/layout') 


 @section('title') 

 {{ __('Orders') }} 

 @endsection 

 @section('content')

<!-- Main content -->
<div class="content-wrapper">

    @if (!$orders->isEmpty())
    <!-- Page header -->
    <div class="page-header page-header-transparent">
        <div class="page-header-content">
            <div class="page-title">

                <h1><i class="icon-arrow-right6 position-left goback"></i> <span class="text-semibold">
                {{ __('Orders') }}
            </span></h1>
            </div>

            <div class="heading-elements">

                
            </div>

            

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.home') }}" title=""><i class="icon-home2 position-left"></i>
    {{ __('Home') }}
    </a></li>
                <li class="active" title="{{ __('Orders') }}">{{ __('Orders') }}</li>
            </ul>
            <ul class="breadcrumb-elements not-collapsible  ">
                
            </ul>

        </div>
    </div>
    <!-- /page header -->
    @endif

    <!-- Content area -->
    <div class="content">

        @if ($orders->isEmpty())

        <div class="empty_state text-center">

            <i class="icon-basket empty_state_icon"></i>
            <h4 style="color: #ababab;"> 
              <br>
                {{ __('when you recieve new order , will apear here.') }}
                </h4>
        </div>
        @endif @if (!$orders->isEmpty())
        <div class="panel panel-flat table-panel table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><i class=" icon-more"></i><b>{{ __('order details #') }}</b></th>
                        <th><i class=" icon-calendar3"></i><b>{{ __('created at') }}</b></th>
                        <th><i class=" icon-more"></i><b>{{ __('user #') }}</b></th>
                        <th><i class=" icon-list-ordered"></i><b>{{ __('total') }}</b></th>
                        <th><i class=" icon-checkmark"></i><b>{{ __('statue') }}</b></th>
                        <th><i class=" icon-checkmark"></i><b>{{ __('serial') }}</b></th>
                        <th><i class=" icon-checkmark"></i><b>{{ __('details') }}</b></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)

                    <tr>
                        <td data-label="{{ __('order details # ') }}">{{ __('order N°') }}{{ $order->id }}</td>
                        <td data-label="{{ __('ordered at') }}">{{ $order->created_at->diffForHumans()}}</td>
                        <td data-label="{{ __('statue  ') }}">{{ $order->user->name }}</td>
                        <td data-label="{{ __('statue  ') }}">€ {{ $order->total }}</td>
                        <td data-label="{{ __('statue  ') }}">{{ $order->statue() }}</td>
                        <td data-label="{{ __('statue  ') }}">{{ $order->serial }}</td>
                        <td data-label="{{ __('statue  ') }}"> <a href="{{ route('admin.orders.edit',['id' => $order->id  ]) }}">   {{ __('view details') }}  </a> </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
        @endif
        <div class="pagination-wrapper">
            {{ $orders->links() }}
        </div>

    </div>
</div>

@endsection