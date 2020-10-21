import PostService from '../../services/PostService';

export const namespaced = true;

export const state = {
  postOne: {},
  posts: [],
  pinned: [],
  homePosts: []
};

export const mutations = {
  SET_POSTS(state, posts) {
    state.posts = posts;
  },
  SET_HOME_POSTS(state, homePosts) {
    state.homePosts = homePosts;
  },
  SET_PINNED_POSTS(state, pinned) {
    state.pinned = pinned;
  },
  SET_POST(state, postOne) {
    state.postOne = postOne;
  }
};

export const actions = {
  fetchPosts({ commit, getters, dispatch }) {
    const posts = getters.allPosts;
    if (posts) return posts;

    return PostService.getPosts()
      .then(response => {
        commit('SET_POSTS', response.data);
      })
      .catch(error => {
        dispatch('notification/add', error.response, { root: true });
      });
  },

  fetchPinnedPosts({ commit, dispatch, getters }) {
    return PostService.getPinnedPosts()
      .then(response => {
        commit('SET_PINNED_POSTS', response.data);
        return response.data;
      })
      .catch(error => {
        dispatch('notification/add', error.response, { root: true });
      });
  },

  fetchHomePosts({ commit, dispatch }) {
    return PostService.getHomePosts()
      .then(response => {
        commit('SET_HOME_POSTS', response.data);
      })
      .catch(err => {
        dispatch('notification/add', err.response, { root: true });
      });
  },

  fetchPost({ commit, getters, dispatch }, adi) {
    const post = getters.getPostByName(adi);
    if (post) {
      commit('SET_POST', post);
      return post;
    } else {
      return PostService.getPost(adi)
        .then(response => {
          commit('SET_POST', response.data);
          return response.data;
        })
        .catch(error => {
          dispatch('notification/add', error.response, { root: true });
        });
    }
  }
};

export const getters = {
  getPostByName: state => title => {
    return state.posts.find(post => post.title === title);
  },

  getPostsByAuthorName: (state, author) => {
    return state.posts.filter(post => post.author.name === author.name);
  }
};
