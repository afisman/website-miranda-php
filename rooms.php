<?php
require_once(__DIR__ .'/helpers/setup.php');
require_once(__DIR__ .'/helpers/connectionSQL.php');
require_once(__DIR__ .'/helpers/queries/roomsQueries.php');
require_once(__DIR__ .'/helpers/arrayHelpers.php');

$allRoomsResult = $conn->query($allRoomsQuery);
$roomsData = array();

$populatedArray = populateArray($allRoomsResult, $roomsData);

// if ($allRoomsResult->num_rows > 0) {
//     while($row = $allRoomsResult->fetch_assoc()) {
//         $roomsData[] = $row;
//     }
// } else {
//     echo "0 results";
// }
$values = ['title' => 'Rooms', 'rooms' => $populatedArray];
renderTemplate('rooms', $values);
?>