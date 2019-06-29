@extends('layouts.master')

@section('content')
	
	@include('layouts.message')

	<div class="columns notification profile">

		<div class="column is-half is-offset-one-quarter level">
			<div class="level-item">
				<figure class="image is-128x128">
					<img src="uploads/avatars/{{ Auth::user()->avatar }}" class="profile-image" onerror="this.src='uploads/avatars/default.png'">
				</figure>
			</div>
			<div class="level-item" style="margin-top:10px;">
				<h2>{{ Auth::user()->username }}</h2>
			</div>
			<p class="level-item rtl">{{ Verta::persianNumbers($dialogs->total()) }} دیالوگ</p>
		</div>
		
	</div>

	@include('dialogs')

	{{ $dialogs->links('layouts.paginator') }}

@stop
