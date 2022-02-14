/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

const Home = Vue.component('Home', require('./pages/Home.vue').default);
const Restaurants = Vue.component('Restaurants', require('./pages/Restaurants.vue').default);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('App', require('./App.vue').default);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },

    {
        path: '/restaurants',
        name: 'restaurants',
        component: Restaurants,
    },
];

const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    el: '#app',
    router
});


window.onload = function () {
    var txtPassword = document.getElementById("password");
    var txtConfirmPassword = document.getElementById("password-confirm");
    txtPassword.onchange = ConfirmPassword;
    txtConfirmPassword.onkeyup = ConfirmPassword;
    function ConfirmPassword() {
        txtConfirmPassword.setCustomValidity("");
        if (txtPassword.value != txtConfirmPassword.value) {
            txtConfirmPassword.setCustomValidity("Le password devono essere uguali.");
        }
    }
}


