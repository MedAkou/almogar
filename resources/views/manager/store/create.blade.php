 @extends('manager/layout') @section('title') {{ __('Store Create') }} @endsection @section('content')

<!-- Main content -->
<div class="content-wrapper">
    <!-- Page header -->
    <div class="page-header page-header-default ">
        <div class="page-header-content">

            <div class="page-title">
                <h1> <span class="text-semibold"><i class="icon-arrow-right6 position-left goback"></i>{{ __('create Store') }}</span></h1>
            </div>

            <div class="heading-elements">

            </div>
        </div>

    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        @include('manager/elements/form-messages')
        
        <form class="form-horizontal" action="{{ route('manager.stores.store') }}" method='POST' action="" autocomplete="off" enctype="multipart/form-data" >
            {!! csrf_field() !!}

            <div class="col-md-6">
                <div class="panel panel-flat col-md-12">
                    <div class="panel-body">

                        <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>
                        <fieldset class="content-group">
                            <h1>{{ __('store info') }}</h1>
                            <hr>
                            <br>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('name') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control rf " value="{{ old('storename') }}" name="storename" placeholder="{{ __('name') }}" value="">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('url') }}</label>
                                <div class="hidden">
                                    {{ __('example :  ') }} {{ route('base') }}
                                </div>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control rf" value="{{ old('url') }}" name="url" placeholder="{{ __('url') }}" value="">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('street') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" value="{{ old('street') }}" class="form-control rf " name="street" placeholder="{{ __('street') }}" value="">
                                        <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('postal code') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                        <input type="text" value="{{ old('postalcode') }}" class="form-control rf" value="" name="postalcode" placeholder="{{ __('postal code') }}">
                                        <span class="input-group-addon"><i class="icon-map5"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('description') }}</label>
                                <div class="col-lg-10">
                                    
                                <textarea class="form-control" placeholder="{{ __('description') }}" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                                        
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('thumbnail') }}</label>
                                <div class="col-lg-10">

                                    <div class="input-group">
                                        <input type="file" class="form-control rf"  name="thumbnail" placeholder="{{ __('thumbnail') }}">
                                        <span class="input-group-addon"><i class="icon-blog"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div id='map_canvas'></div>
                                <div id="current"></div>
                            </div>


                            <input type="hidden" name="latitude" id="latitude"  /> 
                            <input type="hidden" name="longitude" id="longitude"  /> 




                        </fieldset>
                       

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-flat col-md-12">
                    <div class="panel-body">

                        <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>
                        <fieldset class="content-group">
                            <h1>{{ __('store owner info') }}</h1>
                            <hr>
                            <br>
                              <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('name') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                     <input type="text" class="form-control rf " value="{{ old('name') }}" name="name" placeholder="{{ __('name') }}" value=""  >
                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                    </div>
                                 </div>
                            </div>

                                  <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('Phone') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-group">
                                     <input type="number" value="{{ old('phone') }}"  class="form-control rf " name="phone" placeholder="{{ __('phone') }}" value=""  >
                                    <span class="input-group-addon"><i class="icon-phone2"></i></span>
                                    </div>
                                 </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('email') }}</label>
                                <div class="col-lg-10">
                                   
                                   
                                  <div class="input-group">
     <input type="email" class="form-control rf" name="email"  value="{{ old('email') }}"   placeholder="{{ __('email') }}" >
    <span class="input-group-addon"><i class="icon-envelope"></i></span>
</div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">{{ __('password') }}</label>
                                <div class="col-lg-10">
                                   
                                   
                                 
                                                    
                                  <div class="input-group">
     <input type="password"  class="form-control rf" name="password" id="password" placeholder="{{ __('password') }}" > 
   
    <span class="input-group-addon"><i class="icon-lock2"></i></span>
</div>
                                   
                   
                                  
                                </div>
                                
                            </div>

                        </fieldset>
                      

                    </div>
                </div>
            </div>



  <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ __('create new Store') }}
                                <i class="icon-arrow-left13 position-right"></i>
                            </button>
                        </div>



        </form>

    </div>
</div>
@endsection