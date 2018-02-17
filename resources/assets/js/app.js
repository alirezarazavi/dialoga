
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require('./main.js');

require('./bootstrap');

// require('../../../node_modules/clipboard/dist/clipboard.min.js');
//
// require('../../../node_modules/tippy.js/dist/tippy.all.js');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('login-component', require('./components/Login.vue'));
Vue.component('register-component', require('./components/Register.vue'));
Vue.component('new-dialog', require('./components/NewDialog.vue'));

const app = new Vue({
    el: '#app',

    data: {

    }
});
