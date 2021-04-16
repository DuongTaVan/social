import axios from "./../helpers/axios";

export async function listComment(id) {
  const response = await axios.get("/comment/list-comment/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function addComment(data) {
  const response = await axios.post("/comment/add-comment/" + data.id, data)
    .then(res => res)
    .catch(err => err);
  return response;
}
export async function removeComment(id) {
  const response = await axios.post("/comment/remove-comment/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}
