import {createApp} from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import '../../resources/js/bootstrap';
import WebRTC from 'vue-webrtc'
import * as io from 'socket.io-client'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

window.io = io
const app = createApp(App)
app.use(store)
app.use(router)
app.use(WebRTC)
app.use(VueSweetalert2)
app.mount('#app')
