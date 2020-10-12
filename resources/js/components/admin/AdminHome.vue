<template>
  <div class="container-fluid inner-wrapper">
    <div class="row">
      <!-- <admin-sidebar /> -->

      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import AdminCard from './AdminCard';
import AdminSidebar from './AdminSidebar';

export default {};
</script>

<style lang="scss" scoped></style>
