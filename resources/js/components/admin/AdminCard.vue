<template>
  <div class="col-md-10">
    <div class="admin-card mt-2">
      <admin-table :posts="adminPosts" />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import AdminTable from './AdminTable';
import _ from 'lodash';

export default {
  components: {
    AdminTable
  },
  created() {
    this.$store.dispatch('post/fetchPosts');
  },
  computed: {
    ...mapState('post', ['posts']),
    adminPosts() {
      const orderedPosts = _.orderBy(this.posts, ['id'], 'desc');
      return orderedPosts;
    }
  }
};
</script>

<style lang="scss" scoped></style>
