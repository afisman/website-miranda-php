<?php
    require_once(__DIR__ .'/helpers/renderTemplate.php');
    $templateName = 'roomDetails';
    $values = ['title' => 'Room Details'];
    renderTemplate($templateName, $values);
?>