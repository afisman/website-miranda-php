<?php
require_once(__DIR__ .'/helpers/setup.php');
require_once(__DIR__ .'/helpers/connectionSQL.php');
require_once(__DIR__ .'/helpers/queries/roomsQueries.php');

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
    $templateName = 'offers';
    $values = ['title' => 'Offers', 'rooms' => $offerData];
    renderTemplate('offers', $values);
?>