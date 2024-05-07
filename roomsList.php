<?php
require_once(__DIR__ .'/helpers/setup.php');
require_once(__DIR__ .'/helpers/queries/availableRooms.php');
require_once(__DIR__ .'/helpers/formatRoom.php');

$checkIn = $_GET['departure'];
$checkOut = $_GET['arrival'];

$stmt = $conn->prepare($allBookingsQuery);
$stmt->bind_param("ss", $checkIn, $checkOut);
$stmt->execute();
$allBookingsQuery = $stmt->get_result();
$roomsListData = array();
$populatedArray = populateArray($allBookingsQuery, $roomsListData);
    
$values = ['title' => 'Rooms', 'rooms' => $populatedArray];
renderTemplate('roomsList', $values);
?>