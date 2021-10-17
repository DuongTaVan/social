import axios from "./../helpers/axios";

export async function listFriend() {
  const response = await axios.get("/friend/list-friend")
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function removeSend(id) {
  const response = await axios.post("/friend/remove-request-friend/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function acceptFriend(id) {
  const response = await axios.post("/friend/accept-friend/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}
export async function searchFriendsChat(name) {
  const response = await axios.get("/friend/search-friend-chat/" + name)
    .then(res => res)
    .catch(err => err);
  return response;
}
export async function getFriendsChat() {
  const response = await axios.get("/friend/list-friend-chat")
    .then(res => res)
    .catch(err => err);
  return response;
}
