<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta http-equiv="refresh" content="0; url='display_data.php'" />
</head>
<body>
<?php
$servername = "localhost";
$username = "bobfrwas";
$password = "";

$conn = new mysqli($servername, $username, $password, "pets");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$query = "UPDATE pets SET name=?, age=?, type=?, owner_name=? WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssi", $_POST['name'], $_POST['age'], $_POST['type'], $_POST["owner_name"], $_POST['id']);
$stmt->execute();
$stmt->close();
$conn->close();
?>



</body>
</html>