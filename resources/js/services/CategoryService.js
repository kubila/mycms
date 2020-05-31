import http from './httpService';

async function getCategories() {
  return await http.get('/api/categories');
}

async function getCategory(adi) {
  return await http.get('/api/categories/' + adi);
}

export default {
  getCategory,
  getCategories
};
