<template>
  <section class="header">
    <div class="container">
      <div class="menu">
        <div class="bar" @click="addClassMenu">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <router-link to="/home" tag="a">
          <div class="lg" :style="cssLg"></div>
        </router-link>
        <form class="search" @submit.prevent="searchUser">
          <input
            type="text"
            placeholder="Seach ..."
            v-model="search"
          />
          <span><i class="fa fa-search" aria-hidden="true"></i></span>
        </form>
        <div class="menu--item">
          <ul
            class="menu--item_list"
            :class="{ 'menu--item_list_active': menuActive }"
          >
            <li>
              <router-link to="/home" tag="a"
              ><i class="fa fa-home" aria-hidden="true"></i
              >Home
              </router-link>
            </li>
            <li>
              <router-link tag="a" to="/friend"
              ><i class="fa fa-users" aria-hidden="true"></i
              >Friend
              </router-link>
            </li>
            <li>
              <router-link tag="a" to="/block"
              ><i class="fa fa-ban" aria-hidden="true"></i>Block
              </router-link>
            </li>
            <li>
              <router-link tag="a" to="/follower"
              ><i
                class="fa fa-forumbee"
                aria-hidden="true"
              ></i
              >Follower
              </router-link>
            </li>
            <li>
              <router-link tag="a" to="/following"
              ><i class="fa fa-wifi" aria-hidden="true"></i>Following
              </router-link>
            </li>
            <li>
              <router-link tag="a" to="/dashboard"
              ><i
                class="fa fa-tachometer"
                aria-hidden="true"
              ></i
              >Dashboard
              </router-link>
            </li>
          </ul>
        </div>
        <div
          class="moo"
          :class="{ mo: moActive }"
          @click="ActiveMo"
        ></div>
        <div class="chat">
          <span><i class="fa fa-comment" aria-hidden="true"></i><span class="message">Message</span></span>
        </div>
        <div class="menu--item--user">
          <ul>
            <li>
              <a class="about--me" @click="addClassHeader"
              ><span class="user-name">{{ name }}</span
              ><i
                class="fa fa-angle-down"
                :class="{ 'fa-active': isActive }"
                aria-hidden="true"
              ></i
              ></a>
              <ul
                class="about--me__submenu"
                :class="{ aboutMeChoose: isActive }"
              >
                <li>
                  <router-link tag="a" to="/change-info"
                  ><i
                    class="fa fa-cog"
                    aria-hidden="true"
                  ></i
                  >Account Setting
                  </router-link>
                </li>
                <li>
                  <a href="#" @click="signout"
                  ><i
                    class="fa fa-location-arrow"
                    aria-hidden="true"
                  ></i
                  >Logout</a
                  >
                </li>
              </ul>
            </li>
          </ul>
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
      isActive: false,
      menuActive: false,
      moActive: false,
      cssLg: {
        backgroundImage: `url(${require("@/assets/header/logo.png")})`,
      },
      userLg: {
        backgroundImage: `url(${require("@/assets/header/user.png")})`,
      },
      search: "",
      data: [],
      name: "",
    };
  },
  computed: {
    ...mapGetters(["getNameUser"]),
  },
  methods: {
    ...mapActions(["logout", "SearchUsers"]),
    addClassHeader: function () {
      this.isActive = !this.isActive;
      this.menuActive = false;
      this.moActive = !this.moActive;
    },
    signout() {
      this.logout();
      this.$router.push("/login");
    },
    async searchUser() {
      let data = this.search;
      await this.SearchUsers(data);
      await this.$router.push("/search/" + data);
    },
    addClassMenu() {
      this.menuActive = !this.menuActive;
      this.isActive = false;
      this.moActive = !this.moActive;
    },
    ActiveMo() {
      this.moActive = !this.moActive;
      this.menuActive = false;
      this.isActive = false;
    },
  },
  async created() {
    this.name = this.getNameUser;
  },
};
</script>
<style lang="scss">
@import "~../../assets/scss/header.scss";
.chat{
  background-color: #e44d3a;
  span{
    background-color: #e44d3a;
    color: #fff;

    i {
      color: #fff;
      background-color: #e44d3a;
      margin: 4px;
    }
  }

}
</style>
