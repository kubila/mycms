import axios from 'axios';

axios.create({
  baseURL: 'http://localhost:3000',
  withCredentials: true,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json'
  },
  timeout: 10000
});

function setJwt(jwt) {
  axios.defaults.headers.common['Authorization'] = `Bearer ${jwt}`;
}

function getJwt() {
  const token = localStorage.getItem('token');
  token ? true : false;
}

export default {
  get: axios.get,
  post: axios.post,
  put: axios.put,
  delete: axios.delete,
  setJwt,
  getJwt
};
