 @extends('admin/layout') @section('title') {{ __('Products') }} @endsection @section('content')

<style>
    .jorroo{
        margin-left: 12px;
    }
</style>
<!-- Main content -->
<div class="content-wrapper">




<!-- تعيين الطلبات الى المنتوج -->
<div class="modal fade" id="setOrdersToProduct" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body"> 
      <form class="form-horizontal" method='post' action="{{ route('admin.assigntocategorie') }}" autocomplete="off">
        @csrf
            <div id="assign-product-alert"></div>
               <input type="hidden" name="AssignToProductIDS" id="AssignToProductIDS">
                <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-12"> select category </label>
                            <div class="col-lg-12">
                               <div class="product-q">
                                    <select class="form-control" name="category_id" >
                                    <option value="N-A" > اختيار المنتوج</option>
                                            @foreach($categories as $category) 
                                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                </div>
                        </div>



                </fieldset>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-block" id="assing_to_product">
                    {{ __('assign to product') }}                        <i class="icon-arrow-left13 position-right "></i>
                    </button>
                </div>

    </form>

      </div>
  </div>
</div>
</div>




<!-- حذف الطلبات -->
<div class="modal fade" id="deleteOrdersModal" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body"> 
      <form class="form-horizontal" method='post' action="{{ route('admin.deleteproducts') }}" autocomplete="off">
        @csrf
               <input type="hidden" name="AssignToDelete" id="AssignToDelete">
              
                <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-block" id='btn_assign_to_delete'>
                        {{ __('Confirm and delete requests') }}
                   <i class="icon-arrow-left13 position-right"></i>
                    </button>
                </div>

    </form>

      </div>
  </div>
</div>
</div>






    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-right6 position-left"></i>
      {{ __('products') }}  
      </h4>
                <ul class="breadcrumb position-left">

                </ul>
            </div>
            <div class="heading-elements div_btn">
                <div class="heading-btn-group">

                    <div class="col-md-4 jorroo">
                        <div class="row">
                            <form class="col-md-6" action="{{ route('admin.bulkactivated') }}"  method='post'>
                            @csrf
                            <input type="hidden" name="bulkactivatedProductIDS" id="bulkactivatedProductIDS">
                            <button type="submit" class="btn bg-blue   btn-labeled heading-btn btn_add">
                               {{ __('activate') }}
                               <span class="num_num"></span> 
                            </button>
                        </form>    


                        <form class="col-md-6" action="{{ route('admin.bulkdeactivated') }}"  method='post'>
                            @csrf
                            <input type="hidden" name="bulkdeactivatedProductIDS" id="bulkdeactivatedProductIDS">
                            <button type="submit" class="btn bg-blue heading-btn  btn-labeled btn_add">
                               {{ __('deactivate') }}
                               <span class="num_num"></span> 
                            </button>
                        </form>
                        </div>
                    </div>

                    <a href="{{ route('admin.products.create') }}" class="btn bg-blue btn-labeled heading-btn btn_add"><b>
                      <i class="icon-plus3"></i></b> 
                       {{ __('create new product') }}
                    </a>


  <a href="javascript:;"  data-target="#setOrdersToProduct" data-toggle="modal" class="btn bg-blue btn-labeled heading-btn btn_add"><b>
                      <i class="icon-plus3"></i></b> 
                       {{ __('assign to category') }}
                       <span class="num_num"></span> 
                    </a>

<a href="javascript:;"  data-target="#deleteOrdersModal" data-toggle="modal" class="btn bg-danger btn-labeled heading-btn btn_add"><b>
                      <i class="icon-plus3"></i></b> 
                       {{ __('delete products') }}
                       <span class="num_num"></span> 
                    </a>     



<a href="javascript:;"  id='print_me' class="btn bg-danger">
                       {{ __('Print products page') }}
                    </a> 

                    
                </div>
            </div>
        </div>

        <div class="breadcrumb-line">

        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="{{ route('admin.home') }}" title=""><i class="icon-home2 position-left"></i>{{ __('Home') }}</a></li>
                <li class="active" title="{{ __('Products') }}">{{ __('Products') }}</li>
            </ul>
            <ul class="breadcrumb-elements not-collapsible  " >


                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ __('View by category') }}

                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right limitPerCategory">
                            @foreach($categories as $category) 
                            <li><a href="{{ $category->id }}">{{ $category->name }}</a></li>
                            @endforeach
                    </ul>
                </li>

                <li><a >{{ __('products') }}  ({{ $count }}) | {{ __('active_products') }}  ({{ $active }}) | {{ __('notactive_products') }}  ({{ $not_active }})</a></li>
            </ul>

        </div>
    </div>
    <!-- /page header -->




    <!-- Content area -->
    <div class="content">

            <div class="panel panel-flat" id="search_box">
    <div class="panel-heading">
        <h5 class="panel-title">


        {{ __('Search for products') }}  <a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
    </div>

    <div class="panel-body">
        <form action="{{ route('admin.products.search') }}" method="get" class="main-search">
   
            <div class="input-group content-group">
                <div class="has-feedback has-feedback-left">
                    <input type="text" class="form-control input-xlg" placeholder="{{ __('product name') }}" name="q" value="{{ app('request')->input('q') }}">
                    <div class="form-control-feedback">
                        <i class="icon-search4 text-muted text-size-base"></i>
                    </div>
                </div>

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-xlg searchBtnSubmit">{{ __('Search') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

        @if($products->isEmpty())
        <div class="empty_state text-center">

            <i class="icon-basket empty_state_icon"></i>
            <h4> {{ __('start adding new products') }}
</h4>
            <a href="{{ route('admin.products.create') }}" class="btn bg-blue btn-labeled heading-btn"><b><i class="icon-plus3"></i></b>
{{ __('create new products') }}
</a>
        </div>
        @endif @if (!$products->isEmpty())

        <div class="panel panel-flat table-panel table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th><b><span class="num_num"></span><input type="checkbox" id="checkAll"></b></th>
                        <th><i class=" icon-images3"></i><b>{{ __('thumbnail') }}</b></th>
                        <th><i class=" icon-images3"></i><b>{{ __('status') }}</b></th>
                        <th><i class=" icon-pencil5"></i><b>{{ __('product name') }}</b></th>
                        <th><i class=" icon-calendar3"></i><b>{{ __('created at') }}</b></th>
                        <th><i class=" icon-price-tag2"></i><b>{{ __('category') }}</b></th>
                        <th><i class="  icon-price-tag"></i><b>{{ __('price') }}</b></th>
                        <th><i class="  icon-price-tag"></i><b>{{ __('discount') }}</b></th>
                        <th class=""><i class=" icon-pencil4"></i><b>{{ __('edit') }}</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>

                        @foreach($products as $product )
                        <tr>
                            <td><input class="check" type="checkbox" data-item="{{ $product->id }}"></td>
                            <td data-label="{{ __('product thumbnail') }}">

                                <div class="product-image-list zoomimgs">
                                    {!! $product->presentThumbnailList() !!}
                                </div>

                            </td>
                            <td data-label="{{ __('status') }}">
                                @if($product->active == 1)
                                {{ __('activated') }}
                                @endif
                                @if($product->active == 0 || $product->active == null)
                                {{ __('deactivated') }}
                                @endif
                            </td>
                            <td data-label="{{ __('product name') }}">{{ $product->name }}</td>
                            <td data-label="{{ __('created at ') }}">{{ $product->created_at->diffForHumans() }}</td>
                            <td data-label="{{ __('category ') }}">
                                <span class="label label-success">{{ $product->categorie->name }}</span>
                            </td>
                            <td data-label="{{ __('price ') }}">{{ $symbol }} {{ $product->price }}</td>
                            <td data-label="{{ __('price ') }}">{{ $symbol }} {{ $product->discount }}</td>
                            <td data-label="{{ __('edit ') }}">
                                <a class="edit btn btn-success btn-block hidden-md hidden-lg hidden-sm" href="{{ route('admin.products.edit',['id' => $product->id]) }}">edit</a>
                                <ul class="icons-list hidden-xs">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                          
                                            <li>
                                                <a href="{{ route('admin.products.edit',['id' => $product->id]) }}" class="text-primary-600">
                                                    <i class="icon-pencil7 position-left"></i>{{ __('Edit') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.products.activate',['id' => $product->id]) }}" class="text-bg-info">
                                                    <i class="icon-file-check position-left"></i>{{ __('activate') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.products.deactivate',['id' => $product->id]) }}" class="text-bg-info">
                                                    <i class="icon-file-minus position-left"></i>{{ __('deactivate') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.products.delete',['id' => $product->id]) }}" class="text-danger-600">
                                                    <i class="icon-cross2 position-left"></i>{{ __('Delete') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.products.duplicate',['id' => $product->id]) }}" class="text-bg-info">
                                                    <i class="icon-stack-plus position-left"></i>{{ __('Duplicate') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>

        <style>
            .inputpagination {
                padding-top: 20px;
                width: 20%;
                text-align: center;
                margin: 0 auto;
            }

            .inputpagination input{
                padding: 10px !important;
            }
            @media (max-width: 600px) and (min-width: 0px) {
                    .inputpagination {
                    width: 50%;
                }
            }
        </style>    

        <div class="pagination-wrapper">
            {{ $products->links() }}
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-3">
                    <div class="inputpagination">
                        <form action="javascript:;" id="paginatenbr" method="get" class="main-search">
                   
                                <div class="input-group content-group">
                                    <div class="has-feedback has-feedback-left">
                                        <input type="number" class="form-control input-xlg" placeholder="{{ __('page') }}" name="inputpaginationnbr" value="">
                                    </div>

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-xlg searchBtnSubmit">GO</button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $('#paginatenbr').submit(function(){
      var nbr = $(this [name="inputpaginationnbr"]).val();
      window.location.replace("?page="+nbr);
    });
</script>
@endif @endsection