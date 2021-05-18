import axios from "./../helpers/axios";

export async function addMessage(data) {
  const response = await axios.post("/chat/add-message", data)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function getMessages(id) {
  const response = await axios.get("/chat/get-message/" + id)
    .then(res => res)
    .catch(err => err);
  return response;
}
