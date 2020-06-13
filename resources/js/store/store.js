import Vue from 'vue';
import Vuex from 'vuex';
import PostService from '../services/PostService';
import UserService from '../services/UserService';
import CategoryService from '../services/CategoryService';
import AuthorService from '../services/AuthorService';
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    post: null,
    posts: [],
    categoryPosts: [],
    categoryNews: [],
    categories: [],
    author: null,
    authorPosts: [],
    authors: [],
    user: null,
    isLoggedIn: false,
    search: null
  },

  //plugins: [createPersistedState()],

  actions: {
    fetchPosts({ commit }) {
      const posts = this.getters.allPosts;
      if (posts) return posts;

      return PostService.getPosts()
        .then(response => {
          commit('SET_POSTS', response.data);
        })
        .catch(error => error.response);
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

    fetchCategories({ commit }) {
      const cats = this.getters.allCategories;
      if (cats) return cats;

      return CategoryService.getCategories()
        .then(response => {
          commit('SET_CATEGORIES', response.data);
        })
        .catch(error => console.log(error.response));
    },

    fetchCategoryPosts({ commit }, name) {
      return CategoryService.getCategoryPosts(name)
        .then(response => {
          commit('SET_CATEGORY_POSTS', response.data);
          return response.data;
        })
        .catch(err => console.log(err.response));
    },

    fetchCategoryNews({ commit }, name) {
      return CategoryService.getCategoryNews(name)
        .then(response => {
          commit('SET_CATEGORY_NEWS', response.data);
          return response.data;
        })
        .catch(err => console.log(err.response));
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
    },

    fetchAuthorPosts({ commit }, name) {
      return AuthorService.getAuthorPosts(name)
        .then(response => {
          commit('SET_AUTHOR_POSTS', response.data);
          return response.data;
        })
        .catch(err => console.log(err.response));
    },

    fetchAuthor({ commit }, name) {
      const author = this.getters.getAuthorByName(name);
      if (author) {
        commit('SET_AUTHOR', author);
        return author;
      } else {
        return AuthorService.getAuthor(name)
          .then(response => {
            commit('SET_AUTHOR', response.data);
            return response.data;
          })
          .catch(err => console.log(err.response));
      }
    }

    //fetchSearch({ commit }, queryString) {}
  },

  mutations: {
    SET_POSTS(state, posts) {
      state.posts = posts;
    },

    SET_POST(state, post) {
      state.post = post;
    },

    SET_SEARCH(state, search) {
      state.search = search;
    },

    SET_CATEGORIES(state, categories) {
      state.categories = categories;
    },

    SET_CATEGORY_POSTS(state, categoryPosts) {
      state.categoryPosts = categoryPosts;
    },

    SET_CATEGORY_NEWS(state, categoryNews) {
      state.categoryNews = categoryNews;
    },

    SET_AUTHORS(state, authors) {
      state.authors = authors;
    },

    SET_AUTHOR(state, author) {
      state.author = author;
    },

    SET_AUTHOR_POSTS(state, authorPosts) {
      state.authorPosts = authorPosts;
    },

    SET_TOKEN(state, data) {
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
      //state.token = null;
      state.user = null;
      localStorage.removeItem('token');
      location.reload();
    }
  },
  getters: {
    getPostByName: state => title => {
      return state.posts.find(post => post.title === title);
    },

    getAuthorByName: state => name => {
      return state.authors.find(author => author.name === name);
    },

    getPostsByAuthorName: (state, author) => {
      return state.posts.filter(post => post.author.name === author.name);
    },

    allPosts: state => {
      return state.posts.length;
    },

    allCategories: state => {
      return state.categories.length;
    },

    Login: state => {
      const token = localStorage.getItem('token');
      const user = state.user;

      if (token && user) {
        return true;
      } else {
        return false;
      }
    }
  }
});
