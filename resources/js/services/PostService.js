import http from './httpService';

async function getPosts() {
  return await http.get('/api/posts');
}

async function getPinnedPosts() {
  return await http.get('/api/pinned');
}

async function getPost(adi) {
  return await http.get('/api/posts/' + adi);
}

export default {
  getPost,
  getPinnedPosts,
  getPosts
};
