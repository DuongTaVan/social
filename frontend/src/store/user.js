import axios from "./../helpers/axios";

export async function addUserBlock(id) {
  const response = await axios.post("/user/add-user-block", id)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function SearchUser(data) {
  const response = await axios.get("/user/search-user/?q=" + data)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function addFriend(id) {
  const response = await axios.post("/friend/send-request-friend/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function infoFriend(id) {
  const response = await axios.get("/user/profile-friend/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function getListFollower() {
  const response = await axios.get("/user/follower/")
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function getListFollowing() {
  const response = await axios.get("/user/following/")
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function changeInfo(data) {
  const response = await axios.post("/user/change-information", data)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function userBlocks() {
  const response = await axios.get("/user/list-user-block")
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function removeBlock(id) {
  const response = await axios.post("/user/remove-user-block", id)
    .then(res => res)
    .catch(err => err);
  return response;
}
