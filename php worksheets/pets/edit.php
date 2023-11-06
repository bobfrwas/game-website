<?php 

$servername = "localhost";
$username = "bobfrwas";
$password = "";

$conn = new mysqli($servername, $username, $password, "pets");

if ($conn->connect_error) {
    die("Connection failed". $conn->connect_error);
}

$sql = "Select * FROM pets WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt-> bind_param("i", $_GET['id']);
$row = $stmt->execute();
$result = $stmt-> get_result();
$pet = $result->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Combined Form</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="animate.css-main/animate.css">


</head>
<body>

<h1>Edit <?= $pet['name'] ?> </h1>

<form action="edit-action.php" method="POST">
<p>
    Name:
    <input type="text" name="name" value="<?= $pet["name"] ?>">
</p>

<p>
    Age:
    <input type="text" name="age" value="<?= $pet["age"] ?>">
</p>

<p>
    Type:
    <input type="text" name="type" value="<?= $pet["type"] ?>">
</p>

<p>
    <input type="submit" value="Update">
</p>
<input type="hidden" name="id" value="<?= $pet["id"] ?>">
</form>


</body>
</html>

<?php
    $result->free_result();
    $conn->close();
?>