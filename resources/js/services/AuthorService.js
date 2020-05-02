import axios from 'axios';

const apiClient = axios.create({
  baseURL: `http://localhost:3000`,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  }
});

export default {
  getAuthors() {
    apiClient.get('/api/authors/');
  },
  getAuthors(adi) {
    apiClient.get('/api/authors/' + adi);
  }
};
