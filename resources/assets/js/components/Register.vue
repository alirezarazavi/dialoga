<template>
	<div>
		<form v-on:submit.prevent="register" v-on:keydown="form.onKeydown($event)">

			<!--Errors-->
			<div v-if="form.errors.any()">
				<div class="notification is-danger">
					<button class="delete" type="button" v-on:click="form.errors.clear()"></button>
					<ul class="list-unstyled rtl">
						<li v-for="value in form.errors.all()">
							{{ value[0] }}
						</li>
					</ul>
				</div>
			</div>

			<div class="content">
				<p class="is-clearfix"></p>
				<div class="field">
					<p class="control has-icons-left">
						<input class="input is-large" type="text" name="username" id="username" v-model="form.username" placeholder="نام کاربری" required autofocus>
						<span class="icon is-large is-left">
							<i class="fa fa-user"></i>
						</span>
					</p>
				</div>

				<div class="field">
					<p class="control has-icons-left">
						<input class="input is-large" type="email" name="email" id="email" v-model="form.email" placeholder="ایمیل" required>
						<span class="icon is-large is-left">
							<i class="fa fa-envelope"></i>
						</span>
					</p>
				</div>

				<div class="field has-addons">
					<p class="control has-icons-left has-icons-right">
						<input class="input is-large" type="password" name="password" id="password" v-model="form.password" placeholder="رمز عبور" required>
						<span class="icon is-large is-left">
							<i class="fa fa-lock"></i>
						</span>
					</p>
					<p class="control">
						<button type="button" class="button is-light is-large" id="toggle-password" v-on:click="togglePassword">
							<template v-if="showPassword">
								<i class="fa fa-eye-slash"></i>
							</template>
							<template v-else>
								<i class="fa fa-eye"></i>
							</template>
						</button>
					</p>
				</div>
			</div>

			<div class="field">
				<div class="control">
					<button class="button is-block is-success is-large is-fullwidth" type="submit" v-bind:disabled="form.busy">ثبت نام</button>
				</div>
			</div>

			<div class="column" style="margin-top: 20px;">
				<p class="has-text-centered">قبلا ثبت نام کرده‌اید؟ <a href="/login" class="is-info">وارد شوید</a></p>
			</div>

		</form>
	</div>
</template>

<script>
	import Form from 'vform';

    export default {
    	data() {
    		return {
    			form: new Form({
					username: '',
					email: '',
					password: '',
				}),

				showPassword: false,
			}
		},

		methods: {
    		register() {

    			this.form.post('/register')
					.then((response) => {
						//	redirect if register was successful
						if (response.status === 200) {
							window.location.href = '/';
						}
					});

			},

			togglePassword() {
				if (this.showPassword) {
					this.showPassword = false;
					password.setAttribute('type', 'password');
				} else {
					this.showPassword = true;
					password.setAttribute('type', 'text');
				}
			}
		}
    }
</script>
