 @extends('admin/layout')

@section('title') 

 {{ __('ads') }} 

 @endsection

 @section('content')

<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-transparent">
        <div class="page-header-content">
            <div class="page-title">
                <h1> <span class="text-semibold">{{ __('ads') }}</span></h1>
            </div>

            <div class="heading-elements div_btn">

                <a href="{{ route('admin.ads.create') }}" class="btn bg-blue btn-labeled heading-btn btn_add"><b><i class="icon-plus3"></i></b>
                {{ __('create new ad') }}
                </a>

                <a href="javascript:void(0);" data-toggle="modal" data-target="#Ads_delete" class="btn bg-danger btn-labeled heading-btn btn_add"><b><i class="icon-trash"></i></b> 

                {{ __('delete all ads') }}</a>

            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.home') }}" title=""><i class="icon-home2 position-left"></i>{{ __('Home') }}</a></li>
                <li class="active" title="{{ __('ads') }}">{{ __('Ads') }}</li>
            </ul>

        </div>
    </div>

    <!-- Content area -->
    <div class="content">

        @if ($ads->isEmpty())

        <div class="empty_state text-center">

            <i class="icon-folder-open2 empty_state_icon"></i>
            <h4>
                {{ __("empty.ads") }}

            </h4>
            <a href="{{ route('admin.ads.create') }}" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-plus3"></i></b>
                {{ __('create new ad') }}
             </a>

        </div>
        @endif @if (!$ads->isEmpty())
        <div class="panel panel-flat table-panel table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th><b>#</b></th>
                        <th class="col-md-2"><i class=" icon-pencil5"></i><b>{{ __('title ad') }}</b></th>
                        <th><i class=" icon-calendar3"></i><b>{{ __('created at') }}</b></th>
                        <th><i class=" icon-checkmark"></i><b>{{ __('statue') }}</b></th>
                        <th><i class=" icon-pencil4"></i><b>{{ __('edit') }}</b>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ads as $ad)

                    <tr>
                        <td>{{ $ad->id }}</td>
                        <td data-label="{{ __('title ad') }}">{{ $ad->name }}</td>
                        <td data-label="{{ __('created at') }}">{{ $ad->created_at->diffForHumans()}}</td>
                        <td data-label="{{ __('statue ') }}">{{ $ad->statue }} </td>
                        <td data-label="{{ __('edit ') }}">
                            <a class="edit btn btn-success btn-block hidden-md hidden-lg hidden-sm" href="{{ route('admin.users.edit',['id' => $ad->id]) }}">edit</a>
                            <ul class="icons-list hidden-xs">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="{{ route('admin.ads.edit',['id' => $ad->id]) }}" class="text-primary-600">
                                                <i class="icon-pencil7 position-left"></i>{{ __('Edit') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.ads.delete',['id' => $ad->id]) }}" class="text-danger-600">
                                                <i class="icon-cross2 position-left"></i>{{ __('Delete') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.ads.duplicate',['id' => $ad->id]) }}" class="text-bg-info">
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
        <div class="pagination-wrapper">
            {{ $ads->links() }}
        </div>
    </div>
</div>
@endif @endsection