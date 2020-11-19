<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>لوحة التحكم</title>
	
	<!-- Global stylesheets -->
	<link href="{{ admin_assets }}/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{ admin_assets }}/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="{{ admin_assets }}/css/core.css" rel="stylesheet" type="text/css">
	<link href="{{ admin_assets }}/css/components.css" rel="stylesheet" type="text/css">
	<link href="{{ admin_assets }}/css/colors.css" rel="stylesheet" type="text/css">
	<link href="{{ admin_assets }}/css/arfont/font.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ admin_assets }}/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="{{ admin_assets }}/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="{{ admin_assets }}/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ admin_assets }}/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<script type="text/javascript" src="{{ admin_assets }}/js/core/app.js"></script>
	<script type="text/javascript" src="{{ admin_assets }}/js/pages/dashboard.js"></script>

    
</head>


<body class="login-container">
<div class="page-container login-container">
<div class="page-content">
    <div class="content-wrapper">
        <div class="content">
 
                
             
           
						<div class="panel panel-body login-form" >
                                 {%  if flash.success %}
                                <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                     {{ flash.success }}
                                </div>				
                                {%  endif %}


                                {%  if flash.error %}
                                <div class="alert alert-danger alert-styled-left alert-bordered">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                    {{ flash.error }}
                                </div>  
                                {%  endif %} 						
							<div class="text-center">
								<div class="icon-object border-success-300 text-success-300"><i class="icon-checkmark3"></i></div>
								<h5 class="content-group">تم تحديث كلمة المرور! <br><br>
								<small class="display-block">
								   قم بتسجيل الدخول الآن <br><br>
								   
								</small>
								</h5>
							</div>
						
							<a href="{{ path_for('login') }}" class="btn bg-blue btn-block"> <i class="icon-arrow-left13 position-right"></i>   تسجيل الدخول</a>
                        
						</div>


        </div>
    </div>
</div>
</div>
</body>
</html>