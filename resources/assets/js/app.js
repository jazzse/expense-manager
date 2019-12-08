
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import { VuejsDatatableFactory } from 'vuejs-datatable';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import VueRouter from 'vue-router'

require('./bootstrap');

window.Vue = require('vue');
Vue.use(VueRouter)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('role-list', require('./components/roles/role-list.vue'));
Vue.component('role-form', require('./components/roles/role-form.vue'));
Vue.component('user-list', require('./components/users/user-list.vue'));
Vue.component('user-form', require('./components/users/user-form.vue'));
Vue.use(BootstrapVue)
Vue.use( VuejsDatatableFactory );

// 


const app = new Vue({
    el: '#app'
});
