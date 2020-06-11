import http from './httpService';

async function getCategories() {
  return await http.get('/api/categories');
}

async function getCategoryPosts(adi) {
  return await http.get('/api/categories/' + adi);
}

async function getCategoryNews(adi) {
  return await http.get('/api/categories/' + adi + 'news');
}

export default {
  getCategoryPosts,
  getCategories,
  getCategoryNews
};
