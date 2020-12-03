
<div class="alerts-zone">	

@if (session()->has('success'))
		<div class="alert alert-success"> {{ session('success') }}	</div>
@endif

@if (session()->has('error'))
		<div class="alert alert-danger"> {{ session('error') }}	</div>
@endif

@if($errors->any())
<div class="alert alert-danger">	
    {!! implode('', $errors->all('<div>:message</div>')) !!}

</div>
@endif



</div>