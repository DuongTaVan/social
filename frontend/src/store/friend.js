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
