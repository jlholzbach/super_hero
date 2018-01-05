<?php
	include "dbConnect.php";

	if (isset($_GET['author'])) {
		$authorID = $_GET['author'];

		$query = "SELECT `author` FROM `quote_authors` WHERE `id` = ?";
		$statement = $db->prepare($query);
		$statement->bind_param("i", $authorID);
		$statement->execute();
		$statement->bind_result($author_name);
		$statement->fetch();
		$statement->free_result();

		$title = $author_name . " Quotes";
	}

	else {
		$title = "Heroic Quotes";
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
		<link rel="stylesheet"  href="css/gallery.css" />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!--Sizes container inside content div based on window size-->
		<!--<script src="js/resize.js"></script>-->
		<script src="js/jaliswall.js"></script>

	</head>

	<body>
		<?php include "sidebar.php"; ?>

		<style>
			#content {
				margin: 0px!important;
			}
		</style>

		<div id="content">
			<div id="main">
					<?php include "navigation.php"; ?>

					<h2 id="pageTitle" style='font-size: 4rem!important; text-align: center; color: white;'><?php echo $title; ?></h1>

					<div class="grid" style='visibility: hidden;'>
						<div class="wall">
							<?php
									if (isset($_GET['author'])) {
										//$query = "SELECT quotes.id, quotes.quote, quote_authors.author FROM `quotes` INNER JOIN `quote_authors` ON quotes.author=quote_authors.id";
										$query = "SELECT quotes.id, quotes.quote, quote_authors.author FROM `quotes` INNER JOIN `quote_authors` ON quotes.author=quote_authors.id WHERE quote_authors.id={$authorID}";
									}

									else {
										$query = "SELECT quotes.id, quotes.quote, quote_authors.id as authorID, quote_authors.author FROM `quotes` INNER JOIN `quote_authors` ON quotes.author=quote_authors.id";
									}

									$result = $db->query($query);

									while($row = $result->fetch_assoc()){
											if (!isset($_GET['author'])) {
												$authorID = $row['authorID'];
											}

											$quote = stripslashes($row['quote']);
											$author = stripslashes($row['author']);

											echo "<div class='wall-item'>";
												echo "<p style='text-align: left; font-size: 16px; font-weight: bold;'>{$quote}</p>";
												echo "<a href='quotes.php?author={$authorID}'><p style='text-align: left; font-size: 16px;'>{$author}</p></a>";
											echo "</div>";
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
						$(".grid").css('visibility','visible').hide().fadeIn(1000);
					},1000);

				});
		</script>

		<?php include "footer.php"; ?>
	</body>
</html>
