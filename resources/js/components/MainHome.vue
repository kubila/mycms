<template>
  <div class="wrapper">
    <Navbar />
    <router-view :key="$route.fullPath" />
    <Footer />
  </div>
</template>

<script>
import Navbar from './layout/Navbar';
import AppHome from './layout/AppHome';
import Footer from './layout/Footer';
import AdminHome from './admin/AdminHome';
import { mapState } from 'vuex';
export default {
  components: {
    Navbar,
    AppHome,
    Footer,
    AdminHome
  },
  data() {
    return {};
  }
};
</script>

<style scoped></style>
