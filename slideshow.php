<?php

	include "dbConnect.php";

	$images = array();
	$captions = array();

	$query = "SELECT * from slideshow";
	$result = $db->query($query);

	while($row = $result->fetch_assoc()){
		$images[] = $row['image'];
		$captions[] = $row['caption'];
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Super Hero Fan Club</title>

		<link rel="stylesheet"  href="css/style.css">
		<link rel="stylesheet"  href="css/slideshow.css" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!--Sizes container inside content div based on window size-->
		<script src="js/resizeSlideshow.js"></script>

	</head>

	<body style='background: #1f0006;'><!--style='background: #640000;'-->
		<?php include "sidebar.php"; ?>

		<div id="content">
			<div id="main">
					<?php include "navigation.php"; ?>

					<div id="mainSlide" class="background container-fluid" style='background-image: url(images/curtain.jpg); background-size: 100% 100%;'>
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
												<?php
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
											<?php
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
		</div>

		<?php include "footer.php"; ?>
	</body>
</html>
