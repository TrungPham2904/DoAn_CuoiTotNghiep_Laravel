// First we need to import axios.js
import settings from './settings'

import * as request from 'axios'
// Next we make an 'instance3' of it
const axios = request.create({
// .. where we make our configurations
    baseURL: settings.API_URL,

});

axios.interceptors.request.use(
    async config => {
      const token = await localStorage.getItem('token')
      if (token) {
        config.headers.Authorization = "Bearer "+token
      }
      return config
    },
    error => {
      return Promise.reject(error)
    }
  );
// Where you would set stuff like your 'Authorization' header, etc ...
// let token = await AsyncStorage.getItem("token");
//axios.defaults.headers.common['Authorization'] = 'AUTH TOKEN FROM INSTANCE';

// Also add/ configure interceptors && all the other cool stuff



export default axios;