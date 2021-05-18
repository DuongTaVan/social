/* eslint-disable */
window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = localStorage.getItem("access_token");
if (token) {
  window.axios.defaults.headers.common['Authorization'] = "Bearer " + token;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.io = require('socket.io-client');

// window.Echo = new Echo({
//   // authEndpoint : 'http://localhost:8000/public/broadcasting/auth',
//
//   broadcaster: 'pusher',
//   key: '1127d78d4340a672f321',
//   cluster: 'ap1',
//   forceTLS: true
// });
window.Echo = new Echo({
  // authEndpoint : 'http://localhost:8000/public/broadcasting/auth',
  broadcaster: 'socket.io',
  host: 'http://localhost:6001',
  auth: {
    headers: {
      /** I'm using access tokens to access  **/
      Authorization: "Bearer " + localStorage.getItem("access_token")
    }
  }
});
