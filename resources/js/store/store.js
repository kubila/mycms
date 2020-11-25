import Vue from 'vue';
import Vuex from 'vuex';

import UserService from '../services/UserService';

import createPersistedState from 'vuex-persistedstate';
import * as post from './modules/post';
import * as category from './modules/category';
import * as author from './modules/author';
import * as newsUp from './modules/newsUp';
import * as notification from './modules/notification';
import * as tag from './modules/tag';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    user: null,
    isLoggedIn: false,
    search: null,
    token: null
  },

  modules: {
    category,
    post,
    author,
    newsUp,
    tag,
    notification
  },
  //plugins: [createPersistedState()],

  actions: {
    fetchUser({ commit }, credentials) {
      return UserService.login(credentials)
        .then(res => {
          commit('SET_TOKEN', res);
          commit('SET_USER', res);
          commit('SET_LOGGED_IN');
          return res;
        })
        .catch(error => {
          console.log(error.response);
        });
    },

    isLoggedIn({ commit }, getters) {
      const status = getters.Login;
      if (!status) {
        commit('SET_NOT_LOGGED_IN');
        return false;
      }
      return true;
    },

    Logout({ commit }) {
      return UserService.logOut()
        .then(commit('SET_LOG_OUT'))
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

    SET_TOKEN(state, token) {
      state.token = token.headers['authorization'];
      localStorage.setItem('auth-token', token.headers['authorization']);
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

    SET_LOG_OUT(state) {
      state.isLoggedIn = false;
      state.user = null;
      state.token = {};
      localStorage.removeItem('auth-token');
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
