<?php
require_once(__DIR__ .'/helpers/setup.php');
require_once(__DIR__ .'/helpers/forms/contactFormHandler.php');

contactFormControl($conn);
$values = ['title' => 'Contact'];
renderTemplate('contact', $values);
?>