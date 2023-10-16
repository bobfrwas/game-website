<?php
session_start(); // Start the session
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

</head>
<body>

<div class="container-fluid">
    <div class="row" style="background-color: grey;">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand" href="#">Logo</a>
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

			<h2 style="text-align: center; color: red; background-color: black;">POPULAR GAMES!</h2>
	<div class="row black_background">
		<a href="eternal_nightmares.html">
		<div class="col-md-4 outline-div" style="overflow: hidden;">
			<img alt="Bootstrap Image Preview" src="images/horror_game_img4.png" class="game_box_img">
			<h2 class="black_on_hover">
				Heading
			</h2>
			<p class="black_on_hover">
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		</a>
		<a href="#">
		<div class="col-md-4 outline-div" style="overflow: hidden;">
			<img alt="Bootstrap Image Preview" src="images/horror_game_img3.png" class="game_box_img">
			<h2 class="black_on_hover">
				Heading
			</h2>
			<p class="black_on_hover">
				Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		</a>
		<a href="#">
		<div class="col-md-4 outline-div" style="overflow:hidden;">
			<img alt="Bootstrap Image Preview" src="images/horror_game_img2.png" class="game_box_img">
			<h2 class="black_on_hover">
				Heading
			</h2>
			<p class="black_on_hover">
				Donec id elit non mi porta gravida at egedkjkfdjkfljkldakljfklkfljklkfljlkjfkljkldjkfjlkfklfjkfjfkljklfajklfjklajklfdjkaljfkljlkfkldfkljklddfkladfkljfkldsjfldafkljlt metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
			</p>
			<p>
				<a class="btn" href="#">View details »</a>
			</p>
		</div>
		</a>
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