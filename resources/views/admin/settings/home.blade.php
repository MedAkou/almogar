@extends('admin/layout') 
 @section('content')  


@section('title')
    {{ __('settings') }}
@endsection

<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-transparent hidden">
    <div class="page-header-content">
        <div class="page-title">
  <h1><i class="icon-arrow-right6 position-left goback"></i> <span class="text-semibold">
                
            </span></h1>        </div>
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content" style="margin-top: 45px;">
        <div class="col-md-12">
    <div class="panel panel-flat">
        <div class="panel-heading no-padding-bottom">
            <h3 class="panel-title">{{ __('Settings') }}</h3>
            <p class="no-margin-bottom">{{ __('') }}</p>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" id="generalSettings" method="post" action="{{ route('admin.settings.general') }}" enctype='multipart/form-data'>
                                            {!! csrf_field() !!}

                <fieldset class="content-group">
                    <legend class="text-bold"></legend>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('site logo') }}</label>
                        <div class="col-lg-9">
                            <div class="col-lg-3">
                               <label for="logo" class="btn btn-danger btn-rounded"><i class="icon-image2 position-left"></i>
                                {{ __('chose') }} </label>
                               <input name="logo" id="logo" accept="image/jpg, image/jpeg, image/png" style="visibility:hidden;" type="file" />
                                @php
                                        $logo = option('logo');
                                @endphp
                                @if(!empty($logo))
                                <div class="logo-settings-preview"> 
                                        <img src="/uploads/{{ $logo }}" />
                                </div>
                                @endif

                        </div>
                        </div>
                        <div class="col-md-12">
                         <label class="control-label col-lg-3"></label>
                         <div class="setting-preview-img">
                        
                        </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('favicon') }} </label>
                        <div class="col-lg-9">
                            <div class="col-lg-3">
                               <label for="favicon" class="btn btn-danger btn-rounded"><i class="icon-image2 position-left"></i> {{ __('choose image') }} </label>
                               <input name="favicon" id="favicon" accept="image/jpg, image/jpeg, image/png" style="visibility:hidden;" type="file" />
                               @php
                                        $favicon = option('favicon');
                                @endphp
                                @if(!empty($favicon))
                                <div class="logo-settings-preview"> 
                                        <img src="/uploads/{{ $favicon }}" />
                                </div>
                                @endif
                        </div>
                        </div>
                        
                      
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('site name') }}</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control frequired"  name="name" 
                            placeholder="{{ __('site name') }}" value="{{ option('sitename') }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('tagline') }}</label>
                        <div class="col-lg-9">
         <input type="text" class="form-control"   name="tagline" placeholder="{{ __('tagline') }}" value="{{ option('tagline') }}">
                            <p>{{ __('describe your website in few words') }}</p>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('meta keywords') }}</label>
                        <div class="col-lg-9">
                            <textarea name="keywords" class="form-control" rows="3" >{{ option('metakeywords') }}</textarea>
                        </div>
                    </div>              
                 

                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('phone number') }}</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control"  name="phone" value="{{ option('phonenumber') }}" placeholder="{{ __('Enter your number phone ') }}  "/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('email') }}</label>
                        <div class="col-lg-9">
                <input type="text" class="form-control" name="email" placeholder="{{ __('Enter your Email ') }}" value="{{ option('email') }}"/>
                        </div>
                    </div>     
                 
                                                       


                    <div class="form-group" style="display: none;">
                        <label class="control-label col-lg-3">{{ __('cookies message text') }}</label>
                        <div class="col-lg-9">
                            <textarea name="cookiestext" class="form-control" rows="3" >{{ option('cookiestext') }}</textarea>
                        </div>
                    </div>  
                   

                    <div class="form-group">
                        <label class="control-label col-lg-3">{{ __('footer copyright text') }}</label>
                        <div class="col-lg-9">
                            <input type="text"  class="form-control" name="footer_copyright" value="{{ option('footer_copyright') }}"/>
                        </div>
                    </div>                                                              

                                                                              
                    <div class="form-group" style="display: none;">
                        <label class="control-label col-lg-3">{{ __('currency') }}</label>
                        <div class="col-lg-9">
                            <select name="currency" class="form-control">
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select>
                        </div>
                    </div>   
                 
            
                </fieldset>
                <div class="text-right">
                    <button type="submit" class="btn btn-block btn-primary">{{ __('Save Changes') }}</button>
                </div>
                <br>
                <div id="result"></div>
            </form>
        </div>
    </div>
</div>


<div class="col-md-4" >  

<div class="panel panel-flat" style="display: none;">

 <div class="panel-heading no-padding-bottom">
            <h3 class="panel-title">{{ __('social media link') }}</h3>
            <legend class="text-bold"></legend>
        </div>
        <div class="panel-body">
                

            <form  class="form-horizontal" method="post" action="{{ route('admin.settings.social') }}">
            @csrf
            <div class="form-group">
                <label class="control-label col-lg-3">{{ __('facebook') }}</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="facebook" value="{{ option('facebook') }}" placeholder="facebook">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">{{ __('twitter') }}</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="twitter" value="{{ option('twitter') }}" placeholder="twitter">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">{{ __('instagram') }}</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="instagram" value="{{ option('instagram') }}" placeholder="instagram">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">{{ __('youtube') }}</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="youtube" value="{{ option('youtube') }}" placeholder="youtube">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">{{ __('linkedIn') }}</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="linkedIn" value="{{ option('linkedIn') }}" placeholder="linkedIn">
                </div>
            </div>
            <div class="form-group">
                    <input type="submit" value="{{ __('Save Changes') }}" class="btn btn-primary btn-block"  />
            </div>
            </form>
</div>
</div>




<div class="panel panel-flat" style="display: none;">

 <div class="panel-heading no-padding-bottom">
            <h3 class="panel-title">{{ __('NewsLetter MailChimp') }}</h3>
            <legend class="text-bold"></legend>
        </div>
        <div class="panel-body">
                

            <form  class="form-horizontal" method="post" action="{{ route('admin.settings.newsletter') }}">
            @csrf
            <div class="form-group">
                <label class="control-label col-lg-3">{{ __('Api Key') }}</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="ApiKey" value="{{ option('ApiKey') }}" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3">{{ __('List ID') }}</label>
                <div class="col-lg-9">
                    <input type="text" class="form-control" name="listId" value="{{ option('listId') }}" >
                </div>
            </div>
            <div class="form-group">
                    <input type="submit" value="{{ __('save changes') }}" class="btn btn-primary btn-block"  />
            </div>
            </form>
</div>
</div>









</div>


</div>


 @endsection