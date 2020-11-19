import http from './httpService';

async function getAuthors() {
  return await http.get('api/authors/');
}

async function getAuthor(adi) {
  return await http.get('api/authors/' + adi);
}

async function getAuthorPosts(adi) {
  return await http.get('api/authors/' + adi + '/posts');
}

export default {
  getAuthor,
  getAuthors,
  getAuthorPosts
};
