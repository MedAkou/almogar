@extends('theme2/pages-layout')
@section('title')
{{ __('thank you') }}
@endsection


@section('content')

<div class="erreur404">
<h1 class="text-center">{{ __('thank you') }}</h1>
<a class="ps-btn" href="/">{{ __('backhome') }}</a>
</div>

@endsection