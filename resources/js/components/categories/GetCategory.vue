<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-8 mt-2">
        <div v-if="isLoading">Loading...</div>
        <div v-else-if="!isLoading">
          <div v-if="calculateCount">
            <p class="lead">Posts found: {{ calculateCount }}</p>
          </div>
          <category-posts v-for="post in Posts" :key="post.id" :post="post" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CategoryPosts from './CategoryPosts';
import { mapState } from 'vuex';
export default {
  data() {
    return {
      isLoading: true,
      count: 0
    };
  },
  methods: {
    async getPosts() {
      const category = this.$attrs.name;
      await this.$store
        .dispatch('fetchCategoryPosts', category)
        .then((this.isLoading = false));
    }
  },
  created() {
    this.getPosts();
  },
  components: {
    CategoryPosts
  },
  computed: {
    ...mapState(['category']),
    Posts() {
      const allOfThem = this.category;
      return allOfThem;
    },
    calculateCount() {
      return (this.count = this.category.length);
    }
  }
};
</script>

<style scoped></style>
