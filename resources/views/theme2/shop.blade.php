@extends('theme2/layout')
@section('title')
{{ __('Shop') }}
@endsection

@section('content')



<style>
    ul.cat-list li {
    list-style: none;
}

ul.cat-list {
    background: whitesmoke;
    padding: 0;
}

ul.cat-list li {
    border-bottom: 1px solid #c31432;
    padding: 15px 30px;
}

ul.cat-list li:last-child {
    border: 0;
}

ul.cat-list li a {
    color: #c31432;
}
</style>


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


<style> 
.row.productsrow {
    width: 100%;
    margin-bottom: 45px;
}

@media (max-width: 600px) and (min-width: 0px) {
    .row.productsrow {
        margin: 0;
    }

    .widget {
        margin-bottom: 0;
        margin-top: 20px;
    }

    nav.toolbox.toolbox-pagination {
    text-align: center;
    margin-top: 30px;
    }

    .ps-footer {
        padding-top: 10px;
    }
}
</style>

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