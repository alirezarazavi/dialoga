@extends('layouts.master')
@section('content')

	<div class="hero is-primary is-bold is-small">
		<div class="hero-body">
			@include('layouts.message')
			<new-dialog-component></new-dialog-component>
		</div>
	</div>
	<br><br>
	{{--@include('dialogs')--}}
	<!--Tabs-->
	<div class="tabs is-right">
		<ul>
			<li class="{{ (Route::is('home.sort.popular')) ? "is-active" : "" }}"><a href="{{ route('home.sort.popular', 'popular') }}">محبوب‌ترین‌ها</a></li>
			<li class="{{ (Route::is('home')) ? "is-active" : "" }}"><a href="{{ route('home') }}">آخرین دیالوگ‌ها</a></li>
		</ul>
	</div>
	<!-- Dialogs List -->
	{{--<router-view--}}
		{{--v-bind:dialogs="{{ json_encode($dialogs) }}"--}}
		{{--avatar-base-url="{{ url('/') . '/uploads/avatars/' }}"--}}
		{{--v-bind:user-points="{{ $userPoints }}">--}}
	{{--</router-view>--}}
	<dialog-component
		v-bind:dialogs="{{ json_encode($dialogs) }}"
		avatar-base-url="{{ url('/') . '/uploads/avatars/' }}"
		v-bind:user-points="{{ $userPoints }}">
	</dialog-component>
	<br>
	{{ $dialogs->links('layouts.paginator') }}
	{{--<script type="text/javascript">--}}
		{{-- JS FILE WILL READ THIS VAR FOR AJAX CALL --}}
		{{--var base_path = '{{ url('/') }}';--}}
	{{--</script>--}}
@stop