<?php
	include "dbConnect.php";

	if (!isset($_GET['id'])) {
		$id = 1;
	}

	else {
		$id = $_GET['id'];
	}

	$query = "SELECT `title` FROM `gallery` WHERE `id` = ?";
	$statement = $db->prepare($query);
	$statement->bind_param("i", $id);
	$statement->execute();
	$statement->bind_result($title);
	$statement->fetch();
	$statement->free_result();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Super Hero Fan Club</title>

		<link rel="stylesheet"  href="css/style.css">
		<!--<link rel="stylesheet"  href="css/slideshow.css" />-->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<script src="js/bootstrap.min.js"></script>

		<script src='unitegallery/js/unitegallery.js'></script>
		<link rel='stylesheet' href='unitegallery/css/unite-gallery.css' type='text/css' />
	  <script type='text/javascript' src='unitegallery/themes/grid/ug-theme-grid.js'></script>
	  <link rel='stylesheet' href='unitegallery/themes/default/ug-theme-grid.css' type='text/css' />
		<link rel='stylesheet' href='unitegallery/skins/alexis/alexis.css' type='text/css' />
	</head>

	<body>
		<?php include "sidebar.php"; ?>

		<style>
			#content {
				background-image: url(images/slideshow.jpg);
				background-size: cover;
			}
		</style>

		<div id="content">
			<div id="main">
					<?php include "navigation.php"; ?>

					<h2 id="slideshowDescription" style='font-size: 4rem!important; text-align: center; color: white;'><?php echo $title; ?></h2>

					<div id="gallery" style="margin-top: 45px; margin-bottom: 150px; display:none; margin-left: auto; margin-right: auto;">
							<?php
									$query = "SELECT `image`, `caption` FROM `gallery_image` WHERE `gallery_id` = ?";
									$statement = $db->prepare($query);
									$statement->bind_param("i", $id);
									$statement->execute();
									$statement->bind_result($image, $caption);

									while($statement->fetch()){
										echo "<img alt='$caption' src='images/gallery/$image' data-image='images/gallery/$image' />";
									}
							?>
					</div>
			</div>
		</div>

		<?php include "footer.php"; ?>

		<script>
			$(document).ready(function(){
					$("#gallery").unitegallery({
						gallery_theme: "grid",
						gallery_height: 500,
						gallery_min_height: 500,
						thumb_width:120,
						thumb_height:70,
						theme_panel_position: "bottom",
						theme_hide_panel_under_width: null,
						slider_enable_text_panel: true,
						slider_enable_progress_indicator:false,
						slider_enable_play_button:false,
						slider_enable_fullscreen_button:false,
						slider_enable_zoom_panel:false,
						gridpanel_enable_handle:false,
						slider_arrows_skin:"alexis",
						gridpanel_padding_border_bottom: 10,
					});
			});
		</script>

	</body>
</html>
