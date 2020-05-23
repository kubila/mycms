import Vue from 'vue';
import Vuex from 'vuex';
import PostService from '../services/PostService.js';
import UserService from '../services/UserService.js';
import CategoryService from '../services/CategoryService.js';
//import router from '../router/router.js';
Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    post: {},
    posts: [],
    category: {},
    categories: [],
    author: {},
    authors: [],
    user: {},
    token: {},
    isLoggedIn: false
  },

  actions: {
    fetchPosts({ commit }) {
      const psts = this.getters.allPosts;
      if (psts) {
        console.log(true);
      } else {
        return PostService.getPosts()
          .then(response => {
            commit('SET_POSTS', response.data);
          })
          .catch(error => error.response);
      }
    },

    fetchCategories({ commit }) {
      return CategoryService.getCategories()
        .then(response => {
          commit('SET_CATEGORIES', response.data);
        })
        .catch(error => console.log(error.response));
    },

    fetchPost({ commit }, adi) {
      const post = this.getters.getPostByName(adi);
      if (post) {
        commit('SET_POST', post);
        return post;
      } else {
        return PostService.getPost(adi)
          .then(response => {
            commit('SET_POST', response.data);
            return response.data;
          })
          .catch(error => error.response);
      }
    },

    fetchToken({ commit }, credentials) {
      return UserService.getToken(credentials)
        .then(({ data }) => {
          commit('SET_TOKEN', data);
          return data;
        })
        .catch(error => error.response);
    },

    fetchUser({ commit }, token) {
      return UserService.getUser(token).then(({ data }) => {
        commit('SET_USER', data);
        commit('SET_LOGGED_IN');
        return data;
      });
    },

    isLoggedIn({ commit }) {
      const status = this.getters.Login;
      const token = localStorage.getItem('token');
      if (!status && !token) {
        console.log('Not logged in', status, token);
        //commit('SET_NOT_LOGGED_IN');
        //console.log('Not logged in');
      }
    },

    Logout({ commit }) {
      return (
        UserService.logOut()
          .then(response => {
            if (response.message) {
              commit('LOG_OUT');
              //this.$router.push('/');
            }
          })
          // .then(router.push('/'))
          .catch(error => {
            console.log(error.response);
          })
      );
    }
  },

  mutations: {
    SET_POSTS(state, posts) {
      state.posts = posts;
    },

    SET_POST(state, post) {
      state.post = post;
    },

    SET_CATEGORIES(state, categories) {
      state.categories = categories;
    },

    SET_CATEGORY(state, category) {
      state.category = category;
    },

    SET_AUTHORS(state, authors) {
      state.authors = authors;
    },

    SET_AUTHOR(state, author) {
      state.author = author;
    },

    SET_TOKEN(state, data) {
      state.token = data.access_token;
      localStorage.setItem('token', data.access_token);
    },

    SET_USER(state, data) {
      state.user = data;
    },

    SET_LOGGED_IN(state) {
      state.isLoggedIn = true;
    },

    SET_NOT_LOGGED_IN(state) {
      state.isLoggedIn = false;
    },

    LOG_OUT(state) {
      state.isLoggedIn = false;
      state.token = {};
      state.user = {};
      localStorage.removeItem('token');
    }
  },
  getters: {
    getPostByName: state => title => {
      return state.posts.find(post => post.title === title);
    },

    allPosts: state => {
      return state.posts.length;
    },

    Login: state => {
      return state.isLoggedIn;
    }
  }
});

//export default store;
