@extends('layouts.master')

@section('content')

	<div class="hero is-primary is-bold is-small">
		<div class="hero-body">

			@include('layouts.message')

			<new-dialog-component></new-dialog-component>
			
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
	
	{{--@include('dialogs')--}}
	<dialog-component
		v-bind:dialogs="{{ json_encode($dialogs) }}">
	</dialog-component>

	{{ $dialogs->links('layouts.paginator') }}

	{{--<script type="text/javascript">--}}
		{{-- JS FILE WILL READ THIS VAR FOR AJAX CALL --}}
		{{--var base_path = '{{ url('/') }}';--}}
	{{--</script>--}}


@stop