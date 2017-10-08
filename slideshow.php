<?

	include "dbConnect.php";

	$images = array();
	$captions = array();

	$query = "SELECT * from slideshow";
	$result = $db->query($query);

	while($row = $result->fetch_assoc()){
		$images[] = $row['image'];
		$captions[] = $row['caption'];
	}


	//$images = array(array("image" => "hero0.jpg", "caption" => "Test 1"), array("image" => "hero1.jpg", "caption" => "Test 2"));
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Super Hero Fan Club</title>

		<link rel="stylesheet"  href="css/style.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!--Sizes container inside content div based on window size-->
		<script src="js/resizeSlideshow.js"></script>

		<script>
			/*var body, navigation, footer, container, size;
			var title, slide;

			$(document).ready(function() {
				body = parseFloat($("body").css("height"));
				navigation = parseFloat($("nav").css("height"));

				footer = parseFloat($("footer").css("height"));
				container = body - navigation - footer;
				$("#main").css("height", container);

				title = parseFloat($("#slideshowDescription").css("height"));
				title += parseFloat($("#slideshowDescription").css("margin-top"));
				title += parseFloat($("#slideshowDescription").css("margin-bottom"));

				slide = container - title + "px";
				$("#slideshow").css("height", slide);
			});

			$(window).on('resize', function(){
				body = parseFloat($("body").css("height"));
				navigation = parseFloat($("nav").css("height"));

				footer = parseFloat($("footer").css("height"));
				container = body - navigation - footer;
				$("#main").css("height", container);

				title = parseFloat($("#slideshowDescription").css("height"));
				title += parseFloat($("#slideshowDescription").css("margin-top"));
				title += parseFloat($("#slideshowDescription").css("margin-bottom"));

				slide = container - title + "px";
				$("#slideshow").css("height", slide);

			});*/

		</script>

	</head>

	<style>
		.carousel-control {
			background: transparent!important;
		}

		.carousel {
			width: 100%;
			height: 100%;
		}

		.carousel-inner {
			width: 100%!important;
			height: 100%;
			margin-left: auto!important;
			margin-right: auto!important;
		}

		.slideContainer {
			height: 85%;
		}

		.slideSquare {
			width: 45vh;
			border: solid 10px black;
			margin-left: auto;
			margin-right: auto;
			display: block;
		}

		.arrow {
			max-width: 6vw;
			position: relative;
			top: 50%;
			transform: translateY(-50%) rotate(180deg);
			opacity: 1!important;
			width: auto!important;
		}

		.arrowRight {
			max-width: 6vw;
			position: relative;
			top: 50%;
			transform: translateY(-50%);
			opacity: 1!important;
			width: auto!important;
		}

		#main {
			padding-left: 0px!important;
			padding-right: 0px!important;
		}

		@media only screen and (min-device-width: 320px)
		and (max-device-width: 480px) and (orientation: portrait) {
			.slideSquare {
				width: 40vh;
			}
		}

		.item img {
			position: absolute;
			top: 50%;
			left: 50%;
			margin-right: -50%;
			transform: translate(-50%, -50%);
		}

	</style>

	<body style='background: #1f0006;'><!--style='background: #640000;'-->
		<div id="content">
			<? include "navigation.php"; ?>

			<!--background-image: url(images/curtain.jpg); -->
			<div id="main" class="background container-fluid" style='background-image: url(images/curtain.jpg); background-size: 100% 100%;'>
				<div class="row" style='margin-left: 0px!important; margin-right: 0px!important; width: 100%; height: 100%;'>
					<h2 id="slideshowDescription" style='text-align: center; color: white;'>Slideshow of Heroes</h2>

					<div id="slideshow">
						<div style='width: 15%; float: left; height: 100%;'>
							<img src="images/arrow3.png" class="arrow carousel-control" href=".carousel" data-slide="prev" style='margin-left: auto; margin-right: auto; display: block;'/>
						</div>

						<div style='width: 70%; height: 100%; float: left;'>
							<div class="slideSquare" style='height: 60%; background: white; text-align: center;'>
								<div class="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
									<div class="carousel-inner" role="listbox">
										<?
											$count = 0;

											foreach($images as $val) {
												if ($count == 0) {
													$class = "item active";
												}

												else {
													$class = "item";
												}

												echo "<div class='$class' style='height: 100%;'>";
													echo "<img style='max-width: 100%;' class='img-fluid' src='images/$val' />";
												echo "</div>";

												$count++;
											}
										?>
									</div>
								</div>
							</div>

							<div style="height: 40%;" class="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
								<div class="carousel-inner" role="listbox">
									<?
										$count = 0;

										foreach($captions as $val) {
											if ($count == 0) {
												$class = "item active";
											}

											else {
												$class = "item";
											}

											echo "<div class='$class' style='height: 100%;'>";
												echo "<h3 style='color: white; font-size: 3.5vh!important; margin-top: 5px!important; margin-bottom: 5px!important; text-align: center;'>$val</h3>";
											echo "</div>";

											$count++;
										}
									?>
								</div>
							</div>
						</div>

						<div style='width: 15%; float: left; height: 100%;'>
							<img src="images/arrow3.png" class="arrowRight carousel-control" href=".carousel" data-slide="next"  style='margin-left: auto; margin-right: auto; display: block;'/>
						</div>
					</div>
				</div>

			</div>
		</div>

		<? include "footer.php"; ?>
	</body>
</html>
