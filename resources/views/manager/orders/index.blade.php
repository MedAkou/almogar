 @extends('manager/layout') @section('title') {{ __('Orders') }} @endsection @section('content')

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

            <div id="modal_iconified" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h5 class="modal-title"><i class="icon-menu7"></i> </h5>
                        </div>

                        <div class="modal-body">
                            <div class="alert alert-info alert-styled-left text-blue-800 content-group">

                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>

                            <p>
                                <br>
                            </p>
                        </div>

                        <div class="modal-footer">
                            <a href="" class="btn btn-link text-danger"></a>
                            <button class="btn btn-primary" data-dismiss="modal"></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('manager.home') }}" title=""><i class="icon-home2 position-left"></i>
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

                    <div class="panel panel-flat" id="search_box">
    <div class="panel-heading">
        <h5 class="panel-title">


        ابحث عن طلب    <a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
    </div>

    <div class="panel-body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
        <form action="" method="get" class="main-search">
   
            <div class="input-group content-group">
                <div class="has-feedback has-feedback-left">
                    <input name="order_id" type="text" class="form-control input-xlg" placeholder="   رقم الطلب  " value="{{ app('request')->input('order_id') }}">
                    <div class="form-control-feedback">
                        <i class="icon-search4 text-muted text-size-base"></i>
                    </div>
                </div>

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-xlg searchBtnSubmit">بحث</button>
                </div>
            </div>
        </form>
                </div>
                <div class="col-md-6">
                    <select name="storeid" id="bystoreId" class="form-control">
                        <option class="form-control" > حسب المتجر </option>
                        @foreach ($stores as $store)
                            <option class="form-control" value="{{ $store['id'] }}"> {{ $store['name'] }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

        @if ($orders->isEmpty())

        <div class="empty_state text-center">

            <i class="icon-basket empty_state_icon"></i>
            <h4 style="color: #ababab;"> 
              <br>
                {{ __('there is no orders for the moment.') }}
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
                        <td data-label="{{ __('statue  ') }}">{{ $order->getTotal() }}</td>
                        <td data-label="{{ __('statue  ') }}">{{ $order->statue() }}</td>
                        <td data-label="{{ __('statue  ') }}">{{ $order->serial }}</td>
                        <td data-label="{{ __('statue  ') }}"> <a href="{{ route('manager.orders.edit',['id' => $order->id  ]) }}">   {{ __('view details') }}  </a> </td>
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