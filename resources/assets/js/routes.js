import VueRouter from 'vue-router';
import Login from './components/Login';
import Register from './components/Register';
import DialogsList from './components/DialogsList';

let routes = [
  {
    path: '/',
    component: DialogsList,
  },
//  {
//    name: 'sort',
//    path: '/sort/:sortType',
////    query: { sort: 'popular' },
//    component: DialogsList,
//    props: true,
//  },
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
