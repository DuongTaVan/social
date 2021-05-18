<template>
  <div>

    <router-view/>
    <a class="back_to_top" @click="scrollTop" v-show="visible">
      <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </a>

  </div>

</template>

<script>
export default {
  data() {
    return {
      visible: false
    }
  },
  methods: {
    scrollTop: function () {
      this.intervalId = setInterval(() => {
        if (window.pageYOffset === 0) {
          clearInterval(this.intervalId)
        }
        window.scroll(0, window.pageYOffset - 50)
      }, 20)
    },
    scrollListener: function () {
      this.visible = window.scrollY > 150
    }
  },
  mounted: function () {
    window.addEventListener('scroll', this.scrollListener)
  },
};

</script>
<style lang="scss">
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');

* {
  margin: 0;
  font-family: "Lato", Arial, sans-serif;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  text-align: left;
  background-color: #fff;
  padding: 0;
  margin: 0;
}

.back_to_top {
  position: fixed;
  z-index: 6;
  top: 85%;
  right: 10px;
  background-color: #e44d3a;
  padding: 10px;
  color: #fff;
  width: 50px;
  text-align: center;
  border-radius: 3px;
  height: 50px;

  i {
    font-size: 30px;
    background: #e44d3a;
    color: #fff;
  }
}

.back_to_top:hover {
  text-decoration: none;
  cursor: pointer;
  background-color: #e23f2b;
  transition: 0.2s;

  i {
    background: #e23f2b;
    color: #fff;
  }
}
</style>
