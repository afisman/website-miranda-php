<?php
require_once(__DIR__ .'/helpers/setup.php');
require_once(__DIR__ .'/helpers/connectionSQL.php');
require_once(__DIR__ .'/helpers/queries/roomsQueries.php');

$roomId = $_GET['id'];

$stmt = $conn->prepare($oneRoomQuery);
$stmt->bind_param('i', $roomId);
$stmt->execute();
$oneRoom = $stmt->get_result()->fetch_assoc();;

$roomsQuery = $offerRoomsQuery;

$allRoomsResult = $conn->query($roomsQuery);
$offerData = array();

if ($allRoomsResult->num_rows > 0) {
    while($row = $allRoomsResult->fetch_assoc()) {
        $offerData[] = $row;
    }
} else {
    echo "0 results";
}
$values = ['title' => 'Room Details', 'room'=>$oneRoom, 'offerRooms' => $offerData];
renderTemplate('roomDetails', $values);
?>