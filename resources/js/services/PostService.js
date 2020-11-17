import http from './httpService';

async function getPosts() {
  return await http.get('/api/admin/posts');
}

async function getPinnedPosts() {
  return await http.get('/api/pinned');
}

async function getHomePosts() {
  return await http.get('/api/homeposts');
}

async function getPost(adi) {
  return await http.get('/api/posts/' + adi);
}

export default {
  getPost,
  getPinnedPosts,
  getHomePosts,
  getPosts
};
