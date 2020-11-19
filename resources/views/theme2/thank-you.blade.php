@extends('theme2/pages-layout')
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
.erreur404 {
    padding-top: 70px;
}
</style>
<div class="erreur404">
<h1 class="text-center">{{ __('thank you') }}</h1>
<a class="ps-btn" href="/">{{ __('backhome') }}</a>
</div>

@endsection