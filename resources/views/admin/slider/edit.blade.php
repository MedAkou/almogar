 @extends('admin/layout') @section('title') {{ __('Slider Create') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-transparent">
        <div class="page-header-content">
            <div class="page-title">
                <h1><span class="text-semibold">{{ __('add new slider') }}</span></h1>
            </div>
        </div>
    </div>

    <!-- Content area -->
    <div class="content">

        <div class="panel panel-flat col-md-8">

            <form class="form-horizontal" enctype='multipart/form-data' method="post" action="{{ route('admin.slider.update',
['id'=> $content->id]) }}" /> {!! csrf_field() !!}
            <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>

            <div class="panel-body">
                <fieldset class="content-group">

                    <div class="form-group">
                        <label class="control-label col-lg-3"><i class=" icon-image2"></i> {{ __('slider image') }}</label>
                        <div class="col-lg-3">
                            <label for="avatarUploadPreview" class="btn btn-danger btn-rounded"><i class="icon-image2 position-left"></i>{{ __('choose image') }} </label>
                            <input name="image" id="avatarUploadPreview" accept="image/jpg, image/jpeg, image/png" style="visibility:hidden;" type="file" />
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3"><i class=" icon-link"></i> {{ __('slider link') }} </label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control rf" name="link" value="{{ $content->link }}">
                        </div>
                    </div>

                </fieldset>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{ __('add new slider') }}<i class="icon-arrow-left13 position-right"></i></button>
                </div>

            </div>
            </form>

        </div>

        <div class="col-md-4">
            @if($content->image)
            <div class="panel panel-flat">
                <div class="panel-heading"> {{ __(' Preview the Slider Image ') }}</div>
                <div class="panel-body">
                    <div class="slider-image">
                        {!! $content->presentThumbnail() !!}
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>

    @endsection