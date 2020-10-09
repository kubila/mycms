<template>
  <div class="col-auto">
    <div class="admin-card mt-2">
      <!-- <admin-table
        :items="adminPosts"
        :per-page="perPage"
        :current-page="currentPage"
        :totalRows="adminPostPaginator"
      /> -->
      <b-table
        id="my-table"
        :items="adminPosts"
        :per-page="perPage"
        :current-page="currentPage"
        small
      ></b-table>
    </div>
    <div class="overflow-auto">
      <b-pagination
        v-model="currentPage"
        :total-rows="adminPostPaginator"
        :per-page="perPage"
        aria-controls="my-table"
      ></b-pagination>
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
  data() {
    return {
      perPage: 2,
      currentPage: 1
    };
  },
  created() {
    this.$store.dispatch('post/fetchPosts');
  },
  computed: {
    ...mapState('post', ['posts']),
    adminPosts() {
      const orderedPosts = _.orderBy(this.posts, ['id'], 'desc');
      return orderedPosts;
    },
    adminPostPaginator() {
      return this.posts.length;
    }
  }
};
</script>

<style lang="scss" scoped></style>
