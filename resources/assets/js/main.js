// require('../../../node_modules/clipboard/dist/clipboard.min.js');
// require('../../../node_modules/tippy.js/dist/tippy.all.js');

jQuery(document).ready(function(jQuery) {
	// Hide Notification panel when delete btn is clicked
	// jQuery(document).on('click', '.delete', function () {
	// 	jQuery(this).parent().addClass('is-hidden');
	// 	return false;
	// });
	jQuery(function () {
		// Show and Hide password in register page
		// jQuery("#toggle-password").click(function () {
		// 	if (jQuery('#password').prop("type") == "text") {
		// 		jQuery('#password').prop("type", "password");
		// 		jQuery('#toggle-password i').toggleClass("fa-eye fa-eye-slash")
		// 	} else {
		// 		jQuery('#password').prop("type", "text");
		// 		jQuery('#toggle-password i').toggleClass("fa-eye fa-eye-slash")
		// 	}
		// });
	});

	// tooltip when copy text to clipboard
	tippy('.copy', {
		trigger: 'click',
	});
	// clipboard.js to copy text to clipboard
	var clipboard = new Clipboard('.copy');


	// Search Movie
	// jQuery(document).ready(function () {
	// 	var timer;
	// 	jQuery("#movie").on('keyup', function () {
	// 		clearInterval(timer);
	// 		timer = setTimeout(function () {
	// 			jQuery('#results').empty();
	// 			jQuerymovie = jQuery('#movie').val();
	// 			if (jQuery('#movie').val().trim() != '') {
	// 				jQuery('#search_container').addClass("is-loading");
	// 				jQuery("#search_done_icon").addClass("is-invisible");
	// 				jQuery.ajax({
	// 					type: 'GET',
	// 					url: base_path + '/movie_search',
	// 					dataType: 'json',
	// 					data: {'movie': jQuerymovie},
	// 					success: function (data) {
	// 						if (data.data.Response == 'True') {
	// 							jQuery('#results').removeClass("is-invisible");
	// 							jQuery('#search_container').removeClass("is-loading");
	// 							console.log(data);
	// 							jQuery.each(data.data, function (index, item) {
	// 								if (typeof item[0].Title != "undefined") {
	// 									jQuery.each(item, function (index, item) {
	// 										jQuery('#results').append('<div class="media"><div class="media-left"><figure class="image is-32x32"><img src="' + item.Poster + '"></figure></div><div class="media-content"><div class="content"><a class="movie_item" onclick="movie_search_select(\'' + item.imdbID + '\' , \'' + item.Title + '\' , \'' + item.Year + '\' , \'' + item.Type + '\' , \'' + item.Poster + '\')">' + item.Title + " (" + item.Year + ") (" + item.Type + ") " + item.imdbID + '</a></div></div></div>');
	// 									});
	// 								}
	// 							});
	// 						} else {
	// 							movie_search_fail();
	// 						}
	// 					},
	// 					error: function () {
	// 						movie_search_fail();
	// 					}
	// 				});
	// 			}
	// 		}, 1000);
	// 	});
	//
	// });


	// function movie_search_select(imdb_id, title, year, type, poster) {
	// 	// set movie search input value
	// 	jQuery("#movie").val(title + " (" + year + ") " + "(" + type + ")");
	// 	// set hidden inputs value
	// 	jQuery("#movie_imdb_id").val(imdb_id);
	// 	jQuery("#movie_title").val(title);
	// 	jQuery("#movie_year").val(year);
	// 	jQuery("#movie_type").val(type);
	// 	jQuery("#movie_poster").val(poster);
	//
	// 	jQuery("#search_done_icon").removeClass("is-invisible");
	// 	jQuery("#results").empty();
	// 	jQuery('#results').addClass("is-invisible");
	// 	jQuery('#search_container').removeClass("is-loading");
	// }
	//
	//
	// function movie_search_fail() {
	// 	jQuery("#results").empty();
	// 	jQuery('#results').addClass("is-invisible");
	// 	jQuery('#search_container').removeClass("is-loading");
	// 	jQuery("#search_done_icon").addClass("is-invisible");
	// }

});