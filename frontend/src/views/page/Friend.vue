<template>
  <div>
    <Header></Header>
    <div class="main">
      <div class="container">
        <div class="card">
          <h4>{{ users.length }} friend</h4>
          <div class="list-search" v-for="user in users" :key="user.id">
            <span v-if="user.user_to">
              <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                   v-if="user.user_to.avatar == null">
              <img :src="user.user_to.urlAvatar" alt="" v-else>
            </span>
            <span v-else>
               <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                    v-if="user.user_from.avatar == null">
               <img :src="user.user_from.urlAvatar" alt="" v-else>
            </span>

            <div class="name-email" v-if="user.user_to">
              <p>
                <router-link :to="/page/+ user.user_to.id" tag="a">{{ user.user_to.name }}</router-link>
              </p>
              <p class="sea-email">{{ user.user_to.email }}</p>
            </div>
            <div class="name-email" v-else>
              <p>
                <router-link :to="/page/+ user.user_from.id" tag="a">{{ user.user_from.name }}</router-link>
              </p>
              <p class="sea-email">{{ user.user_from.email }}</p>
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
