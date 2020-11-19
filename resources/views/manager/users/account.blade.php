
@extends('manager/layout')

@section('title')
{{ __('Account User') }}
@endsection
@section('content')

        
<!-- Main content -->
<div class="content-wrapper">
                

                <!-- Page header -->
                <div class="page-header page-header-transparent">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h1><span class="text-semibold">{{ __('account settings') }}</span></h1>
                            <p class="text-muted">{{ __('* this account is undeletable') }}</p>
                        </div>

                        <div class="heading-elements">
                            
                        </div>
                    </div>
                </div>
                <!-- /page header -->
<!-- Content area -->
<div class="content">
                

 <div class="col-md-8">
                <div class="panel panel-flat col-md-12">
                    <div class="panel-heading no-padding-bottom">
                        <h3 class="panel-title">{{ __('settings') }}</h3>
                        <p class="no-margin-bottom">{{ __('please insert info carefelly') }}</p>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post"  action="{{ route('manager.account.info.update') }}">
                            {!! csrf_field() !!}
                            <fieldset class="content-group">
                                <legend class="text-bold"></legend>
                                <div class="form-group">
                                    <label class="control-label col-lg-3">{{ __('username') }}</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" value='{{ Auth::user()->name }}' name="username" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-3">{{ __('email') }} </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" value='{{ Auth::user()->email }}' name="email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="validate" value='validate_my_settings' />
                                    <button type="submit" class="btn btn-primary btn-block active no-marin-bottom">{{ __('edit informations') }}</button>
                                </div>
                            </fieldset>
                        </form>
                        <div id="result"></div>
                    </div>
                </div>
                      

                <div class="panel panel-flat col-md-12">
                    <div class="panel-heading no-padding-bottom">
                        <h3 class="panel-title">{{ __('password') }}</h3>
                        <p class="no-margin-bottom">{{ __('please chose a good') }} &amp; {{ __('strong password') }}</p>
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal" id="AdminPasswords" method="post" action="{{ route('manager.account.password.update') }}">
                            {!! csrf_field() !!}
                            <fieldset class="content-group">
                                <legend class="text-bold"></legend>
                                <div class="form-group">
                                    <label class="control-label col-lg-3">{{ __('current password') }}</label>
                                    <div class="col-lg-9">
                                        <input type="password" class="form-control"  name="old_pass" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-3">{{ __('new password') }}</label>
                                    <div class="col-lg-9">
                                        <input type="password" class="form-control" id="new_pass"  name="new_pass" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-3">{{ __('repeat new password') }}</label>
                                    <div class="col-lg-9"> 
                                        <input type="password" class="form-control" id='new_pass_re' name="new_pass_re" />
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block active" value='{{ __('edit password') }}' />
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                
                
                </div>
                
<div class="col-md-4">
                        <div class="sidebar-default sidebar-separate">
                            <div class="sidebar-content">

                                <!-- User details -->
                                <div class="content-group">
                                    <div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-size: contain;">
                                        
                                        @if(!empty(Auth::user()->avatar))
                                        <a href="#" class="display-inline-block content-group-sm">
                                            <img src="/upload/{{ Auth::user()->avatar }}" class="img-circle img-responsive" style="width: 110px; height: 110px;">
                                        </a>
                                        @endif




                                        <div class="content-group-sm">
                                            <h1 class="text-semibold no-margin-bottom" >
                                               {{ Auth::user()->name }}
                                            </h1>
                                            <h6>{{ __('site admin ') }}</h6>

                                        </div>
                                        
                                    </div>

                                    <div class="panel no-border-top no-border-radius-top">
                                    <table class="table">
                                        <tr>
                                            <td>{{ __('email') }}</td>
                                            <td>{{ Auth::user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('created at') }}</td>
                                            <td>{{ Auth::user()->created_at->diffForHumans() }}</td>
                                        </tr>   
                                        <tr>
                                            <td>{{ __('country') }}</td>
                                            <td>{{ __('MA') }}</td>
                                        </tr>       
                                        <tr>
                                            <td colspan="2" class="text-center"><a href="{{ route('logout') }}"><i class="icon-switch2"></i> {{ __('logout') }}</a></td>
                                        </tr>                                                                                                           
                                    </table>
                                    
                                
                                    </div>
                                </div>
                                <!-- /user details -->


                
                            </div>
                        </div>
<!--                    </div>-->
</div>               
                
                
                
    </div>
        </div>

            
        </div>
        
    </div>
@endsection