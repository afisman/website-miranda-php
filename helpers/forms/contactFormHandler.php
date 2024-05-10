<?php

function contactFormControl ($conn) {
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $image = "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";
        $name = htmlspecialchars($_POST["name"]);
        $email = htmlspecialchars($_POST["email"]);
        $phone = htmlspecialchars($_POST["phone"]);
        $date = date("Y/m/d");
        $subject = htmlspecialchars($_POST["subject"]);
        $message = htmlspecialchars($_POST["message"]);
        $rating = 5;
        $is_read = false;
    
        $stmt = $conn->prepare("
        INSERT INTO contact 
                (image, full_name, email, phone, date, message, subject, rating, is_read)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssii", $image, $name, $email, $phone, $date, $message, $subject, $rating, $is_read);
        $stmt->execute();
        echo "<script>
            swal(
            'Thank you for contacting us, we will read it and get back to you shortly.'
            );
        </script>";
        $stmt->close();
        $conn->close();
        die("<script>location.href = 'index.php'</script>");

    }
}

?>