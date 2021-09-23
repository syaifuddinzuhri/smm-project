require('./bootstrap');

import Vue from 'vue/dist/vue';
window.Vue = require('vue');

import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});


// router.beforeEach((to, from, next) => {
//     const isLoggedIn = false;
//     if (isLoggedIn == false) {
//         //   sessionStorage.setItem('redirectPath', to.path);
//         next({name: 'auth-member'});
//     } else {
//         next();
//     }
// });

const app = new Vue({
    el: '#app',
    router: router,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
    render: h => h(App),
});
