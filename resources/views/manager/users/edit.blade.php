 @extends('manager/layout') @section('title') {{ __('Edit User') }} @endsection @section('content')


<div class="content-wrapper">
  
    <div class="page-header page-header-default ">
        <div class="page-header-content">

            <div class="page-title">
                <h1> 
                    <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>
                    {{ __('edit account') }}
                    </span>
                </h1>
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

    <div class="content">

        <div class="col-md-9">
            <form enctype="multipart/form-data" id="user_form" method='post' action="{{ route('manager.users.update',['id'=>$content->id]) }}">
                {!! csrf_field() !!}
                <input type="hidden" id='avatarChanged' name="avatarChanged" value="false" />
                <input type="hidden" name="validate" value="update-general-user-info" />

               

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
                                                <input required="" type="text" class="form-control frequired" name="name" placeholder="name" value="{{ $content->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('email') }} </label>
                                                <input required="" type="text" class="form-control frequired" value="{{ $content->email }}" name="email" placeholder="{{ __('Entre your Email') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{ __('phone') }} :</label>
                                                <input required="" type="text" class="form-control" value="{{ $content->phone }}" name="phone" placeholder="{{ __('Telephone number') }}">
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('edit password') }}</h3>
                        
                    </div>
                    <div class="panel-body">
                        <fieldset class="content-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                  
                                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('Enter here the new password') }}" />
                                    
                                 
                                </div>

                                   <div class="form-group">
                                  
                                        <input type="password" class="form-control" id="password" name="repassword" placeholder="{{ __('Enter here the new password') }}" />
                                    
                                 
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
                    <a class="list-group-item text-indigo-400" href="{{ route('manager.users.block',['id'=>$content->id]) }}">
                        <i class="icon-user-cancel"></i> {{ __('block account') }}
                    </a>
                    <a class="list-group-item text-success" href="{{ route('manager.users.activate',['id'=>$content->id]) }}">
                        <i class="icon-user-check"></i> {{ __('activate account ') }}
                    </a>
                    <a class="list-group-item text-danger" href="{{ route('manager.users.delete',['id'=>$content->id]) }}">
                        <i class="icon-user-minus"></i> {{ __('delete account ') }}
                    </a>
                </div>
            </div>

            

        </div>

    </div>
    <!-- /content area -->
    @endsection