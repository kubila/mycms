import axios from 'axios';

const token = localStorage.getItem('auth-token');
const http = axios.create({
  baseURL: 'http://localhost:3000',
  //baseURL: 'http://mycms.test'
  //withCredentials: true,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  }
  // timeout: 10000
});

if (token) {
  http.defaults.headers.Authorization = `Bearer ${token}`;
}

export default http;
