<?php
session_start(); 



$db = new mysqli('localhost', 'bobfrwas', '', 'pets');


// Check if the database connection was successful
if ($db->connect_error) {
    die('Database connection failed: ' . $db->connect_error);
}


if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];

    // Fetch user data from the database based on their email
    $query = "SELECT * FROM real_users_table WHERE Email = '$user_email'";
    $result = $db->query($query);

    // Check if the query was successful 
    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();


        $file_path = $user['file_path'];
        $full_name = $user['Forename'] . ' ' . $user['Surname'];
        $full_name_test = 'John Doe';
       

        // Query for pets table 
        $query2 = "SELECT * FROM pets WHERE owner_name = '$full_name'";
        $result2 = $db->query($query2);


        if ($result2 && $result2->num_rows > 0) {
            $pet_names = array(); 
              
            while ($row = $result2->fetch_assoc()) {
                $pet_names[] = $row["name"];
            }
        
            echo 'Your pets:';
        
            for ($i = 0; $i < count($pet_names); $i++) {
                echo $pet_names[$i] . ", ";
            }
        } else {
            echo "No pets found for $full_name";
        }


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
                
                <h1><?php echo $user['Forename']; ?>!</h1>
                <p>Email: <?php echo $user['Email']; ?></p>
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