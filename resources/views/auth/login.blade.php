@extends('layouts.master')

@section('content')

	<div class="columns is-centered">

		<div class="column is-4" style="margin-top: 60px;">
			<div class="box">

				<router-view></router-view>

			</div>
		</div>

	</div>

@stop