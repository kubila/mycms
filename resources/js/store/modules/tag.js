import TagService from '../../services/TagsService';
export const namespaced = true;

export const state = {
  tagPosts: [],
  tags: []
};

export const getters = {};

export const actions = {
  fetchTag({ commit }, name) {
    TagService.getTagPosts(name)
      .then(response => {
        commit('SET_TAG_POSTS', response.data);
        return response.data;
      })
      .catch(err => console.log(err.response));
  }
};

export const mutations = {
  SET_TAG_POSTS(state, posts) {
    state.tagPosts = posts;
  }
};
