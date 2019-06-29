
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');
import './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './routes';

//window.Vue = require('vue');
window.Vue = Vue;
Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('login-component', require('./components/Login.vue'));
Vue.component('register-component', require('./components/Register.vue'));
Vue.component('new-dialog-component', require('./components/NewDialog.vue'));
Vue.component('dialog-component', require('./components/DialogsList.vue'));

const app = new Vue({
    el: '#app',
    router,

    data: {
    }
});
