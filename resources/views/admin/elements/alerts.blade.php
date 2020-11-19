
<div class="alerts-zone">	

@if (session()->has('success'))
		<div class="alert alert-success"> {{ session('success') }}	</div>
@endif

@if (session()->has('error'))
		<div class="alert alert-error"> {{ session('error') }}	</div>
@endif

@if($errors->any())
<div class="alerts-zone-website">	
    {!! implode('', $errors->all('<div>:message</div>')) !!}

</div>
@endif



</div>