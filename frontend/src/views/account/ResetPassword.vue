<template>
  <section>
    <div class="ctn">
      <div class="logo-wrap">
        <div class="logo" :style="cssProps"></div>
        <h2 class="text-center">WELCOM</h2>
        <p class="text-center">Sign in by entering the information below</p>
        <form @submit.prevent="handleSubmit">
          <div class="form-group">
            <span class="fa fa-envelope"></span>
            <input autocomplete="true" type="text" class="form-control" v-model="form.email"
                   placeholder="Email" required>
          </div>
          <div class="form-group">
            <span class="fa fa-lock"></span>
            <input type="password" class="form-control" v-model="form.newPassword"
                   placeholder="New password"
                   required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn form-control btn-primary submit">Send</button>
          </div>
        </form>
        <div class="w-100 text-center mt-4 text">
          <p class="mb-0 text-center">Don't have an account?</p>
          <router-link to="/register" tag="a" class="sign-up">Sign Up</router-link>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import {mapActions, mapGetters} from "vuex";

export default {
  data() {
    return {
      cssProps: {
        backgroundImage: `url(${require('@/assets/bg.jpg')})`
      },
      form: {
        email: '',
        newPassword: '',
      },
      type: 'login',
      error: null,
    }
  },
  computed: {
    ...mapGetters(['loginResponse', 'checkToken'])
  },
  methods: {
    ...mapActions(["login", "checkTokenResetPasswordAt", "changePassword"]),
    async handleSubmit() {
      const credential = {
        email: this.form.email,
        password: this.form.newPassword,
        token_reset_password: this.$route.params.token
      };
      await this.changePassword(credential);
      if (this.checkToken) {
        alert('change password success !')
        this.$router.push("/login");
      }
    },
  },
  async created() {
    const token = this.$route.params.token;
    await this.checkTokenResetPasswordAt(token);
    if (this.checkToken.error) {
      this.$router.push('/login');
      alert(this.checkToken.error)
    } else {
      this.form.email = this.checkToken
    }
  }
}
</script>
<style lang="scss">
.ctn {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #f5d2bb;
  margin: 0;
  max-width: 100%;

}

.logo {
  width: 100px;
  height: 100px;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  border-radius: 50%;
  margin: 0 auto;
  margin-bottom: 20px;
}

.form-group {
  background: #020232;
}

.logo-wrap {
  padding: 30px;
  border-radius: 10px;
  width: 350px;
  background-color: #000232;

  h2, p, span, form, input, a, .text-md-right, .text {
    background-color: #000232 !important;
  }

  h2 {
    color: #fff;
  }

  p {
    color: rgba(255, 255, 255, 0.5);
  }

  button {
    background-color: #b689b0;
  }

  input:focus {
    border-color: unset;
    outline: none;
    box-shadow: none;
    color: unset;
  }

  .forgot, .sign-up {
    color: #b689b0;
  }

  .form-group {
    position: relative;

    span {
      position: absolute;
      top: 10px;
      left: 11px;
      color: #fff;
    }

    input {
      padding-left: 30px;
      background: rgba(0, 0, 0, 0.05);
      color: rgba(255, 255, 255, 0.8) !important;
      letter-spacing: 1px;
    }

    .btn-primary:hover {
      background-color: #b689b0;
      border-color: unset;
    }

    .btn-primary {
      border-color: unset;

      &:focus {
        background-color: #b689b0 !important;
        box-shadow: unset !important;
      }

      &:active {
        background-color: #b689b0 !important;
        border-color: unset !important;
      }
    }
  }
}

</style>
