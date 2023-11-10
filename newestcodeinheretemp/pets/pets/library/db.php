<?php
function connect() {
    $servername = "localhost";
    $username = "bobfrwas";
    $password = "";

    $conn = new mysqli($servername, $username, $password, "pets");

    if ( $conn ->connect_error ) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function delete_pet($id, $conn) {
    $query = "DELETE FROM pets WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_GET["id"]);
    $stmt->execute();
}


function find_pet($search, $conn) {
    $query = "SELECT * FROM pets WHERE name LIKE ?";
    $stmt = $conn->prepare($query);

    $search = "{$_POST['search']}%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    return $stmt->get_result();
}
?> 