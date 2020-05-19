/* eslint-disable no-undef */
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import router from './router/router.js';
import store from './store/store.js';
import 'nprogress/nprogress.css';
import Vuelidate from 'vuelidate';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
Vue.use(Vuelidate);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
//import MainHome from './MainHome.vue';
Vue.component('MainHome', require('./MainHome.vue').default);
Vue.config.productionTip = false;

new Vue({
  el: '#app',
  router,
  store
  //render: h => h(MainHome)
}); //.$mount('#app');
