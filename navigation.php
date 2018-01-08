<input type="hidden" id="resize" name="resize" value="Y" />
<input type="hidden" id="displaySidebar" name="displaySiderbar" value="Y" />

<div id="myOverlay" class="overlay" style="width: 70%; left:  30%; cursor:pointer"></div>

<nav class="navbar navbar-default" style="background: black;">
	<div class="container-fluid">
		<div class="navbar-header">
			<button id="openNav" type="button" style='float: left; margin-left: 15px;' class="navbar-toggle collapsed">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="<?php if ($curpage == "index.php") { echo 'active'; } ?> navbar-brand" style='color: white; text-decoration: none;' href="index.php">
				Super Hero Fan Club
			</a>
		</div>

		<div class="collapse navbar-collapse" id="navBar">
			<ul class="nav navbar-nav">
				<li>
					<a href="entertainment.php" class="<?php if ($curpage == "entertainment.php") { echo 'active'; } ?>">Archive of Entertainment</a>
				</li>
				<li>
					<a href="gallery.php" class="<?php if ($curpage == "gallery.php") { echo 'active'; } ?>">Galleries</a>
				</li>
				<li>
					<a href="trivia.php" class="<?php if ($curpage == "trivia.php") { echo 'active'; } ?>">Hall of Trivia</a>
				</li>
				<li>
					<a href="quotes.php" class="<?php if ($curpage == "quotes.php") { echo 'active'; } ?>">Heroic Quotes</a>
				</li>
				<li style='display: none;'>
					<a href="placeholder.php">Registration</a>
				</li>
			</ul>
		</div>

		<div class="collapsed navbar-collapse" style='display: none; background: black;' id="xNav"><!-- For iPhone X-->
			<ul class="nav navbar-nav">
				<li>
					<a href="entertainment.php" class="<?php if ($curpage == "entertainment.php") { echo 'active'; } ?>">Archive of Entertainment</a>
				</li>
				<li>
					<a href="gallery.php" class="<?php if ($curpage == "gallery.php") { echo 'active'; } ?>">Galleries</a>
				</li>
				<li>
					<a href="trivia.php" class="<?php if ($curpage == "trivia.php") { echo 'active'; } ?>">Hall of Trivia</a>
				</li>
				<li>
					<a href="quotes.php" class="<?php if ($curpage == "quotes.php") { echo 'active'; } ?>">Heroic Quotes</a>
				</li>
				<li style='display: none;'>
					<a href="placeholder.php">Registration</a>
				</li>
			</ul>
		</div>

		<style>
			.active {
				background-color: chocolate!important;
			}

			.navbar-nav li a:hover, .navbar-brand:hover {
				color:#fff!important;
				background-color:#4CAF50!important
			}

			.navbar-default .navbar-toggle:focus {
				background: black!important;
			}

		</style>

	</div>
</nav>

<!--<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php">
			Super Hero Fan Club
		  </a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li>
				<a href="entertainment.php">Archive of Entertainment</a>
			</li>
			<li>
				<a href="trivia.php">Hall of Trivia</a>
			</li>
			<li>
				<a href="quotes.php">Heroic Quotes</a>
			</li>
			<li>
				<a href="placeholder.php">Registration</a>
			</li>
			<li>
				<a href="slideshow.php">Slideshow of Heroes</a>
			</li>
		  </ul>
		</div>
	</div>
</nav>-->

<script type="text/javascript">
	$(document).ready(function() {
		if (navigator.userAgent.match(/(iPhone)/)){
		  if((screen.availHeight == 812) && (screen.availWidth == 375)) {
				$(".sidebar").remove();
				$("#displaySidebar").val("N");
				$("#xNav").css("display","none");
		  }
		}

		else {
			$("#xNav").css("display", "none!important");
			$("#xNav").remove();
		}

		$(".navbar-toggle").click(function() {
			if ($(this).hasClass("collapsed")) {
				$("#resize").val("N");
				$(this).removeClass("collapsed");
			}

			else {
				$("#resize").val("Y");
				$(this).addClass("collapsed");
			}

			$("#xNav").toggle();

		});

		contentHeight = parseFloat($("body").css("height"));
		navigationHeight = parseFloat($(".navbar-header").css("height"));
		footerHeight = parseFloat($("footer").css("height"));

		title = parseFloat($("#slideshowDescription").css("height"));
		title += parseFloat($("#slideshowDescription").css("margin-top"));
		title += parseFloat($("#slideshowDescription").css("margin-bottom"));

		container = contentHeight - navigationHeight - footerHeight;
		slide = container - title + "px";

		$("#slideshow").css("height", slide);
		$("#content .background").css("height", container);
	});

	$(window).on('resize', function(){
		if ($(".navbar-toggle").hasClass("collapsed") == false) {
			$(".navbar-toggle").trigger("click");
		}

		allowResize = $("#resize").val();

		if (allowResize == "Y") {
			contentHeight = parseFloat($("body").css("height"));
			navigationHeight = parseFloat($(".navbar-header").css("height"));
			footerHeight = parseFloat($("footer").css("height"));

			title = parseFloat($("#slideshowDescription").css("height"));
			title += parseFloat($("#slideshowDescription").css("margin-top"));
			title += parseFloat($("#slideshowDescription").css("margin-bottom"));

			container = contentHeight - navigationHeight - footerHeight;
			slide = container - title + "px";

			$("#slideshow").css("height", slide);
			$("#content .background").css("height", container);
		}
	});

	$("#openNav").click(function() {
		if ($("#displaySidebar").val() == "Y") {
			$("#main").css("margin-left", "30%");
			$("footer").css("margin-left", "30%");
			$("#mySidebar").css("width","30%").css("display","block");
			//$("#openNav").css("display","none");
			$("#myOverlay").css("display","block");
		}

		if($("#openNav").css("background-color") == "rgb(221, 221, 221)") {
			if($("#xNav").css("display") == "block") {
				$("#openNav").css("background-color", "black");
			}
		}

		else {
			$("#openNav").css("background-color", "rgb(221, 221, 221");
		}

	});

	$("#closeSidebar").click(function() {
		$("#openNav").addClass("collapsed");
		$("#main").css("margin-left", "0%");
		$("footer").css("margin-left", "0%");
		$("#mySidebar").css("width","30%").css("display","none");
		$("#openNav").css("display","inline-block");
		$("#myOverlay").css("display","none");
	});

	$("#myOverlay").click(function() {
		$("#openNav").addClass("collapsed");
		$("#main").css("margin-left", "0%");
		$("footer").css("margin-left", "0%");
		$("#mySidebar").css("width","30%").css("display","none");
		$("#openNav").css("display","inline-block");
		$("#myOverlay").css("display","none");
	});

</script>
