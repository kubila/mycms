import http from './httpService';

async function logOut() {
  return await http.post('/api/logout');
}

async function login(credentials) {
  await http.get('/sanctum/csrf-cookie');
  return await http.post('/api/login', credentials);
}

async function signUp(credentials) {
  return await http.post('/api/register', credentials);
}

export default {
  logOut,
  signUp,
  login
};
