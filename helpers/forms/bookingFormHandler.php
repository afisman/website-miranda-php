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

        $stmt1 = $conn->prepare("SELECT COUNT(*) AS count
            FROM booking
            WHERE room = ?
            AND NOT (check_in >= ? OR check_out <= ?)");
        $stmt1->bind_param("iss", $room, $check_out, $check_in);
        $stmt1->execute();
        $result = $stmt1->get_result()->fetch_assoc();
        print_r($result);
        if($result["count"] > 0) {

            echo "<script>
            swal( 'Room is not available for these dates'
            );
            </script>";
            header("Location: index.php");
            exit();
        } else {
            $stmt = $conn->prepare("
            INSERT INTO booking
            (name, order_date, check_in, check_out, hour_check_in, hour_check_out, discount, special_request, status, room)
            VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssissi",  $name, $order_date, $check_in, $check_out, $hour_check_in, $hour_check_out, $discount, $special_request, $status, $room);
            $stmt->execute();

            echo "<script>
            swal(
            'Booking created successfully.'
            );
        </script>";
            $stmt->close();
            header("Location: index.php");
            exit();
        }
        
        $conn->close();
    }
} 
?>