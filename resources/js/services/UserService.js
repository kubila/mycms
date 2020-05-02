import axios from 'axios';

const apiClient = axios.create({
  baseURL: `http://localhost:3000`,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  }
});

export default {
  getToken(credentials) {
    return apiClient.post('/api/auth/login', credentials);
  },
  getUser() {
    const token = localStorage.getItem('token');
    apiClient.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    return apiClient.post('/api/auth/me');
  },
  logOut() {
    return apiClient.post('/api/auth/logout');
  },
  signUp(credentials) {
    return apiClient.post('/api/auth/signup', credentials);
  }
};
