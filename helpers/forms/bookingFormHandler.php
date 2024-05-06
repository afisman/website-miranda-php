<?php
function bookingFormHandler ($conn, $room) {
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $order_date = date("Y-m-d H:i:s");
        $check_in = htmlspecialchars(date("Y-m-d",substr(strtotime($_POST["arrival"]), 0, 10)));
        $check_out = htmlspecialchars(date("Y-m-d",substr(strtotime($_POST["departure"]), 0, 10)));
        $hour_check_in = "12:00";
        $hour_check_out = "11:00";
        $discount = 0;
        $special_request = htmlspecialchars($_POST["special_request"]);
        $status = "Check In";
        
        $stmt = $conn->prepare("
        INSERT INTO booking
        (name, order_date, check_in, check_out, hour_check_in, hour_check_out, discount, special_request, status, room)
        VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssissi",  $name, $order_date, $check_in, $check_out, $hour_check_in, $hour_check_out, $discount, $special_request, $status, $room);
        $stmt->execute();
        echo "Created booking successfully";
        $stmt->close();
        $conn->close();
    }
} 
?>