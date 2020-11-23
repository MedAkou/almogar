<!DOCTYPE html>
<html lang="ar" dir="rtl" >
<head>
    
    <!-- Page title -->
	<title> {{ __('login') }} </title>
    
    <!-- meta -->
   	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="لوحة التحكم">
    
    <!-- favicon -->
	<link rel="icon" type="image/x-icon" href="sadmin/images/favicon.png" /> 
 
        <!-- css style -->
	<link rel="stylesheet" type="text/css" href="/assets/admin/css/rtl.css" />
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- check for javascript -->
    <noscript>
        <meta http-equiv="refresh" content="0; url=http://www.google.com" />
    </noscript>
 
    <style>
          .has-feedback-left .form-control-feedback {
 right: auto;
}
.has-feedback-left .form-control-feedback {
 top: -14px;
}
body {
    background-image: linear-gradient(135deg, #52E5E7 5%, #130CB7 100%);
}

.login-form {
    border: 0;
    box-shadow: 0.75rem 0.75rem 1.75rem 0 rgba(0, 0, 0, 0.25);
}

input#email {
    height: 50px;
}

input#password {
    height: 50px;
}

.has-feedback-left .form-control {
    top: 40px !important;
}

.has-feedback-left .form-control-feedback {
    top: -9px;
}

.has-feedback-left .form-control-feedback i {
    color: #3071cd !important;
}


.login-container .login-form, .login-container .registration-form {
    margin: 0 auto 20px auto;
}
.login-container .login-form {
    width: 320px;
}

.login-container .content-wrapper {
    vertical-align: middle;
    display: table-cell;
}
.login-container .page-content {
    display: table-row;
    height: 100%;
}
.login-container {
    display: table;
    width: 100%;
    height: 100%;
}
.form-control-feedback2 {
    position: absolute;
    left: 13px;
    top: 15px;
    cursor: pointer;
}
    </style>

</head>

<body class="login-container">
<div class="page-container login-container">
<div class="page-content">
    <div class="content-wrapper">
        <div class="content">
           
           
       
  
           
             <form method="POST" action="{{ route('merchant.login') }}">
                {!! csrf_field() !!}
                      

                       <div class="panel panel-body login-form">

@if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif


                    <div class="text-center">
                        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                        <h5 class="content-group"><small class="display-block">{{ __('please insert login info') }}</small></h5>
                    </div>
                    <div class="form-group has-feedback has-feedback-left">
                       <input id="email" type="email" class="form-control " placeholder="{{ __('Email') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    </div>
                    <div class="form-group has-feedback has-feedback-left">
                        <input id="password" type="password" class="form-control " placeholder="{{ __('Password') }}"  name="password" required autocomplete="current-password">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>

                        <div class="form-control-feedback2">
                            <i class="icon-eye text-muted"></i>
                        </div>
                        
                    </div>



     <input class="form-check-input" type="checkbox" name="remember" id="remember" >
     <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
   <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>

                                  
                                    
                    </div>

                     

                       
                      
                        </div>
                    </form>
           
            
                    
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="{{ asset('/assets/admin/js/main.js') }}"></script>
<script>
    const $eye = $("i.icon-eye");
    const $input = $("input#password");

    $eye.click(()=>{
        $input.attr("type") == "password"
        ? $input.attr("type", "text")
        : $input.attr("type", "password");
    });
</script>
<script>
    
</script>

</body>
</html>