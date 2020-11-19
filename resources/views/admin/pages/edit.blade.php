@extends('admin/layout')
@section('title')
{{ __('Pages Create') }}
@endsection
@section('content')



    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">

                    <h1> <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>{{ __(' Create new page') }} </span></h1>
                </div>
            </div>
            <div class="breadcrumb-line">
                <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href="{{ route('admin.pages.home') }}" title="Home"><i class="icon-home2 position-left"></i>{{ __('Home') }}</a></li>
                    <li><a href="{{ route('admin.pages.home') }}" title="pages">{{ __('Pages') }}</a></li>
                    

                </ul>
            </div>
        </div>

        <!-- /page header -->


        <!-- Content area -->
        <div class="content">
            @include('manager/elements/form-messages')
            <div class="col-md-12">
                <form enctype="multipart/form-data" id="user_form" method='post' action="{{ route('admin.pages.update',['id'=> $content->id ]) }}">
                    @csrf
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">{{ __('page title') }}</label>
                        <input type="text" id="postitlte" class="form-control rf" name="title" placeholder="{{ __('page title') }}" value="{{ $content->title }}" />
                    </div>
                    <textarea name="content" id="posteditor">{{ $content->content }}</textarea>
                     <button style="margin-top:15px;" type="submit" class="btn btn-block btn-primary">
                        {{ __('Save Changes') }} 
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

