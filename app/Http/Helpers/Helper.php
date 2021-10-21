<?php

namespace App\Http\Helpers;

class Helper
{
    public static function priceVat($price, $vat){
        return ($price->amount * $price->price) * (1 + $vat);
    }
}
