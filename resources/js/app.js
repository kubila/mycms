/* eslint-disable no-undef */

require('./bootstrap');

window.Vue = require('vue');

import router from './router/router.js';
import store from './store/store.js';
import 'nprogress/nprogress.css';
import Vuelidate from 'vuelidate';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
Vue.use(Vuelidate);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
import MainHome from './components/MainHome.vue';
//Vue.component('MainHome', require('./MainHome.vue').default);
Vue.config.productionTip = false;

// new Vue({
//   el: '#app',
//   router,
//   store
//   //render: h => h(MainHome)
// }); //.$mount('#app');

new Vue({
  el: '#app',
  components: { MainHome },
  template: '<MainHome/>',
  router,
  store
});
