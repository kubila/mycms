<template>
  <div class="inner-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-sm-9 mt-3">
          <div v-if="isLoading">Author posts are loading...</div>
          <div v-else-if="!isLoading">
            <div v-if="authorCount" class="card-main-title">
              Posts found:
              <p class="text-success d-inline-block">{{ authorCount }}</p>
            </div>
            <home-post
              v-for="post in authorArticles"
              :key="post.id"
              :post="post"
            />
            <div v-if="!authorCount" class="card-main-title">
              Couldn't find any post for the author:
              <p class="text-danger d-inline-block">{{ authorCount }}</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 mt-3" style="display:grid; align-content:center;">
          <div v-if="isAuthorLoading">Author is loading...</div>
          <div v-else-if="!isAuthorLoading">
            <Author :authorFound="authorItself" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Author from './Author';
import HomePost from '../posts/HomePost';
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
      const authorName = this.$attrs.name;
      await this.$store
        .dispatch('author/fetchAuthorPosts', authorName)
        .then((this.isLoading = false));
    },
    async getAuthor() {
      const authorName = this.$attrs.name;
      await this.$store
        .dispatch('author/fetchAuthor', authorName)
        .then((this.isAuthorLoading = false));
    }
  },
  created() {
    this.getAuthorPosts();
    this.getAuthor();
  },
  components: {
    Author,
    HomePost
  },
  computed: {
    ...mapState('author', ['authorOne', 'authorPosts']),
    authorArticles() {
      return this.authorPosts;
    },
    authorCount() {
      return (this.count = this.authorPosts.length);
    },
    authorItself() {
      return this.authorOne;
    }
  }
};
</script>

<style scoped></style>
