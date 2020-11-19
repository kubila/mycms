import axios from 'axios';

let token = localStorage.getItem('auth-token');
const http = axios.create({
  //baseURL: 'http://localhost:3000',
  //baseURL: 'http://mycms.test'
  //withCredentials: true,
  headers: {
    //Accept: 'application/json',
    //'Content-Type': 'application/json',
    Authorization: `Bearer ${token}`
  }
  // timeout: 10000
});

export default http;
