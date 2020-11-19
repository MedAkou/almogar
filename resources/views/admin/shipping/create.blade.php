 @extends('admin/layout') @section('title') {{ __('Shipping Create') }} @endsection @section('content')





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

   
    @include('manager/elements/form-messages')

    <form action="{{ route('admin.shipping.store') }}" method="post" class="form-horizontal">
        {!! csrf_field() !!}

        <div class="col-md-8">

            <div class="panel panel-default">

                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ __('Title') }}</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{ old('name') }}" name="name" placeholder="{{ __('Shipping method address') }}" class="form-control rf">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span>{{ __('number of days') }}</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="delivery_days" value="" placeholder="{{ __('The number of shipping days') }}" class="form-control rf">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><span> {{ __('price') }}</span></label>
                        <div class="col-sm-9">
                            <input type="number"  value="{{ old('cost') }}"  name="cost" value="" placeholder="{{ __('Shipping method value') }} " class="form-control rf">
                        </div>
                    </div>

                    
            <button type="submit" class="btn btn-block btn-primary">
                {{ __('Add shipping method') }}<i class="icon-arrow-left13 position-right"></i></button>

                </div>
            </div>
        </div>

        
    </form>

</div>
<!-- /content area -->

@endsection