<template>
  <div v-if="$store.loading">Loading...</div>
  <div v-else class="inner-wrapper">
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
        <home-card v-for="post in featured" :post="post" :key="post.id" />
      </div>

      <main role="main mt-3">
        <div class="row">
          <div class="col-lg-8 p-0">
            <home-post v-for="post in posts" :key="post.id" :post="post" />
          </div>
          <aside class="col-lg-4">
            <div class="sidebar mt-2"></div>
          </aside>
        </div>
      </main>
    </div>
    <!-- container -->
  </div>
</template>

<script>
import HomeCard from './HomeCard.vue';
import HomePost from './HomePost.vue';
import { mapActions, mapState } from 'vuex';

export default {
  components: {
    HomePost,
    HomeCard
  },
  created() {
    this.$store.dispatch('fetchPosts');
  },
  computed: {
    ...mapState(['posts']),
    featured() {
      const fas = _.sampleSize(this.posts, 5);
      return fas;
    }
  }

  /*
computed: {
    ...mapState({
      posts: 'posts'
    })
*/
  //mapActions
  //posts: state => state.posts
  //...mapActions(['fetchPosts']) this.$store.dispatch('fetchPosts')
};
/*
created() {
    this.$store.dispatch('event/fetchEvent', this.id);
  },
  computed: mapState({
    event: state => state.event.event
  })
*/
</script>
<style>
/*
.main {
  flex-grow: 1;
  overflow-y: hidden;
}*/
</style>
