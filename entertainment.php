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

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/entertainment.css" />

		<!-- Latest compiled and minified CSS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
	</head>

  <!--background-image: url(images/pattern.png)-->

	<body>
		<?php include "sidebar.php"; ?>
		<div id="content" style="margin-bottom: 25px!important;">
			<div id="main">
					<?php include "navigation.php"; ?>

					<div id="infoModal" class="modal fade">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header" style='border-bottom: none; padding-bottom: 0px!important;'>
					        <button style='font-size: 45px;' type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
									<h3 id="infoTitle" class="modal-title" style='text-align: center;'></h3>
									<h4 id="infoStart" style='text-align: center; margin: 0px!important;'></h4>

									<br />
									<img id="infoImage" style='display: block; margin-left: auto; margin-right: auto;'/>
									<br />

									<p id="infoDescription"></p>

					      </div>
					      <div class="modal-footer" style='border-top: none;'>
					        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
					      </div>
					    </div>
					  </div>
					</div>

					<div class="background container-fluid" style="min-height: 90%;">
						<h2 class="description">Archive of Entertainment</h2>

						<div class="row" style='position: initial!important; margin-left: 0px!important; margin-right: 0px!important;'>
							<div class="col col-lg-2 col-md-1 col-sm-1 col-xs-1"></div>

							<div class="col col-lg-8 col-md-10 col-sm-10 col-xs-12">
									<div class="row adjust" style='position: initial!important;'>
											<div class="first col col-lg-6 col-md-6 col-sm-6 col-xs-12 side">
												<div class="inner-addon right-addon">
													<i class="glyphicon glyphicon-search"></i>
													<input type="text" name="search" id="search"  placeholder="Type to Search" value="">
												</div>
											</div>

											<div class="second col col-lg-6 col-md-6 col-sm-6 col-xs-12 side" style='margin-bottom: 10px;'>
												<button id="displayAll" target="tabAll" type="button" class="btn display activeBtn" style='display: inline-block'>All</button>
												<button id="displayMovies" target="tabMovies" type="button" class="btn display" style='display: inline-block'>Movies</button>
												<button id="displayShows" target="tabShows" type="button" class="btn display" style='display: inline-block'>Shows</button>
											</div>

									</div>
							</div>
						</div>

						<div style='display: none;'>
							<a id="tabAll" data-toggle="tab" class="all" href="#all">All</a>
							<a id="tabMovies" data-toggle="tab" class="movies" href="#movies">Movies</a>
							<a id="tabShows" data-toggle="tab" class="shows" href="#shows">Shows</a>
						</div>

						<div class="row" style='position: initial!important; margin-left: 0px!important; margin-right: 0px!important;'>
							<div class="col col-lg-2 col-md-1 col-sm-1 col-xs-1"></div>

							<div style='background: white;' class="col col-lg-8 col-md-10 col-sm-10 col-xs-10">
								<div class="tab-content">
									<div id="all" class="tab-pane fade in active">
										<div>
											<?php
												$count = 0;
												$query = "SELECT * from entertainment ORDER BY name, start ASC, current ASC";
												$result = $db->query($query);

												while($row = $result->fetch_assoc()){
													if ($count == 0) {
														echo "<div class='row entertainmentContainer'>";
													}

													echo "<div id='".$row['id']."' class='entertainment col col-lg-4 col-md-4 col-sm-4 col-xs-12'>";
														echo "<span class='title btn-link'>".stripslashes($row['name'])."</span>";
														//echo "<a href='#' class='text-danger title'>".stripslashes($row['name'])."</a>";

														echo "<div style='font-size: 14px; margin-left: 30px;'>";
															if ($row['movie']) {
																echo "<i class='fa fa-film' aria-hidden='true'></i>";
															}

															else {
																echo "<i class='fa fa-television' aria-hidden='true'></i>";
															}

															//echo "<span class='glyphicons glyphicons-tv' aria-hidden='true'></span>";
															//echo "<span style='color: mediumblue; margin-right: 5px; font-size: 18px;' class='glyphicon glyphicon-film'></span>";

															echo "<span style='position: relative; top: -3px;'>";

																if ($row['movie']) {
																	echo $row['start'];
																}

																else {
																	if ($row['current']) {
																		echo $row['start'] . " - Present";
																	}

																	else {
																		echo $row['start'] . " - " . $row['end'];
																	}
																}

															echo "</span>";

														echo "</div>";

													echo "</div>";

													$count++;

													if ($count == 3) {
														$count = 0;
														echo "</div>";
													}
												}

												if ($count != 0) {
													echo "</div>";
												}
											?>
										</div>
									</div>

									<div id="movies" class="tab-pane fade">
										<div>
											<?php
												$count = 0;
												$query = "SELECT * from entertainment WHERE movie = true ORDER BY name, start ASC, current ASC";
												$result = $db->query($query);

												while($row = $result->fetch_assoc()){
													if ($count == 0) {
														echo "<div class='row entertainmentContainer'>";
													}

													echo "<div id='".$row['id']."' class='entertainment col col-lg-4 col-md-4 col-sm-4 col-xs-12'>";
														echo "<span class='title btn-link'>".stripslashes($row['name'])."</span>";

														echo "<div style='font-size: 14px; margin-left: 30px;'>";
															echo "<i class='fa fa-film' aria-hidden='true'></i>";

															echo "<span style='position: relative; top: -3px;'>";
																echo $row['start'];
															echo "</span>";

														echo "</div>";

													echo "</div>";

													$count++;

													if ($count == 3) {
														$count = 0;
														echo "</div>";
													}
												}

												if ($count != 0) {
													echo "</div>";
												}
											?>
										</div>
									</div>

									<div id="shows" class="tab-pane fade">
										<div>
											<?php
												$count = 0;
												$query = "SELECT * from entertainment WHERE movie = false ORDER BY name, start ASC, current ASC";
												$result = $db->query($query);

												while($row = $result->fetch_assoc()){
													if ($count == 0) {
														echo "<div class='row entertainmentContainer'>";
													}

													echo "<div id='".$row['id']."' class='entertainment col col-lg-4 col-md-4 col-sm-4 col-xs-12'>";
														echo "<span class='title btn-link'>".stripslashes($row['name'])."</span>";

														echo "<div style='font-size: 14px; margin-left: 30px;'>";
															echo "<i class='fa fa-television' aria-hidden='true'></i>";

															echo "<span style='position: relative; top: -3px;'>";

																if ($row['current']) {
																	echo $row['start'] . " - Present";
																}

																else {
																	echo $row['start'] . " - " . $row['end'];
																}

															echo "</span>";

														echo "</div>";

													echo "</div>";

													$count++;

													if ($count == 3) {
														$count = 0;
														echo "</div>";
													}
												}

												if ($count != 0) {
													echo "</div>";
												}
											?>
										</div>
									</div>
								</div>
							</div>

							<div class="col col-lg-2 col-md-1 col-sm-1 col-xs-1"></div>
						</div>

					</div>

					<div id="push"></div>
			</div>
		</div>

		<?php include "footer.php"; ?>

		<style>
			.modal-open {
				position: fixed;
				width: 100%;
			}
		</style>

		<script type="text/javascript">
			var all, shows, movies, allList, moviesList, showsList, scrollTop, cssTop;
			var searchCount = 0;

			$(document).ready(function() {
				$('#infoModal').on('show.bs.modal', function() {
					cssTop = "-" + scrollTop + "px";
					$("body").css("top", cssTop);
					$("body").css("background-position","0px " + cssTop);
				});

				//Doesnt work in Firefox wihout event as an argument
				$('#infoModal').on('hidden.bs.modal', function (event) {
					$("body").css("top","unset");
					$("body").css("background-position","0px 0px");
					$(document).scrollTop(scrollTop);
				});
			});

			$(".entertainment").click(function() {
				var id = $(this).attr("id");

				$.ajax({
					url: 'ajax/getInformation.php',
					type: 'POST',
					dataType: 'json',
					data: {id: id},
					success: function(info) {
						console.log(info);

						if (info != "") {
							if (info.movie == false) {
								$("#infoTitle").html(info.show['name']);
								$("#infoImage").attr("src", info.show['image'].medium);
								$("#infoDescription").html(info.show['summary']);
								$("#infoStart").html("Premiered: " + info.show['premiered']);

 								scrollTop = $(document).scrollTop();
								$("#infoModal").modal("show");
								//$(document).scrollTop(scrollTop);
							}

							else {
								$("#infoTitle").html(info.title);
								$("#infoImage").attr("src", "http://image.tmdb.org/t/p/w500/" + info.backdrop_path);
								$("#infoDescription").html(info.overview);
								$("#infoStart").html("Premiered: " + info.release_date);

								scrollTop = $(document).scrollTop();
								$("#infoModal").modal("show");
								//$(document).scrollTop(scrollTop);
							}
						}
					}
				});

			});

			$(".display").click(function() {
				$(".display").removeClass("activeBtn");
				$(this).toggleClass("activeBtn");

				var target = "#" + $(this).attr("target");
				$(target).trigger("click");

			});

			//$("#search").keyup(search);

			$("#search").keypress(search);

			function search(callback) {
				searchCount++;

				all = "";
				shows = "";
				movies = "";

				$.ajax({
					url: 'ajax/filter_entertainment.php',
					type: 'POST',
					dataType: 'json',
					data: {search: $("#search").val()},
					success: function(entertainment) {
						count = 0;

						allList = entertainment.all;
						moviesList = entertainment.movies;
						showsList = entertainment.shows;

						for (var i = 0; i < allList.length; i++) {
							if (count == 0) {
								all += "<div class='row entertainmentContainer'>";
							}

							all += "<div id='"+allList[i]['id']+"' class='entertainment col col-lg-4 col-md-4 col-sm-4 col-xs-12'>";
								all += "<span class='title btn-link'>"+ allList[i]['name'] +"</span>";

								all += "<div style='font-size: 14px; margin-left: 30px;'>";
									if (allList[i]['movie']) {
										all += "<i class='fa fa-film' aria-hidden='true'></i>";
									}

									else {
										all += "<i class='fa fa-television' aria-hidden='true'></i>";
									}

									all += "<span style='position: relative; top: -3px;'>";

										if (allList[i]['movie']) {
											all += allList[i]['start'];
										}

										else {
											if (allList[i]['current']) {
												all += allList[i]['start'] + " - Present";
											}

											else {
												all +=  allList[i]['start'] + " - " + allList[i]['end'];
											}
										}

									all += "</span>";

								all += "</div>";

							all += "</div>";

							count++;

							if (count == 3) {
								count = 0;
								all += "</div>";
							}
						}

						if (count != 0) {
							all += "</div>";
						}

						count = 0;

						for (var i = 0; i < moviesList.length; i++) {
							if (count == 0) {
								movies += "<div class='row entertainmentContainer'>";
							}

							movies += "<div id='"+moviesList[i]['id']+"' class='entertainment col col-lg-4 col-md-4 col-sm-4 col-xs-12'>";
								movies += "<span class='title btn-link'>"+ moviesList[i]['name'] +"</span>";

								movies += "<div style='font-size: 14px; margin-left: 30px;'>";
									movies += "<i class='fa fa-film' aria-hidden='true'></i>";
									movies += "<span style='position: relative; top: -3px;'>";
											movies += moviesList[i]['start'];
									movies += "</span>";
								movies += "</div>";

							movies += "</div>";

							count++;

							if (count == 3) {
								count = 0;
								movies += "</div>";
							}
						}

						if (count != 0) {
							movies += "</div>";
						}

						count = 0;

						for (var i = 0; i < showsList.length; i++) {
							if (count == 0) {
								shows += "<div class='row entertainmentContainer'>";
							}

							shows += "<div id='"+showsList[i]['id']+"' class='entertainment col col-lg-4 col-md-4 col-sm-4 col-xs-12'>";
								shows += "<span class='title btn-link'>"+ showsList[i]['name'] +"</span>";

								shows += "<div style='font-size: 14px; margin-left: 30px;'>";
									shows += "<i class='fa fa-television' aria-hidden='true'></i>";
									shows += "<span style='position: relative; top: -3px;'>";
											if (showsList[i]['current']) {
												shows += showsList[i]['start'] + " - Present";
											}

											else {
												shows +=  showsList[i]['start'] + " - " + showsList[i]['end'];
											}

									shows += "</span>";

								shows += "</div>";

							shows += "</div>";

							count++;

							if (count == 3) {
								count = 0;
								shows += "</div>";
							}
						}

						if (count != 0) {
							shows += "</div>";
						}

						$("#shows div").html(shows);
						$("#all div").html(all);
						$("#movies div").html(movies);

					},
					complete: function () {
						if (typeof callback == 'function')
							callback();
					}
				});

			}
		</script>
	</body>
</html>
