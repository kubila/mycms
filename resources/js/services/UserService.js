import http from './httpService';

async function getToken(credentials) {
  return await http.post('/api/auth/login', credentials);
}

async function getUser() {
  const token = localStorage.getItem('token');
  http.setJwt(token);
  return await http.post('/api/auth/me');
}

async function logOut() {
  const token = localStorage.getItem('token');
  http.setJwt(token);
  return await http.post('/api/auth/logout');
}

async function signUp(credentials) {
  return await http.post('/api/auth/signup', credentials);
}

export default {
  getToken,
  getUser,
  logOut,
  signUp
};
