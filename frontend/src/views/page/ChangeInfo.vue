<template>
  <div>
    <Header></Header>
    <div class="change-information">
      <div class="container">
        <form @submit.prevent="changeInformation" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputPassword3">Name</label>
              <input type="text" class="form-control" v-model="name" id="inputPassword3" placeholder="Name">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputAddress">Phone</label>
              <input type="text" class="form-control" v-model="phone" id="inputAddress" placeholder="0939274328">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="file" @change="onFileChange"/>

              <div id="preview">
                <img v-if="url" :src="url"/>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputPassword5">New Password</label>
              <input type="password" class="form-control" v-model="newPassword" id="inputPassword5"
                     placeholder="New Password">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
    <Footer></Footer>
  </div>
</template>
<script>
import {mapActions, mapGetters} from "vuex";
import Header from "../../components/pages/Header";
import Footer from "../../components/pages/Footer";

export default {
  components: {
    Header,
    Footer
  },
  data() {
    return {
      name: '',
      phone: '',
      newPassword: '',
      url: null,
      image: {}
    }
  },
  computed: {
    ...mapGetters(['getNameUser', 'getPhoneUser', "getMessage"])
  },
  methods: {
    ...mapActions(['changeInfo']),
    async changeInformation() {
      let data = {
        name: this.name,
        phone: this.phone,
        newPassword: this.newPassword,
        avatar: this.image
      }
      const formData = new FormData();
      for (let key in data) {
        formData.append(key, data[key]);
      }
      console.log(formData)
      await this.changeInfo(formData);
      if (this.getMessage) {
        alert(this.getMessage);
        this.$router.push('/home')
      } else {
        alert('Change info err');
      }
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
      this.image = file
    },
  },
  created() {
    this.name = this.getNameUser;
    this.phone = this.getPhoneUser;
  }

}
</script>
<style lang="scss">
.form-group {
  background: unset;
}

#preview {
  display: flex;
  justify-content: center;
  align-items: center;
}

#preview img {
  width: 100% !important;
  max-height: 500px;
}

.change-information {
  padding-top: 64px;
}
</style>

