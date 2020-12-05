/* Settings Ajax Links */
var slug = $("body").attr("data-slug");
var quickview = "";
var wishlist = "";
var cartupdate = "/" + slug + "/cart/update";
var addtocard = "/" + slug + "/cart/add/";
var loadcartAgain = "/loadcartAgain/" + slug + "";
var couponlink = "/couponcheck";

/* End Settings Ajax Links */


$('body').on('click', '.ps-product__remove', function (e) {

    e.preventDefault();
    e.stopPropagation();
    var link = $(this).attr('href');
    $.get(link, function () { });
    $(this).closest('.ps-product--cart-mobile').remove();

});

$(".zoomimgs").ezPlus();


window.setInterval(function () {
    $(".single-visitors .nbrvirws").text(parseInt($(".single-visitors .nbrvirws").text()) + Math.floor((Math.random() * 5) + 1));
}, 10000);


function colorReplace(findHexColor, replaceWith) {

    function rgb2hex(rgb) {
        if (/^#[0-9A-F]{6}$/i.test(rgb)) return rgb;
        rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

        function hex(x) {
            return ("0" + parseInt(x).toString(16)).slice(-2);
        }
        return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }

    // Select and run a map function on every tag
    $('*').map(function (i, el) {
        // Get the computed styles of each tag
        var styles = window.getComputedStyle(el);

        // Go through each computed style and search for "color"
        Object.keys(styles).reduce(function (acc, k) {
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
colorReplace('#fcb800', 'rgb(195, 20, 50)');

// #654ea3 , #456780 , 


$(document).on('click', 'body #quickview', function (e) {

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    var formData = new FormData();
    formData.append('_token', token);

    $.ajax({
        url: link,
        type: 'GET',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function () {
            $("#overlay").fadeIn(300);
        },
        success: function (data) {
            $("#overlay").fadeOut(0);
            $('body #product-quickview').html(data);
            $('#product-quickview').modal('show');
        },
        error: function (response) {
            console.log('error');
            console.log(response);
        }
    });

});

$(document).on('click', 'body #wishlist', function (e) {

    if (!$('body').hasClass('has-logged')) {
        $('#modalUnauth').modal('show');
        return false;
    }

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    var formData = new FormData();
    formData.append('_token', token);

    $.ajax({
        url: link,
        type: 'GET',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",

        beforeSend: function () {
            $("#overlay").fadeIn(300);
        },

        success: function (data) {
            $("#overlay").fadeOut(0);
            $('body .wishlist_count').html(data);
            $('#modalwishlist').modal('show');
        },
        error: function (response) {
            console.log('error');
            console.log(response);
        }
    });

});


function updatequantitiy(input) {
    var slug = $('#slug').val();
    var token = $('meta[name="csrf-token"]').attr('content');
    var rawId = input.attr('data-product');
    var quantity = input.val();
    var product = input.attr('data-product-id');
    var cart_id = input.attr('data-cart');

    var formData = new FormData();

    formData.append('_token', token);
    formData.append('rawId', rawId);
    formData.append('quantity', quantity);
    formData.append('product_id', product);
    formData.append('cart_id', cart_id);


    $.ajax({
        type: 'POST',
        url: cartupdate,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    });
}

$(document).on('click', 'body .zaydnaks .up', function (e) {
    var num = +$(this).closest('.zaydnaks').find('.instantQuantity').val() + 1;
    $(this).closest('.zaydnaks').find('.instantQuantity').val(num);
    var input = $(this).closest('.zaydnaks').find('.instantQuantity');
    updatequantitiy(input);
    ikhaaaaan(input);

});

$(document).on('click', 'body .zaydnaks .down', function (e) {
    var num = +$(this).closest('.zaydnaks').find('.instantQuantity').val() - 1;
    if (num > 0) {
        $(this).closest('.zaydnaks').find('.instantQuantity').val(num);
        var input = $(this).closest('.zaydnaks').find('.instantQuantity');
        updatequantitiy(input);
        ikhaaaaan(input);
    }


});


var olua = "<span class='home_back' style='marign-right:10px;'><a href='/'><i class='icon-home'></i></a></span>";
$('.header-top .header-left.header-dropdowns').prepend(olua);


$('.ConfirmCard').click(function () {
    $('#StripeModal').modal('hide');
});

$('body [name="paymentmethod"]').on('change', function () {
    var method = $(this).val();
    if (method == 'stripe') {
        $('#StripeModal').modal('show');
    }
});


$('body .shipping-method-radio').on('change', function () {

    var subtotal = parseFloat($('#subtotal').val(), 10).toFixed(2);
    var price = parseFloat($('input[name=shippingMethod]:checked').attr('data-price'), 10).toFixed(2);
    var total = subtotal + price;
    var total = parseFloat(total, 10).toFixed(2);

    $('body .shippingRow').removeClass('d-none');
    $('body .shippingRow .shippingPrice').html(price);
    $('body .TotalPrice').html(total);

});


function getTotal() {


    var numbersFi = [];
    var total = 0;
    $('#order-cart-section .preis').each(function () {
        var number = parseFloat($(this).text()).toFixed(2);
        // alert(number);
        numbersFi.push(number);
    });

    var total = 0;
    for (var i = 0; i < numbersFi.length; i++) {
        total += Number(numbersFi[i]);
    }

    return total;
}


function getTotalM() {


    var numbersFi = [];
    var total = 0;
    $('#cart-mobile .preis').each(function () {
        var number = parseFloat($(this).val()).toFixed(2);
        // alert(number);
        numbersFi.push(number);
    });

    var total = 0;
    for (var i = 0; i < numbersFi.length; i++) {
        total += Number(numbersFi[i]);
    }

    return total;
}


function ikhaaaaan(input) {

    var token = $('meta[name="csrf-token"]').attr('content');
    var rawId = input.attr('data-product');

    var quantity = input.val();
    var product = input.attr('data-product-id');

    // change the price instant
    var price = input.attr('data-price');

    var subtotal = parseFloat(quantity, 10).toFixed(2) * parseFloat(price, 10).toFixed(2);
    input.closest('tr').find('.price').html(parseFloat(subtotal, 10).toFixed(2));


    $('#order-cart-section .product-col-' + product + '  span.preis').html(subtotal);

    $('.product-col-tele-' + product + '  input.preis').val(subtotal);
    $('.product-col-tele-' + product + '  span.prdqty').html(quantity);


    // change the price in the right sidbar summry
    $('#order-cart-section .product-col-' + product + ' .product-qty i').html(quantity);
    $('#order-cart-section .price-col-' + product + ' .preis').html(parseFloat(subtotal, 10).toFixed(2));

    var total = getTotal();
    $('#order-cart-section .TotalPrice').html(total.toFixed(2));

    var totalM = getTotalM();
    $('.TotalPriceM').html(totalM.toFixed(2));

    var formData = new FormData();

    formData.append('_token', token);
    formData.append('rawId', rawId);
    formData.append('quantity', quantity);

    $.ajax({
        type: 'POST',
        url: cartupdate,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
    });
}


// add product to cart
$(document).on('click', 'body #addtocard', function (e) {


    e.preventDefault();
    var formData = new FormData();
    var product = $(this).attr('data-product-id');
    var token = $('meta[name="csrf-token"]').attr('content');
    formData.append('product', product);


    var attr = $(this).attr('name');

    // For some browsers, `attr` is undefined; for others,
    // `attr` is false.  Check for both.
    if (typeof attr !== typeof undefined && attr !== false) {
        // ...
    }


    var quantity = 1;

    if (('#instantQuantity').length) {
        quantity = $('#instantQuantity').val();
    }

    if (quantity == null) {
        quantity = 1;
    }


    formData.append('quantity', quantity);

    formData.append('_token', token);
    $.ajax({
        url: addtocard + product,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "JSON",
        beforeSend: function () {
            $("#overlay").fadeIn(300);
        },
        success: function (data) {
            $("#overlay").fadeOut(0);
            $('#addedTocCart').modal('show');
            var formData = new FormData();
            formData.append('_token', token);
            $.ajax({
                url: loadcartAgain,
                type: 'GET',
                processData: false, // important
                contentType: false, // important
                data: formData,
                cache: false,
                dataType: "HTML",
                success: function (data) {
                    $('body .ps-cart__content').html(data);
                    var quantity = $('#cartcount').val();
                    // $('body .TotalPriceM').html('');
                    // $('.TotalPriceM').html('');
                    //$('#cart-mobile .ps-cart__footer').html('');


                    $('#cart-mobile .TotalPriceM').html($('#cart-mobile .jahnama').text());


                    $('.ps-cart--mini .header__extra span i').html(quantity);
                },
            });

        },

    });


    return false;


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


$("#shipbtn").click(function () {


});


$('#btnsubmite').click(function () {
    var name = $('#contact-name').val();
    var email = $('#contact-email').val();
    var phone = $('#contact-phone').val();

    if (name == '' || email == '' || phone == '') {
        alert('tous les champ sont obligatoire');
    } else {
        $('#formcontact').submit()
    }

});


$(function () {

    var $form = $(".require-validation");

    $('form.require-validation').bind('submit', function (e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function (i, el) {
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

$('#facturem').click(function () {
    $('#inputpaymentmethod').val('facture');
});

$('#paypalm').click(function () {
    $('#inputpaymentmethod').val('paypal');
});

$('#visam').click(function () {
    $('#inputpaymentmethod').val('stripe');
});

$('.carousel').carousel()


$('body .shipping-method-radio').on('change', function () {

    var subtotal = parseFloat($('#subtotal').val(), 10).toFixed(2);
    var price = parseFloat($('input[name=shippingMethod]:checked').attr('data-price'), 10).toFixed(2);
    var total = parseFloat(subtotal) + parseFloat(price);


    $('.shippingPrice').text(price);
    $('body .TotalPrice').html(total + '€');
    $('body #shippingPriceV').val(price);

    calcultotalcoupon();

});

// apply coupon
$(document).on('click', 'body #applyCoupon', function () {
    var formData = new FormData();
    var token = $('meta[name="csrf-token"]').attr('content');
    var coupon = $('#couponvalue').val();
    var total = parseFloat($('.TotalPrice').html().substring(2), 10).toFixed(2);
    formData.append('_token', token);
    formData.append('coupon', coupon);
    formData.append('total', total);
    $.ajax({
        url: couponlink,
        type: 'post',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "JSON",
        success: function (data) {
            //$('.TotalPrice').html("€ "+data.total);
            $('#couponV').val(data.discount);
            $('#typeDiscount').val(data.type);
            if (data.success == true) {
                $('.dyalcouponS').html(data.notification).show();
                $('.dyalcouponA').html(data.notification).hide();
            } else {
                $('.dyalcouponA').html(data.notification).show();
                $('.dyalcouponS').html(data.notification).hide();
            }

            calcultotalcoupon();
        }
    });
});

function calcultotalcoupon() {
    var couponV = $('#couponV').val();
    var typeDiscount = $('#typeDiscount').val();
    var shippingPriceV = $('#shippingPriceV').val();
    var totalPriceV = $('#totalPriceV').val();
    var shipandprice = (parseFloat(totalPriceV, 10) + parseFloat(shippingPriceV, 10));

    if (typeDiscount == "percent") {
        var total = (parseFloat(shipandprice, 10) - ((parseFloat(shipandprice, 10) * parseFloat(couponV, 10)) / 100)).toFixed(2);
        console.log(total);
        $('body .TotalPrice').html(total + '€');
    }

}


// Search script

function searchKeyUp(link, formData, results) {
    return $.ajax({
        url: link,
        type: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        cache: false,
        dataType: "JSON",
        success: function (response) {
            let lang = response.lang;
            if (response.products.data.length) {
                results.empty();
                results.slideDown();
                for (let i = 0; i < response.products.data.length; i++) {
                    results.append(`<p class="result d-flex justify-content-start" id="${response.products.data[i].id}" data-store="${response.products.data[i].store_id}">
                                    </p>`);
                    let result = $(`p#${response.products.data[i].id}`);
                    result.append(`<div class="img-cont">
                                                    <img src="${response.products.data[i].thumbnail}"}>
                                                </div>`);

                    result.append(`<span>${response.products.data[i].name[lang]}</span>`);
                }
                $("p.result").click(function () {
                    let productId = $(this)[0].id;
                    let productSlug = response.storeSlug[0].slug;
                    window.location.href = `/${productSlug}/shop/product/${productId}`;
                })
            } else {
                results.empty();
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}

$("#search-input").keyup(function () {

    const token = $('meta[name="csrf-token"]').attr('content');
    const link = $("#search-form").attr('data-link');
    const inputVal = $(this).val();
    const results = $("#results");
    const formData = new FormData();
    formData.append('q', inputVal);
    formData.append('_token', token);

    searchKeyUp(link, formData, results);
})

$("#search-input").blur(function () {
    const results = $("#results");
    results.slideUp();
})

$("#search-input-mobile").keyup(function () {

    const token = $('meta[name="csrf-token"]').attr('content');
    const link = $("#search-form-mobile").attr('data-link');
    const inputVal = $(this).val();
    const results = $("#results-mobile");
    const formData = new FormData();
    formData.append('q', inputVal);
    formData.append('_token', token);

    searchKeyUp(link, formData, results);
})

$("#search-input-mobile").blur(function () {
    const results = $("#results-mobile");
    results.slideUp();
})


// End search script

$("#addToCartForm").submit((e) => {
    e.preventDefault();
    const token = $('meta[name="csrf-token"]').attr('content');
    const link = $("#addToCartForm").attr('data-link');
    const quantity = $("#add-to-cart-quantity").val();
    console.log("Link: ", link);
    console.log("Quantity: ", quantity);
    const formData = new FormData();
    formData.append('quantity', quantity);
    formData.append('_token', token);

    $.ajax({
        url: link,
        type: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        cache: false,
        dataType: "JSON",
        beforeSend: function () {
            $("#overlay").fadeIn(300);
        },
        success: function (response) {
            $("#overlay").fadeOut(0);
            $('#addedTocCart').modal('show');
            var formData = new FormData();
            formData.append('_token', token);
            $.ajax({
                url: loadcartAgain,
                type: 'GET',
                processData: false, // important
                contentType: false, // important
                data: formData,
                cache: false,
                dataType: "HTML",
                success: function (data) {
                    $('body .ps-cart__content').html(data);
                    var quantity = $('#cartcount').val();
                    // $('body .TotalPriceM').html('');
                    // $('.TotalPriceM').html('');
                    //$('#cart-mobile .ps-cart__footer').html('');


                    $('#cart-mobile .TotalPriceM').html($('#cart-mobile .jahnama').text());


                    $('.ps-cart--mini .header__extra span i').html(quantity);
                },
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
})


$(document).ready(function () {
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: true
    });
});