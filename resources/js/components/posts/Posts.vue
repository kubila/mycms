<template>
  <div class="container-fluid inner-wrapper">
    <div class="row">
      <admin-card />
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import AdminCard from '../admin/AdminCard';

export default {
  components: {
    AdminCard
  }
};
</script>

<style lang="scss" scoped></style>
