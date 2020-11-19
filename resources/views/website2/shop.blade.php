@extends('website/layout')
@section('title')
{{ __('Shop') }}
@endsection

@section('content')




<style> 
.main-product-categories-menu ul {
    padding: 10px;
    border-top: 1px solid #d1010e;
    text-align: center !important;
}

.main-product-categories-menu ul li {
    float: none;
    display: inline-block;
}

.a9jdaw figure a img {
    width: auto;
    min-height: 300px;
    text-align: center;
}

@media (max-width: 600px) and (min-width: 0px) {


.product-default {
    width: 50% !important;
}
.slide-bg {
    height: 180px;
}

.home-slider {
    height: 180px;
}

.home-slider-container, .home-slide {
    height: 180px;
}

.product-intro.divide-line.up-effect {
    margin-top: 43px;
}

.a9jdaw figure a img {
    width: auto;
    min-height: 200px;
    text-align: center;
}

}
@media (max-width: 600px) and (min-width: 0px) {
    .sidebar-shop {
    display: none;
}
}
</style>


   <div class="main-product-categories-menu">
    <ul class="menu sf-arrows main-header-menu">
                        {!!  app('SiteSetting')->MerchantMenu('homeCategories') !!}
                    </ul>
     
   </div>

 <main class="main">
         

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


<style> 
.row.productsrow {
    width: 100%;
    margin-bottom: 45px;
}
@media (max-width: 600px) and (min-width: 0px) {


.product-default {
    width: 50% !important;
}
.slide-bg {
    height: 180px;
}

.home-slider {
    height: 180px;
}

.home-slider-container, .home-slide {
    height: 180px;
}

.product-intro.divide-line.up-effect {
    margin-top: 43px;
}

.a9jdaw figure a img {
    width: auto;
    min-height: 200px;
    text-align: center;
}

}
</style>

                <div class="col-md-9">  
                <div class="product-wrapper">
                            <div class="product-intro divide-line up-effect">

                           
                   
                           
                            @foreach($products->chunk(4) as $items)
                            <div class="row productsrow">
                               @foreach($items as $product)
                               <div class="col-md-3 product-default">
                                       @include('website/elements/product')
                               </div>
                               @endforeach
                            </div>
                            @endforeach
                                            
                                         
                        
                            </div>
                </div><!-- End .product-wrapper -->

                <nav class="toolbox toolbox-pagination">
                    <div class="toolbox-item toolbox-show">
                        <label>Showing {{ $products->currentPage() }}–{{ $products->perPage() }} of {{ $products->total() }} results</label>
                    </div><!-- End .toolbox-item -->
                    <div class="shop-pagination">
                            {{ $products->links() }}
                    </div>
                </nav>
            </div>
                

            </div>

            </div>


<style> 

.sidebar-categories {
    background: #e2e0de;
    padding: 5px;
    text-align: right;
    border-radius: 5px;
}
.sidebar-categories ul li {
    border-bottom: 1px solid #0000002b;
    padding: 9px;
}
</style>




            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->
            


@endsection