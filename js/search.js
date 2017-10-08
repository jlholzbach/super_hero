$("#search").keyup(search);

function search(callback) {
  console.log($("#search").val());

  $.ajax({
    url: 'filter_entertainment.php',
    type: 'POST',
    dataType: 'json',
    data: {search: $("#search").val()},
    success: function (entertainment) {

    },
		complete: function () {
				if (typeof callback == 'function')
					callback();
		}});
}
