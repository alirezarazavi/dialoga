@extends('layouts.master')

@section('content')

	<div class="hero is-primary is-bold is-small">
		<div class="hero-body">
			{{--  <h2 class="title is-4">دیالوگ جدید بنویسید و آن را ثبت کنید</h2>  --}}
			@include('layouts.message')

			<new-dialog></new-dialog>
			
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
			
	{{ $dialogs->links('layouts.paginator') }}

	{{--@TODO fix this!--}}
	{{--<script type="text/javascript">--}}
		{{-- JS FILE WILL READ THIS VAR FOR AJAX CALL --}}
		{{--var base_path = '{{ url('/') }}';--}}
	{{--</script>--}}


@stop