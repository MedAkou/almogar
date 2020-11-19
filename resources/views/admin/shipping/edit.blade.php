 @extends('admin/layout') @section('title') {{ __('Shipping Create ') }} @endsection @section('content')

<!-- Content area -->
<div class="content">

    <!-- Page header -->
    <div class="page-header page-header-transparent">
        <div class="page-header-content">
            <div class="page-title">
                <h1> <span class="text-semibold"> {{ __('Add a new shipping method') }}</span></h1>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>

    <form action="{{ route('admin.shipping.update',['id'=>$content->id]) }}" method="post" class="form-horizontal">
        {!! csrf_field() !!}

        <div class="col-md-8">
            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ __('Title') }}</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value='{{ $content->name }}' placeholder="{{ __('Shipping method address') }}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span>{{ __('Shipping value') }}</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="cost" value='{{ $content->cost }}' placeholder="{{ __('Shipping method value') }}  " class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span>{{ __('The number of shipping days') }}</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="delivery_days" value='{{ $content->delivery_days }}' placeholder="{{ __('The number of shipping days') }} " class="form-control">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <button type="submit" class="btn btn-block btn-primary">
                {{ __('Save Changes') }} </button>

           
            <br>

        </div>
    </form>

</div>
<!-- /content area -->

@endsection