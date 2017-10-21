<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Super Hero Fan Club</title>

		<link rel="stylesheet"  href="css/style.css">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!--Sizes container inside content div based on window size-->
		<script src="js/resize.js"></script>

	</head>

	<body>
		<div id="content">
			<?php include "navigation.php"; ?>

			<div class="background container-fluid">
				<div class="row" style='text-align: center; width: 100%; height: 100%;'>
					<h3 style='max-width: 90%; margin-left: auto; margin-right: auto;'>All additional Movie data including the premiere date, image, and summary is supplied by <a href="https://www.themoviedb.org/" alt="MovieDB" target="_blank">The Movie Database</a>.</h3>
					<h3 style='max-width: 90%; margin-left: auto; margin-right: auto;'>This product uses the TMDb API but is not endorsed or certified by TMDb.</h3>
					<h3 style='max-width: 90%; margin-left: auto; margin-right: auto;'>All additional TV Show data including the premiere date, image, and summary is supplied by <a href="https://www.tvmaze.com" alt="TVMaze" target="_blank">TVMaze</a>.</h3>
				</div>
			</div>
		</div>

		<!--<div id="push"></div>-->

		<?php include "footer.php"; ?>

	</body>
</html>
