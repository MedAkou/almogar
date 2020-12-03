 @extends('manager/layout') @section('title') {{ __(' ads edit') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-transparent">
        <div class="page-header-content">
            <div class="page-title">
                <h1><span class="text-semibold">{{ __('Ads edit ') }}</span></h1>
            </div>
        </div>
    </div>

    <!-- Content area -->
    <div class="content">

        <div class="panel panel-flat col-md-8">

            <div class="panel-body">
                <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>
                <form class="form-horizontal" enctype='multipart/form-data' method="post" action="{{ route('manager.ads.update',['id'=>$content->id]) }}" /> {!! csrf_field() !!}

                <fieldset class="content-group">

                    <div class="form-group switechers">
                        <label class="control-label col-lg-3">{{ __('activate ad') }}</label>
                        <div class="col-lg-9">
                            <label class="adminswitch">
                                <input name='active' type="checkbox" value="active" {{$content->statue?'checked':''}}/>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('ad title') }}</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control rf" name="name" value="{{ $content->name }}" />
                            <p class="text-muted">{{ __('title , is not important , but it is good for you to reconize ads . .') }}</p>
                        </div>
                    </div>

                    <div class="tie-option-pre-label">{{ __('ad image') }}</div>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('ad image') }}</label>
                        <div class="col-lg-3">
                            <label for="avatarUploadPreview" class="btn btn-danger btn-rounded"><i class="icon-image2 position-left"></i> {{ __(' chose image ') }}</label>
                            <input name="image" id="avatarUploadPreview" accept="image/jpg, image/jpeg, image/png" style="visibility:hidden;" type="file" value="" />
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('ad link') }}</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control rf" name="link" value="{{ $content->url }}" />
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('ads script here') }}
                        </label>
                        <div class="col-lg-9">
                            <textarea name="codehtml" class="form-control" rows="8">{{ $content->htmlcode }}</textarea>
                        </div>
                    </div>

                </fieldset>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary" id="Submit_AD_ADS_FORM">{{ __('create ad') }}<i class="icon-arrow-left13 position-right"></i></button>
                </div>

            </div>
            <div id="submitResult"></div>

        </div>

        <div class="col-md-4">
            @if($content->image)
            <div class="panel panel-flat">
                <div class="panel-heading"> {{ __(' Preview the ads Image ') }}</div>
                <div class="panel-body">
                    <div class="slider-image">
                        {!! $content->PresentImage() !!}
                    </div>
                </div>
            </div>
            @endif

            <div class="panel panel-white div_rtl">
                <div class="panel-heading">
                    <h6 class="panel-title">{{ __(' ads area') }} </h6>
                </div>

                <div class="panel-body div_rtl">
                    <select name="area" style="width:100%;" class='form-control'>
                        <option value="not_speci">{{ __('Not specified yet') }}</option>
                        <option value="under_slider">{{ __('under slider') }}</option>
                        <option value="under_stores">{{ __('under stores') }}</option>
                    </select>
                </div>
            </div>
            </form>

            <div class="panel panel-flat" style="display:none;" id="ads-show">
                <div class="panel-heading">
                    {{ __(' preview ad') }}
                    <div class="heading-elements">

                        <ul class="icons-list">
                            <li style="display:none" id='delete-ad'><a onclick="clean()"><i class="icon-cross2 position-right" ></i>{{ __(' delete image') }}  </a></li>
                        </ul>

                    </div>

                </div>
                <div class="panel-body">

                    <div class="row">
                        <center>
                            <div class="ads-preview"><img id='profile_avatar' src="" /></div>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

@endsection