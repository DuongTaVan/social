<template>
  <section>
    <div class="ctn">
      <div class="logo-wrap">
        <div class="logo" :style="cssProps"></div>
        <h2 class="text-center">WELCOM</h2>
        <p class="text-center">Register by entering the information below</p>
        <form @submit.prevent="handleSubmit">
          <div class="form-group">
            <span class="fa fa-user-circle"></span>
            <input type="text" class="form-control" v-model="form.name" placeholder="Name" required>
          </div>
          <div class="form-group">
            <span class="fa fa-envelope"></span>
            <input type="email" class="form-control" v-model="form.email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <span class="fa fa-phone-square"></span>
            <input type="text" class="form-control" v-model="form.phone" placeholder="Phone number"
                   required>
          </div>
          <div class="form-group">
            <span class="fa fa-lock"></span>
            <input type="password" class="form-control" name="password" v-model="form.password"
                   placeholder="Password" required ref="password">
          </div>
          <div class="form-group">
            <span class="fa fa-lock"></span>
            <input type="password" class="form-control" v-model="form.password_confirmation"
                   placeholder="Confirm password" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn form-control btn-primary submit">Get Started</button>
          </div>
        </form>
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
        password: '',
        phone: '',
        name: '',
        password_confirmation: ''

      },
      error: null,
    }
  },
  computed: {
    ...mapGetters(["getMessage"])
  },
  methods: {
    ...mapActions(["register"]),
    async handleSubmit() {
      const credential = {
        email: this.form.email,
        password: this.form.password,
        phone: this.form.phone,
        name: this.form.name,
        password_confirmation: this.form.password_confirmation,
      };
      await this.register(credential);
      if (this.getMessage == undefined) {
        alert('Registration failed')
      } else {
        alert('register successful');
        this.$router.push("/login");
      }
    },
  },

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
    background: #020232;

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
