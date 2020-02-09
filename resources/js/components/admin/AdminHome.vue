<template>
  <div class="container-fluid inner-wrapper">
    <div class="row">
      <admin-sidebar></admin-sidebar>
      <admin-card></admin-card>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import AdminCard from './AdminCard.vue';
import AdminSidebar from './AdminSidebar.vue';
export default {
  //computed: mapState(['posts'])
  components: {
    AdminCard,
    AdminSidebar
  }
};
</script>

<style lang="scss" scoped></style>
