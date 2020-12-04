
<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
  <head>
    <meta charset="utf-8">
    <title>INVOICE</title>
    <link rel="stylesheet" href="https://s3-eu-west-1.amazonaws.com/htmlpdfapi.production/free_html5_invoice_templates/example1/style.css" media="all" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="all" />
    <style>	
    	.product-image-list img {
    width: 90px !important;
	}
	#project div span {
	    text-align: left !important;
	}
	body{
		margin-bottom: 80px !important;
	}

  body#printed {
    height: initial !important;
}

#logo img {
    padding-top: 70px;
}

td.unit {
    text-align: center;
}

table tbody tr td:nth-child(2) {
    vertical-align: middle;
}

  @media print {
  @page { margin: 0px 30px; }
}
    </style>

</head>
  <body id="printed">
    <header class="clearfix">
      <div id="logo">
        <img src="https://o-bazaar.com/uploads/media/xVqE71pZkbaYeHAnJ5vIMaduPJeyL0WGhkIunrbl.png">
      </div>
      <h1>INVOICE <a id="printinvoice" href="javascript:;"><i class="fa fa-print" title="Click here to print" aria-hidden="true"></i>
</a></h1>
      <div id="project">
        <div><span>CLIENT</span> {{ $content->addresse->given_name }}</div>
        <div><span>ADDRESS</span> {{ $content->addresse->street }}, {{ $content->addresse->city }}, {{ $content->addresse->country_code }}, {{ $content->addresse->postal_code }}</div>
        <div><span>EMAIL</span> <a href="mailto:{{ $content->user->email }}">{{ $content->user->email }}</a></div>
        <div><span>PHONE</span> {{ $content->user->phone }}</div>
        <div><span>SHIPPING</span> {{ $content->shipping->name }}</div>
        <div><span>DATE</span> {{ $content->created_at }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">THUMBNAIL</th>
            <th class="desc">TITLE</th>
            <th>PRICE</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        	@php
        $total = 0;
    @endphp

                  @foreach($content->products as $product )
         <tr>
            <td>
		    <div class="product-image-list service"> 

		        @if($product->product)
		       {!! $product->product->presentThumbnail() !!}
		        @endif
		    </div>
            </td>
            <td class="desc">{{ $product->product->name }}</td>
            <td class="unit">{{ $product->price }}</td>
            <td class="unit">{{ $product->quantity }}</td>
            <td class="unit">{{ $product->price * $product->quantity }}</td>
         </tr>
         @php($total += $product->price * $product->quantity)
         @endforeach


          <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">{{ $content->currency }} {{ $total }}</td>
          </tr>
          <tr>
            <td colspan="4">SHIPPING</td>
            <td class="total">{{ $content->currency }} {{ $content->shipping->cost }}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">{{ $content->currency }} {{ $content->getTotal() }}</td>
          </tr>
        </tbody>
      </table>

    </main>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('#printinvoice').click(function(e){
	window.print()
        });
</script>
  </body>
</html>