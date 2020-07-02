import AuthorService from '../../services/AuthorService';

export const namespaced = true;

export const state = {
  authors: [],
  authorOne: {},
  authorPosts: []
};

export const mutations = {
  SET_AUTHORS(state, authors) {
    state.authors = authors;
  },

  SET_AUTHOR(state, author) {
    state.authorOne = author;
  },

  SET_AUTHOR_POSTS(state, authorPosts) {
    state.authorPosts = authorPosts;
  }
};

export const actions = {
  fetchAuthorPosts({ commit }, name) {
    return AuthorService.getAuthorPosts(name)
      .then(response => {
        commit('SET_AUTHOR_POSTS', response.data);
        return response.data;
      })
      .catch(err => console.log(err.response));
  },

  fetchAuthor({ commit, getters }, name) {
    const authorFind = getters.getAuthorByName(name);
    if (authorFind) {
      commit('SET_AUTHOR', authorFind);
      return authorFind;
    } else {
      return AuthorService.getAuthor(name)
        .then(response => {
          commit('SET_AUTHOR', response.data);
          return response.data;
        })
        .catch(err => console.log(err.response));
    }
  },

  fetchAuthors({ commit }) {
    AuthorService.getAuthors()
      .then(response => {
        commit('SET_AUTHORS', response.data);
        return response.data;
      })
      .catch(err => console.log(err.response));
  }
};

export const getters = {
  getAuthorByName: state => name => {
    return state.authors.find(author => author.name === name);
  }
};
