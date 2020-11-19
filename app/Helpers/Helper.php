<?php 	




function price_format($price, $currency = '$', $position = 'left'){
    $price = floatval($price);
    $price = number_format($price, 2, '.', ',');
    if($position == 'right'){
        return $price.$currency;
    }
    return $currency.$price;
    // $format = $position == 'right' ? '%i'.$currency : $currency.'%i';
    // return money_format($format, $price);
}

