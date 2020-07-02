import CategoryService from '../../services/CategoryService';

export const namespaced = true;

export const state = {
  categoryPosts: [],
  categoryNews: [],
  categories: []
};

export const mutations = {
  SET_CATEGORIES(state, categories) {
    state.categories = categories;
  },

  SET_CATEGORY_POSTS(state, categoryPosts) {
    state.categoryPosts = categoryPosts;
  },

  SET_CATEGORY_NEWS(state, categoryNews) {
    state.categoryNews = categoryNews;
  }
};

export const actions = {
  fetchCategories({ commit, getters }) {
    const cats = getters.allCategories;
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
  }
};

export const getters = {
  allCategories: state => {
    return state.categories.length;
  }
};
