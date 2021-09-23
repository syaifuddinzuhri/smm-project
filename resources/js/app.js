require('./bootstrap');

import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import axios from 'axios'

// import Vue from 'vue/dist/vue';
// window.Vue = require('vue');

// import App from './App.vue';
// import VueRouter from 'vue-router';
// import VueAxios from 'vue-axios';
// import axios from 'axios';
// import { routes } from './routes';
// import store from './store'

// import { setHeaderToken } from './utils/axios'
axios.defaults.baseURL = 'http://localhost:8000/api/v1/'
Vue.config.productionTip = false

// Vue.use(VueRouter);
// Vue.use(VueAxios, axios);

// const router = new VueRouter({
//     mode: 'history',
//     routes: routes,
// });

// function nextCheck(context, middleware, index) {
//     const nextMiddleware = middleware[index];
//     if (!nextMiddleware) return context.next;

//     return (...parameters) => {
//         context.next(parameters);
//         const nextMidd = nextCheck(context, middleware, index + 1)
//         nextMiddleware({ ...context, next: nextMiddleware })
//     }
// }

// router.beforeEach((to, from, next) => {
//     if (to.meta.middleware) {
//         const middleware = Array.isArray(to.meta.middleware) ? to.meta.middleware : [to.meta.middleware];
//         const ctx = { from, next, router, to }
//         const nextMiddleware = nextCheck(ctx, middleware, 1);
//         return middleware[0]({ ...ctx, next: nextMiddleware })
//     }
//     return next();
// });

const app = new Vue({
    el: '#app',
    router,
    store,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
    render: h => h(App),
});
