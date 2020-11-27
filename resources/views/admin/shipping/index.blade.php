@extends('admin/layout') @section('title') {{ __('Shipping') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-transparent">
        <div class="page-header-content">
            <div class="page-title">
                <h1><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">{{ __('Shipping methods') }}</span></h1>
            </div>

            <div class="heading-elements div_btn">
                <a href="{{ route('admin.shipping.create') }}" class="btn bg-blue btn-labeled heading-btn btn_add"><b>
            <i class="icon-plus3"></i></b> {{ __('Add a new shipping method') }}</a>

                <a href="javascript:void(0);" data-toggle="modal" data-target="#shipping_delete" class="btn bg-danger btn-labeled heading-btn btn_add"><b><i class="icon-trash"></i></b>   {{ __('Delete all shipping methods') }} </a>

            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.home') }}" title=""><i class="icon-home2 position-left"></i>
    {{ __('Home') }}
    </a></li>
                <li class="active" title="{{ __('Shipping') }}">{{ __('Shipping') }}</li>
            </ul>
            <ul class="breadcrumb-elements not-collapsible  ">
                
            </ul>

        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        @if ($shipping->isEmpty())
        <div class="empty_state text-center">

            <i class=" icon-truck empty_state_icon"></i>
            <br/>
            <br/>
            <h6> 
 {{ __('Add the shipping methods that you want to provide to your store customers') }}

        </h6>
            <br>
            <a href="{{ route('admin.shipping.create') }}" class="btn bg-blue heading-btn btn-xlg"><i class="icon-plus3"></i>
{{ __('Add a new shipping method') }}

          </a>
        </div>
        @endif @if (!$shipping->isEmpty())

        <div class="panel panel-flat table-panel table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th><i class=" icon-pencil5"></i><b>{{ __('Title') }}</b></th>
                        <th><i class="icon-alarm-check"></i><b>{{ __('The number of delivery days') }}</b></th>
                        <th><i class="  icon-price-tag"></i><b>{{ __('price') }}</b></th>
                        <th><i class=" icon-calendar3"></i><b>{{ __('Date created') }} </b></th>
                        <th><i class=" icon-pencil4"></i><b>{{ __('Edit') }}</b></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($shipping as $item)

                    <tr>
                        <td data-label="{{ __('Title ') }}">{{ $item->name }}</td>
                        <td data-label="{{ __('The number of delivery days ') }}"> {{ $item->delivery_days }}</td>
                        <td data-label="{{ __('price  ') }}">{{ $item->cost }}</td>
                        <td data-label="{{ __('Date created    ') }}">{{ $item->created_at->diffForHumans() }}</td>
                        <td data-label="{{ __('Edit') }}">
                            <a class="edit btn btn-success btn-block hidden-md hidden-lg hidden-sm" href="{{ route('admin.shipping.edit',['id' => $item->id]) }}">edit</a>
                            <ul class="icons-list hidden-xs">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="{{ route('admin.shipping.edit',['id' => $item->id]) }}" class="text-primary-600">
                                                <i class="icon-pencil7 position-left"></i>{{ __('Edit') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.shipping.delete',['id' => $item->id]) }}" class="text-danger-600">
                                                <i class="icon-cross2 position-left"></i>{{ __('Delete') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.shipping.duplicate',['id' => $item->id]) }}" class="text-bg-info">
                                                <i class="icon-stack-plus position-left"></i>{{ __('Duplicate') }}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>

        @endif
        <div class="pagination-wrapper">
            {{ $shipping->links() }}
        </div>

    </div>

</div>

@endsection