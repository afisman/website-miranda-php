<?php
require_once(__DIR__ .'/helpers/setup.php');
require_once(__DIR__ .'/helpers/queries/roomsQueries.php');
require_once(__DIR__ .'/helpers/formatRoom.php');
require_once(__DIR__ .'/helpers/forms/bookingFormHandler.php');

$roomId = $_GET['id'];

$stmt = $conn->prepare($oneRoomQuery);
$stmt->bind_param('i', $roomId);
$stmt->execute();
$oneRoom = formatRoom($stmt->get_result()->fetch_assoc());

$roomsQuery = $offerRoomsQuery;

$allRoomsResult = $conn->query($roomsQuery);
$offerData = array();

$populatedArray = populateArray($allRoomsResult, $offerData);


$values = ['title' => 'Room Details', 'room'=>$oneRoom, 'offerRooms' => $populatedArray];
renderTemplate('roomDetails', $values);
bookingFormHandler($conn, $roomId);
?>