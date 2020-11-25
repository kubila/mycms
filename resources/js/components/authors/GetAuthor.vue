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
            <!-- <home-post
              v-for="post in authorArticles"
              :key="post.id"
              :post="post"
            /> -->
            <div v-if="!authorCount" class="card-main-title">
              Couldn't find any post for the author:
              <p class="text-danger d-inline-block">{{ authorCount }}</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 mt-3" style="display: grid; align-content: center">
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
import { mapState } from 'vuex';
import nProgress from 'nprogress';

export default {
  name: 'Getauthor',
  metaInfo() {
    return {
      title: 'Author' + ' - ' + this.$attrs.name,
      meta: [
        {
          vmid: 'description',
          name: 'description',
          content: this.authorOne.description,
        },
      ],
    };
  },
  data() {
    return {
      isLoading: true,
      isAuthorLoading: true,
      count: 0,
    };
  },
  beforeRouteEnter(to, from, next) {
    nProgress.start();
    next();
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
    },
  },
  created() {
    this.getAuthorPosts();
    this.getAuthor();
    //nProgress.done();
  },
  components: {
    Author,
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
    },
  },
};
</script>

<style scoped></style>
