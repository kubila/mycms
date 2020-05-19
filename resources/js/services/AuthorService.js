import http from './httpService';

async function getAuthors() {
  return await http.get('/api/authors/');
}

async function getAuthor(adi) {
  return await http.post('/api/authors/' + adi);
}

export default {
  getAuthor,
  getAuthors
};
