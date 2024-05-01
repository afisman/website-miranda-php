<?php
    require_once(__DIR__ .'/helpers/renderTemplate.php');
    require_once(__DIR__ .'/helpers/connectionSQL.php');
    require_once(__DIR__ .'/helpers/queries/roomsQueries.php');

$roomsQuery = $allRoomsQuery;

$allRoomsResult = $conn->query($roomsQuery);
$data = array();

if ($allRoomsResult->num_rows > 0) {
  while($row = $allRoomsResult->fetch_assoc()) {
    $data[] = $row;
  }
} else {
  echo "0 results";
}

    $templateName = 'index';
    $values = ['title' => 'Home', 'rooms' => $data];
    renderTemplate($templateName, $values);
?>

