/* eslint-disable no-undef */

require('./bootstrap');

window.Vue = require('vue');

import router from './router/router.js';
import store from './store/store.js';
import 'nprogress/nprogress.css';
import Vuelidate from 'vuelidate';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import VueFormulate from '@braid/vue-formulate';
Vue.use(Vuelidate);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueFormulate);
import MainHome from './components/MainHome';

import 'primeflex/primeflex.css';
import 'primevue/resources/themes/saga-purple/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';
import Sidebar from 'primevue/sidebar';
import Dialog from 'primevue/dialog';
import Paginator from 'primevue/paginator';
import Card from 'primevue/card';
import ProgressSpinner from 'primevue/progressspinner';
import DataView from 'primevue/dataview';

Vue.component('DataView', DataView);
Vue.component('ProgressSpinner', ProgressSpinner);
Vue.component('Card', Card);
Vue.component('Sidebar', Sidebar);
Vue.component('Dialog', Dialog);
Vue.component('Paginator', Paginator);
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
