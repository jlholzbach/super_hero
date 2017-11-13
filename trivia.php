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
		<?php include "sidebar.php"; ?>

		<div id="content">
				<div id="main">
					<?php include "navigation.php"; ?>

					<div class="background container-fluid">
						<div class="row" style='text-align: center; width: 100%; height: 100%;'>
							<h1>Hall of Trivia coming soon!</h1>
						</div>
					</div>

					<div id="push"></div>
			</div>
		</div>

		<?php include "footer.php"; ?>
	</body>
</html>
