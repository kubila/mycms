import axios from 'axios';

const apiClient = axios.create({
  baseURL: `http://localhost:3000`,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  }
});

export default {
  getPosts() {
    return apiClient.get('/api/posts');
  },
  getPost(adi) {
    return apiClient.get('/api/posts/' + adi);
  }
};
