<template>
  <div>
    <Header></Header>
    <section class="main">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-3 col-lg-3">
            <div class="card profile">
              <ul class="list-group list-group-flush">
                <li class="list-group-item text-center">
                  <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                       v-if="avatarUser == 'http://localhost:8000/storage'">
                  <img :src="avatarUser" alt="" v-else>
                  <h2 class="text-center">{{ name }}</h2>
                  <p class="text-center">{{ email }}</p></li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-6">
            <div class="card post-status">
              <form class="card-header" @submit.prevent="addPostStatus">
                <div class="form-group">

                  <textarea class="form-control" v-model="post" rows="5"></textarea>

                </div>
                <button class="btn btn-primary">Post status</button>
              </form>
            </div>
            <div class="card post mt-3" v-for="item in posts.data" :key="item.id">
              <div class="card-body info-user-post">
                <div class="op_user">
                  <div class="user-post">
                    <img src="https://img.icons8.com/cotton/2x/user-male.png" alt=""
                         v-if="avatarUser == 'http://localhost:8000/storage'">
                    <img :src="avatarUser" alt="" v-else>
                    <div class="user-post-if">
                      <h4>{{ name }}</h4>
                      <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{ item.timePost }}
                      </p>
                    </div>

                  </div>
                  <div class="option"><i @click="postOption(item.id)"
                                         class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    <ul class="post_option" :class="{'edit_delete' : isEdit === item.id}">
                      <li @click="editPost(item.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></li>
                      <li @click="deletePost(item.id)"><i class="fa fa-trash" aria-hidden="true"></i></li>
                    </ul>
                  </div>
                </div>
                <pre>{{ item.content }}</pre>
                <div class="card-body" v-if="item.share_post">
                  <div class="post mt-3">
                    <div class="card-body info-user-post">
                      <div class="user-post">
                        <img src="https://img.icons8.com/cotton/2x/user-male.png" alt="" v-if="item.share_post.user.avatar == null">
                        <img :src="item.share_post.user.urlAvatar" alt="" v-else>
                        <div class="user-post-if"><h4>{{ item.share_post.user.name }}</h4>
                          <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                            {{ item.share_post.timePost }}</p></div>
                      </div>
                      <pre>{{ item.share_post.content }}</pre>
                    </div>
                  </div>
                </div>
                <div class="cmt">
                  <div class="like">
                    <p href="#" @click="addLikePost(item.id)"><i
                      :class="{ 'fa fa-heart': true, 'like-active': checkLikePost(item.id) }"
                      aria-hidden="true">Like</i> {{ item.like_count }}</p>
                  </div>
                  <div class="comment">
                    <p href="#" @click="addClassComment(item.id)"><i class="fa fa-comments"
                                                                     aria-hidden="true">Comment</i>
                      {{ item.comment_count }}</p>
                  </div>
                  <div class="share">
                    <p href="#"><i class="fa fa-share" aria-hidden="true"
                                   @click="sharePost(item.id)">Share</i>
                      {{ item.count_user_count }}</p>
                  </div>
                </div>
                <div class="user-comment" :class="{displayUserComment: commentActive === item.id}">
                  <div class="if-user-comment" v-for="comment in comments" :key="comment.id">
                    <div class="user-info-cmt">
                      <div class="if-user">
                        <img src="https://img.icons8.com/cotton/2x/user-male.png" alt="" v-if="comment.user.avatar == null">
                        <img class="img-user-comment"
                             :src="comment.user.urlAvatar"
                             alt="" v-else>
                        <div class="name-user-comment">{{ comment.user.name }}</div>
                      </div>
                      <div class="remove-cmtt" @click="removeCmt(comment.id, item.id)">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="cmt-ac">
                      <pre class="content-comment">{{ comment.content }}</pre>
                      <div class="sub_cmt">
                        <div class="like">
                          <p href="#" @click="addLikeCmt(comment.id, item.id)"><i
                            :class="{ 'fa fa-heart': true, 'like-active': checkLikeComment(comment.id) }"
                            aria-hidden="true">Like {{ comment.like_comment_count }}</i></p>
                        </div>
                        <div class="comment">
                          <p href="#"><i
                            class="fa fa-comments"
                            aria-hidden="true" @click="addClassRepComment(comment.id, item.id)">Rep
                            {{ comment.rep_comment_count }}</i></p>
                        </div>
                      </div>
                      <div class="rep-cmt">
                        <div class="user-rep-comment" :class="{displayUserRepComment: repCommentActive === comment.id}">
                          <div class="if-user-comment" v-for="rep_cm in comment.rep_comment" :key="rep_cm.id">
                            <div class="user-info-cmt">
                              <div class="if-user">
                                <img src="https://img.icons8.com/cotton/2x/user-male.png" alt="" v-if="rep_cm.user.avatar == null">
                                <img class="img-user-comment"
                                     :src="rep_cm.user.urlAvatar"
                                     alt="" v-else>
                                <div class="name-user-comment">{{ rep_cm.user.name }}</div>
                              </div>
                              <div class="remove-cmtt" @click="removeCmt(rep_cm.id, item.id)">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                              </div>
                            </div>
                            <div class="cmt-ac">
                              <pre class="content-comment">{{ rep_cm.content }}</pre>
                              <div class="sub_cmt">
                                <div class="like">
                                  <p href="#" @click="addLikeCmt(rep_cm.id, item.id)"><i
                                    :class="{ 'fa fa-heart': true, 'like-active': checkLikeComment(rep_cm.id) }"
                                    aria-hidden="true">Like {{ rep_cm.like_comment_count }}</i></p>
                                </div>
                              </div>
                            </div>
                            <hr>
                          </div>
                          <form @submit.prevent="addRepCommentPost(item.id, comment.id)">
                            <div class="form-group">
                                            <textarea class="form-control" rows="1" v-model="repcmt"
                                                      placeholder="Write something.."></textarea>
                              <button class="btn btn-warning">submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <hr>
                  </div>

                  <form @submit.prevent="addCommentPost(item.id)">
                    <div class="form-group">
                                            <textarea class="form-control" id="subject" name="subject"
                                                      placeholder="Write something.." v-model="writeComment"></textarea>
                      <button class="btn btn-primary">submit</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
            <div class="paginate mt-3">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" @click="pervious(posts.links.prev)"
                       aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>

                  <li class="page-item">
                    <a class="page-link" href="#" @click="nextPage(posts.links.next)"
                       aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-12 col-md-3 col-lg-3">
            <h4>List Friend</h4>
            <div class="card profile">
              <div class="card-body" v-for="friend in friends" :key="friend.id">
                <div class="list-friend">
                  <span>
                    <img src="https://img.icons8.com/cotton/2x/user-male.png" alt="" v-if="friend.avatar == null">
                    <img style="width: 40px"
                         :src="friend.urlAvatar"
                         alt="" v-else>
                  </span>
                  <div class="friend-if">
                    <h5>{{ friend.name }}</h5>
                    <p>{{ friend.email }}</p>
                  </div>
                </div>
                <div class="op-friend">
                  <router-link tag="a" class="view-more-friend" :to="/page/+friend.id"
                               @click="postFriend(friend.id)">view more
                  </router-link>
                  <div class="friend-if">
                    <a class="view-more-friend" href="#"
                       @click="addBlock(friend.id)">block</a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <transition name="modal">
      <div v-if="isOpen">
        <div class="overlay" @click.self="isOpen = false;">
          <div class="modal-popup">
            <div class="card post-status">
              <form class="card-header" @submit.prevent="addSharePostStatus">
                <div class="form-group">
                                    <textarea class="form-control" v-model="shareStatus" rows="5">
                                    </textarea>
                  <div class="card post mt-3">
                    <div class="card-body info-user-post">
                      <div class="user-post">
                        <img src="https://img.icons8.com/cotton/2x/user-male.png" alt="" v-if="postShare.user.avatar == null">
                        <img :src="postShare.user.urlAvatar" alt="">
                        <div class="user-post-if"><h4>{{ name }}</h4>
                          <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                            {{ postShare.timePost }}</p></div>
                      </div>
                      <pre>{{ postShare.content }}</pre>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary">Post status</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </transition>
    <transition name="modal">
      <div v-if="editOpen">
        <div class="overlay" @click.self="editOpen = false;">
          <div class="modal-popup">
            <div class="card post-status">
              <form class="card-header" @submit.prevent="postUpdate">
                <div class="form-group">
                                    <textarea class="form-control" v-model="contentPost" rows="5">
                                    </textarea>
                </div>
                <button class="btn btn-primary">Update status</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </transition>
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
      isEdit: '',
      isOpen: false,
      editOpen: false,
      contentPost: '',
      repcmt: '',
      commentActive: '',
      repCommentActive: '',
      cssLg: {
        backgroundImage: `url(${require('@/assets/header/logo.png')})`
      },
      userLg: {
        backgroundImage: `url(${require('@/assets/header/user.png')})`
      },

      post: "",
      avatarUser: '',
      posts: [],
      friends: [],
      name: '',
      email: '',
      comments: [],
      writeComment: '',
      likes: [],
      likesComment: [],
      postShare: [],
      shareStatus: '',
      postDetail: []
    }
  },
  computed: {
    // mix the getters into computed with object spread operator
    ...mapGetters([
      'listData', 'listFriends', 'listComments', 'listLikes', 'detailPosts', 'getNameUser', 'getEmailUser', 'getMessage', 'listLikesComment', 'getAvatar'
    ])
  },
  methods: {
    ...mapActions(["addPost", "listPost", "listFriend", "listComment", "addComment", "listLike", "addLike",
      "addUserBlock", "detailPost", "addsharePost", "pagePaginate", "removePost", "updatePost", "currentPage", "addLikeComment", "listLikeComment", "removeComment"]),
    async addPostStatus() {
      const post = {
        content: this.post
      };
      if (this.post == '') {
        this.$swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'status cannot be left blank !',
        })
      } else {
        await this.addPost(post);
        await this.listPost();
        this.posts = this.listData;
        this.post = '';
      }
    },
    async removeCmt(id, id_post) {
      this.$swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(async (result) => {
        if (result.isConfirmed) {
          this.$swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          ),
            await this.removeComment(id);
          let page = this.posts.meta.current_page;
          if (page != 1) {
            await this.currentPage(page);
            this.posts = this.listData;
          } else {
            await this.listPost();
            this.posts = this.listData;
          }
          await this.listComment(id_post);
          this.comments = this.listComments
        }
      })
    },
    async addClassRepComment(id, post_id) {
      if (this.repCommentActive == '') {
        await this.listComment(post_id);
        this.comments = this.listComments;
        this.repCommentActive = id;
      } else
        this.repCommentActive = '';
    },
    checkLikePost(id) {
      let arrLike = this.likes.filter((item) => {
        return item.post_id === id;
      })
      return arrLike.length > 0;
    },
    checkLikeComment(id) {
      let arrLike = this.likesComment.filter((item) => {
        return item.comment_id === id;
      })
      return arrLike.length > 0;
    },
    async addLikePost(id) {
      let page = this.posts.meta.current_page;
      await this.addLike(id);
      await this.listLike();
      this.likes = this.listLikes;
      if (page != 1) {
        await this.currentPage(page);
        this.posts = this.listData;
      } else {
        await this.listPost();
        this.posts = this.listData;
      }
      await this.checkLikePost(id);
    },

    async addLikeCmt(id, id_post) {
      let page = this.posts.meta.current_page;
      await this.addLikeComment(id);
      await this.listLikeComment();
      this.likesComment = this.listLikesComment;
      if (page != 1) {
        await this.currentPage(page);
        this.posts = this.listData;
      } else {
        await this.listPost();
        this.posts = this.listData;
      }
      await this.listComment(id_post);
      this.comments = this.listComments
      await this.checkLikeComment(id)
    },
    async addClassComment(id) {
      if (this.commentActive == '') {
        await this.listComment(id);
        this.comments = this.listComments;
        this.commentActive = id;
      } else
        this.commentActive = '';
    },
    async addCommentPost(id) {
      if (this.writeComment == '') {
        this.$swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Comments cannot be left blank !',
        })
      } else {
        const data = {
          id: id,
          content: this.writeComment
        }
        let page = this.posts.meta.current_page;
        await this.addComment(data);
        if (page != 1) {
          await this.currentPage(page);
          this.posts = this.listData;
        } else {
          await this.listPost();
          this.posts = this.listData;
        }
        await this.listComment(id);
        this.comments = this.listComments,
          this.writeComment = ''
      }
    },

    async addRepCommentPost(id, comment_id) {
      if (this.repcmt == '') {
        this.$swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Comments cannot be left blank !',
        })
      } else {
        const data = {
          id: id,
          content: this.repcmt,
          comment_id: comment_id
        }
        let page = this.posts.meta.current_page;
        await this.addComment(data);
        if (page != 1) {
          await this.currentPage(page);
          this.posts = this.listData;
        } else {
          await this.listPost();
          this.posts = this.listData;
        }
        await this.listComment(id);
        this.comments = this.listComments,
          this.repcmt = ''
      }
    },
    async addBlock(id_user) {
      const id = {
        block: id_user
      }
      await this.addUserBlock(id);
      await this.listFriend();
      this.friends = this.listFriends;
    },
    async editPost(id) {
      this.editOpen = !this.editOpen;
      await this.detailPost(id);
      this.postDetail = this.detailPosts;
    },
    async sharePost(id) {
      this.isOpen = !this.isOpen;
      await this.detailPost(id);
      this.postShare = this.detailPosts
    },
    async addSharePostStatus() {
      if (this.postShare.share_post_id == null) {
        var id = this.postShare.id;
      } else {
        var id = this.postShare.share_post_id;
      }
      const data = {
        id: id,
        content: this.shareStatus
      };
      await this.addsharePost(data);
      this.$swal.fire(
        'Success !',
        this.getMessage,
        'share success !'
      )
      await this.listPost();
      this.posts = this.listData;
      this.isOpen = !this.isOpen;
      this.shareStatus = ''
    },
    async pervious(url) {
      if (url != null) {
        await this.pagePaginate(url.slice(25));
        this.posts = this.listData;
      }
    },
    async nextPage(url) {
      if (url != null) {
        await this.pagePaginate(url.slice(25));
        this.posts = this.listData;
      }
    },
    async postOption(id) {
      if (this.isEdit == '') {
        this.isEdit = id;
      } else
        this.isEdit = '';
    },
    deletePost(id) {
      this.$swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(async (result) => {
        if (result.isConfirmed) {
          this.$swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          ),
            await this.removePost(id);
          await this.listPost();
          this.posts = this.listData;
          this.isEdit = ''
        } else {
          this.isEdit = ''
        }
      })

    },
    async postUpdate() {
      let data = {
        id: this.postDetail.id,
        content: this.contentPost
      };
      this.updatePost(data);
      this.editOpen = !this.editOpen;
      this.contentPost = '';
      this.isEdit = '';
      await this.listPost();
      this.posts = this.listData;
      if (this.getMessage == '') {
        this.$swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'err!',
        })
      } else {
        this.$swal.fire(
          'Success !',
          this.getMessage,
          'success'
        )
      }
    }
  },
  created: async function () {
    await this.listPost();
    this.posts = this.listData;
    await this.listFriend();
    this.friends = this.listFriends;
    await this.listLike();
    this.likes = this.listLikes;
    await this.listLikeComment();
    this.likesComment = this.listLikesComment;
    this.name = this.getNameUser;
    this.email = this.getEmailUser;
    this.avatarUser = this.getAvatar

  }
}
</script>
<style lang="scss">
@import "~../../assets/scss/dashboard.scss";
.displayUserRepComment {
  display: block !important;
}

.user-rep-comment {
  display: none;
}

.rep-cmt {
  margin-left: 22px;
  margin-top: 10px;
}

.user-info-cmt {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.remove-cmtt {
  cursor: pointer;
}
.main{
  img{
    width: 40px !important;
    height: 40px;
    border-radius: 50%;
    border: 1px solid #BADA55;
  }
}
</style>
