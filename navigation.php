<input type="hidden" id="resize" name="resize" value="Y" />

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

			<a class="navbar-brand" style='color: white; text-decoration: none;' href="index.php">
				Super Hero Fan Club
			</a>
		</div>

		<div class="collapse navbar-collapse" id="navBar">
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
</nav>

<script type="text/javascript">
	$("#openNav").click(function() {
		$("#main").css("margin-left", "30%");
		$("footer").css("margin-left", "30%");
		$("#mySidebar").css("width","30%").css("display","block");
		$("#openNav").css("display","none");
		$("#myOverlay").css("display","block");
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
