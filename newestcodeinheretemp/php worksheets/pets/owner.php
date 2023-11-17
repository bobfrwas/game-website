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

        // Query for pets table 
        $query2 = "SELECT * FROM pets WHERE owner_name = '$full_name'";
        $result2 = $db->query($query2);

        // Fetch all pet names into an array
        $pet_names = array();
        while ($row = $result2->fetch_assoc()) {
            $pet_names[] = $row["name"];
            $pet_age = $row["age"];
            $pet_image = $row['file_path'];
            
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
<!-- Rest of your HTML code -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
        <div class="container-fluid">
            <img src="<?php echo $file_path; ?>" alt="Image Description" style="padding-bottom: 2rem;">
            <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>

            
            <h1><?php echo $user['Forename']; ?>!</h1>
            <p>Email: <?php echo $user['Email']; ?></p>

            <p>Your pets: <?php echo implode(', ', $pet_names); ?></p>

            <table>
                <tr>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Type</th>
                    <th>Owner's name</th>
                    <th>Actions</th>
                </tr>

                <?php
                foreach ($result2 as $row) {
                    echo "<tr>";
                    echo "<td>{$row["file_path"]}</td>";
                    echo "<td>{$row["id"]}</td>";
                    echo "<td>{$row["name"]}</td>";
                    echo "<td>{$row["age"]}</td>";
                    echo "<td>{$row["type"]}</td>";
                    echo "<td>{$row["owner_name"]}</td>";
                    echo '<td><a href="edit.php?id='.$row["id"].'">Edit</a></td>';
                    echo '<td><button type="submit" class="btn btn-danger"><a href="delete-action.php?id='.$row["id"].'">Delete</a></button></td>';
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
        <div class="container-fluid">
            <img src="<?php echo $file_path; ?>" alt="Image Description" style="padding-bottom: 2rem;">
            <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Dropdown button
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><a class="dropdown-item" href="#">Something else here</a></li>
  </ul>
</div>

<?php foreach ($result2 as $row) { ?>
    <div class="row">
        <div class="col-md-6">
            <?php echo $row["file_path"] ?>
            <img src="<?php echo $row['file_path']; ?>" style="padding-bottom: 2rem;">
        </div>
        <div class="col-md-6">
            <h1><?php echo $row['name']; ?>!</h1>
            <h3><?php echo $row['age']; ?>!</h3>
            <h3><?php echo $row['type']; ?>!</h3> 
        </div>
    </div>
<?php } ?>
            


            <p>Your pets: <?php echo implode(', ', $pet_names); ?></p>



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