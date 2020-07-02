import Vue from 'vue';
import Vuex from 'vuex';
import PostService from '../services/PostService';
import UserService from '../services/UserService';
import CategoryService from '../services/CategoryService';
import AuthorService from '../services/AuthorService';
import createPersistedState from 'vuex-persistedstate';
import * as post from './modules/post';
import * as category from './modules/category';
import * as author from './modules/author';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    user: null,
    isLoggedIn: false,
    search: null
  },

  modules: {
    category,
    post,
    author
  },
  //plugins: [createPersistedState()],

  actions: {
    fetchUser({ commit }, credentials) {
      return UserService.login(credentials).then(({ data }) => {
        commit('SET_USER', data);
        commit('SET_LOGGED_IN');
        return data;
      });
    },

    isLoggedIn({ commit }) {
      const status = this.getters.Login;
      if (!status) {
        commit('SET_NOT_LOGGED_IN');
        return false;
      }
      return true;
    },

    Logout({ commit }) {
      return UserService.logOut()
        .then(() => {
          commit('LOG_OUT');
        })
        .catch(error => {
          console.log(error.response);
        });
    }

    //fetchSearch({ commit }, queryString) {}
  },

  mutations: {
    SET_SEARCH(state, search) {
      state.search = search;
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
      state.user = null;
      location.reload();
    }
  },
  getters: {
    Login: state => {
      const loggedIn = state.isLoggedIn;
      const user = state.user;

      if (loggedIn && !user === null) {
        return true;
      } else {
        return false;
      }
    }
  }
});
