<html>
<head>
    <title>Email</title>
	<link rel="stylesheet" type="text/css" href="http://www.fontstatic.com/f=tanseek" />
    <meta charset="utf-8" />
    <style>
        .boxemail{
            width: 80%;
            margin: 20px auto;
            border-radius: 6px;
            overflow: hidden;
            -webkit-box-shadow: -2px -1px 27px -2px rgba(224,224,224,1);
            -moz-box-shadow: -2px -1px 27px -2px rgba(224,224,224,1);
            box-shadow: -2px -1px 27px -2px rgba(224,224,224,1);
            background: white;
            background-image: url('');
            background-repeat: no-repeat;
            background-position: bottom;
        }
        .head{
            background: #26cad3;
            text-align: center;
            padding: 20px 0;
            color: white;
            font-family: 'tanseek';
            font-size: 27px;
        }
        .bodymail{
            text-align: right;
            padding-right: 15px;
            padding-top: 20px;
            padding-bottom: 40px;
            direction: rtl;
            line-height: 33px;
        }
    </style>
</head>
<body style='background: whitesmoke;'>
    <div class="boxemail">
        <div class="head">
            {{ __('welcome to') }} {{ env('APP_NAME') }}
        </div>
        <div class="bodymail">
            {{ __('welcome') }} <b>{{ $name }}</b>
            <br>
            {{ __('You have been registered on the site, and this is your registration data:') }} <br>
            <b>{{ __('username') }}</b> : {{ $name }} <br>
            <b>{{ __('email') }}</b> :  {{ $email }} <br>
        </div>
    </div>
  
</body>
</html>