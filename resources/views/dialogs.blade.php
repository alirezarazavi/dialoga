@forelse($dialogs as $dialog)
		<div class="box dialog-box">
			<article class="media has-text-right">
				<div class="media-left">
				</div>
				<div class="media-content has-text-right">
					<div class="content rtl" style="white-space:pre-line;">
						<p id="dialog_{{$dialog->id}}">{{$dialog->text}}</p>
					</div>

					<nav class="level is-mobile dialog-info">
						<div class="level-left">
							{{--  <a class="level-item">
								<span class="icon is-small has-text-info"><i class="fa fa-telegram"></i></span>
							</a>
							<a class="level-item">
								<span class="icon is-small has-text-info"><i class="fa fa-twitter"></i></span>
							</a>  --}}
							<a class="level-item copy" alt="Copy to clipboard" title="متن کپی شد" data-clipboard-action="copy" data-clipboard-target="#dialog_{{$dialog->id}}" data-tippy-title="کپی">
								<span class="icon is-small has-text-info"><i class="fa fa-clipboard"></i></span>
							</a>
							<a class="level-item">
								<span class="icon is-large has-text-primary"><i class="fa fa-heart-o">+2</i></span>
							</a>
							@if ($dialog->user_id == Auth::id())
								<div class="level-item">
									<a href="#" class="level-item button is-danger is-small">حذف</a>
									<a href="#" class="level-item button is-link is-small">ویرایش</a>
								</div>
							@endif
						</div>
						<div class="level-right">
							<div class="level-item">
								<p class="has-text-grey-light is-size-7 rtl" style="margin-right:10px;">
									<?php
										$datetime = new Verta($dialog->created_at);
									?>
									<span>{{Verta::persianNumbers($datetime->formatDifference())}}</span>
									&nbsp;توسط
									<a href="{{ route('profile', $dialog->username) }}" class="user-info">
										{{Auth::user()->username}}
										<img src="{{ url('/') . '/uploads/avatars/' . Auth::user()->avatar }}" class="profile-image">
									</a>
								</p>
								<span class="tag">
									@if(Route::is('single'))
										<span>{{$dialog->title}}</span>
									@else
										<a href="{{ route('single', $dialog->imdb_id) }}">{{$dialog->title}}</a>
									@endif
									{{--  <a class="" href="http://imdb.com/title/{{$dialog->imdb_id}}">{{$dialog->title}}</a>  --}}
								</span>
							</div>
						</div>
					</nav>

				</div>
				<div class="media-right">
					<figure class="image is-96x96 is-square">
						<img src="{{$dialog->poster}}" style="border-radius:50%;">
					</figure>
				</div>
			</article>
		</div>
	@empty
		<div class="columns hero is-light">
			<div class="hero-body">
				<p class="has-text-centered">چیزی برای نمایش وجود ندارد</p>
			</div>
		</div>
	@endforelse