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

$query = "UPDATE pets SET name=?, age=?, type=? WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssi", $_POST['name'], $_POST['age'], $_POST['type'], $_POST['id']);
$stmt->execute();
$stmt->close();
$conn->close();
?>



</body>
</html>