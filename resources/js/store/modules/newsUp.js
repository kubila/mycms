import NewsService from '../../services/NewsService';

export const namespaced = true;

export const state = {
  news: [],
  specificNews: {}
};

export const mutations = {
  SET_NEWS(state, news) {
    state.news = news;
  },
  SET_SPECIFIC_NEWS(state, news) {
    state.specificNews = news;
  },
  SET_CATEGORY_NEWS(state, news) {
    state.categoryNews = news;
  }
};

export const actions = {
  fetchNews({ commit }) {
    return NewsService.getNews()
      .then(response => {
        commit('SET_NEWS', response.data);
        return response.data;
      })
      .catch(err => console.log(err.response));
  },

  fetchSpecificNews({ commit }, title) {
    return NewsService.getSpecificNews(title)
      .then(response => {
        commit('SET_SPECIFIC_NEWS', response.data);
        return response.data;
      })
      .catch(err => console.log(err.response));
  }
};

export const getters = {};
