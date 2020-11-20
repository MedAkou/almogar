$(document).ready(function() {
    $("#checkout_card_number").attr('maxlength', '16');
});


var $cardinput = $('#checkout_card_number');
var $card = $('#talcartat');
$('#checkout_card_number').validateCreditCard(function(result) {
    //console.log(result);
    if (result.card_type != null) {
        switch (result.card_type.name) {
            case "visa":
                $card.attr("src", 'https://i.imgur.com/5Ce5rAk.png');
                break;

            case "visa_electron":
                $card.attr("src", 'https://i.imgur.com/5Ce5rAk.png');
                break;

            case "mastercard":
                $card.attr("src", 'https://i.imgur.com/ywCvqaC.png');
                break;

            case "maestro":
                $card.attr("src", 'https://i.imgur.com/5Ce5rAk.png');
                break;

            case "discover":
                $card.attr("src", 'https://i.imgur.com/m1a57aa.png');
                break;

            case "amex":
                $card.attr("src", 'https://i.imgur.com/5Ce5rAk.png');
                break;

            default:
                $card.attr("src", 'https://i.imgur.com/zZu9enW.png');
                break;
        }
    } else {
        $card.attr("src", 'https://i.imgur.com/zZu9enW.png');
    }

    // Check for valid card numbere - only show validation checks for invalid Luhn when length is correct so as not to confuse user as they type.
    if (result.length_valid || $cardinput.val().length > 16) {
        if (result.luhn_valid) {
            $cardinput.parent().removeClass('has-error').addClass('has-success');
        } else {
            $cardinput.parent().removeClass('has-success').addClass('has-error');
        }
    } else {
        $cardinput.parent().removeClass('has-success').removeClass('has-error');
    }
});