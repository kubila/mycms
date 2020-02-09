import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store/store.js';

Vue.use(VueRouter);
import AppHome from '../components/AppHome.vue';
import ReadPost from '../components/ReadPost.vue';
import GetCategory from '../components/GetCategory.vue';
import GetAuthor from '../components/GetAuthor.vue';
import AdminHome from '../components/admin/AdminHome.vue';
import Login from '../components/auth/Login.vue';
import nProgress from 'nprogress';
import Edit from '../components/admin/EditModal.vue';

const router = new VueRouter({
  mode: 'history',
  base: '/',
  bash: false,
  routes: [
    {
      path: '/',
      redirect: { name: 'app-home' }
    },
    {
      path: '/cms',
      component: AppHome,
      name: 'app-home',
      meta: {
        guest: true
      }
    },
    {
      path: '/login',
      component: Login,
      name: 'login',
      meta: {
        guest: true
      }
    },

    {
      path: '/post/:title',
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
      },
      meta: {
        guest: true
      }
    },
    {
      path: '/category/:name',
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
      },
      meta: {
        guest: true
      }
    },
    {
      path: '/author/:name',
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
      },
      meta: {
        guest: true
      }
    },
    {
      path: '/cms/admin',
      name: 'admin',
      component: AdminHome,
      children: [
        {
          path: '/edit/post/:title',
          name: 'editpost',
          component: Edit,
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
      ],
      meta: {
        requiresAuth: true
      }
    }
    /*
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
    }*/
  ]
});

router.beforeEach((to, from, next) => {
  // to and from are both route objects. must call `next`.
  nProgress.start();
  next();
});

// eslint-disable-next-line no-unused-vars
router.afterEach((to, from) => {
  // to and from are both route objects.
  nProgress.done();
});

export default router;
