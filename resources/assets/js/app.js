
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import Example from './components/ExampleComponent.vue';
import Read from './components/Read.vue';
import Update from './components/Update.vue';



const routes = [
    {
        name: 'index',
        path: '/',
        component: Read
    },
    {
        name: 'editAddress',
        path: '/update/:id',
        component: Update
    }
];

const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');