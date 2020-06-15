<template>
  <div class="inner-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-sm-9 mt-2">
          <div v-if="isLoading">Category posts are loading...</div>
          <div v-else-if="!isLoading">
            <div v-if="calculateCount" class="card-main-title">
              Posts found:
              <p class="text-success d-inline-block">{{ calculateCount }}</p>
            </div>
            <category-posts v-for="post in Posts" :key="post.id" :post="post" />
            <div v-if="!calculateCount" class="card-main-title">
              Couldn't find any post for the category:
              <p class="text-danger d-inline-block">{{ calculateCount }}</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 mt-2">
          <div v-if="isNewsLoading">Category News are loading...</div>
          <div v-else-if="!isNewsLoading" class="card-main-title">
            <div v-if="calculateNews">
              News found:
              <p class="text-success d-inline-block">{{ calculateNews }}</p>
            </div>
            <category-news
              v-for="news in foundNews"
              :news="news"
              :key="news.id"
            />
            <div v-if="!calculateNews">
              No news for the category yet.
              <p class="text-danger d-inline-block">{{ calculateNews }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CategoryPosts from './CategoryPosts';
import CategoryNews from './CategoryNews';
import { mapState } from 'vuex';
export default {
  data() {
    return {
      isLoading: true,
      isNewsLoading: true,
      count: 0,
      newsCount: 0
    };
  },
  methods: {
    // consider using a mixin for this type of requests, news returning the old category news, make it reactive
    async getPosts() {
      const category = this.$attrs.name;
      //await this.$store.dispatch('fetchCategoryNews', category);
      await this.$store
        .dispatch('fetchCategoryPosts', category)

        .then((this.isLoading = false));
      //.then((this.isNewsLoading = false));
    },
    async getNews() {
      const category = this.$attrs.name;
      await this.$store
        .dispatch('fetchCategoryNews', category)
        .then((this.isNewsLoading = false));
    }
  },
  created() {
    this.getPosts();
    this.getNews();
  },
  components: {
    CategoryPosts,
    CategoryNews
  },
  computed: {
    ...mapState(['categoryPosts', 'categoryNews']),
    Posts() {
      return this.categoryPosts;
    },
    foundNews() {
      return this.categoryNews;
    },
    calculateCount() {
      return (this.count = this.categoryPosts.length);
    },
    calculateNews() {
      return (this.newsCount = this.categoryNews.length);
    }
  }
};
</script>

<style scoped></style>
