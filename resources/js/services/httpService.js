import axios from 'axios';

const http = axios.create({
  baseURL: 'http://localhost:3000',
  //baseURL: 'http://mycms.test'
  //withCredentials: true,
  headers: {
    Accept: 'application/json, text/plain, */*',
    'Content-Type': 'application/json'
    //Authorization: 'Bearer ' + localStorage.getItem('auth-token')
  }
  // timeout: 10000
});

http.interceptors.request.use(
  config => {
    let token = JSON.parse(localStorage.getItem('token'));
    const auth = token ? `Bearer ${token}` : '';
    config.headers.common['Authorization'] = auth;
    return config;
  },
  error => {
    return Promise.reject(error);
  }
);

export default http;
