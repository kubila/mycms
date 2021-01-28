/* eslint-disable no-undef */

require('./bootstrap');

window.Vue = require('vue');

import router from './router/router.js';
import store from './store/store.js';
import 'nprogress/nprogress.css';
import Vuelidate from 'vuelidate';
import { BootstrapVue } from 'bootstrap-vue';
import VueFormulate from '@braid/vue-formulate';
Vue.use(Vuelidate);
Vue.use(BootstrapVue);
Vue.use(VueFormulate);
import MainHome from './components/MainHome';
import Notifications from './components/notifications/Notifications';

import 'primeflex/primeflex.css';
// import 'primevue/resources/themes/saga-purple/theme.css';
import 'primevue/resources/themes/saga-blue/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';
Vue.prototype.$primevue = { ripple: true };

import Sidebar from 'primevue/sidebar';
import Dialog from 'primevue/dialog';
import Card from 'primevue/card';
import ProgressSpinner from 'primevue/progressspinner';
import DataView from 'primevue/dataview';
import InputText from 'primevue/inputtext';
import ToastService from 'primevue/toastservice';
import { BSkeletonImg } from 'bootstrap-vue';
import MultiSelect from 'primevue/multiselect';
import Dropdown from 'primevue/dropdown';

Vue.use(ToastService);
Vue.component('b-skeleton-img', BSkeletonImg);

Vue.component('DataView', DataView);
Vue.component('ProgressSpinner', ProgressSpinner);
Vue.component('Card', Card);
Vue.component('Sidebar', Sidebar);
Vue.component('Dialog', Dialog);
Vue.component('InputText', InputText);
Vue.component('MultiSelect', MultiSelect);
Vue.component('Dropdown', Dropdown);

Vue.component('Notifications', Notifications);
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
