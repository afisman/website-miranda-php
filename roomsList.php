<?php
    require_once(__DIR__ .'/helpers/renderTemplate.php');
    $templateName = 'roomsList';
    $values = ['title' => 'Rooms'];
    renderTemplate($templateName, $values);
?>