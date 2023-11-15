<!DOCTYPE html>

<head>

</head>

<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="d-flex justify-content-between align-items-center w-100">
            <img src=images/logo.jfif width=50px height=50px>
            <a href="#">My games</a>
            <a href="#">Cart</a>
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


    <a href="add_a_pet.html">Add a new pet</a>
    <a href="display_data.php">Task 7: display data</a>
    <a href="search.php">Search for pet</a>
    <a href="owner.php">My account</a>
</body>