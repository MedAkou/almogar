@if (session()->has('success'))
		<div class="alert alert-success d-flex justify-content-center"> {{ session('success') }}	</div>
@endif

@if (session()->has('error'))
		<div class="alert alert-error d-flex justify-content-center"> {{ session('error') }}	</div>
@endif

@if ($errors->any())
<div class="alert alert-error d-flex justify-content-center">
     @foreach ($errors->all() as $error)
        {{$error}} &nbsp;
     @endforeach
     	</div>
 @endif