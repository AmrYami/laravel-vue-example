/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from 'vue-router';
// import * as VueRouter from 'vue-router';

import Myheader from "./components/Myheader.vue";
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import Post from "./components/Post.vue";


Vue.use(VueRouter);


const routes = [
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    { path: '/post', component: Post },
];

const router = new VueRouter({
    // mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    router,
    components: {
        Myheader
    }
});
