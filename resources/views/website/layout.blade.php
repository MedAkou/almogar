@include('website/elements/header')

@yield('content')







<style type="text/css">
    .alerts-zone-website {
    background: #f27c36;
    padding: 15px;
    color: white;
    text-align: center;
}
@media (max-width: 600px) and (min-width: 0px) {
body {
    overflow-x: hidden;
}
.a9jdaw {
    overflow: hidden;
}
    li.page-item {

        display: none;
    }

    .page-item:first-child,
    .page-item:nth-child( 2 ),
    .page-item:nth-last-child( 2 ),
    .page-item:last-child,
    .page-item.active,
    .page-item.disabled {

        display: block;
    }
    .home-pagination {
    margin: 0 auto;
}
}
.divide-line.up-effect .product-default .product-action {
    transition: all .3s;
    opacity: 1;
}
</style>




@include('website/elements//store-footer')



<div class="modal" id="addedTocCart" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document" style="width:730px;">
    <div class="modal-content">
      <div class="modal-body">
          
        <h5>{{ __('item.added.cart.modal') }}</h5>
    <center>
    <a href="{{ route('cart',['store'  => $store ]) }}"  class="btn btn-primary cartaction">{{ __('View Shopping Cart') }}</a>
    <a href="#" data-toggle="modal" title="{{ __('Continue Shopping') }}" data-target="#addedTocCart" class="btn btn-primary cartaction">{{ __('Continue Shopping') }}</a>
    </center>
      </div>
     
    </div>
  </div>
</div>


<footer class="footer">
            <div class="footer-top info-boxes-container">
                <div class="container">
                    <div class="info-box">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>{{ __('FREE SHIPPING & RETURN') }}</h4>
                            <p>{{ __('Free shipping on all orders over $99.') }}</p>
                        </div>
                    </div>

                    <div class="info-box">
                        <i class="icon-us-dollar"></i>

                        <div class="info-box-content">
                            <h4>{{ __('MONEY BACK GUARANTEE') }}</h4>
                            <p>{{ __('100% money back guarantee') }}</p>
                        </div>
                    </div>

                    <div class="info-box">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>{{ __('ONLINE SUPPORT 24/7') }}</h4>
                            <p>{{ __('Lorem ipsum dolor sit amet.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="widget">
                                        <h4 class="widget-title">{{ __('My Account') }}</h4>

                                        <ul class="links">
                                             <li class="active"><a href="{{ route('home', ['store' => $store ]) }}">{{ __('Home') }}</a></li>
                          
                                            <li><a href="{{ route('about', ['store' => $store ]) }}">{{ __('About Us') }}</a></li>
                                            <li><a href="{{ route('contact', ['store' => $store ]) }}">{{ __('Contact Us') }}</a></li>
                                            <li><a href="{{ route('edit', ['store' => $store ]) }}">{{ __('My Account') }}</a></li>
                                            <li><a href="{{ route('orders', ['store' => $store ]) }}">{{ __('Orders History') }}</a></li>
                                            <li><a href="{{ route('user', ['store' => $store ]) }}" >{{ __('Login') }}</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="widget">
                                        <ul class="contact-info">
                                            <li>
                                                <span class="contact-info-label">{{ __('Address:') }}
                                                </span>

                                                {{ option('adresse') }}
                                            </li>
                                            <li>
                                                <span class="contact-info-label">{{ __('Phone:') }}</span><a href="tel:{{ option('phonenumber') }}">
                                                    
                                                    {{ option('phonenumber') }}

                                                </a>
                                            </li>
                                            <li>
                                                <span class="contact-info-label">{{ __('Email:') }}</span> <a href="mailto:{{ option('email') }}">{{ option('email') }}</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="widget">
                                        <h4 class="widget-title">{{ __('Main Features') }}</h4>
                                        
                                        <ul class="links">
                                            <li><a href="#">Super Fast Magento Theme</a></li>
                                            <li><a href="#">1st Fully working Ajax Theme</a></li>
                                            <li><a href="#">20 Unique Homepage Layouts</a></li>
                                            <li><a href="#">Powerful Admin Panel</a></li>
                                            <li><a href="#">Mobile & Retina Optimized</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="widget widget-newsletter">

                                <h4 class="widget-title">{{ __('Subscribe newsletter') }}</h4>
                                <p>Get all the latest information on Events,Sales and Offers. Sign up for newsletter today</p>
                                <form method="post" action="{{ route('subscribe', ['store' => $store ]) }}">
                                    @csrf
                                    <input type="email" name="email" class="form-control" placeholder="{{ __('Email address') }}" required>

                                    <input type="submit" class="btn" value="{{ __('Subscribe') }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="footer-bottom">

                    <p class="footer-copyright">
                            @php
                                $copyright = option('footer_copyright');
                            @endphp
                            @if(!empty($copyright))
                                    {{ $copyright }}
                            @else
                            &copy; <script>   var CurrentYear = new Date().getFullYear(); document.write(CurrentYear); </script> All Rights Reserved
                            @endif
                    </p>

                    <img src="/assets/front/images/payments.png" alt="payment methods" class="footer-payments">

                    <div class="social-icons">
                         @php
                                $facebook = option('facebook');
                                $twitter = option('twitter');
                                $instagram = option('instagram');
                                $youtube = option('youtube');
                                $linkedIn = option('linkedIn');
                        @endphp
                        @if(!empty($facebook))
                                    <a href="{{ $facebook }}" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                        @endif
                        @if(!empty($twitter))
                                    <a href="{{ $twitter }}" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                        @endif
                        @if(!empty($instagram))
                                    <a href="{{ $instagram }}" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
                        @endif
                        @if(!empty($youtube))
                                    <a href="{{ $youtube }}" class="social-icon" target="_blank"><i class="icon-youtube"></i></a>
                        @endif
                        @if(!empty($linkedIn))
                                    <a href="{{ $linkedIn }}" class="social-icon" target="_blank"><i class="icon-linkedin"></i></a>
                        @endif                                                                        
                        
                    </div>
                </div>
            </div>
        </footer>







    @include('cookieConsent::index')

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>
    <script src="/assets/front/js/All.js"></script>


<style type="text/css">
    .home_back {
        margin-right: 28px;
    background: #00000014;
    padding: 12px;
    color: black;
    position: relative;
    left: -16px;
    top: 0px;
    }
</style>
<script>


function colorReplace(findHexColor, replaceWith) {
  // Convert rgb color strings to hex
  // REF: https://stackoverflow.com/a/3627747/1938889
  function rgb2hex(rgb) {
    if (/^#[0-9A-F]{6}$/i.test(rgb)) return rgb;
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    function hex(x) {
      return ("0" + parseInt(x).toString(16)).slice(-2);
    }
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
  }

  // Select and run a map function on every tag
  $('*').map(function(i, el) {
    // Get the computed styles of each tag
    var styles = window.getComputedStyle(el);

    // Go through each computed style and search for "color"
    Object.keys(styles).reduce(function(acc, k) {
      var name = styles[k];
      var value = styles.getPropertyValue(name);
      if (value !== null && name.indexOf("color") >= 0) {
        // Convert the rgb color to hex and compare with the target color
        if (value.indexOf("rgb(") >= 0 && rgb2hex(value) === findHexColor) {
          // Replace the color on this found color attribute
          $(el).css(name, replaceWith);
        }
      }
    });
  });
}
colorReplace('#fcb800', '#c31432');


var olua =  "<span class='home_back' style='marign-right:10px;'><a href='/'><i class='icon-home'></i></a></span>";
$('.header-top .header-left.header-dropdowns').prepend(olua);





$('.ConfirmCard').click(function(){
    $('#StripeModal').modal('hide');
});

$('body [name="paymentmethod"]').on('change', function() {
    var method = $(this).val();
    if(method == 'stripe'){
        $('#StripeModal').modal('show');
    }
});




$('body .shipping-method-radio').on('change', function() {

    var subtotal = parseFloat ( $('#subtotal').val(), 10).toFixed(2);
    var price = parseFloat ( $('input[name=shippingMethod]:checked').attr('data-price'), 10).toFixed(2);
    var total = subtotal + price ;
	var total =  parseFloat ( total , 10 ).toFixed(2);

    $('body .shippingRow').removeClass('d-none');
    $('body .shippingRow .shippingPrice').html(price);
    $('body .TotalPrice').html(total);

});



function getTotal(){

    
    var numbersFi = [];
    var total = 0;
    $('#order-cart-section .price-col').each(function(){
        var number = parseFloat($(this).find('span').text()).toFixed(2);
        numbersFi.push(number);
		//total = parseFloat(total) + number;
    });

    var total = 0;
    for (var i = 0; i < numbersFi.length; i++) {
        total += numbersFi[i] << 0;
    }

    return total;
}



// delete file
$('body .quantity-ajax').change(function(e){

            e.preventDefault();
            var token   = $('meta[name="csrf-token"]').attr('content');
            var rawId    = $(this).attr('data-product');
            var quantity = $(this).val();
            var product = $(this).attr('data-product-id');

            // change the price instant
            var price    = $(this).attr('data-price');
            var subtotal = parseFloat (quantity, 10).toFixed(2) * parseFloat (price, 10).toFixed(2);
            $(this).closest('tr').find('.product-subtotal').html(parseFloat (subtotal, 10).toFixed(2) );
            
            // change the price in the right sidbar summry
            $('#order-cart-section .product-col-'+product+' .product-qty i').html(quantity);
            $('#order-cart-section .price-col-'+product+' span').html(parseFloat (subtotal, 10).toFixed(2) );

            var total = getTotal();
            $('#order-cart-section .TotalPrice').html(total);

            var formData = new FormData();

            formData.append('_token', token);  
            formData.append('rawId', rawId);  
            formData.append('quantity', quantity);  
            
            $.ajax({
              type: 'POST',
              url: '{{ route('cart.update', ['store' => $store ]) }}',
              data:formData,
              cache:false,
              contentType: false,
              processData: false,
              success: function(data) {
            },

        });                             
});




// add product to cart
$(document).on('click', 'body .btn-add-cart', function(e) {


	console.log('start');

    e.preventDefault();
     var formData = new FormData();
     var product = $(this).attr('data-product-id');   
     var token   = $('meta[name="csrf-token"]').attr('content');
     formData.append('product', product);   


    var attr = $(this).attr('name');

    // For some browsers, `attr` is undefined; for others,
    // `attr` is false.  Check for both.
    if (typeof attr !== typeof undefined && attr !== false) {
        // ...
    }


     var quantity = 1;

     if(('#instantQuantity').length){
        quantity = $('#instantQuantity').val();
     }

     if (quantity == null){
        quantity = 1;
     }

     console.log('second');
     console.log('quantity : ' +  quantity);

     formData.append('quantity', quantity);   

     formData.append('_token', token);  
     $.ajax({
        url: '/{{ $store }}/cart/add/'+product,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "JSON",
        success: function(data) {
        	console.log('success');
            $('#addedTocCart').modal('show');
                console.log('before load');
    var formData = new FormData();
    formData.append('_token', token);  
     $.ajax({
        url: '/loadcartAgain/{{ $store }}',
        type: 'GET',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "HTML",
        success: function(data) {
                $('body .cart-dropdown').html(data);

        },
     });

     return false;
        },
        error : function(response){
        	console.log('error');
        	console.log(response);
        }
     });













});


/*

    function alignModal(){
        var modalDialog = $(this).find(".modal-dialog");
        // Applying the top margin on modal dialog to align it vertically center
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }

    $(".modal").on("shown.bs.modal", alignModal);


 // Align modal when user resize the window
    $(window).on("resize", function(){
        $(".modal:visible").each(alignModal);
    }); 



/*
// remove product from cart
$(document).on('click', 'body .btn-remove-cart', function() {
     var formData = new FormData();
     var product = $(this).attr('data-product-id');   
     var rowID = $(this).attr('data-row-id');   
     var token   = $('meta[name="csrf-token"]').attr('content');
     formData.append('product', product);   
     formData.append('_token', token);  
     formData.append('rowID', rowID);  
     $.ajax({
        url: '/cart/remove',
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "JSON",
        success: function(data) {
            window.location.reload();
        },
     });
});
*/













$("#shipbtn").click(function(){


});


        $('#btnsubmite').click(function(){
  var name = $('#contact-name').val();
var email = $('#contact-email').val();
var phone = $('#contact-phone').val();
  
  if (name=='' || email=='' || phone==''){
      alert('tous les champ sont obligatoire');
  }
    else {
      $('#formcontact').submit()
  }

});
</script>




<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form         = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   
});
</script>



  {{ option('thebottomofthesite') }}
        </body>
</html>