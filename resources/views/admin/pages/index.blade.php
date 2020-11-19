
@extends('admin/layout')

@section('title')
{{ __('Pages') }} 
@endsection
@section('content')


<!-- Main content -->
<div class="content-wrapper">



<!-- page header -->
<div class="page-header page-header-default ">
    <div class="page-header-content">
    <div class="page-title">
       
        <h1>
        <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>
        {{ __('pages') }}
        </span>
        </h1><a class="heading-elements-toggle"><i class="icon-more"></i></a>
        </div>
       
       
        <div class="heading-elements div_btn">
             <a href="{{ route('admin.pages.create') }}" class="btn bg-blue btn-labeled heading-btn btn_add"><b>
            <i class="icon-plus3"></i></b> {{ __('new page') }}</a>
            
             <a href="javascript:void(0);" data-toggle="modal" data-target="#page_delete" class="hidden btn bg-danger btn-labeled heading-btn btn_add"><b><i class="icon-trash"></i></b> 
                {{ __('delete all pages') }}
             </a>
        </div>
    </div>

        <div class="breadcrumb-line">
<ul class="breadcrumb">
    <li><a href="{{ route('admin.home') }}" title=""><i class="icon-home2 position-left"></i>
    {{ __('Home') }}
    </a></li>
    <li class="active" title="{{ __('Pages') }}" >{{ __('Pages') }}</li>
</ul>
<ul class="breadcrumb-elements not-collapsible  ">

</ul>

</div>
    </div>

<!-- page header -->


<!-- Content area -->
<div class="content">
                
 
    @if ($pages->isEmpty())
      <div class="empty_state text-center">
                
            <i class="icon-pencil6 empty_state_icon"></i>
        <h4> {{ __('hello, you dont have any pages yet, create one') }}
        </h4>
        <a href="{{ route('admin.pages.create') }}" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-plus3"></i></b>
        
{{ __('create new page') }}
        </a>
        </div>

    @endif
			
 
<div class="panel panel-flat" id="search_box" style="display : none;" >
    <div class="panel-heading">
        <h5 class="panel-title">{{ __('Search Pages') }}</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a href="javascript:;" id="hide_search_box" ></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <form action="{{ route('admin.pages.home') }}" method="get" class="main-search">
            {!! csrf_field() !!}
            <div class="input-group content-group">
                <div class="has-feedback has-feedback-left">
                    <input type="text" class="form-control input-xlg" value="{{ __('search') }}" 
                    placeholder="{{ __('seach for users by email / username') }}" name="search" />
                    <div class="form-control-feedback">
                        <i class="icon-search4 text-muted text-size-base"></i>
                    </div>
                </div>

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-xlg">{{ __('search') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>






@if ( !$pages->isEmpty())
<div class="panel panel-flat table-panel table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th><i class=" icon-pencil5"></i><b>{{ __('page title') }}</b></th>
                    <th><i class=" icon-calendar3"></i><b>{{ __('created at') }}</b></th>
                    <th><i class=" icon-pencil4"></i><b>{{ __('edit') }}</b></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pages as $page)
            <tr>
                <td>
                @empty ($page->title)
                        page without title
                @else
                       {{ $page->title }}
                @endempty
                          
               </td>
                <td>{{ $page->created_at}}</td>
                <td><a href="{{ route('admin.pages.edit', [ 'id' => $page->id ]) }}"></a>
                <a class="edit btn btn-success btn-block hidden-md hidden-lg hidden-sm"  href="{{ route('admin.pages.edit',['id' => $page->id]) }}">edit</a>
                <ul class="icons-list hidden-xs">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    
                    <a target="_blank" href="{{ route('page.view',['page' => $page->slug , 'store' => \Auth::user()->store->slug ]) }}" class="text-success-600">
                        <i class="icon-eye position-left"></i>{{ __('View') }}
                    </a>

                </li>
                <li>
                <a href="{{ route('admin.pages.edit',['id' => $page->id]) }}" class="text-primary-600">
                <i class="icon-pencil7 position-left"></i>{{ __('Edit') }} 
                </a>
                </li>
                <li>
                <a href="{{ route('admin.pages.delete',['id' => $page->id]) }}" class="text-danger-600">
                <i class="icon-cross2 position-left"></i>{{ __('Delete') }}
                </a>
                </li>
                <li>
                <a href="{{ route('admin.pages.duplicate',['id' => $page->id]) }}" class="text-bg-info">
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
              {{ $pages->links() }}
            </div>
</div>


</div>
   @endif





@endsection