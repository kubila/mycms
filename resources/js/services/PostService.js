import http from './httpService';

async function getPosts() {
  return await http.get('api/admin/posts');
}

async function getPinnedPosts() {
  return await http.get('api/pinned');
}

async function getHomePosts() {
  return await http.get('api/homeposts');
}

async function getPost(adi) {
  return await http.get('api/posts/' + adi);
}

async function createPost(params) {
  return await http.post('api/admin/posts', params);
}

async function updatePost(post) {
  return await http.put('api/admin/posts/' + post);
}

async function deletePost(post) {
  return await http.delete('api/admin/posts/' + post);
}

export default {
  getPost,
  getPinnedPosts,
  getHomePosts,
  getPosts,
  createPost,
  updatePost,
  deletePost
};
