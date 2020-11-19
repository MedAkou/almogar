
@extends('admin/layout')
@section('title')
{{ __('ads create') }}
@endsection
@section('content')




<!-- Main content -->
<div class="content-wrapper">


<!-- Page header -->
<div class="page-header page-header-transparent">
    <div class="page-header-content">
        <div class="page-title">
            <h1><span class="text-semibold">{{ __('create new ad') }}</span></h1>
        </div>
    </div>
</div>
    
    
<!-- Content area -->
<div class="content">
		

	<div class="panel panel-flat col-md-8">
		


		<div class="panel-body">
			 <div class="alert alert-danger empty-form" style="display: none;">{{ __('empty-form-alert') }}</div>
			<form class="form-horizontal" enctype='multipart/form-data' method="post" action="{{ route('admin.ads.store') }}" />
			  {!! csrf_field() !!}

			  
				<fieldset class="content-group">
			

                
<div class="form-group switechers">
    <label class="control-label col-lg-3">{{ __('activate ad') }}</label>
    <div class="col-lg-9">
        <label class="adminswitch">
    <input name='active' type="checkbox"  value="active" checked />
    <span class="slider round"></span>
    </label>
    </div>
</div>
                    
                    
<div class="form-group">
    <label class="control-label col-lg-3">{{ __('ad title') }}</label>
    <div class="col-lg-9">
        <input type="text" class="form-control rf" name="name" />
        <p class="text-muted">{{ __('title , is not important , but it is good for you to reconize ads . .') }}</p>
    </div>
</div>
					
					<div class="tie-option-pre-label">{{ __('ad image') }}</div>
					<div class="form-group">
						<label class="control-label col-lg-3">{{ __('ad image') }}</label>
						<div class="col-lg-3">
							   <label for="avatarUploadPreview" class="btn btn-danger btn-rounded"><i class="icon-image2 position-left"></i>
							 {{ __('  chose image ') }}</label>
							   <input name="image" id="avatarUploadPreview" accept="image/jpg, image/jpeg, image/png" style="visibility:hidden;" type="file" />
						</div>
						
					</div>
					
					<div class="form-group">
						<label class="control-label col-lg-3">{{ __('ad link') }}</label>
						<div class="col-lg-9">
							<input type="text" class="form-control rf" name="link" />
						</div>
					</div>
					
				
					<div class="form-group">
						<label class="control-label col-lg-3">{{ __('ads script here') }}
						</label>
						<div class="col-lg-9">
							<textarea name="codehtml" class="form-control" rows="8"></textarea>
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
							
        
							<div class="panel panel-white div_rtl">
								<div class="panel-heading">
									<h6 class="panel-title">{{ __(' ads area') }} </h6>
								</div>

								<div class="panel-body div_rtl">
									 <select  name="areaUndetected" >
                                        <option value="not_speci">{{ __('Not specified yet') }}</option>
                                        <option value="home_1">{{ __('main meduam 1') }}</option>
                                        <option value="home_2">{{ __('main meduam 2') }}</option>
                                        <option value="home_3">{{ __('main meduam 3') }}</option>
                                        <option value="home_4">{{ __('main meduam 4') }}</option>
                                        <option value="home_5">{{ __('main meduam 5') }}</option>
                                        <option value="home_6">{{ __('main meduam 6') }}</option>
                                     
                                </select>
								</div>
							</div>
							</form>
							
						
							
							
        

    </div>

</div>
        
		</div>
		
	</div>

@endsection
