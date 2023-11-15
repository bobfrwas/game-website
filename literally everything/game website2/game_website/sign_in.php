<?php

session_start();


$servername = "localhost";
$username = "bobfrwas";
$password = "";
$dbname = "game_website";


try {
$conn = new mysqli($servername, $username, $password, $dbname);}

catch (Exception $ex) {
    header('Location: index.php ') ;
}


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];


    $stmt = $conn->prepare("SELECT username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($username, $storedPassword);
    $stmt->fetch();
    $stmt->close();

    if ($storedPassword && $password == $storedPassword) {
        $_SESSION["user_email"] = $email;
        $_SESSION["username"] = $username; 
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid email or password. Please try again.";
    }
}


$conn->close();
?>