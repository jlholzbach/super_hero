<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Super Hero Fan Club</title>

		<link rel="stylesheet"  href="css/style.css">
		<link rel="stylesheet" href="css/home.css">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</head>
  <body>
		<div id="content">
			<?php include "navigation.php"; ?>

			<header id="index">
				<div id="message">
					<div class="container">
						<h1 class="fontBig white">Super Hero Fan Club</h1>
						<h3 class="fontMedium white">A Celebration of all things Super Hero</h3>

						<hr>

						<a href="placeholder.php" style='text-decoration: none; margin-right: 15px;'>
							<button class='btn btn-lg'>Register</button>
						</a>

						<a href="placeholder.php" style='text-decoration: none;'>
							<button class='btn btn-lg'>Login</button>
						</a>

					</div>
				</div>
			</header>

			<div id="options">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<a href="entertainment.php">
											<div class="option">
												<div class="imageContainer">
													<img src="images/entertainment2.png" alt="Entertainment">
												</div>
												<div class="text">
														<h3 style='margin-top: 0px!important; text-align: center;'>Archive of Entertainment</h3>
														<p>
															View an archive of movies and tv shows beginning in the 1990s.
															Click your favorites for more information.
														</p>
												</div>
											</div>
										</a>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<a href="slideshow.php">
										<div class="option">
											<div class="imageContainer">
												<img src="images/slideshow.png" alt="Slideshow">
											</div>
											<div class="text">
													<h3 style='margin-top: 0px!important; text-align: center;'>Slideshow of Heroes</h3>
													<p>
															Check back often for new heroes.
															<br />
															<b>Coming soon:</b>
															<br />
															<span>The ability to chose slideshows</span>
													</p>
											</div>
										</div>
									</a>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

    </div>

    <?php include "footer.php"; ?>

  </body>
</html>
