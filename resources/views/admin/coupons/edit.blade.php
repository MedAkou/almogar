
@extends('admin/layout')

@section('title')
Coupons Edit
@endsection
@section('content')



<!-- Content area -->
<div class="content">

<!-- Page header -->
<div class="page-header page-header-transparent">
<div class="page-header-content">
<div class="page-title">
<h1> <span class="text-semibold">{{ __('Coupon modification') }}</span></h1>
</div>
</div>
</div>
<!-- /page header -->



<form action="{{ route('admin.coupons.update',['id'=>$content->id]) }}" method="POST"  class="form-horizontal">
			  {!! csrf_field() !!}

<div class="col-md-12">

<div class="panel panel-default">

<div class="panel-body">
<div class="form-group">
<label class="col-sm-3 control-label">{{ __('Activate the coupon') }} </label>
<div class="col-sm-9">

<label class="adminswitch">

<input name='statue' type="checkbox" value="{{ $content->statue }}" @if( $content->statue == 'active') checked='checked' @endif />

<span class="slider round"></span>
</label>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">{{ __('Coupon address') }}</label>
<div class="col-sm-9">
<input type="text" name="title" value="{{ $content->title }}" placeholder="{{ __('Coupon address') }}" class="form-control" >
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">{{ __('Coupon code') }}</label>
<div class="col-sm-9">
<input type="text" name="code" value="{{ $content->code }}" placeholder="Coupon code" class="form-control">
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">{{ __('Type') }}   </label>
<div class="col-sm-9">
<select name="discount_type" id="input-type" class="form-control">
<option value="percent" {{ $content->discount_type == 'percent' ? 'selected="selected"' : '' }} >{{ __('Percent reduction') }}  </option>
<option value="fixed" {{ $content->discount_type == 'fixed' ? 'selected="selected"' : '' }} >{{ __('Third memorization') }}</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">{{ __('Reducing value') }} </label>
<div class="col-sm-9">
<input type="text" name="discount" value="{{ $content->discount }}" placeholder="Reducing value" class="form-control">
</div>
</div>
<div style="display: none;" class="form-group">
<label class="col-sm-3 control-label">{{ __('For registered members only') }}  </label>
<div class="col-sm-9">
<label class="adminswitch">

<input name='logged' type="checkbox"  value="active" @if( $content->logged == 'active') checked='checked' @endif />
<span class="slider round"></span>
</label>
</div>
</div>
<div style="display: none;" class="form-group">
<label class="col-sm-3 control-label">{{ __('Free Shipping') }}  </label>
<div class="col-sm-9">
<label class="adminswitch">
<input name='shipping' type="checkbox"  value="active" @if( $content->shipping == 'active') checked='checked' @endif/>
<span class="slider round"></span>
</label>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">{{ __('the description') }} </label>
<div class="col-sm-9">
<textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $content->description }}</textarea>


</div>
</div>
<div style="display: none;" class="form-group">
<label class="col-sm-3 control-label">{{ __('The expiration date') }}  </label>
<div class="col-sm-9">
<div class="input-group date">
<input type="text" name="valid_from" value="{{ $content->date_start }}" placeholder="The expiration date" id="input-date-start" class="form-control">
<span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="icon-calendar3"></i></button>
</span></div>
</div>
</div>
<div style="display: none;" class="form-group">
<label class="col-sm-3 control-label">{{ __('Expiration date') }}</label>
<div class="col-sm-9">
<div class="input-group date">
<input type="text" name="valid_to" value="{{ $content->date_end }}" placeholder="Expiration date" class="form-control">
<span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="icon-calendar3"></i></button>
</span></div>
</div>
</div>
<div style="display: none;" class="form-group">    
<label class="col-sm-3 control-label">{{ __('Times of use') }} </label>
<div class="col-sm-9">
<input type="number" name="maxUsage" value="{{ $content->maxUsage }}" placeholder="Times of use" class="form-control">
</div>
</div>
<button type="submit" class="btn btn-block btn-primary">{{ __('Saving changes') }}<i class="icon-arrow-left13 position-right"></i></button>
</div>
</div>
</div>

<div class="col-md-4">





<div class="panel" style="margin-top: 35px;display: none;">
<div class="panel-body">
<h5 class="content-group">
<span class="label label-flat label-rounded label-icon border-grey text-grey mr-10">
<i class="icon-info3"></i>
</span>

{{ __('do you need help ?') }}
</h5>


<ul class="list list-icons">
<li>
<i class="icon-checkmark-circle text-success position-left"></i>
<b>{{ __('Coupon address') }} </b>
<br>
<p class="mg10">{{ __('The voucher title is just a title that you place so that you can distinguish between vouchers, it will not appear to the user') }} </p>
</li>
<li>

<i class="icon-checkmark-circle text-success position-left"></i>
<b>{{ __('Type') }}</b>
<br>
<p class="mg10">
{{ __('You can choose a percent discount, for example if someone buys and uses the voucher, he will get a discount at that percentage of the total price of the products.') }}</p>

</li>




<li>

<i class="icon-checkmark-circle text-success position-left"></i>
<b>{{ __('The expiration date') }}</b>
<br>
<p class="mg10">
{{ __('The date that visitors will be able to use this voucher, you can leave the field blank so that it can be used on time and without time') }}</p>

</li>





<li>

<i class="icon-checkmark-circle text-success position-left"></i>
<b>{{ __('Expiration date') }}</b>
<br>
<p class="mg10">
{{ __('The date on which the coupon will not be valid, you can leave the field blank so that it can be used on time and without time') }}</p>

</li>







<li>

<i class="icon-checkmark-circle text-success position-left"></i>
<b>{{ __('the description') }}  </b>
<br>
<p class="mg10">{{ __('Description is in order to give a description to this coupon, you can leave the field blank.') }}</p>

</li>
<li>

<i class="icon-checkmark-circle text-success position-left"></i>
<b> {{ __('Times of use') }}</b>
<br>
<p class="mg10"> {{ __('It is the number of times this coupon can be used, for example, it can be used and take advantage of the offer only 100 times
, You can leave it blank for unlimited use') }}

</p>

</li>


                        


</ul>
</div>                     
</div>







<br>

</div>
</form>

</div>
<!-- /content area -->



@endsection