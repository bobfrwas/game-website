<?php
// Start the session
session_start();

// Define your database connection details
$servername = "localhost";
$username = "bobfrwas";
$password = "";
$dbname = "pets";

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare the SQL statement to retrieve the user's stored password from the database
    $stmt = $conn->prepare("SELECT forename, password FROM real_users_table WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($username, $storedPassword);
    $stmt->fetch();
    $stmt->close();
    if ($stmt === false) {
        die("Error during statement preparation: " . $conn->error);
    }

    // Verify the entered password against the stored password
    if ($storedPassword && $password == $storedPassword) {
        // Successful login
        $_SESSION["user_email"] = $email;
        $_SESSION["username"] = $username; // Store the username in a session variable

        // Redirect to index.html
        header("Location: owner.php");
        exit();
    } else {
        // Invalid login
        echo "Invalid email or password. Please try again.";
    }
}


// Close the database connection
$conn->close();
?>