@extends('master')

@section('content')

	@include('message')

		<section class="hero is-primary single" style="background: {{$color}};">
			<div class="hero-body">
				<div class="columns">
					<div class="column is-four-fifths rtl">
						<h2 class="title has-text-centered">{{ $movie['data']['Title'] }}</h2>
						<div class="columns">
							<div class="column is-10">
								<p>کارگردان<strong> {{ $movie['data']['Director'] }} </strong></p>
								<p>بازیگران<strong> {{ $movie['data']['Actors'] }} </strong></p>
								<p>سال تولید<strong> {{ $movie['data']['Year'] }} </strong></p>
								<p>ژانر<strong> {{ $movie['data']['Genre'] }} </strong></p>
								<p>محصول<strong> {{ $movie['data']['Country'] }} </strong></p>
							</div>
							<div class="column is-2">
								<span class="icon is-large">
									<a href="http://imdb.com/title/{{ $movie['data']['imdbID'] }}" target="_blank"><i class="fa fa-imdb fa-3x"></i></a>
								</span>
								<span class="icon is-large">
									<a href="http://www.google.com/search?q={{ $movie['data']['Title'] . ' ' . $movie['data']['Type'] . ' ' . $movie['data']['Year'] }}" target="_blank"><i class="fa fa-google fa-3x"></i></a>
								</span>
							</div>
						</div>
					</div>

					<div class="column">
						<figure class="image is-128x128">
							<img src="{{ $dialogs[0]->poster }}" class="">
						</figure>
					</div>
				</div>
			</div>
		</section>

	@include('dialogs')

	{{ $dialogs->links('paginator') }}

@stop
