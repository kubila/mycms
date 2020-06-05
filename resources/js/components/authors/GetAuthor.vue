<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-8 mt-2">
        <div v-if="isLoading">Loading...</div>
        <div v-else-if="!isLoading">
          <div v-if="authorCount" class="lead">
            Posts found: {{ authorCount }}
          </div>
          <author-posts v-for="post in Posts" :key="post.id" :post="post" />
        </div>
      </div>
      <div class="col-sm-4 mt-2">
        <div v-if="isAuthorLoading">Loading...</div>
        {{ author }}
      </div>
    </div>
  </div>
</template>

<script>
import AuthorPosts from './AuthorPosts';
import { mapState } from 'vuex';
export default {
  data() {
    return {
      isLoading: true,
      isAuthorLoading: true,
      count: 0
    };
  },
  methods: {
    async getAuthorPosts() {
      const author = this.$attrs.name;
      await this.$store
        .dispatch('fetchAuthorPosts', author)
        .then((this.isLoading = false));
    },
    async getAuthor() {
      const author = this.$attrs.name;
      this.$store
        .dispatch('fetchAuthor', author)
        .then((this.isAuthorLoading = false));
    }
  },
  created() {
    this.getAuthorPosts();
    this.getAuthor();
  },
  components: {
    AuthorPosts
  },
  computed: {
    ...mapState(['author', 'authorPosts']),
    authorPosts() {
      const allOfThem = this.author;
      return allOfThem;
    },
    authorCount() {
      return (this.count = this.category.length);
    }
  }
};
</script>

<style scoped></style>
