@extends('theme2/layout')
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
                     @foreach (  $activeStore->categories  as $element)
                     <li><a href="{{ route('category',['store' => $store , 'slug'  =>  $element->slug   ]) }}">{{ $element->name  }}</a></li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <div class="product-wrapper">
               <div class="product-intro divide-line up-effect">
                  @foreach($products->chunk(3) as $items)
                  <div class="row productsrow">
                     @foreach($items as $product)
                     <div class="col-xl-4² col-lg-4² col-md-4 col-sm-6 col-xs-6 nestele">
                        @include('theme2/elements/product')
                     </div>
                     @endforeach
                  </div>
                  @endforeach
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