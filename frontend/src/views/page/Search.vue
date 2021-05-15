<template>
  <div>
    <Header></Header>
    <div class="main">
      <div class="container">
        <div class="card">
          <div class="list-search" v-for="user in users" :key="user.id">
            <img src="https://img.icons8.com/cotton/2x/user-male.png" alt="" v-if="user.avatar == null">
            <img :src="user.urlAvatar" alt="" v-else>
            <div class="name-email">
              <p>
                <router-link :to="/page/+ user.id" tag="a">{{ user.name }}</router-link>
              </p>
              <p class="sea-email">{{ user.email }}</p>
            </div>
            <div>{{ user.user_to.status }}</div>
            <a class="add-friend" href="#" @click="add(user.id)"
               v-if="user.user_from[0] === undefined && user.user_to[0] === undefined">Add</a>
            <a class="add-friend" href="#" @click="accept(user.id)"
               v-if="user.user_from[0] !== undefined && user.user_from[0].status==0">Accept</a>
            <a class="add-friend" href="#" @click="cancelSend(user.id)"
               v-if="user.user_to[0] !== undefined && user.user_to[0].status==0">To send</a>
            <a class="add-friend" href="#" @click="unfriend(user.id)"
               v-if="(user.user_from[0] !== undefined && user.user_from[0].status==1) ||(user.user_to[0] !== undefined && user.user_to[0].status==1)  ">Friend</a>
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
    ...mapGetters(['listUserSearch'])
  },
  created() {
    this.setData();
  },
  methods: {
    ...mapActions(['addFriend', 'SearchUsers', 'removeSend', 'acceptFriend']),
    setData() {
      this.users = this.listUserSearch
    },
    async add(id) {
      await this.addFriend(id);
      await this.SearchUsers(this.$route.params.data);
      await this.setData()
      this.users = this.listUserSearch;
    },
    async cancelSend(id) {
      await this.removeSend(id);
      await this.SearchUsers(this.$route.params.data);
      await this.setData()
      this.users = this.listUserSearch;
    },
    async accept(id) {
      await this.acceptFriend(id);
      await this.SearchUsers(this.$route.params.data);
      await this.setData()
      this.users = this.listUserSearch;
    }
  },
  watch: {
    listUserSearch: function () {
      this.setData();
    }
  }

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
