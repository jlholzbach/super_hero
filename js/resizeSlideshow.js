var allowResize, contentHeight, footerHeight, navigationHeight;
var body, navigation, footer, container, size;
var title, slide;


$(document).ready(function() {
	$(".navbar-toggle").click(function() {

		if ($(this).hasClass("collapsed")) {
			$("#resize").val("N");
			$(this).removeClass("collapsed");
		}

		else {
			$("#resize").val("Y");
			$(this).addClass("collapsed");
		}
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
