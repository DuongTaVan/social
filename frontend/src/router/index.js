import {createRouter, createWebHistory} from "vue-router";
import Login from "../views/account/Login";
import Register from "../views/account/Register";
import ForgotPasswrod from "../views/account/ForgotPassword";
import store from '../store/index';

function page(path) {
  return import(/* webpackChunkName: "about" */ `../views/${path}`);
}

const routes = [
  {
    path: "/dashboard",
    name: "Dashboard",
    component: page("page/Dashboard.vue"),
    meta: {
      auth: true
    }
  },
  {
    path: "/home",
    name: "Home",
    component: page("page/Home.vue"),
    meta: {
      auth: true
    }
  },
  {
    path: "/search/:data",
    name: "Search",
    component: page("page/Search.vue"),
    meta: {
      auth: true
    }
  },
  {
    path: "/follower",
    name: "Follower",
    component: page("page/Follower.vue"),
    meta: {
      auth: true
    }
  },
  {
    path: "/following",
    name: "Following",
    component: page("page/Following.vue"),
    meta: {
      auth: true
    }
  },
  {
    path: "/page/:id",
    name: "Page",
    component: page("page/Page.vue"),
    meta: {
      auth: true
    }
  },
  {
    path: "/friend",
    name: "Friend",
    component: page("page/Friend.vue"),
    meta: {
      auth: true
    }
  },
  {
    path: "/about",
    name: "About",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: page("About.vue"),
    meta: {
      auth: true
    }
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
    meta: {
      auth: false
    }
  },
  {
    path: "/register",
    name: "Register",
    component: Register,
    meta: {
      auth: false
    }
  },
  {
    path: "/reset-password",
    name: "ResetPassword",
    component: ForgotPasswrod,
    meta: {
      auth: false
    }
  },
  {
    path: "/chat",
    name: "Chat",
    component: page("page/Chat.vue"),
    meta: {
      auth: false
    }
  },
  {
    path: "/check-token-reset-password-at/:token",
    name: "ChangePassword",
    component: page("account/ResetPassword.vue"),
    meta: {
      auth: false
    }
  },
  {
    path: "/change-info",
    name: "ChangeInfo",
    component: page("page/ChangeInfo.vue"),
    meta: {
      auth: false
    }
  },
  {
    path: "/block",
    name: "Block",
    component: page("page/Block.vue"),
    meta: {
      auth: false
    }
  },
  {
    path: '/:pathMatch(.*)*',
    component: page("404.vue")
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach(async (to, from, next) => {
  if (!to.meta.auth) {
    return next();
  }
  if (store.state.api.auth) {
    return next();
  } else {
    let access_token = localStorage.getItem('access_token');
    if (access_token) {
      await store.dispatch("userProfile");
      if (store.state.api.auth) {
        return next();
      }
    }
    next("login");
  }
});

export default router;
