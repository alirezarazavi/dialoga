@include('master')

@section('content')

	<div class="columns is-centered">

		<div class="column is-4" style="margin-top: 60px;">
			<div class="box">
				<form action="{{route('login')}}" method="POST">
				{{csrf_field()}}
					<div class="content">
						<p class="is-clearfix"></p>
						<div class="field">
							<p class="control has-icons-left">
								<input class="input is-large" type="text" placeholder="نام کاربری" name="username" id="username" value="{{old('username')}}" required autofocus>
								<span class="icon is-large is-left">
									<i class="fa fa-user"></i>
								</span>
							</p>
						</div>
						<div class="field">
							<p class="control has-icons-left">
								<input class="input is-large" type="password" name="password" id="password" placeholder="رمز عبور" required>
								<span class="icon is-large is-left">
									<i class="fa fa-lock"></i>
								</span>
							</p>
						</div>
					</div>
					<div class="field">
						<div class="control">
							{{--<a class="button is-block is-info is-large" type="submit">ورود</a>--}}
							<button class="button is-block is-info is-large" type="submit">ورود</button>
						</div>
					</div>
					<div class="column" style="margin-top: 20px;">
						<p class="has-text-centered">حساب کاربری ندارید؟ <a href="{{URL::route('register')}}">ثبت نام کنید</a></p>
					</div>
				</form>
			</div>
		</div>

	</div>

@show