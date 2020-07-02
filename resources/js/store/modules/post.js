import PostService from '../../services/PostService';

export const namespaced = true;

export const state = {
  postOne: {},
  posts: []
};

export const mutations = {
  SET_POSTS(state, posts) {
    state.posts = posts;
  },

  SET_POST(state, postOne) {
    state.postOne = postOne;
  }
};

export const actions = {
  fetchPosts({ commit, getters }) {
    const posts = getters.allPosts;
    if (posts) return posts;

    return PostService.getPosts()
      .then(response => {
        commit('SET_POSTS', response.data);
      })
      .catch(error => error.response);
  },

  fetchPost({ commit, getters }, adi) {
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
        .catch(error => error.response);
    }
  }
};

export const getters = {
  getPostByName: state => title => {
    return state.posts.find(post => post.title === title);
  },

  getPostsByAuthorName: (state, author) => {
    return state.posts.filter(post => post.author.name === author.name);
  },

  allPosts: state => {
    return state.posts.length;
  }
};
