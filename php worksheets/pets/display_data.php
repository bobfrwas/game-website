<?php 

include "library/db.php";

$conn = connect();
$sql = "SELECT * FROM pets";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-US-CCompatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <style>
            table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20 rgba(0,0,0,0.15);
        }

        table th {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        table th,
        table td {
            padding: 12px 15px;
        }

        table tr {
            border-bottom: 1px solid #dddddd;
        }

        table tr:nth_of_type(even) {
            background-color: #f3f3f3;
        }

        </style>



    </head>

    <body>
        <h1>Registered pets</h1>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>

<?php 

$sql = "SELECT * FROM pets";
$result = $conn->query($sql);

while ($row = $result->fetch_array(MYSQLI_ASSOC)) { 
    echo "<tr>";
    echo "<td>{$row["id"]}</td>";
    echo "<td>{$row["name"]}</td>";
    echo "<td>{$row["age"]}</td>";
    echo "<td>{$row["type"]}</td>";
    echo '<td><a href="edit.php?id='.$row["id"].'">Edit</a></td>';
    echo '<td><button type="submit" class="btn btn-danger"><a href="delete-action.php?id='.$row["id"].'">Delete</a></button></td>';
    echo "</tr>";
}

$result->free_result();

$conn->close();


?>

        </table>
    </body>
</html>