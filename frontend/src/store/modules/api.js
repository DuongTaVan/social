import {login, logout, register, userProfile, resetPassword, checkTokenResetPasswordAt, changePassword} from "./../api";
import {
  addPost,
  listPost,
  listPostFriend,
  detailPost,
  addsharePost,
  listPostHome,
  pagePaginate,
  removePost,
  updatePost,
  currentPage
} from "./../post";
import {listFriend, removeSend, acceptFriend, searchFriendsChat, getFriendsChat} from "./../friend";
import {listComment, addComment, removeComment} from "./../comment";
import {addLike, listLike, addLikeComment, listLikeComment} from "./../like";
import {addMessage, getMessages, removeMessages} from "./../message";
import {
  addUserBlock,
  SearchUser,
  addFriend,
  infoFriend,
  getListFollower,
  getListFollowing,
  changeInfo,
  userBlocks,
  removeBlock
} from "./../user";

const state = {
  auth: null,
  token: '',
  role: '',
  loading: false,
  loginResponse: '',
  name: '',
  id: '',
  idFriend: '',
  email: '',
  phone: '',
  avatar: '',
  nameFriend: '',
  emailFriend: '',
  avatarFriend: '',
  message: '',
  messages: [],
  detailPost: [],
  listData: [],
  follower: [],
  listFriends: [],
  listComments: [],
  listLikes: [],
  listLikesComment: [],
  listUserSearch: [],
  checkToken: [],
  blocks: []
};

const getters = {
  token: state => state.token,
  loginResponse: state => state.loginResponse,
  auth: state => state.auth,
  role: state => state.role,
  listData: state => state.listData,
  listFriends: state => state.listFriends,
  getNameUser: state => state.name,
  getAvatar: state => state.avatar,
  getId: state => state.id,
  getEmailUser: state => state.email,
  getPhoneUser: state => state.phone,
  getNameFriend: state => state.nameFriend,
  getEmailFriend: state => state.emailFriend,
  getIdFriend: state => state.idFriend,
  getAvatarFriend: state => state.avatarFriend,
  listComments: state => state.listComments,
  listLikes: state => state.listLikes,
  listLikesComment: state => state.listLikesComment,
  listUserSearch: state => state.listUserSearch,
  detailPosts: state => state.detailPost,
  follower: state => state.follower,
  getMessage: state => state.message,
  getMessagesFriend: state => state.messages,
  checkToken: state => state.checkToken,
  getBlock: state => state.blocks,
};

const mutations = {
  setToken(state, response) {
    state.loginResponse = response;
    if (!response.error) {
      state.token = response.data.access_token;
      localStorage.setItem("access_token", response.data.access_token);
    }
  },
  removeToken(state) {
    localStorage.removeItem("access_token");
    state.token = null;
  },
  setName(state, name) {
    state.name = name;
  },
  setId(state, id) {
    state.id = id;
  },
  setPhone(state, phone) {
    state.phone = phone;
  },
  setMessages(state, data) {
    state.messages = data;
  },
  setAvatar(state, url) {
    state.avatar = url;
  },
  setBlocks(state, data) {
    state.blocks = data;
  },
  setMessage(state, message) {
    state.message = message;
  },
  setEmail(state, email) {
    state.email = email;
  },
  setNameFriend(state, name) {
    state.nameFriend = name;
  },
  setMailFriend(state, email) {
    state.emailFriend = email;
  },
  setIdFriend(state, id) {
    state.idFriend = id;
  },
  setAvatarFriend(state, url) {
    state.avatarFriend = url;
  },
  setAuth(state, auth) {
    state.auth = auth;
    if (!auth) {
      localStorage.removeItem("access_token");
    }
  },
  setRole(state, role) {
    state.role = role;
  },
  getData(state, data) {
    state.listData = data;
  },
  getFriends(state, data) {
    state.listFriends = data;
  },
  listComment(state, data) {
    state.listComments = data;
  },
  listLike(state, data) {
    state.listLikes = data;
  },
  listLikeComment(state, data) {
    state.listLikesComment = data;
  },
  listUserSearch(state, data) {
    state.listUserSearch = data;
  },
  detailPost(state, data) {
    state.detailPost = data;
  },
  follower(state, data) {
    state.follower = data;
  },
  following(state, data) {
    state.follower = data;
  },
  checkToken(state, data) {
    state.checkToken = data
  }
};
const actions = {
  /* eslint-disable no-unused-vars */
  async login({commit}, credential) {
    const response = await login(credential);
    commit("setToken", response);
  },
  /* eslint-disable no-unused-vars */
  async logout({commit}) {
    const response = await logout();
    commit('removeToken');
  },
  /* eslint-disable no-unused-vars */
  async register({commit}, credential) {
    const response = await register(credential);
    commit('setMessage', response.data)
  },
  /* eslint-disable no-unused-vars */
  async userProfile({commit}) {
    const response = await userProfile();
    if (response.status == 200) {
      commit("setAuth", true);
      commit("setName", response.data.name);
      commit("setEmail", response.data.email);
      commit("setPhone", response.data.phone);
      commit("setId", response.data.id);
      commit("setAvatar", response.data.urlAvatar);
    } else {
      commit("setAuth", false);
    }

  },
  /* eslint-disable no-unused-vars */
  async addPost({commit}, content) {
    await addPost(content);
  },
  async listPost({commit}) {
    const response = await listPost();
    commit('getData', response.data);
  },
  async listPostFriend({commit}, id) {
    const response = await listPostFriend(id);
    commit('getData', response.data);
  },
  /* eslint-disable no-unused-vars */
  async listFriend({commit}) {
    const response = await listFriend();
    commit('getFriends', response.data);
  },
  /* eslint-disable no-unused-vars */
  async listComment({commit}, id) {
    const response = await listComment(id);
    commit('listComment', response.data.data);
  },
  /* eslint-disable no-unused-vars */
  async addComment({commit}, data) {
    const response = await addComment(data);
  },
  /* eslint-disable no-unused-vars */
  async removeComment({commit}, id) {
    const response = await removeComment(id);
  },
  /* eslint-disable no-unused-vars */
  async addLike({commit}, id) {
    const response = await addLike(id);
  },
  /* eslint-disable no-unused-vars */
  async addLikeComment({commit}, id) {
    const response = await addLikeComment(id);
  },
  /* eslint-disable no-unused-vars */
  async listLike({commit}) {
    const response = await listLike();
    commit('listLike', response.data);
  },
  /* eslint-disable no-unused-vars */
  async listLikeComment({commit}) {
    const response = await listLikeComment();
    commit('listLikeComment', response.data);
  },
  /* eslint-disable no-unused-vars */
  async addUserBlock({commit}, id) {
    const response = await addUserBlock(id);
  },
  /* eslint-disable no-unused-vars */
  async SearchUsers({commit}, data) {
    const response = await SearchUser(data);
    commit('listUserSearch', response.data.data);
  },
  /* eslint-disable no-unused-vars */
  async addFriend({commit}, data) {
    const response = await addFriend(data);
  },
  /* eslint-disable no-unused-vars */
  async removeSend({commit}, id) {
    const response = await removeSend(id);
  },
  /* eslint-disable no-unused-vars */
  async acceptFriend({commit}, id) {
    const response = await acceptFriend(id);
  },
  /* eslint-disable no-unused-vars */
  async searchFriendsChat({commit}, name) {
    const response = await searchFriendsChat(name);
    commit('getFriends', response.data.data);
  },
  /* eslint-disable no-unused-vars */
  async getFriendsChat({commit}) {
    const response = await getFriendsChat();
    commit('getFriends', response.data);
  },
  /* eslint-disable no-unused-vars */
  async infoFriend({commit}, id) {
    const response = await infoFriend(id);
    commit('setNameFriend', response.data.data.name);
    commit('setMailFriend', response.data.data.email);
    commit('setAvatarFriend', response.data.data.urlAvatar);
    commit('setIdFriend', response.data.data.id);
  },
  /* eslint-disable no-unused-vars */
  async detailPost({commit}, id) {
    const response = await detailPost(id);
    commit('detailPost', response.data.data);
  },
  /* eslint-disable no-unused-vars */
  async addsharePost({commit}, data) {
    const response = await addsharePost(data);
    commit('detailPost', response.data.data);
  },
  /* eslint-disable no-unused-vars */
  async getListFollower({commit}) {
    const response = await getListFollower();
    commit('follower', response.data.data);
  },
  /* eslint-disable no-unused-vars */
  async getListFollowing({commit}) {
    const response = await getListFollowing();
    commit('following', response.data.data);
  },
  /* eslint-disable no-unused-vars */
  async listPostHome({commit}) {
    const response = await listPostHome();
    commit('getData', response.data);
  },
  /* eslint-disable no-unused-vars */
  async currentPage({commit}, page) {
    const response = await currentPage(page);
    commit('getData', response.data);
  },
  /* eslint-disable no-unused-vars */
  async resetPassword({commit}, email) {
    const response = await resetPassword(email);
    commit('setMessage', response.data);
  },
  /* eslint-disable no-unused-vars */
  async checkTokenResetPasswordAt({commit}, token) {
    const response = await checkTokenResetPasswordAt(token);
    commit('checkToken', response.data);
  },
  /* eslint-disable no-unused-vars */
  async changePassword({commit}, token) {
    const response = await changePassword(token);
    commit('checkToken', response.data);
  },
  /* eslint-disable no-unused-vars */
  async changeInfo({commit}, data) {
    const response = await changeInfo(data);
    commit('setMessage', response.data);
  },
  /* eslint-disable no-unused-vars */
  async pagePaginate({commit}, url) {
    const response = await pagePaginate(url);
    commit('getData', response.data);
  },
  /* eslint-disable no-unused-vars */
  async removePost({commit}, id) {
    const response = await removePost(id);
    commit('setMessage', response.data);
  },
  /* eslint-disable no-unused-vars */
  async updatePost({commit}, data) {
    const response = await updatePost(data);
    commit('setMessage', response.data);
  },
  /* eslint-disable no-unused-vars */
  async userBlock({commit}) {
    const response = await userBlocks();
    commit('setBlocks', response.data.data);
  },
  /* eslint-disable no-unused-vars */
  async removeBlock({commit}, id) {
    const response = await removeBlock(id);
  },
  /* eslint-disable no-unused-vars */
  async addMessage({commit}, data) {
    const response = await addMessage(data);
  },
  /* eslint-disable no-unused-vars */
  async getMessages({commit}, id) {
    const response = await getMessages(id);
    commit('setMessages', response.data.data);
  },
  /* eslint-disable no-unused-vars */
  async removeMessages({commit}, id) {
    const response = await removeMessages(id);
  }
}
export default {
  state, getters, mutations, actions
}
