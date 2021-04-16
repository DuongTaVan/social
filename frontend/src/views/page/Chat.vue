<template>
  <div>
    <Header></Header>
    <div class="main">
      <div class="container">

        <h3>chat</h3>

      </div>
    </div>
    <Footer></Footer>
  </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex'
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

}
</script>
<style lang="scss">

</style>
