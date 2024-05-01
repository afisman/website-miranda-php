<?php
    require_once(__DIR__ .'/helpers/renderTemplate.php');
    require_once(__DIR__ .'/helpers/connectionSQL.php');
    require_once(__DIR__ .'/helpers/queries/roomsQueries.php');

    $roomsQuery = $allRoomsQuery;

    $allRoomsResult = $conn->query($roomsQuery);
    $roomsListData = array();

    if ($allRoomsResult->num_rows > 0) {
        while($row = $allRoomsResult->fetch_assoc()) {
        $roomsListData[] = $row;
    }
    } else {
        echo "0 results";
    }
    $templateName = 'roomsList';
    $values = ['title' => 'Rooms', 'rooms' => $roomsListData];
    renderTemplate($templateName, $values);
?>