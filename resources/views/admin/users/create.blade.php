 @extends('admin/layout') @section('title') {{ __('User Create') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-default ">
        <div class="page-header-content">

            <div class="page-title">
                <h1> <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>{{ __('create user') }}</span></h1>
            </div>

            <div class="heading-elements">

            </div>
        </div>

    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <div class="col-md-12">
            @include('manager/elements/form-messages')
            
            <div class="panel panel-flat col-md-12">
                <div class="panel-body">

                    <form class="form-horizontal" action="{{ route('admin.users.store') }}" method='POST' action="" autocomplete="off">
                        {!! csrf_field() !!}
                        <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>
                        <fieldset class="content-group">
                            <legend class="text-bold">{{ __('* ALL FIELDS ARE REQUIRED , PLEASE FILL THEM ALL ') }}</legend>
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('name') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input  required="" type="text" class="form-control rf " name="name" placeholder="{{ __('name') }}" value="{{ old('name') }}">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('Phone') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input required="" type="number" class="form-control rf " name="phone" placeholder="{{ __('phone') }}" value="{{ old('phone') }}">
                                        <span class="input-group-addon"><i class="icon-phone2"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('email') }}</label>
                                <div class="col-lg-10">

                                    <div class="input-group">
                                        <input required="" type="email" class="form-control rf" value="{{ old('email') }}" name="email" placeholder="{{ __('email') }}">
                                        <span class="input-group-addon"><i class="icon-envelope"></i></span>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('password') }}</label>
                                <div class="col-lg-10">

                                    <div class="input-group">
                                        <input required="" type="password" value="" class="form-control rf" name="password" id="password" placeholder="{{ __('password') }}">

                                        <span class="input-group-addon"><i class="icon-lock2"></i></span>
                                    </div>

                                </div>

                            </div>

                        </fieldset>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ __('create new user') }}
                                <i class="icon-arrow-left13 position-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection