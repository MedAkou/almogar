 @extends('admin/layout') @section('title') {{ __('Edit User') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-default ">
        <div class="page-header-content">

            <div class="page-title">
                <h1> <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>
{{ __('edit account') }}</span></h1>
            </div>

            <div class="heading-elements">

            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="" title="home"><i class="icon-home2 position-left"></i>{{ __('home') }}</a></li>
                <li class="active"><a title="Members" href="">{{ __('Members') }}</a></li>
                <li class="active" title="create new user">{{ __('edit account') }}</li>
            </ul>

        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- تعديل البيانات الشخصية للمستخدم -->
        <div class="col-md-9">
            <form enctype="multipart/form-data" id="user_form" method='post' action="{{ route('admin.users.update',['id'=>$content->id]) }}">
                {!! csrf_field() !!}

                <!-- المعلومات الشخصية -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h5 class="panel-title">{{ __('edit user info') }}</h5>
                        <p>{{ __('all information are in safe hands') }}</p>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ __('username') }}:</label>
                                                <input type="text" class="form-control frequired" name="name" placeholder="name" value="{{ $content->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('email') }} </label>
                                                <input type="text" class="form-control frequired" value="{{ $content->email }}" name="email" placeholder="{{ __('Entre your Email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('phone') }} :</label>
                                                <input type="text" class="form-control" value="{{ $content->phone }}" name="phone" placeholder="{{ __('Telephone number') }}">
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <!--// المعلومات الشخصية -->

                <!-- كلمة المرور -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('edit password') }}</h3>
                        <p>{{ __('remember') }}</p>
                    </div>
                    <div class="panel-body">
                        <fieldset class="content-group">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Enter here the new password') }}" />
                                        <div class="input-group-btn">
                                            <button style='display:none;' type="button" onclick="tooglePassword()" class="btn btn-default"><i class="icon-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style='display:none;'>
                                <a onclick="password_generator()" class="btn btn-primary">{{ __('create strong password') }}</a>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <!--// كلمة المرور -->

                <!-- تحديث البيانات -->
                <div class="text-right">
                    <button type="submit" class="btn btn-block btn-primary">{{ __('Save Changes') }}<i class="icon-arrow-left13 position-right"></i></button>
                </div>
                <!--// تحديث البيانات -->
                <br>
                <div id="result"></div>

            </form>

        </div>
        <!--// تعديل البيانات الشخصية للمستخدم -->

        <div class="col-md-3">

            <div class="panel panel-white">
                <div class="panel-heading ">
                    <h6 class="panel-title">{{ __('account') }}</h6>
                </div>
                <div class="list-group no-border no-padding-top">
                    <a class="list-group-item text-indigo-400" href="{{ route('admin.users.block',['id'=>$content->id]) }}">
                        <i class="icon-user-cancel"></i> {{ __('block account') }}
                    </a>
                    <a class="list-group-item text-success" href="{{ route('admin.users.activate',['id'=>$content->id]) }}">
                        <i class="icon-user-check"></i> {{ __('activate account ') }}
                    </a>
                    <a class="list-group-item text-danger" href="{{ route('admin.users.delete',['id'=>$content->id]) }}">
                        <i class="icon-user-minus"></i> {{ __('delete account ') }}
                    </a>
                </div>
            </div>

            <div class="panel panel-white hidden">
                <div class="panel-heading">
                    <h6 class="panel-title">{{ __('Set user as:') }}  </h6>
                </div>

                <div class="panel-body">
                    <select style="width:100%;" class="role">
                        <option value="#">{{ __('Regular user') }} </option>
                        <option value="#">{{ __('Manager') }}</option>
                        <option value="#">{{ __('Responsible') }} </option>
                        <option value="#">{{ __('clerk') }} </option>
                        <option value="#">{{ __('supervisor') }} </option>
                    </select>
                </div>
            </div>

            <div class="panel panel-white hidden">
                <div class="panel-heading">
                    <h6 class="text-semibold panel-title">
{{ __('Download a copy of the information
') }}            </h6>
                </div>

                <div class="list-group no-border">
                    <a href="#" class="list-group-item">
                        <i class="icon-file-pdf"></i> {{ __('Download pdf') }}
                    </a>

                    <a href="#" class="list-group-item">
                        <i class="icon-file-excel"></i>{{ __('Download csv') }}
                    </a>
                </div>
            </div>

        </div>

    </div>
    <!-- /content area -->
    @endsection