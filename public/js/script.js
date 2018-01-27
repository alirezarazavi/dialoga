// Hide Notification panel when delete btn is clicked
$(document).on('click', '.delete', function() {
	$(this).parent().addClass('is-hidden');
	return false;
});
$(function() {
	// Show and Hide password in register page
	$("#toggle-password").click(function() {
		if ($('#password').prop("type") == "text") {
			$('#password').prop("type", "password");
			$('#toggle-password i').toggleClass("fa-eye fa-eye-slash")
		} else {
			$('#password').prop("type", "text");
			$('#toggle-password i').toggleClass("fa-eye fa-eye-slash")
		}
	});

	// tooltip when copy text to clipboard
	tippy('.copy', {
		trigger: 'click',
	});

});

// clipboard.js to copy text to clipboard
var clipboard = new Clipboard('.copy');


// Search Movie
jQuery(document).ready(function(){
	var timer;
	jQuery("#movie").on('keyup', function(){
		clearInterval(timer);
		timer = setTimeout(function() {
			jQuery('#results').empty();
			$movie = jQuery('#movie').val();
			if ($('#movie').val().trim() != '') {
				jQuery('#search_container').addClass("is-loading");
				$("#search_done_icon").addClass("is-invisible");
				jQuery.ajax({
					type: 'GET',
					url: base_path + '/movie_search',
					dataType: 'json',
					data: {'movie': $movie},
					success: function(data){
						if (data.data.Response == 'True') {
							jQuery('#results').removeClass("is-invisible");
							jQuery('#search_container').removeClass("is-loading");
							console.log(data);
							jQuery.each(data.data, function(index, item) {
								if (typeof item[0].Title != "undefined") {
									$.each(item, function(index, item) {
										jQuery('#results').append('<div class="media"><div class="media-left"><figure class="image is-32x32"><img src="'+item.Poster+'"></figure></div><div class="media-content"><div class="content"><a class="movie_item" onclick="movie_search_select(\'' + item.imdbID + '\' , \'' + item.Title + '\' , \'' + item.Year + '\' , \'' + item.Type + '\' , \'' + item.Poster + '\')">' + item.Title + " (" + item.Year + ") (" + item.Type + ") " + item.imdbID +'</a></div></div></div>');
									});
								}
							});
						} else {
							movie_search_fail();
						}
					},
					error: function() {
						movie_search_fail();
					}
				});
			}
		}, 1000);
	});

});


function movie_search_select(imdb_id, title, year, type, poster) {
	// set movie search input value
	$("#movie").val(title + " (" + year + ") " + "(" + type + ")");
	// set hidden inputs value
	$("#movie_imdb_id").val(imdb_id);
	$("#movie_title").val(title);
	$("#movie_year").val(year);
	$("#movie_type").val(type);
	$("#movie_poster").val(poster);

	$("#search_done_icon").removeClass("is-invisible");
	$("#results").empty();
	$('#results').addClass("is-invisible");
	$('#search_container').removeClass("is-loading");
}


function movie_search_fail() {
	jQuery("#results").empty();
	jQuery('#results').addClass("is-invisible");
	jQuery('#search_container').removeClass("is-loading");
	jQuery("#search_done_icon").addClass("is-invisible");
}
