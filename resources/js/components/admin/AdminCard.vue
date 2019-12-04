<template>
  <div class="col-md-10">
    <div class="admin-card mt-2">
      <admin-table :posts="posts" />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import AdminTable from './AdminTable.vue';
export default {
  components: {
    AdminTable
  },
  created() {
    this.$store.dispatch('fetchPosts');
  },
  computed: mapState(['posts'])
};
</script>

<style lang="scss" scoped></style>
