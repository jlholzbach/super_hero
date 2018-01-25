<?php
	include "dbConnect.php";

	$title = "Notable Quotes";

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

		$query = "SELECT * FROM `quotes` WHERE `author` = ?";
		$statement = $db->prepare($query);
		$statement->bind_param("i", $authorID);
		$statement->execute();
		$statement->store_result();
		$count = $statement->num_rows;
		$statement->fetch();
		$statement->free_result();

		$query = "SELECT `author` FROM `quote_authors` WHERE `id` = ?";
		$statement = $db->prepare($query);
		$statement->bind_param("i", $authorID);
		$statement->execute();
		$statement->bind_result($author_name);
		$statement->fetch();
		$statement->free_result();

		/*if ($count > 1 ) {
			$title = $author_name . " Quotes";
		}

		$title = "";*/
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php if (isset($_GET['quoteID'])) {?>
						<meta property="og:title" content="Super Hero Fan Club" />
						<meta property="og:site_name" content="Super Hero Fan Club"/>
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.2.27/jquery.autocomplete.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<script src="https://use.fontawesome.com/dd79007e72.js"></script>

		<!-- Used for Pinterest type grid-->
		<!--<script src="js/jaliswall.js"></script>-->
		<script src="js/jquery.wallyti.js"></script>

		<!-- Used for resizing text to fit container -->
		<script src="js/fittext.js"></script>

	</head>

	<body>
		<?php include "sidebar.php"; ?>

		<style>
			#content {
				margin: 0px!important;
			}

			.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
	  	.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
	  	.autocomplete-selected { background: #F0F0F0; }
	  	.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
	  	.autocomplete-group { padding: 2px 5px; }
	  	.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }

			.inner-addon {
			  width: 100%;
				max-width: 350px;
			  position: relative;
				padding-left: 5px;
				padding-right: 5px;
			}

			.inner-addon .glyphicon {
			  position: absolute;
			  padding: 10px;
			  pointer-events: none;
			}

			/* align icon */
			.right-addon .glyphicon { right: 0px;}

			/* add padding  */
			.right-addon input { padding-right: 30px; }

			#search {
			  font-size: 16px;
			  margin-bottom: 15px;
			  height: 35px;
			  width: 100%;
			  border: 1px solid black;
			  border-radius: 5px;
			}

		</style>

		<div id="content">
			<div id="main">
					<?php include "navigation.php"; ?>

					<h2 id="pageTitle" style='font-size: 4rem!important; text-align: center; color: white;'><?php echo $title; ?></h1>

					<div class="row adjust" style='position: initial!important;'>
							<div class="first col col-lg-12 col-md-12 col-sm-12 col-xs-12 side">
								<div class="inner-addon right-addon" style='margin-left: auto; margin-right: auto;'>
									<i class="glyphicon glyphicon-search"></i>
									<input type="text" name="search" id="search"  placeholder="Type to Search" value="">
								</div>
							</div>
					</div>

					<?php if (isset($_GET['quote'])) {?>
						<div class="grid" style='visibility: hidden;'>
							<div class="row">
								<div class="col col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-xs-offset-1 col-lg-6 col-md-6 col-sm-8 col-xs-10" style="height: 325px;">
									<img src="https://thecliparts.com/wp-content/uploads/2016/12/gold-frame-clipart.gif" style="width: 100%; height: 300px;">
									<div style="display: table; background: white; height: 213px; position: relative; top: -255px; left: 12.5%; width: 77%;">
										<p class="resize">
											<?php
												echo $quote . "<br /> - " . $author_name;
											?>
										</p>
									</div>
								</div>
							</div>
						<?php } ?>

						<!--<div class="row" style='position: initial!important; margin-left: 0px!important; margin-right: 0px!important;'>
							<div class="col col-lg-2 col-md-1 col-sm-1 col-xs-1"></div>

							<div class="col col-lg-8 col-md-10 col-sm-10 col-xs-12">
									<div class="row adjust" style='position: initial!important;'>
											<div class="first col col-lg-6 col-md-6 col-sm-6 col-xs-12 side">
												<div class="inner-addon right-addon">
													<i class="glyphicon glyphicon-search"></i>
													<input type="text" name="search" id="search"  placeholder="Type to Search" value="">
												</div>
											</div>
									</div>
							</div>
						</div>-->

						<div class="wrapper" style='width: 95%; margin: auto; position: relative;'>
							<div class="wall" style='visibility: hidden;' wallyti-block-margin="20">
								<?php
										if (isset($_GET['author'])) {
											$query = "SELECT quotes.id, quotes.quote, quote_authors.author FROM `quotes` INNER JOIN `quote_authors` ON quotes.author=quote_authors.id WHERE quote_authors.id={$authorID}";
										}

										else if (isset($_GET['quote'])) {

											/*echo "<div class='wall-item'>";
												echo "<p style='text-align: left; font-size: 16px; font-weight: bold;'>{$quote}</p>";
												echo "<a href='quotes.php?author={$authorID}'><p style='text-align: left; font-size: 16px;'>{$author_name}</p></a>";
												echo "<hr />";
												echo "<div class='social'>";
													echo "<span onClick='share({$quoteID})' class='fa fa-facebook'></span>";
													echo "<span quote='{$quote}' onClick='tweet({$quoteID}, this)' class='fa fa-twitter'></span>";
												echo "</div>";
											echo "</div>";*/

											$query = "SELECT quotes.id, quotes.quote, quote_authors.author FROM `quotes` INNER JOIN `quote_authors` ON quotes.author=quote_authors.id WHERE quote_authors.id={$authorID} AND quotes.id!={$quoteID}";
										}

										else {
											$query = "SELECT quotes.id, quotes.quote, quote_authors.id as authorID, quote_authors.author FROM `quotes` INNER JOIN `quote_authors` ON quotes.author=quote_authors.id";
										}

										$result = $db->query($query);

										while($row = $result->fetch_assoc()){
												if ((!isset($_GET['author'])) && (!isset($_GET['quote']))) {
													$authorID = $row['authorID'];
												}

												$id = $row['id'];

												$quote = stripslashes($row['quote']);
												$author = stripslashes($row['author']);

												echo "<div class='wall-item'>";
													echo "<p style='text-align: left; font-size: 16px; font-weight: bold;'>{$quote}</p>";
													echo "<a href='quotes.php?author={$authorID}'><p style='text-align: left; font-size: 16px;'>{$author}</p></a>";
													echo "<hr />";

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
		</div>

		<script>
				/*$(window).on("orientationchange", function(e) {
					$('.wall').jaliswall({item:'.wall-item'});
				});*/

				$(function(){
					$('.wall').wallyti(function(){});
				});

				$(document).ready(function() {
					var arrayReturn = [];

					//$('.wall').jaliswall({item:'.wall-item'});

					setTimeout(function () {
						$(".grid").css('visibility','visible').hide().fadeIn(1000);
						$(".wall").css('visibility','visible').hide().fadeIn(1000);
					},1000);

					$(".resize").fitText(1.8, { minFontSize: '16px', maxFontSize: '20px' });

					$.ajax({
			  		url: "ajax/getAuthors.php",
			  		async: true,
			  		dataType: 'json',
			  		success: function (data) {
			        for (var i = 0, len = data.length; i < len; i++) {
			  				var id = (data[i].id).toString();
			  				arrayReturn.push({'value' : data[i].author, 'data' : id});
			  			}

			  			loadSuggestions(arrayReturn);
			  		}
			  	});

					function loadSuggestions(options) {
			  		$('#search').autocomplete({
			  			lookup: options,
			  			onSelect: function (suggestion) {
			          window.location.href = "quotes.php?author=" + suggestion.data;
			  			}
			  		});
			  	}

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

						if ((quote.length + quote.length) > 280) {
							text = quote.substring(0, 280 - url.length+3) + "...";
						}

						url = "https://twitter.com/intent/tweet/?text=" + quote
						+ "&url=http://joshuaholzbach.com/super_hero/quotes.php?quote=" + quoteID;
						windowPopup(url, 500, 300);

					}

					else {
						console.log("No ID found");
					}

				}

				function windowPopup(url, width, height) {
				  // Calculate the position of the popup so
				  // it’s centered on the screen.
				  var left = (screen.width / 2) - (width / 2),
				      top = (screen.height / 2) - (height / 2);

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
