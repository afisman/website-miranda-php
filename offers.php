<?php
require_once(__DIR__ .'/helpers/setup.php');
require_once(__DIR__ .'/helpers/connectionSQL.php');
require_once(__DIR__ .'/helpers/queries/roomsQueries.php');
require_once(__DIR__ .'/helpers/arrayHelpers.php');

$allRoomsResult = $conn->query($offerRoomsQuery);
$offerData = array();

$populatedArray = populateArray($allRoomsResult, $offerData);
$values = ['title' => 'Offers', 'rooms' => $populatedArray];
renderTemplate('offers', $values);
?>