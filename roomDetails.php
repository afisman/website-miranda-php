<?php
require_once(__DIR__ .'/helpers/setup.php');
require_once(__DIR__ .'/helpers/connectionSQL.php');
require_once(__DIR__ .'/helpers/queries/roomsQueries.php');
require_once(__DIR__ .'/helpers/formatRoom.php');

$roomId = $_GET['id'];

$stmt = $conn->prepare($oneRoomQuery);
$stmt->bind_param('i', $roomId);
$stmt->execute();
$oneRoom = $stmt->get_result()->fetch_assoc();;

$roomsQuery = $offerRoomsQuery;

$allRoomsResult = $conn->query($roomsQuery);
$offerData = array();

$populatedArray = populateArray($allRoomsResult, $offerData);

$values = ['title' => 'Room Details', 'room'=>$oneRoom, 'offerRooms' => $populatedArray];
renderTemplate('roomDetails', $values);
?>