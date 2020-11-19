 @extends('admin/layout') @section('title') {{ __('Slider') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-transparent">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-right6 position-left"></i>
              {{ __('Sliders') }}
              </h4>
            </div>

            <div class="heading-elements div_btn">
                <a href="{{ route('admin.slider.create')}}" class="btn bg-blue btn-labeled heading-btn btn_add"><b><i class="icon-plus3"></i></b>{{ __('add new slider') }} </a>
                <a href="javascript:;" data-toggle="modal" data-target="#slider_delete" class="btn bg-danger btn-labeled heading-btn btn_add"><b><i class="icon-trash"></i></b>   {{ __('Delete all Sliders ') }} </a>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.home') }}" title=""><i class="icon-home2 position-left"></i>
    {{ __('Home') }}
    </a></li>
                <li class="active" title="{{ __('Slider') }}">{{ __('Slider') }}</li>
            </ul>

        </div>

    </div>

    <!-- Content area -->
    <div class="content">
        @if ($sliders->isEmpty())

        <!-- empty state -->
        <div class="empty_state text-center">
            <i class="icon-library2 empty_state_icon"></i>
            <h4>{{ __("it looks like you didn't upload any sliders yet") }}</h4>
            <a href="{{ route('admin.slider.create')}}" class="btn bg-blue btn-labeled heading-btn showUploader2"><b>
    <i class="icon-plus3"></i></b> {{ __('Add new Slider') }} </a>
        </div>
        <!-- empty state -->

        @endif @if (!$sliders->isEmpty())

        <div class="panel panel-flat table-panel table-responsive ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><i class=" "></i><b>{{ __('#') }}</b></th>
                        <th><i class=" icon-image2"></i><b> {{ __('image') }}</b></th>
                        <th><i class=" icon-link"></i><b> {{ __('Link') }}</b></th>
                        <th><i class=" icon-calendar3"></i><b>{{ __('created at') }}</b></th>
                        <th><i class=" icon-pencil4"></i><b>{{ __('edit') }}</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                    <tr>
                        <td data-label="{{ __('#') }}"> {{ $slider->id }} </td>
                        <td data-label="{{ __('image') }}">
                            <div class="product-image-list">
                                {!! $slider->presentThumbnail() !!}
                            </div>

                        </td>
                        <td data-label="{{ __('link') }}"> {{ $slider->link }} </td>
                        <td data-label="{{ __('created at->diffForHumans()') }}"> {{ $slider->created_at }} </td>
                        <td data-label="{{ __('edit') }}"> <a class="edit btn btn-success btn-block hidden-md hidden-lg hidden-sm" href="{{ route('admin.slider.edit',['id' => $slider->id]) }}">edit</a>
                            <ul class="icons-list hidden-xs">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="{{ route('admin.slider.edit',['id' => $slider->id]) }}" class="text-primary-600">
                                                <i class="icon-pencil7 position-left"></i>{{ __('Edit') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.slider.delete',['id' => $slider->id]) }}" class="text-danger-600">
                                                <i class="icon-cross2 position-left"></i>{{ __('Delete') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.slider.duplicate',['id' => $slider->id]) }}" class="text-bg-info">
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

    </div>
</div>

</div>

</div>
@endif @endsection