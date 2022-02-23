/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

Vue.component("App", require("./App.vue").default);
const Who_we_are = Vue.component(
    "Who_we_are",
    require("./pages/Who_we_are.vue").default
);
const Restaurants = Vue.component(
    "Restaurants",
    require("./pages/Restaurants.vue").default
);
const Restaurant = Vue.component(
    "Restaurant",
    require("./pages/MenuShow.vue").default
);

const routes = [
    {
        path: "/",
        name: "restaurants",
        component: Restaurants,
    },
    {
        path: "/restaurants/:slug",
        name: "restaurant",
        component: Restaurant,
    },
    {
        path: "/who_we_are",
        name: "who_we_are",
        component: Who_we_are,
    },
];

const router = new VueRouter({
    mode: "history",
    routes,
});

import Vue from "vue";

import VueRouter from "vue-router";
Vue.use(VueRouter);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
    router,
});
