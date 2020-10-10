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
    <!-- container -->
    <!-- <Sidebar :visible.sync="visibleLeft" :modal="false" :dismissable="true">
      <div class="p-sidebar-active">
        <div class="p-3 mt-5 overflow-scroll">
          <nav class="mb-3 ">
            <b-nav vertical>
              <b-nav-item active :to="{ name: 'posts' }">Posts</b-nav-item>
              <b-nav-item active :to="{ name: 'categories' }"
                >Categories</b-nav-item
              >
              <b-nav-item active :to="{ name: 'authors' }">Authors</b-nav-item>
              <b-nav-item
                v-for="category in categories"
                :key="category.id"
                :to="{ name: 'getcategory', params: { name: category.name } }"
              >
                {{ category.name }}
              </b-nav-item>
            </b-nav>
          </nav>
          <b-navbar-nav>
            <b-nav-item
              v-for="category in categories"
              :key="category.id"
              :to="{ name: 'getcategory', params: { name: category.name } }"
            >
              {{ category.name }}
            </b-nav-item>
          </b-navbar-nav>
        </div>
      </div>
    </Sidebar>

    <Button icon="pi pi-arrow-right" @click="visibleLeft = true" /> -->
    <div class="container">
      <div class="row mt-3">
        <home-card v-for="card in featured" :card="card" :key="card.id" />
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
    <div class="container-fluid">
      <main role="main mt-3">
        <div class="row mb-2">
          <div class="col-lg-8">
            <home-post v-for="post in cards" :key="post.id" :post="post" />
          </div>
          <!-- News Corner -->
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
  <!-- inner wrapper -->
  <!-- <div v-else class="p-grid p-align-center p-justify-center"> -->
  <div v-else style="display:flex; justify-content:center; margin-top: 30vh;">
    <!-- <ProgressSpinner fill="#EEEEEE" animationDuration=".8s" /> -->
    <ProgressSpinner
      style="width:140px; height: 140px;"
      animationDuration="1s"
    />
  </div>
</template>

<script>
import Vue from 'vue';
import HomeCard from '../posts/HomeCard';
import HomePost from '../posts/HomePost';
import News from '../news/News';
import ProgressSpinner from 'primevue/progressspinner';
Vue.use('ProgressSpinner', ProgressSpinner);

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
    News,
    ProgressSpinner
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
      const card = _.sampleSize(this.posts, 5);
      return card;
    }
  }
};
</script>
<style></style>
