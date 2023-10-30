<?php
session_start();

// Perform any additional sign-out actions here if needed

// Destroy the session and unset session variables
session_unset();
session_destroy();

// Redirect the user to the desired page after sign-out
header("Location: index.php"); // Replace "index.html" with the appropriate page

exit(); // Make sure to exit after the redirect
?>