<?php
	include "dbConnect.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Super Hero Fan Club</title>

		<link rel="stylesheet"  href="css/style.css">
		<link rel="stylesheet"  href="css/gallery.css" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<script src="js/bootstrap.min.js"></script>
    <script src="js/jaliswall.js"></script>
	</head>

	<body>
		<?php include "sidebar.php"; ?>

		<div id="content" style='margin: 0px!important;'>
			<div id="main">
					<?php include "navigation.php"; ?>
					<h2 id="pageTitle" style='font-size: 4rem!important; text-align: center; color: white;'>Galleries</h2>

          <div class="grid" style='visibility: hidden;'>
            <div class="wall">
							<?php
									$query = "SELECT * from gallery ORDER BY title";
									$result = $db->query($query);

									while($row = $result->fetch_assoc()){
											$id = $row['id'];
											$image = $row['image'];
											$title = stripslashes($row['title']);

											echo "<a class='wall-item' href='slideshow.php?id={$id}'>";
												echo "<img src='images/gallery/{$image}' alt='{$title}' />";
												echo "<h2>{$title}</h2>";
											echo "</a>";
									}
							?>
          	</div>
          </div>
			</div>
		</div>

    <script>
        $(document).ready(function() {
          $('.wall').jaliswall({item:'.wall-item'});

					setTimeout(function () {
						console.log("Test");
						$(".grid").css('visibility','visible').hide().fadeIn(1000);
					},1000);

				});
    </script>

		<?php include "footer.php"; ?>

	</body>
</html>
