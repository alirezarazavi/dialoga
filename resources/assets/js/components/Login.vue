<template>
  <div>
    <form v-on:submit.prevent="login" v-on:keydown="form.onKeydown($event)">
      <!--Errors-->
      <div v-if="form.errors.any()">
        <div class="notification is-danger">
          <button
            class="delete"
            type="button"
            v-on:click="form.errors.clear()"
          ></button>
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
            <input
              class="input is-large"
              type="text"
              name="username"
              id="username"
              v-model="form.username"
              placeholder="نام کاربری"
              required
              autofocus
              oninvalid="this.setCustomValidity('نام کاربری الزامی است')"
            />
            <span class="icon is-large is-left">
              <i class="fa fa-user"></i>
            </span>
          </p>
        </div>

        <div class="field">
          <p class="control has-icons-left">
            <input
              class="input is-large"
              type="password"
              name="password"
              id="password"
              v-model="form.password"
              placeholder="رمز عبور"
              required
              oninvalid="this.setCustomValidity('رمز عبور الزامی است')"
            />
            <span class="icon is-large is-left">
              <i class="fa fa-lock"></i>
            </span>
          </p>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button
            class="button is-block is-info is-large is-fullwidth"
            type="submit"
            v-bind:disabled="form.busy"
          >
            ورود
          </button>
        </div>
      </div>

      <div class="column" style="margin-top: 20px">
        <p class="has-text-centered">
          حساب کاربری ندارید؟
          <router-link to="/register">ثبت نام کنید</router-link>
        </p>
      </div>
    </form>
  </div>
</template>

<script>
import Form from "vform";

export default {
  data() {
    return {
      form: new Form({
        username: "",
        password: "",
      }),
    };
  },

  methods: {
    login() {
      this.form.post("/login").then((response) => {
        //	redirect if authenticated was successful
        if (response.status === 200) {
          window.location.href = "/";
        }
      });
    },
  },
};
</script>
