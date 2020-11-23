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
        .link{
            background:#26cad3;
            display:inline-block;
            color:white;
            padding:15px 30px;
            text-decoration:none;
            margin-top:10px;
            border-radius:3px;
        }
    </style>
</head>
<body style='background: whitesmoke;'>
    <div class="boxemail">
        <div class="head">
            {{ __('Retrieve login information for') }} {{ env('APP_NAME') }}
        </div>
        <div class="bodymail">
            
            <div style="line-height:35px;">
                {{ __('welcome') }} <b>{{ $name }}</b>
                <br>
                {{ __('you have requested to recover the password for your account at the site') }} {{ env('APP_NAME') }} ، {{ __('press next button to retrieve it') }}
                
                ، {{ __('the return link is only valid for 30 minutes') }}
                <br>
    
            </div>
            <br>
            <center>
                <a href="{{ $link }}" class="link">{{ __('Password recovery') }}</a>
            </center>
            <br>
            <p style="color:#666666;">{{ __('If you do not do this step, please ignore this email') }}</p>
            <p style="color:#666666;">{{ __('Site management') }} {{ env('APP_NAME') }} ، {{ __('thank you') }}</p>
            <p style="color:#666666;">  </p>
    </div>
</body>
</html>