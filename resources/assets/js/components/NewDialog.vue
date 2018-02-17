<template>
	<div>
		<form method="POST" action="#">
			<!--{{csrf_field()}}-->
			<div class="field">
				<div class="control is-expanded">
					<textarea type="text" name="dialog_text" id="dialog_text"
							  class="textarea is-medium has-text-right"
							  placeholder="دیالوگ جدید بنویسید و آن را ثبت کنید" dir="rtl" required
							  rows="3"></textarea>
				</div>
			</div>
			<div class="field columns">
				<div class="control column">
					<button type="submit" class="button is-warning is-outlined is-medium">ثـبـت</button>
					<a class="button is-text is-outlined is-medium is-pulled-right">راهنما</a>
				</div>
				<div class="column is-four-fifths">
					<div class="control has-icons-left has-icons-right" id="search_container" v-bind:class="{ 'is-loading': form.busy }">

						<input type="text" id="movie" name="movie" class="input is-rounded is-medium" v-model="form.movieSearchInput" v-on:keyup="searchMovie"
							   placeholder="نام فیلم (به انگلیسی)" autocomplete="off" required>

						<input type="hidden" name="movie_imdb_id" id="movie_imdb_id">
						<input type="hidden" name="movie_title" id="movie_title">
						<input type="hidden" name="movie_year" id="movie_year">
						<input type="hidden" name="movie_type" id="movie_type">
						<input type="hidden" name="movie_poster" id="movie_poster">
						<span class="icon is-left"><i class="fa fa-film"></i></span>
						<span id="search_done_icon" class="icon is-right is-invisible"><i
								class="fa fa-check"></i></span>

						<!-- {{--  MOVIE SEARCH RESULT  --}} -->
						<div v-if="results.length" class="notification is-light is-8 has-text-left" id="results">

							<div v-for="result in results" class="media">
								<div class="media-left">
									<figure class="image is-32x32">
										<!--vue obligate to use v-bind:src or vue parser through error-->
										<img v-bind:src="result.Poster" alt="Image">
									</figure>
								</div>
								<div class="media-content">
									<div class="content">
										<a>{{ result.Title }}</a>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</form>
	</div>
</template>

<script>
	import _ from 'lodash'
	import Form from 'vform'

	export default {
		data() {
			return {
				results: {
					Poster: '',
					Title: '',
					Type: '',
					Year: '',
					imdbID: '',
				},

				form: new Form({
					movieSearchInput: '',
				})
			}
		},
		methods: {
			//delay request(2s) with lodash
			searchMovie: _.debounce(function() {
				this.form.get('/movie_search?movie=' + this.form.movieSearchInput)
				.then((response) => {
					if (response.status === 200) {
						// console.log(response.data.data.Search);
						this.results = response.data.data.Search;
					}
				})
				.catch((error) => {
				})

			}, 1000),

		}
	}
</script>