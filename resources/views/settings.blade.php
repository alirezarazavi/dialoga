@extends('master')

@section('content')
	
	@include('message')

	<div class="columns notification settings">
		<div class="column has-text-left">
			<p style="margin-left:20px;">تصویر پروفایل</p>
			<figure class="image is-128x128">
				<img src="uploads/avatars/{{ Auth::user()->avatar }}" class="profile-image" onerror="this.src='uploads/avatars/default.png'">
			</figure>
			<div class="control" style="margin-top: 10px;">
				<div class="file is-small">
					<label class="file-label">
						<form method="POST" action="{{route('settings_update', Auth::user()->username)}}" enctype="multipart/form-data">
							{{csrf_field()}}
							{{--  <input type="hidden" name="form-type" value="user-image">  --}}
							<input class="file-input" type="file" name="user-image" onchange="javascript:this.form.submit();">
						</form>
						<span class="file-cta">
						<span class="file-icon">
							<i class="fa fa-upload"></i>
						</span>
						<span class="file-label">
							آپلود تصویر جدید
						</span>
						</span>
					</label>
				</div>
			</div>
		</div>
		<div class="column is-7">
			<div class="level">
				<div class="level-left">
					<input type="text" class="input level-item" value="{{Auth::user()->username}}" disabled>
				</div>
				<div class="level-right">
					<p class="level-item">نام کاربری</p>
				</div>
			</div>
			<div class="level">
				<div class="level-left">
					<input type="text" class="input level-item" value="{{Auth::user()->email}}" disabled>
				</div>
				<div class="level-right">
					<p class="level-item">ایمیل</p>
				</div>
			</div>
			<p>اگر می‌خواهید رمزعبور خود را تغییر دهید آن را وارد کنید درغیر این صورت آن را خالی بگذارید</p>
			<form method="POST" action="{{route('settings_update', Auth::user()->username)}}">
				{{csrf_field()}}
				{{--  <input type="hidden" name="form-type" value="update-password">  --}}
				<div class="level">
					<div class="level-left">
						<input type="password" id="old_password" name="old_password" class="input level-item" required autocomplete="off">
					</div>
					<div class="level-right">
						<label for="old_password" class="level-item">رمز قبلی</label>
					</div>
				</div>
				<div class="level">
					<div class="level-left">
						<input type="password" id="new_password" name="new_password" class="input level-item" required autocomplete="off">
					</div>
					<div class="level-right">
						<label for="new_password" class="level-item">رمز جدید</label>
					</div>
				</div>
				<div class="level">
					<div class="level-left">
						<input type="password" id="new_password_confirm" name="new_password_confirm" class="input level-item" required autocomplete="off">
					</div>
					<div class="level-right">
						<label for="new_password_confirm" class="level-item">تکرار رمز جدید</p>
					</div>
				</div>
				<div class="level">
					<div class="level-left">
						<input type="submit" class="button is-info" name="update-password" value="تغییر رمز"/>
					</div>
					<div class="level-right">
					</div>
				</div>
			</form>
		</div>

	</div>
@stop
