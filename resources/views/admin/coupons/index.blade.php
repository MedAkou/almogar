
@extends('admin/layout')
@section('title')
Coupons
@endsection

@section('content')


<!-- Main content -->
<div class="content-wrapper">





<!-- Page header -->
<div class="page-header page-header page-header-transparent  " >
   
    <div class="page-header-content">
        <div class="page-title">
            <h1><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">
                {{ __('coupons') }}
             </span>
    
         </h1>
        </div>

        <div class="heading-elements div_btn">
        
            <a href="{{ route('admin.coupons.create') }}" class="btn bg-blue btn-labeled heading-btn btn_add"><b>
            <i class="icon-plus3"></i></b> {{ __('Add a new coupon') }}</a>
            
 <a href="javascript:void(0);" data-toggle="modal" data-target="#coupons_delete" class="btn bg-danger btn-labeled heading-btn btn_add"><b><i class="icon-trash"></i></b>{{ __('Delete all Coupons') }}</a>
               
        </div>
    </div>
    
            <div class="breadcrumb-line">
<ul class="breadcrumb">
    <li><a href="{{ route('admin.home') }}" title=""><i class="icon-home2 position-left"></i>
    {{ __('Home') }}
    </a></li>
    <li class="active" title="{{ __('coupons') }}" >{{ __('coupons') }}</li>
</ul>

</div>

    
    
  
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">
			
            @if ($coupons->isEmpty())        
			<div class="empty_state text-center">
			    
			<i class="icon-bag empty_state_icon"></i>
			<br/>
			<br/>
		    <h6> 
                </h6>
        <br>
        <a href="{{ route('admin.coupons.create') }}" class="btn bg-blue heading-btn btn-xlg">
            {{ __('create new coupon') }}
          </a>
        </div>
            @endif
      
		    
		


@if (!$coupons->isEmpty())
<div class="panel panel-flat table-panel table-responsive">
        <table class="table ">
            <thead>
                <tr>
                    <th><i class=" icon-circle-code"></i><b>{{ __('Coupon code') }}</b></th>
                    <th><i class=" icon-calendar3"></i><b>{{ __('Date created') }}</b></th>
                        <th><i class=" icon-checkmark"></i><b>{{ __('statue') }}</b></th>
                    <th><i class=" icon-pencil4"></i><b>{{ __('Edit') }}</b></th>
                </tr>
            </thead>
               <tbody>
                @foreach ($coupons as $coupon)
                   
                         <tr>
             <td data-label="{{ __('Coupon code') }}">   {{ $coupon->code }}  </td>
             <td data-label="{{ __('Date created') }}">    {{ $coupon->created_at->diffForHumans() }}  </td>
             <td data-label="{{ __('Coupon code') }}">   {{ $coupon->statue }}  </td>
             <td data-label="{{ __('Edit') }}">  <a href=""></a> 
  <a class="edit btn btn-success btn-block hidden-md hidden-lg hidden-sm"  href="{{ route('admin.coupons.edit',['id' => $coupon->id]) }}">edit</a>
       <ul class="icons-list hidden-xs">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu9"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                <li>
                <a href="{{ route('admin.coupons.edit',['id' => $coupon->id]) }}" class="text-primary-600">
                <i class="icon-pencil7 position-left"></i>{{ __('Edit') }} 
                </a>
                </li>
                <li>
                <a href="{{ route('admin.coupons.delete',['id' => $coupon->id]) }}" class="text-danger-600">
                <i class="icon-cross2 position-left"></i>{{ __('Delete') }}
                </a>
                </li>
                <li>
                <a href="{{ route('admin.coupons.duplicate',['id' => $coupon->id]) }}" class="text-bg-info">
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
@endif
  <div class="pagination-wrapper">
              {{ $coupons->links() }}
            </div>

</div>

</div>
  
@endsection