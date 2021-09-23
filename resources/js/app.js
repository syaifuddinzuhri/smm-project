require('./bootstrap');

import Vue from 'vue/dist/vue';
import App from './App.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';
import router from './router';
import store from './store'

axios.defaults.baseURL = 'http://localhost:8000/api/v1/'

window.Vue = require('vue');
Vue.use(VueAxios, axios);

const app = new Vue({
    el: '#app',
    router,
    store,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
    render: h => h(App),
});
