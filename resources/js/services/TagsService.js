import http from './httpService';

async function getTags() {
  return await http.get('api/tags/');
}

async function getTagPosts(name) {
  return await http.get('api/tags/' + name);
}

export default {
  getTagPosts,
  getTags
};
