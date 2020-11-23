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
            استرجاع معلومات الدخول لـ {{ env('APP_NAME') }}
        </div>
        <div class="bodymail">
            
            <div style="line-height:35px;">
                مرحبا <b>{{ $name }}</b>
                <br>
                لقد قمت بطلب استعادة كلمة المرور الخاصة بحسابك في موقع {{ env('APP_NAME') }} ، اضغط على الزر التالي لاسترجاعه
                
                ، رابط الإسترجاع صالح لمدة 30 دقيقة فقط
                <br>
    
            </div>
            <br>
            <center>
                <a href="{{ $link }}" class="link">إسترجاع كلمة المرور</a>
            </center>
            <br>
            <p style="color:#666666;">اذا لم تقم بهذه الخطوة ، رجاء تجاهل هذا البريد  </p>
            <p style="color:#666666;">إدارة موقع {{ env('APP_NAME') }} ، شكراً لك</p>
            <p style="color:#666666;">  </p>
            
            
        </div>
    </div>
</body>
</html>