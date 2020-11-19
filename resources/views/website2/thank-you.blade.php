@extends('website/layout')
@section('title')
{{ __('thank you') }}
@endsection


@section('content')

<style>
	.erreur404 {
    text-align: center;
}
.backHome {
	margin-top: 10px;
}
</style>
<div class="erreur404">
<h1 class="text-center">{{ __('thank you') }}</h1>
<a class="btn btn-primary backHome" href="{{ route('home',['store' => $store ]) }}">{{ __('backhome') }}</a>
</div>

@endsection