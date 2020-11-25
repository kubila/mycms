import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store/store.js';
import VueMeta from 'vue-meta';

Vue.use(VueRouter);
Vue.use(VueMeta);
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
import GetTag from '../components/tags/GetTag';
import NotFound from '../components/helpers/NotFound';
import nProgress from 'nprogress';
import Categories from '../components/categories/Categories';
import Posts from '../components/posts/Posts';
import Authors from '../components/authors/Authors';

const router = new VueRouter({
  mode: 'history',
  base: '/',
  bash: false,
  routes: [
    // {
    //   path: '/',
    //   name: 'home',
    //   redirect: { name: 'app-home' }
    // },
    {
      path: '/',
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
      path: '/post/:title',
      props: true,
      name: 'read',
      component: ReadPost,
      beforeEnter: (to, from, next) => {
        nProgress.start();
        store
          .dispatch('post/fetchPost', to.params.title)
          .then(post => {
            to.params.post = post;
            next();
          })
          .catch(error => {
            console.log(error.response);
            nProgress.done();
          });
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
      path: '/news/:title',
      name: 'get-news',
      props: true,
      component: GetNews,
      beforeEnter: (to, from, next) => {
        nProgress.start();
        store
          .dispatch('newsUp/fetchSpecificNews', to.params.title)
          .then(nws => {
            to.params.news = nws;
            next();
          })
          .catch(error => {
            console.log(error.response);
            nProgress.done();
          });
      },
      meta: {
        guest: true
      }
    },
    {
      path: '/tag/:name',
      name: 'get-tag',
      props: true,
      component: GetTag,
      beforeEnter: (to, from, next) => {
        nProgress.start();
        store
          .dispatch('tag/fetchTag', to.params.name)
          .then(tag => {
            to.params.tag = tag;
            next();
          })
          .catch(err => {
            console.log(err.response);
            nProgress.done();
          });
      },
      meta: {
        guest: true
      }
    },
    {
      path: '/admin',
      name: 'admin',
      component: AdminHome,
      children: [
        {
          path: '/categories',
          name: 'categories',
          component: Categories
        },
        {
          path: '/posts',
          name: 'posts',
          component: Posts
        },
        {
          path: '/authors',
          name: 'authors',
          component: Authors
        }
      ],
      meta: {
        requiresAuth: true
      }
    },

    {
      path: '*',
      name: 'not-found',
      component: NotFound
    }
  ]
});

router.beforeEach((to, from, next) => {
  nProgress.start();

  // if (to.matched.some(record => record.meta.requiresAuth)) {
  //   if (!store.getters.isLoggedIn) {
  //     next({
  //       path: '/login'
  //       //query: to.fullPath
  //       //redirect: { name: 'login' }
  //     });
  //   } else {
  //     next();
  //   }
  // }
  next();
});

// eslint-disable-next-line no-unused-vars
router.afterEach((to, from) => {
  nProgress.done();
});

export default router;
