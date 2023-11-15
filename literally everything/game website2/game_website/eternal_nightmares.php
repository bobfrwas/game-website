<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 4, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


  <style> 
nav {
  background-color: darkred;
}

a {
  color: black;
}

a:hover {
  color: grey;
}

</style>

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

      <div class="row row_padding">
        <div class="col-md-2"></div>
        <div class="col-md-8 outline-div pb-5" style="overflow: hidden;">
            <img src="https://media.tenor.com/04s7Os3D4mEAAAAd/horror-game-video-game.gif" width="100%" height="auto">
            <div class="col-md-3 outline-div" style="overflow: hidden;">
              
            </div>
          <h2 class="black_on_hover">
            Heading
          </h2>
          <p class="black_on_hover">
            You find yourself trapped in a nightmarish dimension, a place where reality bends and nightmares become your only companions. As a tormented soul seeking escape, you must navigate through a labyrinthine world of darkness, where every step could lead you deeper into the abyss or closer to salvation.

            As you delve into the depths of this unhinged realm, you will encounter grotesque creatures, malicious spirits, and mind-bending puzzles that will push the boundaries of your courage and wit. The line between reality and illusion blurs, and you must rely on your instincts and unravel the mysteries that bind this twisted reality.
          </p>
          <button class="btn btn_rounded btn_animated btn-primary" type="submit">£19.99 Purchase</button>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

  </body>
</html>