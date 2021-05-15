<template>
  <div>
    <Header></Header>
    <div class="main">
      <div class="container">
        <div class="card">
          <h4>{{ users.length }} following</h4>
          <div class="list-search" v-for="user in users" :key="user.id">
            <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                 v-if="user.user_to.avatar == null">
            <img :src="user.user_to.urlAvatar" alt="" v-else>
            <div class="name-email">
              <p>
                <router-link :to="/page/+ user.user_to.id" tag="a">{{ user.user_to.name }}</router-link>
              </p>
              <p class="sea-email">{{ user.user_to.email }}</p>
            </div>
            <div>{{ user.user_to.status }}</div>
            <a class="add-friend" href="#" @click="cancelSend(user.user_to.id)">Cancel</a>
          </div>
        </div>
        <br>

      </div>
    </div>
    <Footer></Footer>
  </div>
</template>
<script>
import {mapGetters} from 'vuex';
import {mapActions} from 'vuex'
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
    ...mapGetters(['follower'])
  },
  async created() {
    await this.getListFollowing();
    this.users = this.follower;
  },
  methods: {
    ...mapActions(['getListFollowing', 'acceptFriend', 'removeSend']),
    async add(id) {
      await this.addFriend(id);
      await this.getListFollower();
      this.users = this.follower;
    },
    async cancelSend(id) {
      await this.removeSend(id);
      await this.getListFollowing();
      this.users = this.follower;
    },

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
