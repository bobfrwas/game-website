<?php
session_start(); 

$db = new mysqli('localhost', 'bobfrwas', '', 'game_website');

$query = "SELECT * FROM games";
$result = $db->query($query);

// Check if the query was successful and if there are any rows returned
if ($result && $result->num_rows > 0) {
    // Fetch all rows and store them in an array
    $games = $result->fetch_all(MYSQLI_ASSOC);

    
    foreach ($games as $game) {
        $gameName = $game['game_name'];
        $gameDescription = $game['game_description'];
        $game_price = $game['game_price'];
        $gameRating = $game['game_rating'];


       

      
       

       
    }
}



?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 4, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	

    <link rel="stylesheet" href="animate.css-main/animate.css">

	<style> 
.game_box {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .game_image {
            max-width: 100%;
            height: auto;
        }

        .game_name {
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }

        .game_rating {
            margin-top: 5px;
        }

        .game_downloads,
        .game_price {
            margin-top: 5px;
            color: #666;
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
</style>

</head>
<body>

<div class="container-fluid">
    <div class="row" style="background-color: grey;">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand" href="index.html">Logo</a>
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
							<h4>
								First Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap Second" src="images/horror_game_img2.png" width="4rem" height="500px">
						<div class="carousel-caption">
							<h4>
								Second Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap Third" src="images/horror_game_img3.png" width="4rem" height="500px">
						<div class="carousel-caption">
							<h4>
								Third Thumbnail label
							</h4>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
						</div>
					</div>
				</div> <a class="carousel-control-prev" href="#carousel-410824" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-410824" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
			</div>

			<h2 style="text-align: center; color: red; background-color: black;">FEATURED GAMES!</h2>

<?php
   


    foreach ($games as $game) {
        $gameName = $game['game_name'];
        $gameDescription = $game['game_description'];
        $gamePrice = $game['game_price'];
        $gameRating = $game['game_rating'];
        

        echo '<div class="game_box">';
        echo '<img class="game_image" src="images/' . $gameName . '.png" alt="Game Image">';
        echo '<div class="game_name">' . $gameName . '</div>';
        echo '<div class="game_description">' . $gameDescription . '</div>';
        echo '<div class="game_price">Price: $' . $gamePrice . '</div>';
        echo '<div class="game_rating">Rating: ' . $gameRating . '</div>';


        echo '<a href="game_page.html" class="game_button">View Game</a>';
        echo '</div>';
    }


?>


<p>dfaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>

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