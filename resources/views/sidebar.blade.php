<aside class="menu has-text-right">
	<p class="menu-label">به دیالوگا خوش‌آمدید</p>
	<ul class="menu-list">
		<li><a href="{{route('home')}}" class="@if(Route::is('home')) is-active @endif">صفحه نخست</a></li>
		<li><a href="{{route('profile', Auth::user()->username)}}" class="@if(Route::is('profile') AND Auth::user()->username == Request::route('username')) is-active @endif">پروفایل</a></li>
		<li><a href="">لایک‌ها</a></li>
		<li><a href="{{route('settings')}}" class="@if(Route::is('settings')) is-active @endif">تنظیمات</a></li>
	</ul>
	<p class="menu-label">فیلم‌های برتر</p>
	<ul class="tags">
		@foreach($popularMovies as $popular)
			<a class="tag is-warning" href="{{ route('single', $popular->imdb_id) }}">{{ $popular-> title }}</a>
		@endforeach
	</ul>
	<p class="menu-label">کاربرهای برتر</p>
		<ul class="tags">
			@foreach($activeUsers as $user)
				<a class="tag is-info" href="{{route('profile', $user->username)}}">{{$user->username}}</a>
			@endforeach
		</ul>
</aside>
