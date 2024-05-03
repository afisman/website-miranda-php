<?php
    function calculateRate($price, $discount) {
        $priceInCents = $price -($price*$discount/100);
        return round($priceInCents/100);
    }
?>