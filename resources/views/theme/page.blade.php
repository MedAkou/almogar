@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
@section('title')
{{ $page->title }}            
@endsection

@section('content')


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
