@extends('admin/layout') 
@section('content')  


<!-- Main content -->
<div class="content-wrapper">


		


<!-- Content area -->
<div class="content">
		
		

<div class="col-md-8">
	<div class="panel panel-flat ">
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="{{ route('admin.settings.save') }}">
							  {!! csrf_field() !!}

				<fieldset class="content-group">
					<div class="form-group">
						<label class="control-label">{{ __('create html / css / js codes at the top of site ') }}  </label>
						<textarea  class="form-control" name="topsite" cols="30" rows="10">{{ option('thetopofsite') }}</textarea>
					</div>
				</fieldset>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">{{ __('Save Changes') }}   </button>
				</div>
			</form>
		</div>
	</div>
   
   
   
	<div class="panel panel-flat ">
		<div class="panel-body">
			<form class="form-horizontal " method="post" action="{{ route('admin.settings.save') }}">
							  {!! csrf_field() !!}

				<fieldset class="content-group">
					<div class="form-group">
						<label class="control-label"> {{ __('create html / css / js tags at the bottom of the site ') }}  </label>
			<textarea  class="form-control" name="bottomsite" cols="30" rows="10">{{ option('thebottomofthesite') }}</textarea>
					</div>
				</fieldset>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">{{ __('Save Changes') }}   </button>
				</div>
			</form>
		</div>
	</div>
   </div>
   <div class="col-md-4">
<div class="panel">
								<div class="panel-body">
									<h5 class="content-group">
										<span class="label label-flat label-rounded label-icon border-grey text-grey mr-10">
											<i class="icon-info3"></i>
										</span>

											{{ __('do you need help ! ') }}
										
									</h5>


									<ul class="list list-icons">
										<li>
											<i class="icon-checkmark-circle text-success position-left"></i>
											<b>{{ __('The first box') }} </b>
											<br>
											<p class="mg10">{{ __('Place in which codes you want to appear between and named  ') }}
											
											<br>
											&lt;{{ __('head') }}&gt;&lt;/{{ __('head') }}&gt;</p>
										</li>
										<li>
											<i class="icon-checkmark-circle text-success position-left"></i>
											<b>{{ __('The second field') }} </b>
											<br>
											<p class="mg10">
											  {{ __(' Place in which codes you want to appear before marking ') }}
											    <br>
                                        &lt;/{{ __('body') }}&gt;

											    
											    
											    
											</p>
										</li>                                        
								            <li>
											<i class="icon-checkmark-circle text-success position-left"></i>
											<b>{{ __('Attention') }} </b>
											<br>
											<p class="mg10">
											  {{ __('  Before creating any code, make sure that it is from secure sites, create insecure codes that may affect the protection of your site ') }}
											 </p>
										</li>
										
										

									</ul>
								</div>                     
        </div>
        
							

</div>
    </div>
   
 
   
    </div>


        
		</div>
		
	</div>
	


 @endsection