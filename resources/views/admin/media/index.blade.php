
@extends('admin/layout')

@section('title')
{{ __('Media') }}
@endsection
@section('content')

   
<!-- Main content -->
<div class="content-wrapper">





<!-- Page header -->
<div class="page-header page-header-transparent">
    <div class="page-header-content">
        <div class="page-title">
            <h1><i class="icon-arrow-right6 position-left goback"></i> <span class="text-semibold">
              {{ __('Media') }}
            </span></h1>
        </div>
        <div class="heading-elements div_btn">
           
            <a href="javascript:void(0);" class="btn bg-blue btn-labeled heading-btn showUploader btn_add"><b>
            <i class="icon-plus3"></i></b> {{ __('upload new file') }}</a>
            <a href="javascript:void(0);"  data-toggle="modal" data-target="#media_delete" class="btn bg-danger btn-labeled heading-btn btn_add">
            <b><i class="icon-trash"></i></b> {{ __('delete all media') }} </a>

        </div>
    </div>

        <div class="breadcrumb-line">
<ul class="breadcrumb">
    <li><a href="{{ route('admin.home') }}" title=""><i class="icon-home2 position-left"></i>
    {{ __('Home') }}
    </a></li>
    <li class="active" title="{{ __('Media') }}" >{{ __('Media') }}</li>
</ul>
<ul class="breadcrumb-elements not-collapsible  ">
</ul>

</div>

</div>
<!-- /page header -->




@if ($media->isEmpty())
<!-- empty state -->
<div class="empty_state text-center">
    <i class="icon-library2 empty_state_icon"></i>
    <h4>{{ __("empty.media") }}</h4>
    <a href="javascript:void(0);" class="btn bg-blue btn-labeled heading-btn showUploader"><b>
            <i class="icon-plus3"></i></b> {{ __('upload new file') }}</a>
</div>
<!-- empty state -->
@endif



<!-- File Uploader -->
<div class="container uploader_section" style='display: none'>
    <div class="row">
        <form method="POST" id="uploader" action="{{ route('admin.media.upload') }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
           <center>
            <div id="submitResult"></div>
            <input type="file" name="media_file" class='uploader_input' />
            <input type="submit" class="btn btn-primary" value="{{ __('upload') }}" />
            </center>
        </form>
    </div>
</div>
<!--// File Uploader -->


<!-- Media table -->
<div class="content">
  @if (!$media->isEmpty())

<div id='media_table' class="panel panel-flat table-responsive style="margin-top:35px;" >
    <table class="table ">
        <thead>
            <tr>
                <th ><i class="icon-grid52 "></i><b>{{ __('type file') }}</b></th>
                <th ><i class="  icon-folder-upload2"></i><b>{{ __('uploaded at') }}</b></th>
                <th ><i class="  icon-arrow-resize8"></i><b>{{ __('file size') }}</b></th>
                <th ><i class="  icon-link"></i><b>{{ __('direct link') }}</b></th>
                <th ><i class="  icon-trash"></i><b>{{ __('delete') }}</b></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($media as $file)
          <tr id='media-{{ $file->id }}'>
             <td data-label="{{ __('type file') }}">{{ $file->post_mime_type  }}</td>
             <td data-label="{{ __('uploaded at') }}"> {{ $file->created_at->diffForHumans()  }}</td>
             <td data-label="{{ __('file size') }}">{{ $file->size  }} </td>
             <td data-label="{{ __('direct link') }}"> <a target="_blanck" href="{{ url('uploads/media/'.$file->name) }}" title='download'> {{ __('download') }} </a></td>
             <td data-label="{{ __('delete') }}"> <a data-media-id='{{ $file->id }}' class="media_delete text-danger" href="javascript:;"> <i class="  icon-trash"></i>   {{ __('delete') }}</a> </td>
          </tr>
          @endforeach

        </tbody>
        </table>
</div>
<div class="pagination-wrapper">
    {{ $media->links() }}
</div>
</div>
</div>
@endif
@endsection
