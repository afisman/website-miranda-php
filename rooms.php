<?php
require_once(__DIR__ .'/helpers/setup.php');
require_once(__DIR__ .'/helpers/queries/roomsQueries.php');
require_once(__DIR__ .'/helpers/formatRoom.php');

$allRoomsResult = $conn->query($allRoomsQuery);
$roomsData = array();

$populatedArray = populateArray($allRoomsResult, $roomsData);

$values = ['title' => 'Rooms', 'rooms' => $populatedArray];
renderTemplate('rooms', $values);
?>