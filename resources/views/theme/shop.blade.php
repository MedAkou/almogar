@extends(\System::$ACTIVE_THEME_PATH.'/layout')
@section('title')
{{ __('Shop') }}
@endsection
@section('content')
<main class="main" style="padding-top: 45px;">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <div class="sidebar-shop">
               <div class="widget">
                  <ul class="cat-list">
                     @foreach (  $categories  as $element)

                     @php   $count =  $element->products_count == 0 ? 'style=display:none' : ''  ; @endphp

                     <li {{ $count  }} ><a href="{{ route('category',['store' => $store , 'slug'  =>  $element->slug   ]) }}">{{ $element->name  }}  <span class="category_count">{{ $element->products_count  }}</span> </a></li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <div class="product-wrapper">
               <div class="product-intro divide-line up-effect">
                  <div class="row productsrow">
                  @foreach($products->chunk(4) as $items)
                
                        @foreach($items as $product)
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-6 nestele">
                            @include(\System::$ACTIVE_THEME_PATH.'/elements/product')
                        </div>
                        @endforeach
                    
                @endforeach
               </div>
               </div>
            </div>
            <!-- End .product-wrapper -->
            <nav class="toolbox toolbox-pagination">
               <div class="toolbox-item toolbox-show">
                  <label>Showing {{ $products->currentPage() }}–{{ $products->perPage() }} of {{ $products->total() }} results</label>
               </div>
               <!-- End .toolbox-item -->
               <div class="shop-pagination">
                  {{ $products->links() }}
               </div>
            </nav>
         </div>
      </div>
   </div>
   <div class="mb-5"></div>
   <!-- margin -->
</main>
<!-- End .main -->
@endsection