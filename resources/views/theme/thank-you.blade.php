@extends(\System::$ACTIVE_THEME_PATH.'/pages-layout')
@section('title')
{{ __('thank you') }}
@endsection

<style>
    input, button {
	font: 400 14px/1.6 'Raleway', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
}

button {
	cursor: pointer;
}

.or {
	height: 1px;
	width: 100%;
	background-color: #cdcdd2;
	position: relative;
	margin: 40px 0;
}

	.or:after {
		display: block;
		content: "OR";
		position: absolute;
		top: -9px;
		font-size: 12px;
		font-weight: 600;
		color: #6f6f7f;
		background-color: #f7f7f7;
		padding: 0 30px;
		left: 50%;
		transform: translateX(-50%);
	}


.container {
	max-width: 970px;
	margin: 0 auto;
	padding: 0 10px;
}

header {
	background: #fbfbfb url('https://www.mark-eriksson.com/work/designs/ThankYou/img/header-strip.jpg') repeat-x bottom left;
	padding: 20px 0 75px;
}

.header__top{
    background-color: #fbfbfb !important;
}

main {
	padding: 60px 0;
}

	main .thankyou {
		margin-bottom: 35px;
		text-align: center;
	}

		main .thankyou h1 {
			font: 700 40px/1 'Merriweather', serif;
			margin-bottom: 20px;
		}

		main .thankyou p {
			font-size: 15px;
		}

	main .row {
		display: flex;
		justify-content: space-between;
	}

		main .row .details {
			max-width: 55%;
		}

		main .row .share {
			max-width: 35%;
		}

	main h3 {
		font-size: 24px;
		margin-bottom: 8px;
	}

	main p {
		line-height: 1.7;
		margin: 15px 0;
		font-size: 15px;
	}

	main p.smallprint {
		font-style: italic;
		font-size: 11px;
	}

	main .content-box {
		border: 1px solid #cdcdd2;
		padding: 20px;
		font-size: 15px;
		border-radius: 4px;
		margin: 25px 0;
	}

		main .content-box .content-box-title {
			font-weight: 600;
			font-family: 'Raleway';
			font-size: 16px;
			margin-bottom: 4px;
		}

		main .content-box address {
			font-style: normal;
		}

		main .content-box .payment-card {
			padding-left: 50px;
		}

			

	main dl {
		font-size: 15px;
	}

		main dl dt {
			float: left;
		}

			main dl dt {
				clear: both;
			}

		main dl dd {
			float: right;
			margin-bottom: 6px;
		}

		main dl dt.big, main dl dd.big {
			font-size: 19px;
			font-weight: 600;
		}

	main .share p {
		font-size: 13px;
	}

	main .share .email {
		margin: 10px 0;
	}

		main .share .email input, main .share .email button {
			display: block;
			width: 100%;
			padding: 15px 0;
		}

		main .share .email input {
			background-color: transparent;
			border: 1px solid #cdcdd2;
			padding-left: 16px;
			padding-right: 16px;
			font-size: 15px;
			margin-bottom: 20px;
			border-radius: 4px;
		}

		main .share .email .bigbutton {
			text-transform: uppercase;
			background-color: #fd6d4d;
		}

	main .share .bigbutton {
		font-weight: 600;
		color: #fff;
		font-size: 13px;
		text-align: center;
		border-radius: 4px;
		border: 0;
		padding: 15px 0;
		width: 100%;
		display: block;
	}

	main .share .bigbutton.social {
		background-color: #3d3d5e;
		font-size: 15px;
		position: relative;
		margin: 20px 0;
	}

	main .share .bigbutton.social i {
		font-size: 26px;
		position: absolute;
		top: 12px;
		left: 20%;
		margin-right: 8px
	}

	main .share .mylink {
		margin-top: 15px;
		display: flex;
	}

		main .share .mylink input,
		main .share .mylink button {
			padding: 18px 0;
			border-radius: 4px;
			border: 0;
			float: left;
		}

		main .share .mylink input {
			border: 1px dashed #cdcdd2;
			background-color: transparent;
			width: 70%;
			border-top-right-radius: 0;
			border-bottom-right-radius: 0;
			padding-left: 20px;
			padding-right: 20px;
			border-right: none;
		}

		main .share .mylink button {
			width: 30%;
			border-top-left-radius: 0;
			border-bottom-left-radius: 0;
			border: 1px solid #cdcdd2;
			background-color: #cdcdd2;
			color: #fff;
			text-transform: uppercase;
			font-weight: 600;
			font-size: 13px
		}




@media only screen and (max-width: 800px) {
	main .row .details, main .row .share { width: 100%; }
}

@media only screen and (max-width: 700px) {
	main .row {
		display: block;
	}
	
	main .row .details, main .row .share {
		max-width: 100%;
	}
	
	main .row .share {
		margin-top: 80px;
	}
}


@media only screen and (max-width: 500px) {
	main .thankyou h1 {
		font-size: 36px;
		line-height: 1.4;
	}
}

@media only screen and (max-width: 420px) {
	main .thankyou h1 {
		font-size: 32px;
	}
}

*, *:before, *:after {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
	outline: none;
	-webkit-font-smoothing: antialiased;
}

.cf:before, .cf:after {
	display: table;
	content: " ";
	font-size: 0;
}

.cf:after {
	clear: both;
}

.left { float: left; }
.right { float: right; }
</style>

@section('content')

<main>
	<div class="container">

		<section class="thankyou">
			<h1>{{ __('A great big thank you!') }}</h1>

			<p>
				{{ __('Thank You') }}, <strong>{{ $content->user->email }}</strong>!<br />
				{{ __('For choosing us and being so awesome all at once.') }}
			</p>
		</section>

		<div class="row">

			<div class="container">

				<div class="col-md-8 offset-2">
                    <h3>{{ __('Details') }}</h3>

				<p>
                    
                    {{__('You purchased the')}} : <strong>@foreach($content->products as $product )  {{ $product->product->name }} ,  @endforeach</strong><br />
                    @php $total = 0; @endphp
                    {{__('You will be charged')}} : <strong> {{ System::currency() }} {{ $content->subtotal }} </strong>
                    
				</p>


				<div class="content-box">
					<h4 class="content-box-title">{{__('Primary Contact')}}</h4>
					<address>
						{{ $content->addresse->given_name }}<br />
						{{ $content->addresse->street }} <br />
						{{ $content->addresse->country_code }}<br />
						{{ $content->addresse->city }} , {{ $content->addresse->postal_code }}
					</address>
				</div>

				<div class="content-box">
					<h4 class="content-box-title">{{__('Payment Method')}}</h4>
					<div class="payment-card amex">{{ $content->payement->method }} </div>
				</div>

				<dl class="cf">
					<dt>{{__('Subtotal')}}</dt>
					<dd>{{ System::currency() }} {{ $content->subtotal }}</dd>

					<dt>{{__('shipping')}}</dt>
					<dd>{{ $content->currency }}  {{ $content->shipping->cost }} @if(empty($content->shipping->cost)) {{ System::currency() }} 0 @endif</dd>

					<dt class="big">{{__('order.total')}}</dt>
					<dd class="big"> {{ System::currency() }} {{ $content->getTotal() }}</dd>
				</dl>
                </div>

			</div>

			@if ($content->payement->method == 'paypal')
                <style>
                    main .content-box .payment-card.amex {
                        background: url('https://i.imgur.com/vDs17MR.png') no-repeat;
                        background-size: contain;
                    }
                </style>
            @endif
            @if ($content->payement->method == 'stripe')
                <style>
                    main .content-box .payment-card.amex {
                        background: url('https://i.imgur.com/vJEpDih.png') no-repeat;
                        background-size: contain;
                    }
                </style>
            @endif
            @if ($content->payement->method == 'facture')
                <style>
                    main .content-box .payment-card.amex {
                        background: url('https://i.imgur.com/9gtHG0L.png') no-repeat;
                        background-size: contain;
                    }
                </style>
            @endif

		</div>

	</div>
</main>

@endsection