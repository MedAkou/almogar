@extends('admin/layout') @section('title') {{ __('overview') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <!-- header -->
        <div class="panel panel-flat">
            <div class="panel-heading">

                <h2 class="panel-title first_title">{{ __('welcome to control panel! ') }} <br><small>{{ __('we collected some links for you to help you start:') }}</small></h2>
            </div>
            <div class="panel-body first_div">
                <ul class="col-md-6 list list-icons" style="display: none;">
                    <h4>{{ __('firsts steps !') }}</h4>
                    <li>
                        <a href="/dashboard/posts/create/"><i class="icon-plus3"></i> {{ __('write your first article') }}</a>
                    </li>
                    <li><a href="/dashboard/pages/create/"><i class="icon-plus3"></i> {{ __('create the new page') }}</a></li>
                </ul>
                <ul class='col-md-6 list list-icons'>
                    <h4>{{ __('more !') }}</h4>
                    <li><a href="{{ route('admin.settings.home') }}"><i class="icon-gear"></i>{{ __('site settings ') }}</a> </li>
                    <li><a href="{{ route('admin.account') }}"><i class="icon-comment-discussion"></i> {{ __('account settings ') }} </a> </li>
                </ul>
            </div>
        </div>
        <!--// header -->

        <!-- statistiques -->
        <div class="row">
            
                <div class="col-sm-6 col-md-3">
                    <div class="panel panel-body bg-blue-400 has-bg-image">
                        <div class="media no-margin">
                            <div class="media-body">
                                <h3 class="no-margin">{{ $products }}</h3>
                                <span class="text-uppercase text-size-mini"> {{ __('products total') }} </span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-basket icon-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            
            
                <div class="col-sm-6 col-md-3">
                    <div class="panel panel-body bg-danger-400 has-bg-image">
                        <div class="media no-margin">
                            <div class="media-body">
                                <h3 class="no-margin">{{ $orders }}</h3>
                                <span class="text-uppercase text-size-mini">{{ __('Total requests') }}</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-file-empty2 icon-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            
            
                <div class="col-sm-6 col-md-3">
                    <div class="panel panel-body bg-success-400 has-bg-image">
                        <div class="media no-margin">
                            <div class="media-body text-left">
                                <h3 class="no-margin">{{ $sales }}</h3>
                                <span class="text-uppercase text-size-mini">{{ __('Total sales') }}</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-users2 icon-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            
            
                <div class="col-sm-6 col-md-3">
                    <div class="panel panel-body bg-indigo-400 has-bg-image">
                        <div class="media no-margin">
                            <div class="media-body text-left">
                                <h3 class="no-margin">{{ $pending }}</h3>
                                <span class="text-uppercase text-size-mini">{{ __('Pending requests') }}</span>
                            </div>
                            <div class="media-right media-middle">
                                <i class="icon-envelop2 icon-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
        <!--// statistiques -->

        <!-- social media statistiques -->
        <div class="row" id="wrapper" style="display: none">
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body panel-body-accent">
                    <div class="media no-margin">
                        <div class="media-left media-middle">
                            <i class="icon-facebook2 icon-3x" style="color:#3B5998;"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="no-margin text-semibold item facebook"><span class="count">2020</span></h3>
                            <span class="text-uppercase text-size-mini text-muted">{{ __('likes') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body">
                    <div class="media no-margin">
                        <div class="media-left media-middle">
                            <i class="icon-twitter icon-3x" style="color:#1DA1F2;"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="no-margin text-semibold item twitter"><span class="count"></span></h3>
                            <span class="text-uppercase text-size-mini text-muted">{{ __('subscriber') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body">
                    <div class="media no-margin">
                        <div class="media-body">
                            <h3 class="no-margin text-semibold item youtube"><span class="count"></span></h3>
                            <span class="text-uppercase text-size-mini text-muted">{{ __('subscriber') }}</span>
                        </div>

                        <div class="media-right media-middle" style="color:#c4302b;">
                            <i class="icon-youtube3 icon-3x"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body">
                    <div class="media no-margin">
                        <div class="media-body ">
                            <h3 class="no-margin text-semibold item instagram"><span class="count"></span></h3>
                            <span class="text-uppercase text-size-mini text-muted">{{ __('follower') }}</span>
                        </div>
                        <div class="media-right media-middle" style="color:#8a3ab9;">
                            <i class="icon-instagram icon-3x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// social media statistiques -->

    </div>
</div>

</div>

</div>

</div>

</div>
</div>
@endsection