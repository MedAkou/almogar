@extends(\System::$ACTIVE_THEME_PATH.'/layout')
@section('title')
{{ __('categories') }}
@endsection

@section('content')


<div class="container">
    <div class="col-md-12">
    <div class="row">
        @foreach($categories as $categorie)
        <div class="col-md-4">
              <div class="box-categorie">
                    <a href="">
                      <img src="/uploads/{{ $categorie->image }}" />
                    </a>
                    <div class="categorie-title">
                        <h1>{{ $categorie->name }} {{ $categorie->PresentTotal() }}</h1>
                    </div>
              </div>  
              
        </div>
        @endforeach
    </div>
    </div>
</div>

@endsection