<?php
require_once(__DIR__ ."/../blade/BladeOne.php");
require_once(__DIR__ .'/rateCalculator.php');

use eftec\bladeone\BladeOne; 

$views = __DIR__ . '/../views';
$cache = __DIR__ . '/../cache';
$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

    
function renderTemplate($templateName, $values) {
    global $blade;
    echo $blade->run($templateName, $values);
    }
?>