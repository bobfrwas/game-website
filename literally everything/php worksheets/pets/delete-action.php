!<!DOCTYPE html>
<head>
    <meta http-equiv="refresh" content="0; url='display_data.php'" />
</head>

<?php 
include "library/db.php";

$conn = connect();
delete_pet($_GET["id"], $conn);




exit();
?>