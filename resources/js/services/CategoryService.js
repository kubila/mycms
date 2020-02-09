import axios from 'axios';

const apiClient = axios.create({
  baseURL: `http://localhost:3000`,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  }
});

export default {
  getCategories() {
    return apiClient.get('/api/categories');
  },
  getCategory(adi) {
    return apiClient.post('/api/categories/' + adi);
  }
};
