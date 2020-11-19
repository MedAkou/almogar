@extends('website/layout')
@section('title')
{{ __('Search') }}
@endsection

@section('content')

			<nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home',['store'=>$store]) }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">{{ __('search') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $q }}</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
            	<div class="row">
            		<div class="col-md-12">
            			<h2>{{ __('search results for') }} {{ $q }}</h2>
            		</div>
            	</div>
            </div>
   
            <div class="container product-wrapper">
                <div class="product-intro divide-line up-effect">

                	@forelse ($products as $product)
					       <div class="col-6 col-sm-4 col-lg-3 product-default">
                           @include('website/elements/product')
                    	   </div>
					@empty
                    <div class="home-pagination">    
                            {{ $products->links() }}
                           </div>
					<div class="no-results-search">
					    <p>{{ __('No results') }}</p>
					</div>
					@endforelse

                </div>
            </div>


@endsection