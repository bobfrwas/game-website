<?php
session_start(); // Start the session

// Assuming you have a database connection established
// Replace 'your_database_name', 'your_username', 'your_password', and 'your_table_name' with your actual database details
$db = new mysqli('localhost', 'bobfrwas', '', 'game_website');

// Check if the database connection was successful
if ($db->connect_error) {
    die('Database connection failed: ' . $db->connect_error);
}

// Assuming you have an authenticated user and their email is stored in a session variable
// You can replace $_SESSION['user_email'] with your actual session variable name
if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];

    // Fetch user data from the database based on their email
    $query = "SELECT * FROM users WHERE email = '$user_email'";
    $result = $db->query($query);

    // Check if the query was successful and if the user exists
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();


        $file_path = $user['file_path'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my_account_style.css" rel="stylesheet">

</head>
<body>
    <div class="allign_center">
    <?php
    echo '<img src="' . $file_path . '" alt="Image Description">';?>
    <h1><?php echo $user['username']; ?>!</h1>
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Location: <?php echo $user['bio']; ?></p>
    </div>
    <!-- Add more profile information here -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

</body>
</html>
<?php
    } else {
        echo 'User not found.';
    }
} else {
    echo 'User email not found in session.';
}



// Close the database connection
$db->close();
?>