<?php
$env = parse_ini_file('.env');

$servername =$env['SQL_HOST'];
$username = $env['SQL_USERNAME'];
$password = $env['SQL_PASSWORD'];
$dbName = $env['SQL_DB_NAME'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>