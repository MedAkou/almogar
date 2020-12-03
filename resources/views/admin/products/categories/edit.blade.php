 @extends('admin/layout') @section('title') {{ __('Product Categories Edit') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-default ">
        <div class="page-header-content">

            <div class="page-title">
                <h1> <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>{{ __('create Product Categories') }}</span></h1>
            </div>

            <div class="heading-elements">

            </div>
        </div>

    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <div class="col-md-12">
            <div class="panel panel-flat col-md-12">
                <div class="panel-body">

                    <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.products.categories.update',['id'=>$content->id]) }}" method='POST' action="" autocomplete="off">
                        {!! csrf_field() !!}
                        <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>
                                            
                                 @php
                                    $langs = \System::$LANGS_NAME;
                                @endphp

            


            <div class="panel-body">
                <div class="tabbable tab-content-bordered">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        @foreach($langs as $key  => $lang)
                           <li @if ($loop->first) class="active" @endif >
                            <a href="#bordered-{{ $key }}" data-toggle="tab">{{ $lang }}</a></li>
                        @endforeach
                      
                    </ul>

                    <div class="tab-content">
                        @foreach($langs as $key  => $lang)
                        <div class="tab-pane has-padding @if ($loop->first) active @endif "  id="bordered-{{ $key }}">

                        <fieldset class="content-group">

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('name') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control rf " name="name_{{ $key }}" placeholder="{{ __('name') }}" value="{{ $content->getTranslation('name', $key) }}">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>
                            @if($key == "de")
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('link') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control rf " name="link" placeholder="{{ __('link') }}" value="{{ $content->slug }}">
                                        <span class="input-group-addon"><i class="icon-link"></i></span>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('image') }}</label>
                                <div class="col-lg-10">
                                    <input type="file" name="image" id="image" style="display: none;">
                                    <label class="btn btn-danger btn-rounded" for='image'> <i class="icon-image2 position-left"></i> {{ __('image') }}</label>
                                </div>
                            </div>
                            @endif

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Changes') }}
                                    <i class="icon-arrow-left13 position-right"></i>
                                </button>
                            </div>
                        </fieldset>  
                        </div>
                         @endforeach
                                              
                    </div>
                </div>
            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection