@extends('master')

@section('content')

	<div class="hero is-primary is-bold is-small">
		<div class="hero-body">
			{{--  <h2 class="title is-4">دیالوگ جدید بنویسید و آن را ثبت کنید</h2>  --}}
			@include('message')

			<form method="POST" action="#">
				{{csrf_field()}}
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
						<div class="control has-icons-left has-icons-right" id="search_container">
							
							<input type="text" id="movie" name="movie" class="input is-rounded is-medium" placeholder="نام فیلم (به انگلیسی)" autocomplete="off" required>

							<input type="hidden" name="movie_imdb_id" id="movie_imdb_id">
							<input type="hidden" name="movie_title" id="movie_title">
							<input type="hidden" name="movie_year" id="movie_year">
							<input type="hidden" name="movie_type" id="movie_type">
							<input type="hidden" name="movie_poster" id="movie_poster">
							<span class="icon is-left"><i class="fa fa-film"></i></span>
							<span id="search_done_icon" class="icon is-right is-invisible"><i class="fa fa-check"></i></span>

							{{--  MOVIE SEARCH RESULT  --}}
							<div class="notification is-light is-8 has-text-left is-invisible" id="results">
								{{--<div class="media">--}}
									{{--<div class="media-left">--}}
										{{--<figure class="image is-32x32">--}}
											{{--<img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">--}}
										{{--</figure>--}}
									{{--</div>--}}
									{{--<div class="media-content">--}}
										{{--<div class="content">--}}
											{{--<a>Valerian</a>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</div>--}}
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<br><br>
	{{--DIALOG LIST--}}
	<div class="tabs is-right">
		<ul>
			<li><a>محبوب‌ترین‌ها</a></li>
			<li class="is-active"><a>آخرین دیالوگ‌ها</a></li>
		</ul>
	</div>
	
	@include('dialogs')
			
	{{ $dialogs->links('paginator') }}
		
	<script type="text/javascript">
		{{-- JS FILE WILL READ THIS VAR FOR AJAX CALL --}}
		var base_path = '{{ url('/') }}';
	</script>


@stop