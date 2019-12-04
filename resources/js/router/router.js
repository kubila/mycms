import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store/store.js';

Vue.use(VueRouter);
import AppHome from '../components/AppHome.vue';
import ReadPost from '../components/readPost.vue';
import GetCategory from '../components/GetCategory.vue';
import GetAuthor from '../components/GetAuthor.vue';
import AdminHome from '../components/admin/AdminHome.vue';
import EditPost from '../components/admin/EditPost.vue';

const router = new VueRouter({
  mode: 'history',
  base: '/',
  bash: false,
  routes: [
    {
      path: '/cms',
      component: AppHome,
      name: 'app-home'
    },
    {
      path: '/read-post/:title',
      props: true,
      name: 'read',
      component: ReadPost,
      beforeEnter: (to, from, next) => {
        store
          .dispatch('fetchPost', to.params.title)
          .then(post => {
            to.params.post = post;
            next();
          })
          .catch(error => console.log(error.response));
      }
    },
    {
      path: '/get-category/:name',
      name: 'getcategory',
      props: true,
      component: GetCategory,
      beforeEnter: (to, from, next) => {
        store
          .dispatch('fetchCategory', to.params.name)
          .then(category => {
            to.params.category = category;
            next();
          })
          .catch(error => console.log(error.response));
      }
    },
    {
      path: '/get-author/:name',
      name: 'getauthor',
      props: true,
      component: GetAuthor,
      beforeEnter: (to, from, next) => {
        store
          .dispatch('fetchAuthor', to.params.name)
          .then(author => {
            to.params.author = author;
            next();
          })
          .catch(error => console.log(error.response));
      }
    },
    {
      path: '/cms/admin',
      name: 'admin',
      component: AdminHome
    },
    {
      path: '/edit-post/:title',
      name: 'editpost',
      component: EditPost,
      props: true,
      beforeEnter: (to, from, next) => {
        store
          .dispatch('fetchPost', to.params.title)
          .then(post => {
            to.params.post = post;
            next();
          })
          .catch(error => {
            console.log(error.response);
          });
      }
    }
  ]
});

export default router;
