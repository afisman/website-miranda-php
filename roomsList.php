<?php
    require_once(__DIR__ .'/helpers/setup.php');
    require_once(__DIR__ .'/helpers/connectionSQL.php');
    require_once(__DIR__ .'/helpers/queries/availableRooms.php');


    $bookingsQuery = $allBookingsQuery;
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];

    $stmt = $conn->prepare($allBookingsQuery);
    $stmt->bind_param("ss", $checkIn, $checkOut);
    $stmt->execute();
    $allBookingsQuery = $stmt->get_result();
    $roomsListData = array();
    
    if ($allBookingsQuery->num_rows > 0) {
        while($row = $allBookingsQuery->fetch_assoc()) {
        $roomsListData[] = $row;
    }
    } else {
        echo "0 results";
    }
    $values = ['title' => 'Rooms', 'rooms' => $roomsListData];
    renderTemplate('roomsList', $values);
?>