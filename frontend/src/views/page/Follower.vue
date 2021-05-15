<template>
    <div>
        <Header></Header>
        <div class="main">
            <div class="container">
                <div class="card">
                    <h4>{{users.length}} follower</h4>
                    <div class="list-search" v-for="user in users" :key="user.id">
                      <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                           v-if="user.user_from.avatar == null">
                      <img :src="user.user_from.urlAvatar" alt="" v-else>
                        <div class="name-email">
                            <p>
                                <router-link :to="/page/+ user.user_from.id" tag="a">{{ user.user_from.name }}</router-link>
                            </p>
                            <p class="sea-email">{{ user.user_from.email }}</p>
                        </div>
                        <div>{{ user.user_from.status }}</div>
                        <a class="add-friend" href="#" @click="accept(user.user_from.id)">Accept</a>
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
       await this.getListFollower();
        this.users = this.follower;
    },
    methods: {
        ...mapActions(['getListFollower','acceptFriend']),
        async add(id) {
            await this.addFriend(id);
            await this.SearchUsers(this.$route.params.data);
            await this.setData()
            this.users = this.listUserSearch;
        },
        async accept(id) {
            await this.acceptFriend(id);
            await this.getListFollower();
            this.users = this.follower;
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
