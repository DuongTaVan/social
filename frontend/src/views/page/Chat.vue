<template>
  <div>
    <Header></Header>
    <div class="main">
      <div class="container">

        <div class="row">
          <div class="col-12 col-md-4 col-lg-4">
            <div class="card list-user-chat" :class="{'display-users' : displayUsers}">
              <div class="card-body">
                <div class="search-friend form-group">
                  <input class="form-control" type="text" placeholder="Search ...">
                  <span class="search-user-chat"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
              </div>
              <div class="card-body" v-for="user in users" :key="user.id">
                <div class="user-friend" v-if="user.user_to">
                  <div class="if-user-friend click-user-friend" @click="getMessageFriend(user.user_to.id)">
                    <div class="img-onoff">
                      <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                           v-if="user.user_to.avatar == null">
                      <img :src="user.user_to.urlAvatar" alt="" v-else>
                      <span class="online_icon offline"></span>
                    </div>
                    <div class="name-on">
                      <h5>{{ user.user_to.name }}</h5>
                      <span class="status-friend">Online</span>
                    </div>
                  </div>
                </div>
                <div class="user-friend" v-else>
                  <div class="if-user-friend click-user-friend" @click="getMessageFriend(user.user_from.id)">
                    <div class="img-onoff">
                      <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                           v-if="user.user_from.avatar == null">
                      <img :src="user.user_from.urlAvatar" alt="" v-else>
                      <span class="online_icon offline"></span>
                    </div>
                    <div class="name-on">
                      <h5>{{ user.user_from.name }}</h5>
                      <span class="status-friend">Online</span>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-12 col-md-8 col-lg-8">
            <div class="card list-msg-chat" :class="{'display-list-msg-chat': !displayUsers}">
              <div class="card-body">
                <div class="detail-chat">
                  <div class="detail-chat-left">
                    <div class="img-onoff">
                      <i class="fa fa-chevron-left" aria-hidden="true" @click="closeMsg"></i>
                      <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                           v-if="avatarFriend == 'http://localhost:8000/storage'">
                      <img :src="avatarFriend" alt="" v-else>
                      <span class="online_icon offline"></span>
                    </div>
                    <div class="detail-chat-name">
                      <h5>{{ nameFriend }}</h5>
                      <span class="status-friend">{{ messages.length }} message</span>
                    </div>
                    <div class="camera-call">
                      <i class="fa fa-video-camera" aria-hidden="true"></i>
                      <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                  </div>
                  <div class="detail-chat-right">
                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
              <div class="card-body msg_card_body">
                <div class="chat-content" v-for="message in messages" :key="message.id">
                  <div class="content-text-user" v-if="message.to_id == id">
                    <div class="img-cont-msg">
                      <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                           v-if="message.user_from.avatar == 'http://localhost:8000/storage'">
                      <img :src="message.user_from.urlAvatar" alt="" v-else>
                    </div>
                    <div class="msg_cotainer">
                      {{ message.message }}
                      <span class="msg_time"> {{ message.timeSend }}</span>
                    </div>
                  </div>
                  <div class="content-text-user-send" v-else>
                    <div class="msg_cotainer-send">
                      {{ message.message }}
                      <span class="msg_time">{{ message.timeSend }}</span>
                    </div>
                    <div class="img-cont-msg">
                      <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                           v-if="message.user_from.avatar == 'http://localhost:8000/storage'">
                      <img :src="message.user_from.urlAvatar" alt="" v-else>
                    </div>
                  </div>
                </div>
              </div>
              <form class="card-footer" @keyup.enter="sendMessage">
                <div class="form-group">
                  <textarea name="" ref="type_msg" class="form-control" placeholder="Type your message..." v-model="message"></textarea>
                </div>
                <span class="send_btn" @click="sendMessage">
                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                  </span>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>
<script>
import Header from "../../components/pages/Header";
import {mapActions, mapGetters} from "vuex";
export default {
  components: {
    Header
  },
  data() {
    return {
      users: [],
      displayUsers: true,
      messages: [],
      id: '',
      idFriend: '',
      nameFriend: '',
      emailFriend: '',
      avatarFriend: '',
      message: '',
      name: '',
    }
  },
  computed: {
    ...mapGetters(['listFriends', 'getMessagesFriend','getNameUser', 'getId', 'getNameFriend', 'getEmailFriend', 'getAvatarFriend', 'getIdFriend'])
  },
  methods: {
    ...mapActions(['listFriend', 'getMessages', 'infoFriend', 'addMessage', 'userProfile']),
    async getMessageFriend(id) {
      this.displayUsers = false;
      await this.getMessages(id);
      this.messages = this.getMessagesFriend;
      await this.infoFriend(id);
      this.nameFriend = this.getNameFriend;
      this.emailFriend = this.getEmailFriend;
      this.avatarFriend = this.getAvatarFriend;
      this.idFriend = this.getIdFriend;
      this.scrollToEnd();
    },
    scrollToEnd: function() {
      const el = this.$refs.type_msg;

      if (el) {
        // Use el.scrollIntoView() to instantly scroll to the element
        el.scrollIntoView({behavior: 'smooth'});
      }
    },
    closeMsg() {
      this.displayUsers = !this.displayUsers;
    },
    async sendMessage() {
      const data = {
        'to_id': this.idFriend,
        'message': this.message
      };
      await this.addMessage(data);
      this.message = '';
      this.scrollToEnd();
    },
  },
  async created() {
    await this.listFriend();
    this.users = this.listFriends;
    await this.userProfile();
    this.id = this.getId;
    window.Echo.channel('presence-chat')
      .listen('MessageSent', (e) => {
        this.messages.push(e.message);
      });
  }

}
</script>
<style lang="scss">
.user-friend {
  .if-user-friend {
    display: flex;

    img {
      margin-right: 10px;
    }
  }
}

.search-friend {
  position: relative;

  .search-user-chat {
    position: absolute;
    top: 6px;
    right: 12px;
  }
}

.status-friend {
  font-size: 10px;
}

.online_icon {
  position: absolute;
  height: 15px;
  width: 15px;
  background-color: #4cd137;
  border-radius: 50%;
  bottom: 0.2em;
  right: 0.4em;
  border: 1.5px solid white;
}

.offline {
  background-color: #c23616 !important;
}

.img-onoff {
  position: relative;
}

.detail-chat {
  display: flex;
  justify-content: space-between;
}

.detail-chat-left {
  display: flex;
}

.camera-call {
  margin: 0 20px;

  i {
    font-size: 20px;
    margin: 0 20px;
  }
}

.detail-chat-name {
  margin-left: 10px;
}

.fa-ellipsis-v {
  font-size: 15px;
}

.content-text-user {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  margin-bottom: 1.5rem;
  position: relative;

  .msg_cotainer {
    margin-left: 10px;
    border-radius: 25px;
    background-color: #82ccdd;
    padding: 10px;
  }

  .msg_time {
    position: absolute;
    top: 41px;
    left: 53px;
    font-size: 10px;
  }
}

.content-text-user-send {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  margin-bottom: 1.5rem;
  position: relative;

  .msg_cotainer-send {
    margin-left: 10px;
    border-radius: 25px;
    background-color: #78e08f;
    padding: 10px;
  }

  .msg_time {
    position: absolute;
    top: 41px;
    right: 43px;
    font-size: 10px;
  }

  .msg_card_body {
    overflow-y: auto;
  }

}

.card-footer {
  position: relative;
}

.send_btn {
  cursor: pointer;
  position: absolute;
  top: 24px;
  right: 35px;

  i {
    font-size: 17px;
  }
}

.img-onoff {
  display: flex;
  align-items: center;

  .fa-chevron-left {
    font-size: 15px;
    margin-right: 5px;
    display: none;
  }
}

.click-user-friend {
  cursor: pointer;
}
.list-msg-chat {
  display: none;
}
.display-list-msg-chat {
  display: block !important;
}
@media only screen and (max-width: 600px) {
  .fa-chevron-left {
    display: block !important;
  }
  .list-msg-chat {
    display: block;
  }
  .list-user-chat {
    display: none;
  }
  .display-users {
    display: block !important;
  }
  .list-msg-chat {
    display: none;
  }
}
</style>
