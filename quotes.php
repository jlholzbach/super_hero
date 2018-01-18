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

	else if (isset($_GET['quote'])) {
		$quoteID = $_GET['quote'];

		$query = "SELECT `quote`, `author` FROM `quotes` WHERE `id` = ?";
		$statement = $db->prepare($query);
		$statement->bind_param("i", $quoteID);
		$statement->execute();
		$statement->bind_result($quote, $authorID);
		$statement->fetch();
		$statement->free_result();

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
		$title = "Notable Quotes";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta property="og:title" content="Super Hero Fan Club" />
		<meta property="og:site_name" content="Super Hero Fan Club"/>
		<?php if (isset($_GET['quoteID'])) {?>
						<meta property="og:url" content="http://www.joshuaholzbach.com/super_hero/quotes.php?quote=<?php echo $quoteID; ?>" />
						<meta property="og:description" content="<?php echo $quote . ' - ' . $author_name; ?>" />
						<meta property="og:image" content="http://www.joshuaholzbach.com/super_hero/images/quotes_share.png" />
						<meta property="og:image:width" content="1200" />
						<meta property="og:image:height" content="630" />
		<?php } ?>

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
		<script src="https://use.fontawesome.com/dd79007e72.js"></script>

		<script src="js/jaliswall.js"></script>

	</head>

	<body>
		<?php include "sidebar.php"; ?>

		<style>
			#content {
				margin: 0px!important;
			}

		  .fa-facebook {
				background-color: #375a9c;
			}

			.fa-facebook:hover {
				background-color: #738ec0;
			}

			.fa-twitter {
				background-color: #00acf0;
			}

			.fa-twitter:hover {
			    background-color: #46c0fb;
			}

			.social span {
					margin-top: 10px!important;
					cursor: pointer;
			    border-radius: 30px;
			    color: #fff;
			    display: inline-block;
			    height: 30px;
			    line-height: 30px;
			    margin: auto 3px;
			    width: 30px;
			    font-size: 15px;
			    text-align: center;
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
										$query = "SELECT quotes.id, quotes.quote, quote_authors.author FROM `quotes` INNER JOIN `quote_authors` ON quotes.author=quote_authors.id WHERE quote_authors.id={$authorID}";
									}

									else if (isset($_GET['quote'])) {

										echo "<div class='wall-item'>";
											echo "<p style='text-align: left; font-size: 16px; font-weight: bold;'>{$quote}</p>";
											echo "<a href='quotes.php?author={$authorID}'><p style='text-align: left; font-size: 16px;'>{$author_name}</p></a>";
											echo "<hr style='border-top: 1px solid black; margin: 0px!important;' />";
											echo "<div class='social'>";
												echo "<span onClick='share({$quoteID})' class='fa fa-facebook'></span>";
												echo "<span quote='{$quote}' onClick='tweet({$quoteID}, this)' class='fa fa-twitter'></span>";
												//echo "<span onClick='tweet({$quoteID})' class='fa fa-twitter'></span>";
											echo "</div>";
										echo "</div>";

										$query = "SELECT quotes.id, quotes.quote, quote_authors.author FROM `quotes` INNER JOIN `quote_authors` ON quotes.author=quote_authors.id WHERE quote_authors.id={$authorID} AND quotes.id!={$quoteID}";
									}

									else {
										$query = "SELECT quotes.id, quotes.quote, quote_authors.id as authorID, quote_authors.author FROM `quotes` INNER JOIN `quote_authors` ON quotes.author=quote_authors.id";
									}

									$result = $db->query($query);

									while($row = $result->fetch_assoc()){
											if (!isset($_GET['author'])) {
												$authorID = $row['authorID'];
											}

											$id = $row['id'];

											$quote = stripslashes($row['quote']);
											$author = stripslashes($row['author']);

											echo "<div class='wall-item'>";
												echo "<p style='text-align: left; font-size: 16px; font-weight: bold;'>{$quote}</p>";
												echo "<a href='quotes.php?author={$authorID}'><p style='text-align: left; font-size: 16px;'>{$author}</p></a>";
												echo "<hr style='border-top: 1px solid black; margin: 0px!important;' />";
												//echo "<img onClick='share({$id})' style='display: none; width: 40px!important; margin: 5px 0 0 !important;' src='images/facebook.png' />";

												echo "<div class='social'>";
													echo "<span onClick='share({$id})' class='fa fa-facebook'></span>";
													echo "<span quote='{$quote}' onClick='tweet({$id}, this)' class='fa fa-twitter'></span>";
												echo "</div>";

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

				function share(quoteID) {
					let url = "http://www.joshuaholzbach.com/super_hero/quotes.php?quote=" + quoteID;

				 FB.ui({
					  method: 'share',
						mobile_iframe: true,
					  href: url
					}, function(response){});

				}

				function tweet(quoteID, e) {
					if (quoteID != "") {
						var url = "&url=http://joshuaholzbach.com/super_hero/quotes.php?quote=" + quoteID;
						var quote = $(e).attr("quote");
						//window.open("http://joshuaholzbach.com/super_hero/quotes.php?quote=1", "_blank");

						if ((quote.length + quote.length) > 280) {
							text = quote.substring(0, 280 - url.length+3) + "...";
						}

						url = "https://twitter.com/intent/tweet/?text=" + quote
						+ "&url=http://joshuaholzbach.com/super_hero/quotes.php?quote=" + quoteID;
						windowPopup(url, 500, 300);

						/*$.ajax({
							url: 'ajax/getQuote.php',
							type: 'POST',
							dataType: 'json',
							data: {id: quoteID},
							success: function(quote) {
								console.log(quote);

								if ((quote.length + quote.length) > 280) {
									text = quote.substring(0, 280 - url.length+3) + "...";
								}

							  url = "https://twitter.com/intent/tweet/?text=" + quote
								+ "&url=http://joshuaholzbach.com/super_hero/quotes.php?quote=" + quoteID;
								windowPopup(url, 500, 300);
							}
						});*/

					}

					else {
						alert("No ID found");
					}

				}

				function windowPopup(url, width, height) {
				  // Calculate the position of the popup so
				  // it’s centered on the screen.
				  var left = (screen.width / 2) - (width / 2),
				      top = (screen.height / 2) - (height / 2);

					//window.open("http://joshuaholzbach.com", "_blank");

					window.open(
						url,
						"_blank",
				    "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width="
						+ width + ",height=" + height + ",top=" + top + ",left=" + left
				  );
				}

			  window.fbAsyncInit = function() {
			    FB.init({
			      appId            : '927925237365388',
			      autoLogAppEvents : true,
			      xfbml            : false,
			      version          : 'v2.11',
						status: true
			    });
			  };

			  (function(d, s, id){
			     var js, fjs = d.getElementsByTagName(s)[0];
			     if (d.getElementById(id)) {return;}
			     js = d.createElement(s); js.id = id;
			     js.src = "https://connect.facebook.net/en_US/sdk.js";
			     fjs.parentNode.insertBefore(js, fjs);
			   }(document, 'script', 'facebook-jssdk'));

		</script>

		<?php include "footer.php"; ?>
	</body>
</html>
