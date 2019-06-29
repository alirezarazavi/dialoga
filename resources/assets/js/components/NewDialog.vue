<template>
	<div>
		<!--Success-->
		<div v-if="successful">
			<div class="notification is-info">
				<button class="delete" v-on:click="successful = false"></button>
				<p dir="rtl">دیالوگ ذخیره شد</p>
			</div>
		</div>
		<!--Errors-->
		<div v-if="form.errors.any()">
			<div class="notification is-warning">
				<button class="delete" v-on:click="form.errors.clear()"></button>
				<ul class="list-unstyled">
					<li v-for="value in form.errors.all()">
						{{ value[0] }}
					</li>
				</ul>
			</div>
		</div>

		<form v-on:submit.prevent="submit">
			<div class="field">
				<div class="control is-expanded">
					<textarea name="dialog-text" class="textarea is-medium has-text-right" id="dialog-text" v-model="form.resultDialog"
							  placeholder="دیالوگ جدید بنویسید و آن را ثبت کنید" dir="rtl" rows="3"></textarea>
				</div>
			</div>
			<div class="field columns">
				<div class="control column">
					<button type="submit" class="button is-warning is-medium is-rounded" v-bind:disabled="form.busy">ثبت دیالوگ</button>
				</div>
				<div class="column is-four-fifths">
					<div class="control has-icons-left has-icons-right" id="search_container" v-bind:class="{ 'is-loading': form.busy }">

						<input type="text" id="dialog-movie" name="dialog-movie" class="input is-rounded is-medium" v-model="searchInput" v-on:keyup="dialogMovieSearch"
							   placeholder="نام فیلم (به انگلیسی)" autocomplete="off">

						<span class="icon is-left"><i class="fa fa-film"></i></span>
						<span id="search_done_icon" class="icon is-right is-invisible"><i
								class="fa fa-check"></i></span>

						<!-- Movie Search Result -->
						<div v-if="results.length" class="notification is-light is-8 has-text-left" id="results">
							<a class="delete" v-on:click="results = '', searchInput = ''"></a>
							<div v-for="result in results" class="media">
								<div class="media-left">
									<figure class="image is-32x32">
										<!--vue obligate to use v-bind:src, or vue parser throw error-->
										<img v-bind:src="result.Poster" alt="Image">
									</figure>
								</div>
								<div class="media-content">
									<div class="content">
										<a v-on:click="setMovie(result)" href="#">{{ result.Title }} ({{ result.Year }}) ({{ result.Type }})</a>
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
					Title: '',
					Poster: '',
					Type: '',
					Year: '',
					Imdbid: '',
				},
				form: new Form({
					resultDialog: '',
					resultTitle: '',
					resultPoster: '',
					resultType: '',
					resultYear: '',
					resultImdbid: '',
				}),
				searchInput: '',
				successful: false,
			}
		},
		methods: {
			//delay request(2s) with lodash
			dialogMovieSearch: _.debounce(function() {
				this.form.get('/movie_search?movie=' + this.searchInput)
				.then((response) => {
					if (response.status === 200) {
						//search for movie and show results
						this.results = response.data.data.Search;
					}
				})
				.catch((error) => {
				})

			}, 1000),

			setMovie(result) {
				//set movie information on user click on search result or call this function
				this.results = '';
				this.searchInput = `${result.Title} (${result.Year}) (${result.Type})`;
				this.form.resultTitle = result.Title;
				this.form.resultPoster = result.Poster;
				this.form.resultType = result.Type;
				this.form.resultYear = result.Year;
				this.form.resultImdbid = result.imdbID;
			},

			submit() {
				if (this.form.resultImdbid === '') {
					//set error if not found movie or empty search input
					this.form.errors.set({
						resultTitle: ['نام فیلم یا سریال وارد شده معتبر نیست']
					});

				} else if (this.form.resultDialog.length < 5) {
					this.form.errors.set({
						resultDialog: ['متن دیالوگ را بنویسید']
					});
				} else {
					this.form.post('/')
						.then((response) => {
							if (response.data === true) {
								this.results = '';
								this.searchInput = '';
								this.form.reset();
								this.successful = true;
							 	window.location.href = '/';
							} else {
								this.form.errors.set({
									resultDialog: ['دیالوگ ذخیره نشد. دوباره تلاش کنید']
								});
							}
						})
						.catch((error) => {
							this.form.errors.set({
								resultDialog: ['مشکلی پیش آمد']
							});
						});
				}
			}
		}
	}
</script>