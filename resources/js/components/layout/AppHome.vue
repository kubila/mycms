<template>
  <div v-if="!isLoading" class="inner-wrapper">
    <div class="container-fluid">
      <div class="row main">
        <div class="col main-image img-fluid">
          <div class="main-top text-center">
            <h2 class="text-white">Welcome to my blog</h2>
            <p class="lead">
              You will find posts about programming, nature, books and more in
              this blog.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row mt-3">
        <home-card v-for="card in featured" :card="card" :key="card.id" />
      </div>

      <main role="main mt-3">
        <div class="row mb-2">
          <div class="col-lg-8 p-0">
            <home-post v-for="post in cards" :key="post.id" :post="post" />
          </div>
          <aside class="col-lg-4 px-3">
            <div class="sidebar">
              <h5 class="lead d-flex justify-content-center pt-2">
                <News />
              </h5>
            </div>
          </aside>
        </div>
      </main>
    </div>
    <!-- container -->
  </div>
  <div v-else class="inner-wrapper">Loading...</div>
</template>

<script>
import HomeCard from '../posts/HomeCard';
import HomePost from '../posts/HomePost';
import News from '../news/News';

import { mapState } from 'vuex';
import _ from 'lodash';

export default {
  data() {
    return {
      isLoading: true
    };
  },
  components: {
    HomePost,
    HomeCard,
    News
  },
  async created() {
    await this.$store.dispatch('fetchPosts');
    this.isLoading = false;
  },
  computed: {
    ...mapState(['posts']),
    featured() {
      const fas = _.sampleSize(this.posts, 6);
      return fas;
    },
    cards() {
      const card = _.sampleSize(this.posts, 5);
      return card;
    }
  }
};
</script>
<style></style>
