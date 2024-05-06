<?php
require_once(__DIR__ ."/../blade/BladeOne.php");
require_once(__DIR__ .'/rateCalculator.php');

use eftec\bladeone\BladeOne; 

$views = __DIR__ . '/../views';
$cache = __DIR__ . '/../cache';
$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

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

    
function renderTemplate($templateName, $values) {
    global $blade;
    echo $blade->run($templateName, $values);
    }
?>