<template>
  <div class="inner-wrapper">
    <!-- <div class="p-grid p-nogutter">
      <div class="p-col-12 p-md-12 p-lg-12 main-image img-fluid">
        <div class="main-top text-center">
          <h2 class="text-white">Welcome to my blog</h2>
          <p class="lead">
            You will find posts about programming, nature, books and more in
            this blog.
          </p>
        </div>
      </div>
    </div> -->

    <div class="p-grid p-nogutter p-mx-6 p-mx-md-5 p-mx-sm-1 p-mx-xl-5 p-mt-5">
      <!-- <div class="p-col-12 p-md-6 p-lg-3"> -->
      <div class="p-col-9 p-mx-auto">
        <div class="p-grid p-nogutter">
          <home-card />
        </div>
      </div>
    </div>

    <div class="p-grid p-nogutter p-my-2 p-mx-6 p-mx-md-5 p-mx-sm-1 p-mx-xl-5">
      <!-- <div class="p-col-12 p-md-6 p-lg-3"> -->
      <!-- <div class="p-xl-7 p-lg-7 p-md-12">
        <home-post />
      </div>
      <div class="p-xl-5 p-lg-5 p-md-12">
        <News />
      </div> -->
      <div class="p-xl-8 p-lg-8 p-md-8 p-mx-auto">
        <home-post />
      </div>
      <div class="p-xl-8 p-lg-8 p-md-8 p-mx-auto">
        <News />
      </div>
    </div>
  </div>
</template>

<script>
import HomeCard from '../posts/HomeCard';
import HomePost from '../posts/HomePost';
import News from '../news/News';

import { mapState } from 'vuex';

export default {
  name: 'Apphome',
  data() {
    return {};
  },
  components: {
    HomeCard,
    HomePost,
    News,
  },
};
</script>
<style></style>
