<div class="form-errors-zone">	


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (session()->has('FormErrors'))
		<div class="alert alert-danger">
		@foreach(Session::get('FormErrors') as $message)
		{{ dd($message) }}
		{{ $message[0] }} </div>
		@endforeach
		</div>
@endif




</div>


