@extends('theme2/layout')
@section('title')
{{ $page->title }}            
@endsection

@section('content')

    <style>
        h2.post-title {
    width: 100%;
    margin-top: 45px;
}

.post-content {
    width: 100%;
    margin-bottom: 55px;
}
    </style>
        <main class="main">
    
            <div class="container">
                <div class="row">
                    <h2 class="post-title">{{ $page->title }}</h2>
                    <div class="post-content">
                        {!! $page->content !!}
                    </div>  
                </div>
            </div>

           
        </main>





@endsection
