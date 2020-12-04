@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
@section('title')
{{ __('404') }}
@endsection

@section('content')


<div class="ps-page--404">
    <div class="container">
        <div class="ps-section__content"><img src="{{ asset('assets/website/img/404.jpg') }}" alt="">
            <h3>ohh! page not found</h3>
            <p>It seems we can't find what you're looking for. Perhaps searching can help or go back to</p>
          
        </div>
    </div>
</div>


@endsection