import http from './httpService';

async function getNews() {
  return await http.get('/api/news/');
}

async function getSpecificNews(name) {
  return await http.post('/api/news/' + name);
}

export default {
  getNews,
  getSpecificNews
};
