@extends('manager/layout')
@section('title')
{{ __('overview') }}
@endsection
@section('content')


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
        <ul class="col-md-6 list list-icons">
            <h4>{{ __('firsts steps !') }}</h4>
            <li>
            <a href="{{ route('manager.stores.create') }}"><i class="icon-plus3"></i> {{ __('write your first store') }}</a>
            </li>
            <li><a href="{{ route('manager.ads.create') }}"><i class="icon-plus3"></i> {{ __('create the new ads') }}</a></li>
        </ul>
        <ul class='col-md-6 list list-icons'>
            <h4>{{ __('more !') }}</h4>
            <li><a href="{{ route('manager.settings') }}"><i class="icon-gear"></i>{{ __('site settings ') }}</a> </li>
            <li><a href="{{ route('manager.account') }}"><i class="icon-comment-discussion"></i> {{ __('account settings ') }} </a> </li>
        </ul>                                   
    </div>
</div>          
<!--// header -->



<!-- statistiques -->
<div class="row">
        <a href="{{ route('manager.orders.home') }}">
        <div class="col-sm-6 col-md-3">
            <div class="panel panel-body bg-blue-400 has-bg-image">
                <div class="media no-margin">
                    <div class="media-body">
                        <h3 class="no-margin">{{ $orders }}</h3>
                        <span class="text-uppercase text-size-mini"> {{ __('orders total') }} </span>
                    </div>
                    <div class="media-right media-middle">
                        <i class="icon-basket icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>
        </a>


        <a href="{{ route('manager.stores.home') }}">
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body bg-danger-400 has-bg-image">
                    <div class="media no-margin">
                        <div class="media-body">
                            <h3 class="no-margin">{{ $stores }}</h3>
                            <span class="text-uppercase text-size-mini">{{ __('stores total') }}</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-file-empty2 icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>


        <a href="{{ route('manager.users.home') }}">
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body bg-success-400 has-bg-image">
                    <div class="media no-margin">
                    <div class="media-body text-left">
                            <h3 class="no-margin">{{ $users }}</h3>
                            <span class="text-uppercase text-size-mini">{{ __('users total') }}</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class="icon-users2 icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>



        <a href="{{ route('manager.ads.home') }}">
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-body bg-indigo-400 has-bg-image">
                    <div class="media no-margin">
                        <div class="media-body text-left">
                            <h3 class="no-margin">{{ $ads }}</h3>
                            <span class="text-uppercase text-size-mini">{{ __('ads total') }}</span>
                        </div>
                        <div class="media-right media-middle">
                            <i class=" icon-enlarge6 icon-3x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
</div>
<!--// statistiques -->



</div>
</div>
        
        </div>
        
    </div>
    
    

</div>     



</div>
</div>
@endsection
