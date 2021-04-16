import axios from "./../helpers/axios";

export async function addPost(content) {
  const response = await axios.post("/post/add-post", content)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function listPost() {
  const response = await axios.get("/post/list-post")
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function listPostFriend(id) {
  const response = await axios.get("/post/list-post/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function detailPost(id) {
  const response = await axios.get("/post/detail-post/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function addsharePost(data) {
  const response = await axios.post("/post/share-post/" + data.id, {content: data.content})
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function listPostHome() {
  const response = await axios.get("/post/home")
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function pagePaginate(url) {
  const response = await axios.get(url)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function removePost(id) {
  const response = await axios.post("/post/remove-post/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function updatePost(data) {
  const response = await axios.post("/post/update-post/" + data.id, {content: data.content})
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function currentPage(page) {
  const response = await axios.get("/post/home?page=" + page)
    .then(res => res)
    .catch(err => err);
  return response;
}
