
@extends('manager/layout')

@section('title')
{{ __('Oders Edit') }}
@endsection
@section('content')


<!-- Main content -->
<div class="content-wrapper">


                <!-- Page header -->
                <div class="page-header page-header-transparent">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h1> <span class="text-semibold"> {{ __('order details') }}  </span></h1>
                            
                        </div>
                        <div class="heading-elements">
        
 <a href="{{ route('manager.orders.delete',['id' => $content->id ]) }}" class="btn bg-danger btn-labeled heading-btn"><b>


    <i class="icon-trash"></i></b> 
                   

{{ __('delete order') }}
                                          </a>

<a href="javascript:;" id="print" class="btn bg-primary btn-labeled heading-btn"><b>


<i class="icon-printer"></i></b> 


{{ __('print order') }}
</a>
                        
                        </div>
                    </div>
                </div>
                <!-- /page header -->


<!-- Content area -->
<div class="content" id="printed">
              <div class="row">
                  <div class="col-md-8">
                  
                  
<div class="row">


   <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="icon-cart"></i>{{ __('order info') }} </h3>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="width: 1%;">
                                            <button rel="tooltip" title="ordered at" class="btn btn-info btn-xs"><i class="icon-calendar"></i></button>
                                        </td>
                                        <td>  
                                        {{ __('order.date') }} :
                                        {{ $content->created_at->diffForHumans() }}</td>

                                    </tr>
                                    <tr>
                                        <td style="width: 1%;">
                                            <button rel="tooltip" title="Payment Method" class="btn btn-info btn-xs"><i class="icon-paypal"></i></button>
                                        </td>
                                        <td>
                                        {{ __('order.statue') }} :
                                        {{ $content->statue() }}</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 1%;">
                                            <button rel="tooltip" title="Amount" class="btn btn-info btn-xs">
                                                <i class="icon-coin-dollar"></i>
                                            </button>
                                        </td>
                                        <td>
                                            {{ __('order.total') }} :
                                            {{ $content->total }}
                                        </td>
                                    </tr>

                                   

                                    <tr>
                                        <td style="width: 1%;">
                                            <button rel="tooltip" title="Transacion ID" class="btn btn-info btn-xs">
                                                <i class="icon-barcode2"></i>
                                            </button>
                                        </td>
                                        <td>
                                            {{ __('order.currency') }} :
                                            {{ $content->currency }}
                                        </td>
                                    </tr>


                                    <tr>
                                        <td style="width: 1%;">
                                            <button rel="tooltip" title="Transacion ID" class="btn btn-info btn-xs">
                                                <i class="icon-barcode2"></i>
                                            </button>
                                        </td>
                                        <td>
                                            {{ __('order.method') }} :
                                            {{ $content->payement->method }}
                                        </td>
                                    </tr>



                                    <tr>
                                        <td style="width: 1%;">
                                            <button rel="tooltip" title="Transacion ID" class="btn btn-info btn-xs">
                                                <i class="icon-barcode2"></i>
                                            </button>
                                        </td>
                                        <td>
                                            {{ __('order.shipping') }} :
                                            {{ $content->shipping->name }}
                                        </td>
                                    </tr>



                                    

                                </tbody>
                            </table>
                        </div>
                    </div>









<div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="icon-user"></i>{{ __('Buyer information') }} </h3>
</div>
<table class="table">
<tbody>

<tr>
    <td style="width: 1%;">
        <button rel="tooltip" title="Full name" class="btn btn-info btn-xs">
        <i class="icon-user"></i>
        </button>
    </td>
    <td> {{ $content->user->name }} </td>
</tr>

<tr>
    <td style="width: 1%;">
        <button rel="tooltip" title="Company" class="btn btn-info btn-xs">
        <i class="icon-office"></i>
        </button>
    </td>
    <td> N-A </td>
</tr>


<tr>
    <td>
       <button rel="tooltip" title="E-Mail" class="btn btn-info btn-xs" >
        <i class="icon-envelop2"></i>
        </button>
    </td>
    <td><a href="mailto:{{ $content->user->email }}">{{ $content->user->email }}</a></td>
</tr>


<tr>
    <td>
        <button rel="tooltip" title="Telephone" class="btn btn-info btn-xs" >
        <i class="icon-phone2"></i>
        </button>
    </td>
    <td>{{ $content->user->phone }}</td>
</tr>

</tbody>
</table>
</div>
</div>

</div>           
    <div class="panel panel-flat">
        <div class="panel-body">
               
                <div class="col-md-12">
                <fieldset class="content-group shipping-order-details">
                    <legend class="text-bold">{{ __('Shipping Address') }}</legend>
                    
                   
                    
                     <div class="form-group">
                        <label class="control-label"> {{ __('name') }} </label>
                        {{ $content->addresse->given_name }}
                    </div>
                     <div class="form-group">
                        <label class="control-label">{{ __('street') }}</label>
                        {{ $content->addresse->street }}
                    </div>
                     <div class="form-group">
                        <label class="control-label">{{ __('city') }}</label>
                        {{ $content->addresse->city }}
                    </div>
                     <div class="form-group">
                        <label class="control-label">{{ __('state') }}</label>
                        {{ $content->addresse->state }}
                    </div>
                     <div class="form-group">
                        <label class="control-label"> {{ __('country') }} </label>
                        {{ $content->addresse->country_code }}
                    </div>
                     <div class="form-group">
                        <label class="control-label"> {{ __('phone') }} </label>
                        {{ $content->addresse->phone }}
                    </div>
                    <div class="form-group">
                        <label class="control-label"> {{ __('postal code') }} </label>
                        {{ $content->addresse->postal_code }}
                    </div>

                </fieldset>         
                </div>  
            </form>
    </div>        
        </div>        
            </div>      
                  
          <div class="col-md-4"> 


        <div class="panel panel-flat">
    <table class="table table-striped " >
        <thead>
            <tr>
                <th><b>{{ __('thumbnail') }}</b></th>
                <th><b>{{ __('product') }}</b></th>
                <th><b>{{ __('quantity') }}</b></th>
                <th><b>{{ __('price') }}</b></th>
            </tr>
        </thead>
        <tbody>  
        @foreach($content->products as $product )
         <tr>
            <td>
    <div class="product-image-list"> 

        @if($product->product)
       {!! $product->product->presentThumbnail() !!}
        @endif
    </div>
            </td>
            <td><a href="javascript:;">{{ $product->product->name }}</a></td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
         </tr>
         @endforeach
        </tbody>       
    </table>
</div>


              
    </div> 
   </div>
   
   
   <style>
       .primg {
           width: 35px;
           margin-right: 15px;
       }
    </style>
   
<div class="col-md-8">

</div>
   
   
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
<script>

    $('#print').on("click", function () {
      $('#printed').printThis();
    });
</script>





@endsection