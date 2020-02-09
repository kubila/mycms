<template>
  <div class="wrapper">
    <Navbar />
    <router-view :key="$route.fullPath" />
    <Footer />
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue';
import AppHome from './components/AppHome.vue';
import Footer from './components/Footer.vue';
import AdminHome from './components/admin/AdminHome.vue';
export default {
  components: {
    Navbar,
    AppHome,
    Footer,
    AdminHome
  }
};
</script>

<style scoped></style>
