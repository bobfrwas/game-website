<?php
include "library/db.php";


$conn = connect();

$show_results = false;
$user_search_string = "";
$user_search_string2 = "";

if (isset($_POST['search'])) {
    $show_results = true;
    $result = find_pet($_POST['search'], $conn);
    $user_search_string = $_POST['search'];
}


$name = array();
$query = "SELECT name FROM pets";
$db_result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($db_result)) {
    $name[] = $row["name"];
}
$names_javascript = json_encode($name);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-US-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="style.css">


  


</head>
<body>

<div class="navigation-bar">
    <a href="add_a_pet.php">Add pets</a>
    <a href="display_data.php">Show database</a>
    <a href="search.php">Search for pet</a>
</div>

<?php include "partials/menu.php"; ?>

<h1>Search</h1>
    <form autocomplete="off" action="search.php" method="POST">
    <p>
        Enter part of a pets name:
        <input type="text" name="search" id="myInput" value="<?= $user_search_string ?>">
        <input type="submit" value="Find">
    </p>
</form>

<form autocomplete="off" action="search.php" method="POST">
    <p>
        Or enter the owner's name:
        <input type="text" name="owner_search" id="owner_Input" value="<?= $user_search_string2 ?>">
        <input type="submit" value="Find">
    </p>
</form>

<?php 
if ($show_results): 
?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Type</th>
            <th>Owner's name</th>
            <th></th>
            <th></th>
        </tr>

        <?php 
        while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
        
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["age"] ?></td>
                <td><?= $row["type"] ?></td>
                <td><?= $row["owner_name"] ?></td>
                <td><a href="edit.php?id=<?= $row["id"] ?>">Edit</a></td>
                <td><a href="delete-action.php?id=<?= $row["id"] ?>">Delete</a></td>
            </tr>
        <?php endwhile; ?>


    </table>
    <?php endif ?>

</body>




<script>
function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
  }

  autocomplete(document.getElementById("myInput"), JSON.parse('<?= $names_javascript ?>'));
</script>







</html>