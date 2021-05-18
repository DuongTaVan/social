<template>
  <div>
    <Header></Header>
    <div class="main">
      <div class="container">
        <div class="card">
          <h4>{{ users.length }} friend</h4>
          <div class="list-search" v-for="user in users" :key="user.id">
            <span>
              <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                   v-if="user.avatar == null">
              <img :src="user.urlAvatar" alt="" v-else>
            </span>

            <div class="name-email">
              <p>
                <router-link :to="/page/+ user.id" tag="a">{{ user.name }}</router-link>
              </p>
              <p class="sea-email">{{ user.email }}</p>
            </div>
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
      users: [],
    }
  },
  computed: {
    ...mapGetters(['listFriends'])
  },
  created: async function () {
    await this.listFriend();
    this.users = this.listFriends;
  },
  methods: {
    ...mapActions(['listFriend']),
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
