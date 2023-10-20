<?php
session_start();

$db = new mysqli('localhost', 'bobfrwas', '', 'game_website');

if ($db->connect_error) {
    die('Database connection failed: ' . $db->connect_error);
}

if (isset($_SESSION['user_email'])) {
    $user_email = $_SESSION['user_email'];

    $query = "SELECT * FROM users WHERE email = '$user_email'";
    $result = $db->query($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        $file_path = $user['file_path'];

        if ($file_path == 'images/pfp/default_user_img.jpg') {
            $query = "UPDATE users SET file_path = 'images/pfp/default_user_img2.jpg' WHERE email = '$user_email'";
        } elseif ($file_path == 'images/pfp/default_user_img2.jpg') {
            $query = "UPDATE users SET file_path = 'images/pfp/default_user_img.jpg' WHERE email = '$user_email'";
        }

        $updateResult = $db->query($query);

        if ($updateResult) {
            $redirectUrl = "my_account.php";
            header("Location: $redirectUrl");
            exit();
        } else {
            echo "Error updating the database: " . $db->error;
        }
    } else {
        echo 'User not found.';
    }
} else {
    echo 'User email not found in session.';
    $redirectUrl = "sign_in.php";
    header("Location: $redirectUrl");
}

$db->close();
?>