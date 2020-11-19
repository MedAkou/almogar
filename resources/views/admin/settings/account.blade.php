
@extends('admin/layout')
@section('title')
Account Setting
@endsection

@section('content')

<!-- Main content -->
<div class="content-wrapper">


<!-- Page header -->
<div class="page-header page-header-transparent">
<div class="page-header-content">
<div class="page-title">
<h1><span class="text-semibold"></span></h1>
<p class="text-muted"></p>
</div>

<div class="heading-elements">

</div>
</div>
</div>
<!-- /page header -->
<!-- Content area -->
<div class="content">


<div class="col-md-8">
<div class="panel panel-flat col-md-12">
<div class="panel-heading no-padding-bottom">
<h3 class="panel-title"></h3>
<p class="no-margin-bottom"></p>
</div>
<div class="panel-body">
<form class="form-horizontal" method="post" id='AdminGeneralInfo' action="">
<fieldset class="content-group">
<legend class="text-bold"></legend>
<div class="form-group">
<label class="control-label col-lg-3"></label>
<div class="col-lg-9">
<input type="text" class="form-control rf" value='' name="username" />
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-3"></label>
<div class="col-lg-9">
<input type="text" class="form-control rf" value='' name="email" />
</div>
</div>
<div class="form-group">
<input type="hidden" name="validate" value='validate_my_settings' />
<button type="submit" class="btn btn-primary btn-block active no-marin-bottom">Save Changes</button>
</div>
</fieldset>
</form>
<div id="result"></div>
</div>
</div>


<div class="panel panel-flat col-md-12">
<div class="panel-heading no-padding-bottom">
<h3 class="panel-title"></h3>
<p class="no-margin-bottom"></p>
</div>
<div class="panel-body">
<form class="form-horizontal" id="AdminPasswords" method="post" action="">

<fieldset class="content-group">
<legend class="text-bold"></legend>
<div class="form-group">
<label class="control-label col-lg-3"></label>
<div class="col-lg-9">
<input type="password" class="form-control rf"  name="old_pass" />
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-3"></label>
<div class="col-lg-9">
<input type="password" class="form-control rf" id="new_pass"  name="new_pass" />
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-3"></label>
<div class="col-lg-9"> 
<input type="password" class="form-control rf" id='new_pass_re' name="new_pass_re" />
</div>
</div>                                
<div class="form-group">
<input type="hidden" name="validate" value='validate_my_pass' />
<button type="submit" class="btn btn-primary btn-block active"></button>
</div>
</fieldset>
</form>
<div id="resultpassword"></div>
</div>
</div>


</div>

<div class="col-md-4">
<div class="sidebar-default sidebar-separate">
<div class="sidebar-content">

<!-- User details -->
<div class="content-group">
<div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">


<a href="#" class="display-inline-block content-group-sm">
    <img src="" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
</a>
<div class="content-group-sm">
    <h1 class="text-semibold no-margin-bottom" style="margin-top: -11px;">
     
    </h1>
    <h6></h6>

</div>

</div>

<div class="panel no-border-top no-border-radius-top">
<table class="table">
<tr>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
</tr>   
<tr>
    <td></td>
    <td></td>
</tr>       
<tr>
    <td colspan="2" class="text-center"><a href=""><i class="icon-switch2"></i> </a></td>
</tr>                                                                                                           
</table>


</div>
</div>
<!-- /user details -->



</div>
</div>
<!--                    </div>-->
</div>               



</div>
</div>
@endsection