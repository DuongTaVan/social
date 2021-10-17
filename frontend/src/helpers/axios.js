import axios from "axios";

axios.defaults.baseURL = "http://localhost:8000/api";

axios.interceptors.request.use(function (config) {
  const token = localStorage.getItem("access_token");
  config.headers.Authorization = `Bearer ${token}`;
  return config;
});

export default axios;
