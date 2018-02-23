import VueRouter from 'vue-router';
import Login from './components/Login';
import Register from './components/Register';

let routes = [
  {
    path: '/login',
    component: Login,
  },
  {
    path: '/register',
    component: Register,
  }
];

let router = new VueRouter({
  routes,
  mode: 'history',
});

export default router;
