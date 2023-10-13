<?php
$servername = "localhost";
$username = "bobfrwas"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "game_website"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if username or email already exists
    $table = "users"; // Replace with your table name
    $checkQuery = "SELECT * FROM $table WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        echo "Username or email already exists. Please choose a different one.";
    } else {
        // Insert user data into the database
        $insertQuery = "INSERT INTO $table (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            // Redirect to sign-in page with success message
            header("Location: sign_in.html?account_created_successfully");
            exit();
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>