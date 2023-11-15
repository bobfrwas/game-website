<?php
session_start();  //starts php

$db = new mysqli('localhost', 'bobfrwas', '', 'game_website'); //sets out the database connection details

$query = "SELECT * FROM games";//selects every game in the game column
$result = $db->query($query);//execute the database query and store the result

if ($result && $result->num_rows > 0) {// Check if the query was successful and if there are more than 0 rows returned
  
    $games = $result->fetch_all(MYSQLI_ASSOC); // get all of the rows and store them as $games 

    
    foreach ($games as $game) {

        $gameName = $game['game_name']; // extract the game name from the array $game 
        $gameDescription = $game['game_description'];// extract the description from the array $game
        $game_price = $game['game_price'];// extract the game price from the array $game
        $gameRating = $game['game_rating'];// extract the game rating from the array $game 
        $gameImg = $game['file_path'];


       

      
       

       
    }
}


function gameStars($gameRating) {
    if ($gameRating >= 0 and $gameRating <= 1.9){
        ?>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star "></span>
        <span class="fa fa-star "></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <?php
    }
    if ($gameRating >= 3 and $gameRating <= 3.9){
        ?>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <?php
    }
  }


?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Title for worksheet 5</title> 

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

    <link rel="stylesheet" href="animate.css-main/animate.css">

	<style> 
    body {
        background-color: #3b003d;
    }
@media (max-width: 768px){
    .game_box {
        width: 150px;
        border: 1px solid #ccc;
        border-radius: 1px;
        padding: 5px;
        margin-bottom: 10px;
        display: inline-block;
        margin: 3rem;
    }
}

.game_boxes {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }


.game_box {
            width: 17rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            display: inline-block;
            margin: 3rem;
        }
.game_description {
    color: #63c328;
}
    
a {
    color: black;
}

        .game_image img {
            width: 100%;
            height: auto;
        }

        .game_name {
            color: red;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;

        }

        .game_rating {
            margin-top: 5px;
            color: darkgreen;
        }
        .game_downloads {
            margin-top: 5px;
            color: darkblue;
        }
        .game_price {
            margin-top: 5px;
            color: darkgreen;
        }

        .game_button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
        }

        .game_button:hover {
            background-color: #0056b3;
        }
        nav {
            background-color: darkred;
        }

        h2 {
            color: darkred;
        }
        h4 {
            color: darkred;
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

<div class="col-md-1"></div>
<div class="row justify-content-center">
<div class="col-md-10">
<div class="carousel slide" id="carousel-410824">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-410824" class="active">
					</li>
					<li data-slide-to="1" data-target="#carousel-410824">
					</li>
					<li data-slide-to="2" data-target="#carousel-410824">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" alt="Carousel Bootstrap First" src="images/horror_game_img1.png" height="500px" width="4rem">
						<div class="carousel-caption">
							<h2>
								The Nightmares Within
							</h2>
							<h4>
								You are sent to check out a haunted house after people claim to have heard screams within...
							<h4>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap Second" src="images/horror_game_img2.png" width="4rem" height="500px">
						<div class="carousel-caption">
							<h2>
								Little Nightmares
							</h2>
							<h2>
                            Explore a world filled with mutants who will try and kill anything they see.
                            </h2>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap Third" src="images/horror_game_img3.png" width="4rem" height="500px">
						<div class="carousel-caption">
							<h2>
								Resident Evil
							</h2>
							<h4>
								Explore a destroyed earth filled with mutant creatures that are alsways watching.
                        </h4>
						</div>
					</div>
				</div> <a class="carousel-control-prev" href="#carousel-410824" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-410824" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
			</div>

			<h2 style="text-align: center; color: red; background-color: #3b003d;">FEATURED GAMES!</h2>
</div>
</div>

<div class="game_boxes">
<?php
  
  

    foreach ($games as $game) {
        $gameName = $game['game_name'];
        $gameDescription = $game['game_description'];
        $gamePrice = $game['game_price'];
        $gameRating = $game['game_rating'];
        $gameImg = $game['file_path'];
        

        echo '<div class="game_box">';
        echo '<div class="game_image"><img src="' . $gameImg . '"></div>';
        echo '<div class="game_name">' . $gameName . '</div>';
        echo '<div class="game_description">' . $gameDescription . '</div>';
        echo '<div class="game_price">Price: $' . $gamePrice . '</div>';
        echo '<div class="game_rating">Rating: ' . $gameRating .  '</div>';
        


        echo '<a href="eternal_nightmares.php" class="game_button">View Game</a>';
        echo '</div>';
    }


?>
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