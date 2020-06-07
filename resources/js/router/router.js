import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store/store.js';

Vue.use(VueRouter);
import AppHome from '../components/layout/AppHome';
import ReadPost from '../components/posts/ReadPost';
import GetCategory from '../components/categories/GetCategory';
import GetAuthor from '../components/authors/GetAuthor';
import AdminHome from '../components/admin/AdminHome';
import Login from '../components/auth/Login';
import Register from '../components/auth/Register';
import Search from '../components/search/Search';
import News from '../components/news/News';
import GetNews from '../components/news/GetNews';
import nProgress from 'nprogress';
import Edit from '../components/admin/EditModal';

const router = new VueRouter({
  mode: 'history',
  base: '/',
  bash: false,
  routes: [
    {
      path: '/',
      name: 'home',
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
      path: '/register',
      component: Register,
      name: 'register',
      meta: {
        guest: true
      }
    },
    {
      path: '/search',
      props: true,
      name: 'search',
      component: Search,
      beforeEnter: (to, from, next) => {
        const searchStr = from.params.searchstring;
        to.params.searchstring = searchStr;
        next();
      },
      meta: {
        guest: true
      }
    },
    {
      path: '/news',
      name: 'news',
      component: News,
      meta: {
        guest: true
      }
    },
    {
      path: '/news/:title',
      props: true,
      name: 'getnews',
      component: GetNews,
      beforeEnter: (to, from, next) => {
        store
          .dispatch('fetchSpecificNews', to.params.title)
          .then(news => {
            to.params.news = news;
            next();
          })
          .catch(err => console.log(err.response));
      },
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
      meta: {
        guest: true
      }
    },
    {
      path: '/author/:name',
      name: 'getauthor',
      props: true,
      component: GetAuthor,
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
  nProgress.start();
  //const vm = this;
  // FIX MEE !!!, make store named export?
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!store.isLoggedIn) {
      next({
        path: '/login',
        query: { redirect: to.fullPath }
      });
    } else {
      next();
    }
  }
  next();
});

// eslint-disable-next-line no-unused-vars
router.afterEach((to, from) => {
  nProgress.done();
});

export default router;
