<?php
session_start();

$servername = "localhost";
$username = "bobfrwas";
$password = "";
$dbname = "pets";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // If the connection fails, kill it
}

$query = "INSERT INTO pets (name, age, type) VALUES (?, ?, ?)";// Store the sql euery that needs to be executed
$stmt = $conn->prepare($query);//execute the sql query

if (!$stmt) {
    die("Error during statement preparation: " . $conn->error);// kill it if there is an error
}

$name = $_POST["name"];//store the name that was posted from the html file as $name to make it easier to read and write
$age = $_POST["age"];//store the age that was posted from the html file as $age to make it easier to read and write
$type = $_POST["type"];//store the type that was posted from the html file as $type to make it easier to read and write




$stmt->bind_param("sss", $_POST['name'], $_POST['age'], $_POST['type']);
if (!$stmt->execute()) {
    die("Error during statement execution: " . $stmt->error);
}
else {
    echo "Successfully booked appointment. Your details: Name:<b> $name </b>, Age: <b> $age </b>, Type:<b> $type </b>"; 
}




$stmt->close();
$conn->close();
?>