import axios from 'axios';

let token = localStorage.getItem('auth-token');

const http = axios.create({
  baseURL: 'http://localhost:3000',
  //baseURL: 'http://mycms.test'
  //withCredentials: true,
  headers: {
    //Accept: 'application/json',
    'Content-Type': 'application/json',
    Authorization: 'Bearer ' + localStorage.getItem('auth-token')
  }
  // timeout: 10000
});

// http.interceptors.request.use(
//   config => {
//     const token = localStorage.getItem('auth-token');
//     if (token) {
//       config.headers['Authorization'] = `Bearer ${token}`;
//     }
//     return config;
//   },
//   error => {
//     return Promise.reject(error);
//   }
// );

export default http;
