@extends('master')

@section('content')

<div id="root">
	<h1>This section is loaded by vuejs and axios(ajax)</h1>
	
	<ul>
		<li v-for="skill in skills" v-text="skill"></li>
	</ul>
</div>

@stop