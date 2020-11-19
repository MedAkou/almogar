@extends('manager/layout') @section('title') {{ __('Users') }} @endsection @section('content')

<!-- Main content -->

<!-- Page header -->
<div class="content-wrapper">
    <div class="page-header page-header-default ">
        <div class="page-header-content">

            <div class="page-title">
                <h1> <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>
                {{ __('Users') }}
                </span></h1>
            </div>

            <div class="heading-elements div_btn">
                <a href="{{ route('manager.users.create') }}" class="btn bg-blue btn-labeled heading-btn btn_add"><b><i class="icon-plus3 "></i></b>{{ __('create user') }}</a>
           
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('manager.home') }}" title=""><i class="icon-home2 position-left"></i>
    {{ __('Home') }}
    </a></li>
                <li class="active" title="{{ __('users') }}">{{ __('users') }}</li>
            </ul>
            <ul class="breadcrumb-elements not-collapsible  ">
                
            </ul>

        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->

    <div class="content">

        @if ($users->isEmpty())

        <!-- empty state -->
        <div class="empty_state text-center">
            <i class="icon-library2 empty_state_icon"></i>
            <h4>{{ __("empty.users") }}</h4>
            <a href="{{ route('manager.users.create')}}" class="btn bg-blue btn-labeled heading-btn showUploader2"><b>
    <i class="icon-plus3"></i></b> {{ __('Add new User') }} </a>
        </div>
        <!-- empty state -->

        @endif
        <!-- Search field -->
        <div class="panel panel-flat" id="search_box" style="display : none;">
            <div class="panel-heading">
                <h5 class="panel-title">{{ __('Search users') }}</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li>
                            <a data-action="collapse"></a>
                        </li>
                        <li>
                            <a href="javascript:;" id="hide_search_box"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <form action="{{ route('manager.users.home') }}" method="get" class="main-search">
                    {!! csrf_field() !!}
                    <div class="input-group content-group">
                        <div class="has-feedback has-feedback-left">
                            <input type="text" class="form-control input-xlg" id="input_form" value="" placeholder="{{ __('seach for users by email / username') }}" name="search" />
                            <div class="form-control-feedback">
                                <i class="icon-search4 text-muted text-size-base"></i>
                            </div>
                        </div>

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-xlg" id="btnsearch">{{ __('search') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /search field -->

        @if (!$users->isEmpty())

        <div class="panel panel-flat table-panel table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th><i class=" icon-user"></i><b>{{ __('username') }}</b></th>
                        <th><i class=" icon-envelop4"></i><b>{{ __('email') }}</b></th>
                        <th><i class=" icon-calendar3"></i><b>{{ __('created at') }}</b></th>
                        <th><i class=" icon-cog4"></i><b>{{ __('role') }}</b></th>
                        <th><i class=" icon-checkmark"></i><b>{{ __('statue') }}</b></th>
                        <th class="text-center"><i class=" icon-pencil4"></i><b>{{ __('edit') }}</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td data-label="{{ __('username') }}">{{ $user->name }}</td>
                        <td data-label="{{ __('email') }}">{{ $user->email }}</td>
                        <td data-label="{{ __('created at') }}">{{ $user->readableTime() }}</td>
                        <td data-label="{{ __('role') }}"> {{ $user->role }} </td>
                        <td data-label="{{ __('statue') }}">{{ $user->presentStatue() }} </td>
                        <td data-labe="{{ __('edit') }}" class="text-center">
                            <a class="edit btn btn-success btn-block hidden-md hidden-lg hidden-sm" href="{{ route('manager.users.edit',['id' => $user->id]) }}">edit</a>
                            <ul class="icons-list hidden-xs">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="{{ route('manager.users.edit',['id' => $user->id]) }}" class="text-primary-600">
                                                <i class="icon-pencil7 position-left"></i>{{ __('Edit') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('manager.users.delete',['id'=> $user->id]) }}" class="text-danger-600">
                                                <i class="icon-cross2 position-left"></i>{{ __('Delete') }}
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
        <div>
            <center>{{ $users->links() }}</center>
        </div>

    </div>
</div>
</div>
</div>
</div>
@endif @endsection