<template>
  <div>
    <Header></Header>
    <div class="main">
      <div class="container">
        <div class="card">
          <div class="list-search" v-for="user in users" :key="user.id">
            <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                 v-if="user.avatar == null">
            <img :src="user.urlAvatar" alt="" v-else>
            <div class="name-email">
              <p>
                {{ user.name }}
              </p>
              <p class="sea-email">{{ user.email }}</p>
            </div>
            <a class="add-friend" href="#" @click="cancel(user.id)">cancel</a>
          </div>
        </div>
        <br>

      </div>
    </div>
    <Footer></Footer>
  </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex'
import Header from "../../components/pages/Header";
import Footer from "../../components/pages/Footer";

export default {
  components: {
    Header,
    Footer
  },
  data() {
    return {
      users: []
    }
  },
  computed: {
    ...mapGetters(['getBlock'])
  },
  methods: {
    ...mapActions(['userBlock', 'removeBlock']),
    async cancel(id) {
      let block = {
        block: id
      }
      await this.removeBlock(block);
      await this.userBlock();
      this.users = this.getBlock;
      this.$swal.fire(
        'Success !',
        this.getMessage,
        'share success !'
      )
    }
  },
  async created() {
    await this.userBlock();
    this.users = this.getBlock;
  },
}
</script>
<style lang="scss">
.list-search {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  padding: 10px;

  .name-email {
    padding: 0 20px;
  }

  .sea-email {
    color: #d4d9de;
  }

  .add-friend {
    padding: 3px 5px;
    border-radius: 5px;
    background-color: #e44d3a;
    color: #fff;
  }
}
</style>
