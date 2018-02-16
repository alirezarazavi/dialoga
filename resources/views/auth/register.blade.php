@extends('layouts.master')

@section('content')

	<div class="columns is-centered">

		<div class="column is-4" style="margin-top: 60px;">
			<div class="box">
				{{--<form action="{{route('register')}}" method="POST">--}}
					{{--{{csrf_field()}}--}}
					{{--@if($errors->any())--}}
						{{--<div class="notification is-danger">--}}
							{{--<button class="delete" type="button"></button>--}}
							{{--<ul class="list-unstyled rtl">--}}
								{{--@foreach($errors->all() as $error)--}}
									{{--<li> {{ $error }} </li>--}}
								{{--@endforeach--}}
							{{--</ul>--}}
						{{--</div>--}}
					{{--@endif--}}
				{{--</form>--}}
				<register-component></register-component>
			</div>
		</div>

	</div>

@stop