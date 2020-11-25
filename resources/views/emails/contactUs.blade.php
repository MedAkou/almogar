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
        <div class="bodymail">
            <br>
            <p>{{ $emailMessage }}</p>
            <br>
            <b>{{ $name }}</b>
            <p>{{ $phone }}</p>
        </div>
    </div>
  
</body>
</html>