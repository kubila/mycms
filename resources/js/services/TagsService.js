import http from './httpService';

async function getTags() {
  return await http.get('api/tags/');
}

async function getTag(name) {
  return await http.get('api/tags/' + name);
}

export default {
  getTag,
  getTags
};
