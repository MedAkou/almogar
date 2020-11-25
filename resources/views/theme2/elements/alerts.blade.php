@if (session()->has('success'))
		<div class="alert alert-success d-flex justify-content-center"> {{ session('success') }}	</div>
@endif

@if (session()->has('error'))
		<div class="alert alert-error d-flex justify-content-center"> {{ session('error') }}	</div>
@endif