<template>
  <div class="inner-wrapper">
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
    <!-- container -->
    <div class="container" v-if="!isLoading">
      <div class="row mt-3">
        <home-card v-for="card in featured" :card="card" :key="card.id" />
        <Paginator
          v-model:first="first"
          :rows="rows"
          :totalRecords="featured.length"
        >
        </Paginator>
      </div>
    </div>
    <!-- <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-8">
              <div class="row">
                <home-card
                  v-for="card in featured"
                  :card="card"
                  :key="card.id"
                />
              </div>
            </div>

            <div class="col-sm-4">
              <div class="sidebar">
                <h5 class="lead d-flex justify-content-center pt-2">
                  <category-sidebar />
                </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <div class="container-fluid" v-if="!isLoading">
      <main role="main mt-3">
        <div class="row mb-2">
          <div class="col-lg-7">
            <home-post v-for="post in cards" :key="post.id" :post="post" />
          </div>
          <!-- News Corner -->
          <aside class="col-lg-5 px-3">
            <div class="sidebar">
              <h5 class="lead d-flex justify-content-center pt-2">
                News Corner
              </h5>
              <News />
            </div>
          </aside>
        </div>
      </main>
    </div>

    <div
      v-else-if="isLoading"
      style="display:flex; justify-content:center; margin-top: 30vh;"
    >
      <ProgressSpinner
        style="width:140px; height: 140px;"
        animationDuration="1s"
      />
    </div>
    <!-- container -->
  </div>
  <!-- inner wrapper -->
  <!-- <div v-else style="display:flex; justify-content:center; margin-top: 30vh;"> -->
</template>

<script>
import Vue from 'vue';
import HomeCard from '../posts/HomeCard';
import HomePost from '../posts/HomePost';
import News from '../news/News';

import { mapState } from 'vuex';
import _ from 'lodash';

export default {
  data() {
    return {
      isLoading: true,
      first: 0,
      rows: 2
    };
  },
  components: {
    HomePost,
    HomeCard,
    News
  },
  async created() {
    await this.$store.dispatch('post/fetchPosts');
    this.isLoading = false;
  },
  computed: {
    ...mapState('post', ['posts']),
    featured() {
      const fas = _.chain(this.posts)
        .sampleSize(6)
        .orderBy(['id'], ['desc'])
        .value();
      return fas;
    },
    cards() {
      const card = _.sampleSize(this.posts, 10);
      return card;
    }
  }
};
</script>
<style></style>
