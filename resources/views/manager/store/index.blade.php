@extends('manager/layout')

@section('title')
{{ __('Stores') }} 
@endsection
@section('content')
  
         
<!-- Main content -->

<!-- Page header -->
<div class="content-wrapper">
<div class="page-header page-header-default ">
<div class="page-header-content">

<div class="page-title">
<h1> <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>
{{ __('stores') }}
</span></h1>
</div>


<div class="heading-elements div_btn">
    <a href="{{ route('manager.stores.create') }}" class="btn bg-blue btn-labeled heading-btn btn_add"><b>
        <i class="icon-plus3"></i></b>{{ __('create Store') }}
    </a>
</div>


</div>
        <div class="breadcrumb-line">
<ul class="breadcrumb">
    <li><a href="" title=""><i class="icon-home2 position-left"></i>
    {{ __('Home') }}
    </a></li>
    <li class="active" title="{{ __('Stores') }}" >{{ __('Stores') }}</li>
</ul>
<ul class="breadcrumb-elements not-collapsible  ">
</ul>

</div>
</div>
<!-- /page header -->




<!-- Content area -->		

<div class="content">
<!-- empty state -->
 @if ($stores->isEmpty())
<div class="empty_state text-center">
    <i class="icon-library2 empty_state_icon"></i>
    <h4>{{ __("it looks like you didn't Add any stores yet") }}</h4>
    <a href="{{ route('manager.stores.create') }}" class="btn bg-blue btn-labeled heading-btn showUploader2"><b>
    <i class="icon-plus3"></i></b> {{ __('Add new Store') }} </a>
</div>
@endif
<!-- empty state -->


<!-- Search field -->
<div class="panel panel-flat" id="search_box" style="display : none;" >
    <div class="panel-heading">
        <h5 class="panel-title">{{ __('Search stores') }}</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a href="javascript:;" id="hide_search_box" ></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <form action="" method="get" class="main-search">
            {!! csrf_field() !!}
            <div class="input-group content-group">
                <div class="has-feedback has-feedback-left">
                    <input type="text" class="form-control input-xlg" id="input_form" value="" 
                    placeholder="{{ __('seach ') }}" name="search" />
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



 @if (!$stores->isEmpty())

<div class="panel panel-flat table-panel table-responsive ">
    <table class="table " >
        <thead>
            <tr>
                <th ><i class=" icon-blog"></i><b>{{ __('Thumbnail') }}</b></th>
                <th ><i class=" icon-user"></i><b>{{ __('Name') }}</b></th>
                <th ><i class=" icon-user"></i><b>{{ __('Owner') }}</b></th>
                <th ><i class=" icon-map5"></i><b>{{ __('Adresse') }}</b></th>
                <th ><i class="  icon-pencil7"></i><b>{{ __('Description') }}</b></th>
                <th ><i class="  icon-pencil7"></i><b>{{ __('Link') }}</b></th>
                <th class="text-center" ><i class=" icon-pencil4"></i><b>{{ __('edit') }}</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stores as $store)
        <tr>
    <td data-label="{{ __('logo') }}">
                    <div class="product-image-list"> 
                   {!! $store->presentThumbnail() !!}
                </div>
        
             </td>       
             <td data-label="{{ __('Name') }}">{{ $store->name }}</td>
             <td data-label="{{ __('Owner') }}">{{ $store->owner->name }}</td>
             <td data-label="{{ __('Adresse ') }}">{{ $store->street }}</td>
             <td data-label="{{ __('Description') }}"> {{ $store->description }} </td>
             <td data-label="{{ __('Description') }}"> <a href="/{{ $store->slug }}">{{ $store->slug }}</a> </td>
         
             <td data-labe="{{ __('edit') }}" class="text-center">
                 <a class="edit btn btn-success btn-block hidden-md hidden-lg hidden-sm"  href="{{ route('manager.stores.edit',['id' => $store->id]) }}">edit</a>
                    <ul class="icons-list hidden-xs">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                <li>
                <a href="{{ route('store.duplicate',['id' => $store->id]) }}" class="text-primary-600">
                <i class="icon-pencil7 position-left"></i>{{ __('duplicate') }} 
                </a>
                </li>
                <li>
                    <a href="{{ route('manager.users.edit',['id' => $store->user_id]) }}" class="text-primary-600">
                        <i class="icon-pencil7 position-left"></i>{{ __('Edit user') }}
                    </a>
                </li>
                <li>
                <a href="{{ route('manager.stores.edit',['id' => $store->id]) }}" class="text-primary-600">
                <i class="icon-pencil7 position-left"></i>{{ __('Store Edit') }} 
                </a>
                </li>
                <li>
                <a href="{{ route('manager.stores.delete',['id' => $store->id]) }}" class="text-danger-600">
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
@endif
<div><center>{{ $stores->links()  }}</center></div>
    </div>
</div>
</div>
</div>
</div>
@endsection
            
