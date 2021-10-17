<template>
  <div>
    <Header></Header>
    <div class="main">
      <div class="container">
        <audio
          :src="require(`../../assets/SMSIPhoneRingtone.mp3`)"
          id="audio"
        >
        </audio>
        <div class="row">
          <div class="col-12 col-md-4 col-lg-4">
            <div class="card card-st" :class="{'card-hidden': !displayOp}">
              <div class="card-body op-mess-on" id="nav-tab" role="tablist">
                <div class="message" :class="{'active': activeOp}" @click="setActiveOp">Message</div>
                <div class="user-online" :class="{'active': !activeOp}" @click="setActiveOp">User Online
                  ({{ countUserOnline }})
                </div>
              </div>
              <div class="list-user-chat" :class="{'display-users' : displayUsers,  'list-user-chat-hidden': activeOp}">
                <div class="card-body">
                  <div class="search-friend form-group">
                    <input class="form-control" type="text" @keyup="searchUserChat" v-model="search"
                           placeholder="Search ...">
                    <span class="search-user-chat"><i class="fa fa-search" aria-hidden="true"></i></span>
                  </div>
                </div>
                <div class="card-body" v-for="user in users" :key="user.id">
                  <div class="user-friend">
                    <div class="if-user-friend click-user-friend" @click="getMessageFriend(user.id)">
                      <div class="img-onoff">
                        <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                             v-if="user.avatar == null">
                        <img :src="user.urlAvatar" alt="" v-else>
                        <span class="offline" :class="{'online_icon': checkOffline(user.id)}"></span>
                      </div>
                      <div class="name-on">
                        <h5>{{ user.name }}</h5>
                        <span class="status-friend" v-if="checkOffline(user.id)">Online</span>
                        <span class="status-friend" v-else>Offline</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="user-online-right" :class="{'user-online-right-hidden': !activeOp}">
                <div class="list-user-online">
                  <div class="card-body" v-for="userOnline in usersOnline" :key="userOnline.id"
                       @click="getMessageFriend(userOnline.id)">
                    <div class="user-stt" v-if="checkUserFriend(userOnline.id)">
                      <div class="img-onoff">
                        <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                             v-if="userOnline.avatar == null">
                        <img :src="userOnline.urlAvatar" alt="" v-else>
                        <span class="online_icon"></span>
                      </div>
                      <div class="name-on">
                        <h5>{{ userOnline.name }}</h5>
                        <span class="status-friend">Online</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-8 col-lg-8">
            <div class="card list-msg-chat" :class="{'display-list-msg-chat': !displayUsers}">
              <div class="card-body option-chat">
                <div class="detail-chat">
                  <div class="detail-chat-left">
                    <div class="img-onoff">
                      <i class="fa fa-chevron-left" aria-hidden="true" @click="closeMsg"></i>
                      <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                           v-if="avatarFriend == 'http://localhost:8000/storage'">
                      <img :src="avatarFriend" alt="" v-else>
                      <span class="offline" :class="{'online_icon': checkOffline(idFriend)}"></span>
                    </div>
                    <div class="detail-chat-name">
                      <h5>{{ nameFriend }}</h5>
                      <span class="status-friend">{{ messages.length }} message</span>
                    </div>
                    <div class="camera-call">
                      <i class="fa fa-video-camera" aria-hidden="true" @click="sendVideo"></i>
                      <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                  </div>
                  <div class="detail-chat-right">
                    <p class="dot-user-profile" href="" @click="Profile"><i class="fa fa-ellipsis-v"
                                                                            aria-hidden="true"></i></p>
                    <router-link :to="/page/+idFriend" tag="a" class="pr-f" :class="{'pr-f-display' : displayProfile}">
                      Profile
                    </router-link>
                  </div>
                </div>
              </div>
              <div class="card-body msg_card_body">
                <div class="chat-content" v-for="message in messages" :key="message.id">
                  <div class="content-text-user" v-if="message.to_id === id && message.from_id == idFriend">
                    <div class="img-cont-msg">
                      <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                           v-if="message.user_from.avatar == 'http://localhost:8000/storage'">
                      <img :src="message.user_from.urlAvatar" alt="" v-else>
                    </div>
                    <div class="msg_cotainer-send" v-if="message.urlImage != 'http://localhost:8000/storage'">
                      <img class="image-message" :src="message.urlImage" alt="">
                      <span class="msg_time" v-if="message.user_remove != null">by {{ message.user_remove.name }}</span>
                      <span class="msg_time" v-else>{{ message.timeSend }}</span>
                    </div>
                    <div class="msg_cotainer" v-else :class="{'remove-message': message.remove == 1}">
                      {{ message.message }}
                      <span class="msg_time" v-if="message.user_remove != null">by {{ message.user_remove.name }}</span>
                      <span class="msg_time" v-else>{{ message.timeSend }}</span>
                    </div>
                  </div>
                  <div class="content-text-user-send" v-else>
                    <div class="op-message-right">
                      <i class="fa fa-trash-o" :class="{'trash-block-right': trash == message.id}"
                         aria-hidden="true" @click="removeMessage(message.id)"></i>
                      <i class="fa fa-ellipsis-h" aria-hidden="true" @click="checkTrash(message.id)"
                         :class="{'hidden-trash': message.remove == 1}"></i>
                    </div>
                    <div class="image-msg_cotainer-send" v-if="message.urlImage != 'http://localhost:8000/storage'">
                      <img class="image-message" :src="message.urlImage" alt="">
                      <span class="msg_time" v-if="message.user_remove != null">by {{ message.user_remove.name }}</span>
                      <span class="msg_time" v-else>{{ message.timeSend }}</span>
                    </div>
                    <div class="msg_cotainer-send" v-else :class="{'remove-message': message.remove == 1}">
                      {{ message.message }}
                      <span class="msg_time" v-if="message.user_remove != null">by {{ message.user_remove.name }}</span>
                      <span class="msg_time" v-else>{{ message.timeSend }}</span>
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
                  <textarea name="" ref="type_msg" class="form-control" placeholder="Type your message..."
                            v-model="message"></textarea>
                </div>
                <input id="input-file" type="file" @change="sendImage">
                <label for="input-file" class="attach-file" @click="inputFile">
                  <i class="fa fa-paperclip" aria-hidden="true"></i>
                </label>
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
      trash: '',
      displayOp: true,
      offline: false,
      users: [],
      activeOp: true,
      displayProfile: false,
      displayUsers: true,
      messages: [],
      id: '',
      idFriend: '',
      nameFriend: '',
      emailFriend: '',
      avatarFriend: '',
      message: '',
      name: '',
      search: '',
      usersOnline: [],
      listUserFriend: [],
      file: "@/assets/SMSIPhoneRingtone.mp3",
    }
  },
  computed: {
    ...mapGetters(['listFriends', 'listUserSearch', 'getMessagesFriend', 'getNameUser', 'getId', 'getNameFriend', 'getEmailFriend', 'getAvatarFriend', 'getIdFriend']),
    countUserOnline() {
      let countOnline = 0;
      for (let i = 0; i < this.usersOnline.length; i++) {
        let dataListFriend = this.listUserFriend.filter((item) => {
          return item.id === this.usersOnline[i].id;
        })
        if (dataListFriend.length > 0) countOnline++;
      }
      return countOnline;
    }
  },
  methods: {
    ...mapActions(['listFriend', 'getMessages', 'infoFriend', 'addMessage', 'userProfile', 'getFriendsChat', 'SearchUsers', 'removeMessages']),
    async getMessageFriend(id) {
      this.displayUsers = false;
      this.displayOp = false;
      await this.getMessages(id);
      this.messages = this.getMessagesFriend;
      await this.infoFriend(id);
      this.nameFriend = this.getNameFriend;
      this.emailFriend = this.getEmailFriend;
      this.avatarFriend = this.getAvatarFriend;
      await Echo.leave('presence-chat.' + this.id + '.' + this.idFriend);
      this.idFriend = this.getIdFriend;
      await this.scrollToEnd();
      await Echo.channel('presence-chat.' + this.id + '.' + this.idFriend)
        .listen('MessageSent', async (e) => {
          console.log(112233)
          const checkMessage = this.messages.filter((item, index) => {
            if (item.id == e.message.id) {
              this.messages[index] = e.message
            }
            return item.id == e.message.id;
          })
          if (checkMessage.length == 0) {
            document.getElementById('audio').play();
            await this.messages.push(e.message);
            await this.getFriendsChat();
            this.users = this.listFriends;
            this.$refs.type_msg.scrollIntoView({behavior: 'smooth'});
          }
        })
    },
    setActiveOp() {
      this.activeOp = !this.activeOp
    },
    async removeMessage(id) {
      await this.removeMessages(id);
      await this.getMessages(this.idFriend);
      this.messages = this.getMessagesFriend;
      this.trash = ''
    },
    checkTrash(id) {
      if (this.trash == id) {
        this.trash = '';
      } else
        this.trash = id
    },
    Profile() {
      this.displayProfile = !this.displayProfile;
    },
    checkOffline(id) {
      let arrOffline = this.usersOnline.filter((item) => {
        return item.id === id;
      })
      return arrOffline.length > 0;
    },
    async sendImage(e) {
      const file = e.target.files[0];
      const data = {
        'to_id': this.idFriend,
        'image': file
      };
      const formData = new FormData();
      for (let key in data) {
        formData.append(key, data[key]);
      }
      await this.addMessage(formData);
      await this.getMessages(this.idFriend);
      this.messages = this.getMessagesFriend;
      await this.getFriendsChat();
      this.users = this.listFriends;
      await this.scrollToEnd();
    },
    checkUserFriend(id) {
      let arrOffline = this.listUserFriend.filter((item) => {
        return item.id === id;
      })
      return arrOffline.length > 0;
    },
    async searchUserChat() {
      if (this.search == '') {
        await this.getFriendsChat();
        this.users = this.listFriends;
      } else {
        await this.SearchUsers(this.search);
        this.users = this.listUserSearch;
      }
    },
    scrollToEnd: function () {
      const el = this.$refs.type_msg;

      if (el) {
        // Use el.scrollIntoView() to instantly scroll to the element
        el.scrollIntoView({behavior: 'smooth'});
      }
    },
    closeMsg() {
      this.displayUsers = !this.displayUsers;
      this.displayOp = !this.displayOp;
    },
    async sendMessage() {
      if (this.message != '') {
        const data = {
          'to_id': this.idFriend,
          'message': this.message
        };
        await this.addMessage(data);
        this.message = '';
        this.image = '';
        await this.getMessages(this.idFriend);
        this.messages = this.getMessagesFriend;
        await this.getFriendsChat();
        this.users = this.listFriends;
        await this.scrollToEnd();
      } else {
        alert('message is not null !')
      }

    },
    async sendVideo(){
      this.$router.push('/video-call/'+ this.idFriend)
    }
  },
  watch: {
    usersOnline: function () {

    }
  },
  async created() {
    await this.listFriend();
    this.listUserFriend = this.listFriends;
    await this.getFriendsChat();
    this.users = this.listFriends;
    await this.userProfile();
    this.id = this.getId;
    await Echo.join('onlineUser')
      .here((users) => {
        this.usersOnline = users.filter((u) => {
          return u.id != this.id
        });
      })
      .joining((user) => {
        return this.usersOnline.push(user);
      })
      .leaving((user) => {
        this.usersOnline = this.usersOnline.filter((u) => {
          return u.id != user.id
        });
      });
  },

}
</script>
<style lang="scss" scoped>
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

#input-file {
  display: none;
}

.online_icon {
  background-color: #4cd137 !important;
  position: absolute;
  height: 15px;
  width: 15px;
  border-radius: 50%;
  bottom: 0.2em;
  right: 0.4em;
  border: 1.5px solid white;
}

.card-st {
  position: sticky;
  top: 64px;
}

.offline {
  background-color: #c23616;
  position: absolute;
  height: 15px;
  width: 15px;
  border-radius: 50%;
  bottom: 0.2em;
  right: 0.4em;
  border: 1.5px solid white;
}

.img-onoff {
  position: relative;

  img {
    margin-right: 10px;
  }
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
    cursor: pointer;
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
    margin-left: 2px;
    border-radius: 25px;
    background-color: #82ccdd;
    padding: 10px;
  }

  .msg_time {
    position: absolute;
    bottom: -16px;
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
    margin-right: 2px;
    border-radius: 25px;
    background-color: #78e08f;
    padding: 10px;
  }

  .msg_time {
    position: absolute;
    bottom: -16px;
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

.list-user-chat {
  display: none;
}

.list-user-chat-hidden {
  display: block !important;
}

.option-chat {
  position: sticky;
  top: 51px;
  z-index: 1;
  border-bottom: 1px solid #fbf0f0;
  background-color: #fbfbfb;
}

.user-online-right-hidden {
  display: block !important;
}

.detail-chat-right {
  position: relative;

  .pr-f {
    position: absolute;
    left: -47px;
    top: 0;
    display: none;
    color: #111;
    text-decoration: none;
  }

  .pr-f-display {
    display: block !important;
  }
}

.dot-user-profile {
  cursor: pointer;
}

.fa-trash-o {
  display: none;
  font-size: 15px;
}

.trash-block-left, .trash-block-right {
  display: block !important;
}

.op-mess-on {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 10px;

  .message, .user-online {
    cursor: pointer;
    font-size: 15px;
  }

  .active {
    border-bottom: 2px solid #e44d3a;
  }
}

.user-stt {
  display: flex;
  cursor: pointer;
}

.user-online-right {
  display: none;
}

.attach-file {
  position: absolute;
  top: 24px;
  right: 59px;
  cursor: pointer;

  i {
    font-size: 17px;
  }
}

.image-message {
  width: 100% !important;
  height: unset;
  border-radius: unset;
  border: unset;
}

.op-message-left {
  position: relative;

  i {
    margin-left: 3px;
    color: #917b6e;
  }

  p {
    position: absolute;
    top: -1px;
    right: -34px;
  }
}

.op-message-right {
  i {
    margin-right: 3px;
    color: #917b6e;
  }
}

.fa-ellipsis-h {
  cursor: pointer;
  font-size: 15px;
}

.remove-message {
  background-color: #e88d83 !important;
  color: #fff;

  .msg_time {
    color: #111;
  }
}

.hidden-trash {
  display: none !important;
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
  .list-msg-chat {
    display: none;
  }
  .option-chat {
    top: 50px;
  }
  .card-hidden {
    display: none;
  }
}

</style>
