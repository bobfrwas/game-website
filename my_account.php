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
    <link href="style.css" rel="stylesheet">

</head>
<body>


<div class="container-fluid" style="padding-bottom: 2rem;">
    <div class="row" style="background-color: grey;">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand" href="index.php">Logo</a>
                    <ul class="navbar-nav flex-row">
    <?php
    if (isset($_SESSION["username"])) {
        echo '<li class="nav-item dropdown">';
        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
        echo $_SESSION["username"];
        echo '</a>';
        echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        echo '<li><a class="dropdown-item" href="my_account.php">Profile</a></li>';
        echo '<li><hr class="dropdown-divider"></li>';
        echo '<li><a class="dropdown-item" href="#">Settings</a></li>';
        echo '<li><a class="dropdown-item" href="sign_out.php">Sign Out</a></li>';  // Add the sign-out link here
        echo '</ul>';
        echo '</li>';
    } else {
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="create_an_account.html">Create an Account</a>';
        echo '</li>';
        echo '<li class="nav-item">';
        echo '<a class="nav-link" href="sign_in.html">Sign In</a>';
        echo '</li>';
    }
    ?>
</ul>
                </div>
            </nav>
        </div>
    </div>
</div>


<div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <img src="<?php echo $file_path; ?>" alt="Image Description" style="padding-bottom: 2rem;">
                <a href="update_pfp.php" >
        <button>Change pfp</button> </a>
                
                <h1><?php echo $user['username']; ?>!</h1>
                <p>Email: <?php echo $user['email']; ?></p>
                <p>Bio: <?php echo $user['bio']; ?></p>
                
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>


    <script>
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
    });
</script>



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