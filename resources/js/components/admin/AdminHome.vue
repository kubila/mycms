<template>
  <div class="container-fluid inner-wrapper">
    <div class="row">
      <admin-sidebar />
      <div v-if="getUser" class="col-sm-8">
        <h6>Welcome {{ user.name }}</h6>
      </div>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import AdminCard from './AdminCard';
import AdminSidebar from './AdminSidebar';

export default {
  computed: {
    ...mapState(['user']),
    getUser() {
      return this.user;
    }
  },
  components: {
    AdminSidebar
  }
};
</script>

<style lang="scss" scoped></style>
