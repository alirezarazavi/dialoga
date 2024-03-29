<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<title>{{ config('app.name') }}</title>
        
		<link href="{{ mix('css/app.css') }}" rel="stylesheet">

		<meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <nav class="navbar is-dark">
			<div class="navbar-menu navbar-start">
				@if(Auth::check())
					<div class="navbar-item has-dropdown is-hoverable">
						<a href="#" class="navbar-link">
							<figure class="image is-32x32">
								<img src="{{ url('/') . '/uploads/avatars/' . Auth::user()->avatar }}" class="profile-image" onerror="this.src='uploads/avatars/default.png'">
							</figure>
							{{Auth::user()->username}}
						</a>
						<div class="navbar-dropdown">
							<a href="{{route('profile', Auth::user()->username)}}" class="navbar-item">پروفایل</a>
							<a href="{{route('settings')}}" class="navbar-item">تنظیمات</a>
							<a href="{{route('logout')}}" class="navbar-item">خروج</a>
						</div>
					</div>
				@else
					<a class="navbar-item @if(Route::is('login')) is-active @endif" href="{{route('login')}}">ورود</a>
					<a class="navbar-item @if(Route::is('register')) is-active @endif" href="{{route('register')}}">ثبت نام</a>
				@endif
			</div>
			
			@auth
				<div class="navbar-item navbar-end">
					<div class="field has-addons">
						<div class="control">
							<a class="button is-info">جستجو</a>
						</div>
						<div class="control">
							<input class="input has-text-right" type="text" placeholder="نام فیلم یا سریال">
						</div>
					</div>
				</div>
			@endauth

			<div class="navbar-brand navbar-center">
				<a href="{{URL::route('home')}}" class="navbar-item">
					<h1>دیالوگا</h1>
				</a>
			</div>
        </nav>

		<div id="app">
			@auth
				<section class="section">
					<div class="container">
						<div class="columns">

							<div class="column is-three-quarters has-text-right" style="margin-top: 0; padding-top: 0;">
								@yield('content')
							</div>

							<div class="column">
								@include('layouts.sidebar')
							</div>

						</div>
					</div>
				</section>

				@include('layouts.footer')
			@else
				@yield('content')
			@endauth
		</div>

		<script src="{{ mix('js/app.js') }}"></script>

    </body>
</html>
