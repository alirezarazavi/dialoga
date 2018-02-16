@if(Session::has('message-success'))
	<div class="notification is-info">
		<button class="delete"></button>
		<p class="rtl">{{Session::get('message-success')}}</p>
	</div>
@elseif(Session::has('message-error'))
	<div class="notification is-danger">
		<button class="delete"></button>
		<p class="rtl">{{Session::get('message-error')}}</p>
	</div>
@endif

@if($errors->any())
	<div class="notification is-danger">
		<button class="delete" type="button"></button>
		<ul class="list-unstyled rtl">
			@foreach($errors->all() as $error)
				<li> {{ $error }} </li>
			@endforeach
		</ul>
	</div>
@endif