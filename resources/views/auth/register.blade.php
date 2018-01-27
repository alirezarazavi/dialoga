@extends('master')

@section('content')

	<div class="columns is-centered">
		<div class="column is-4" style="margin-top: 60px;">
			<div class="box">
				<form action="{{route('register')}}" method="POST">
				{{csrf_field()}}
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
					<div class="content">
						<p class="is-clearfix"></p>
						<div class="field">
							<p class="control has-icons-left">
								<input class="input is-large {{$errors->has('username') ? 'in-danger' : ''}}" type="text" name="username" id="username" placeholder="نام کاربری" value="{{old('username')}}" required autofocus>
								<span class="icon is-large is-left">
									<i class="fa fa-user"></i>
								</span>
							</p>
						</div>
						<div class="field">
							<p class="control has-icons-left">
								<input class="input is-large {{$errors->has('email') ? 'in-danger' : ''}}" type="email" name="email" id="email" placeholder="ایمیل" value="{{old('email')}}" required>
								<span class="icon is-large is-left">
									<i class="fa fa-envelope"></i>
								</span>
							</p>
						</div>
						<div class="field has-addons">
							<p class="control has-icons-left has-icons-right">
								<input class="input is-large {{$errors->has('email') ? 'in-danger' : ''}}" type="password" name="password" id="password" placeholder="رمز عبور" required>
								<span class="icon is-large is-left">
									<i class="fa fa-lock"></i>
								</span>
							</p>
							<p class="control">
								{{--<a href="#" class="button is-light is-large" id="toggle-password">--}}
								{{--</a>--}}
								<button type="button" class="button is-light is-large" id="toggle-password">
									<i class="fa fa-eye"></i>
								</button>
							</p>
						</div>
					</div>
					<div class="field">
						<div class="control">
							{{--<a class="button is-block is-success is-large" type="submit">ثبت نام</a>--}}
							<button class="button is-block is-success is-large is-fullwidth" type="submit">ثبت نام</button>
						</div>
					</div>
					<div class="column" style="margin-top: 20px;">
						<p class="has-text-centered">قبلا ثبت نام کرده‌اید؟ <a href="{{URL::route('login')}}" class="is-info">وارد شوید</a></p>
					</div>
				</form>
			</div>
		</div>

	</div>

@stop