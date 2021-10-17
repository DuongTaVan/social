import axios from "./../helpers/axios";

export async function login(credential) {
  const response = await axios.post("/auth/login", credential)
    .then(res => res)
    .catch(err => {
      return {
        error: err
      }
    });
  return response;
}

export async function register(credential) {
  const response = await axios.post("/auth/register", credential)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function logout() {
  const response = await axios.post("/auth/logout")
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function userProfile() {
  const response = await axios.get("/auth/user-profile")
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function resetPassword(email) {
  const response = await axios.post("/auth/reset-password-request", email)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function checkTokenResetPasswordAt(token) {
  const response = await axios.get("/auth/check-token-reset-password-at/" + token)
    .then(res => res)
    .catch(err => err);
  return response;
}

export async function changePassword(data) {
  const response = await axios.post("/auth/change-password", data)
    .then(res => res)
    .catch(err => err);
  return response;
}
