@extends(\System::$ACTIVE_THEME_PATH.'/layout')
@section('title')
{{ __('Search') }}
@endsection

@section('content')

            <div class="container">
            	<div class="row">
            		<div class="col-md-12">
            			<h2 class="searchtitle">{{ __('search results for') }} {{ $q }}</h2>
            		</div>
            	</div>
            </div>


   
            <div class="container product-wrapper">
                <div class="ps-section__content">
                    <div class="ster">
                    <div class="row">

                	@forelse ($products as $product)
					       <div class="col-xl-3 col-lg-3 col-md-4 col-6 product-card">
                           @include(\System::$ACTIVE_THEME_PATH.'/elements/product')
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

                </div>
            </div>


@endsection