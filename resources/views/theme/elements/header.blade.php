<html lang='{{ app()->getLocale() }}'>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ option('sitename') }} | @yield('title')</title>

    <meta name="keywords" content="{{ option('metakeywords') }}" />
    <meta name="description" content="{{ __('tagline') }}"> 

    @php $favicon = option('favicon'); @endphp @if(!empty($favicon))
    <link rel="icon" type="image/x-icon" href="/uploads/{{ $favicon }}"> 
    @endif

    <link rel="stylesheet" href="/assets/front/css/style.min.css">
    <link rel="stylesheet" href="/assets/front/css/main.css"> 


    {{ option('thetopofsite') }}


@php
    if(app()->getLocale() == 'ar' ):
@endphp


<link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=jazeera" type='text/css' media='all' />
<style>
body,h1,h2,h3,h4,h5,h6,p,a,btn,span,ul li a{font-family:'jazeera' !important}
#addedTocCart .modal-body h5 {
    text-align: center;
    padding: 20px;
    font-size: 20px;
}

</style>

@php
    endif;
@endphp

</head>

<body>

    @include('admin/elements/alerts')


    @include('elements/store-header')

    
