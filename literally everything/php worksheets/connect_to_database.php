<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "bobfrwas"; 
$password = ""; 
$dbname = "game_website"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "connected";

?>


<head>
    <title>Test</title>
</head>