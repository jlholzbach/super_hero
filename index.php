<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Super Hero Fan Club</title>
		
		<link rel="stylesheet"  href="css/style.css">
		
		<!-- Latest compiled and minified CSS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		
		<!-- Latest compiled JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		
		<!--Sizes container inside content div based on window size-->
		<script src="js/resize.js"></script>
		
	</head>
	
	<body style='background: #7fd2db;'>
		<div id="content">
			<? include "navigation.php"; ?>
		
			<div class="background container-fluid">
				<div class="row" style='width: 100%; height: 100%;'>
					<img id="background" src='images/background.jpg' />
				</div>
				
				<div class="row" style='text-align: center; width: 100%; height: 100%;'> <!--background: rgba(0, 0, 0, 0.25);-->
					<h2 id='description'>This is a club for fans of Super Heroes, especially those have been in Television Series or Movies, in the past 25 years.</h2>
				
					<button class='green btn btn-lg btn-success'>Register</button>
					<button class='green btn btn-lg btn-success'>Log-In</button>
					<button class='green btn btn-lg btn-success'>Deploy Test</button>
					<button class='green btn btn-lg btn-success'>Another Deploy Test</button>
					<button class='green btn btn-lg btn-success'>Another Deploy Test</button>
				</div>
				
			</div>
		
			<div id="push"></div>
		</div>
		
		<? include "footer.php"; ?>
				
		<!--<div class="background container-fluid" style="height: 90%;">
			
			<div class="row" style='width: 100%; height: 100%;'>
				<img id="background" src='images/superheroes.jpg' />
			</div>
			
			<div class="row" style='text-align: center; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.25);'>
				<h2 id='description'>This is a club for fans of Super Heroes, especially those have been in Television Series or Movies, in the past 25 years.</h2>
			
				<button class='green btn btn-lg btn-success'>Register</button>
				<button class='green btn btn-lg btn-success'>Log-In</button>
			</div>
			
		</div>-->
	
		<? //include "footer.php"; ?>
		
	</body>
</html>