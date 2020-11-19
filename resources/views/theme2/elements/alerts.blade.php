@if (session()->has('success'))
		<div class="alert alert-success"> {{ session('success') }}	</div>
@endif

@if (session()->has('error'))
		<div class="alert alert-warning"> {{ session('error') }}	</div>
@endif
