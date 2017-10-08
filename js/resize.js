var allowResize, contentHeight, footerHeight, navigationHeight;

$(document).ready(function() {
	$(".navbar-toggle").click(function() {
		if ($(this).hasClass("collapsed")) {
			$("#resize").val("N");
		}

		else {
			$("#resize").val("Y");
		}
	});

	contentHeight = parseFloat($("body").css("height"));
	navigationHeight = parseFloat($(".navbar-header").css("height"));
	footerHeight = parseFloat($("footer").css("height"));

	container = contentHeight - navigationHeight - footerHeight;
	$("#content .background").css("height", container);
});

$(window).on('resize', function(){
	if ($(".navbar-toggle").hasClass("collapsed") == false) {
		$(".navbar-toggle").trigger("click");
	}

	allowResize = $("#resize").val();

	if (allowResize == "Y") {
		contentHeight = parseFloat($("body").css("height"));
		console.log("Resize: " + contentHeight);

		navigationHeight = parseFloat($(".navbar-header").css("height"));
		footerHeight = parseFloat($("footer").css("height"));

		container = contentHeight - navigationHeight - footerHeight;
		$("#content .background").css("height", container);
	}

});
