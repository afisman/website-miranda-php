<?php
require_once(__DIR__ .'/helpers/setup.php');
require_once(__DIR__ .'/helpers/connectionSQL.php');
require_once(__DIR__ .'/helpers/queries/roomsQueries.php');
require_once(__DIR__ .'/helpers/arrayHelpers.php');

$allRoomsResult = $conn->query($allRoomsQuery);
$data = array();

$populatedArray = populateArray($allRoomsResult, $data);

$values = ['title' => 'Home', 'rooms' => $populatedArray];
renderTemplate('index', $values);
?>

