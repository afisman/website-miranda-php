<?php
$postContactQuery = "
    INSERT INTO contact 
            (image, full_name, email, phone, date, message, rating, is_read)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
";
?>