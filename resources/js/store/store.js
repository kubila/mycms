import Vue from 'vue';
import Vuex from 'vuex';
import PostService from '../services/PostService.js';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    post: {},
    posts: [],
    category: {},
    categories: [],
    author: {},
    authors: [],
    loading: true
  },
  actions: {
    fetchPosts({ commit }) {
      return PostService.getPosts()
        .then(response => {
          commit('SET_POSTS', response.data);
        })
        .finally(() => (this.loading = false));
    },
    fetchPost({ commit }, adi) {
      return PostService.getPost(adi)
        .then(response => {
          commit('SET_POST', response.data);
          return response.data;
        })
        .finally(() => (this.loading = false));
    }
  },
  mutations: {
    SET_POSTS(state, posts) {
      state.posts = posts;
    },
    SET_POST(state, post) {
      state.post = post;
    },
    SET_CATEGORİES(state, categories) {
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
    }
  },
  getters: {
    getPostById: state => id => {
      state.posts.find(post => post.id === id);
    }
  }
});

//export default store;
