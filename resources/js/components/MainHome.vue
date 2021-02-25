<template>
  <div class="wrapper">
    <!-- Navbar -->
    <Navbar />

    <!-- Sidebar -->
    <right-sidebar />

    <!-- This view mounts page components in here -->
    <router-view :key="$route.fullPath" />

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script>
import Navbar from './layout/Navbar';
import AppHome from './layout/AppHome';
import Footer from './layout/Footer';
import AdminHome from './admin/AdminHome';
import Notifications from './notifications/Notifications';
import RightSidebar from './layout/RightSidebar';

export default {
  name: 'Mainhome',
  metaInfo() {
    return {
      title: 'Blog Home Page',
      meta: [
        {
          vmid: 'description',
          name: 'description',
          content:
            'Open Source, Laravel, .NET Core, Javascript, React, Vue, SQL, Full Stack',
        },
      ],
    };
  },
  components: {
    Navbar,
    AppHome,
    Footer,
    AdminHome,
    Notifications,
    RightSidebar,
  },
  data() {
    return {};
  },
};
</script>

<style scoped>
</style>
