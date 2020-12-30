import http from './httpService';

async function logOut() {
  return await http({ method: 'post', url: 'api/logout', data: {} });
}

async function login(credentials) {
  return await http.post('api/login', credentials);
}

async function getUser() {
  return await http.get('api/user');
}

async function signUp(credentials) {
  return await http.post('api/register', credentials);
}

export default {
  logOut,
  signUp,
  login,
  getUser
};
