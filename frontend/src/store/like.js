import axios from "./../helpers/axios";

export async function listLike() {
  const response = await axios.get("/like/get-like")
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function listLikeComment() {
  const response = await axios.get("/like/get-like-comment")
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function addLike(id) {
  const response = await axios.post("/like/add-like/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function addLikeComment(id) {
  const response = await axios.post("/like/add-like-comment/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}
