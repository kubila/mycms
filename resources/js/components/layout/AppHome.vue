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
    <!-- <div class="container" v-if="!isLoading">
      <div class="row mt-3"> -->
    <!-- <home-card v-for="card in featured" :card="card" :key="card.id" /> -->
    <!-- <Paginator
          :first.sync="first"
          :rows="perPage"
          :totalRecords="featured.length"
        >
        </Paginator> -->
    <!-- <div class="p-d-inline-flex"> -->
    <div class="p-grid p-nogutter">
      <!-- <div class="p-col-12 p-md-6 p-lg-3"> -->
      <DataView :value="featured" layout="grid" :paginator="true" :rows="8">
        <!-- <template #header>
        <div class="p-grid p-nogutter">
            <div class="p-col-6" style="text-align: left">
                <Dropdown v-model="sortKey" :options="sortOptions" optionLabel="label" placeholder="Sort By Price" @change="onSortChange($event)"/>
            </div>
            <div class="p-col-6" style="text-align: right">
                <DataViewLayoutOptions v-model="layout" />
            </div>
        </div>
    </template>   -->

        <template #grid="slotProps">
          <div class="p-col-4 p-md-6 p-lg-3 my-3">
            <Card class="main-post">
              <template slot="header">
                <router-link
                  :to="{
                    name: 'read',
                    params: { title: slotProps.data.title }
                  }"
                >
                  <img
                    alt="user header"
                    :src="`/storage/${slotProps.data.image}`"
                  />
                </router-link>
              </template>

              <template slot="title">
                <pre class="d-inline text-secondary pl-1 date-sizes">in</pre>
                <router-link
                  :to="{
                    name: 'getcategory',
                    params: { name: slotProps.data.category.name }
                  }"
                  class="card-category-title"
                >
                  {{ slotProps.data.category.name }}
                </router-link>
                <!-- <span>
          <pre class="date-sizes pl-1 d-inline">on</pre>
          <p class="date-sizes text-black-50 d-inline">{{ card.published }}</p>
        </span> -->
                <em>
                  <pre class="d-inline text-secondary pl-1 date-sizes">by</pre>
                  <router-link
                    :to="{
                      name: 'getauthor',
                      params: { name: slotProps.data.author.name }
                    }"
                    class="card-author-title"
                  >
                    {{ slotProps.data.author.name }}
                  </router-link>
                </em>
                <!-- <span class="pl-1">
          <p class="m-0 card-date">on {{ card.published }}</p>
        </span> -->
              </template>
              <template slot="title">
                <h5 class="mt-1">
                  <router-link
                    :to="{
                      name: 'read',
                      params: { title: slotProps.data.title }
                    }"
                    class="card-main-title"
                  >
                    {{ slotProps.data.title }}
                  </router-link>
                </h5>
              </template>
              <template slot="subtitle"> </template>

              <template slot="content">
                <p class="m-1" v-if="slotProps.data.content.length > 120">
                  <router-link
                    :to="{
                      name: 'read',
                      params: { title: slotProps.data.title }
                    }"
                    class="card-main-text"
                  >
                    {{ slotProps.data.content.slice(0, 120) + '...' }}
                  </router-link>
                </p>
              </template>
              <template slot="footer"> </template>
              <hr class="card-hr" />
            </Card>
          </div>
        </template>
      </DataView>
      <!-- </div> -->
      <!-- </div> -->
    </div>
    <!-- </div> -->
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
      first: 1,
      perPage: 2
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
        //.sampleSize(6)
        .orderBy(['id'], ['desc'])
        .value();
      return fas;
    },
    cards() {
      const card = _.sampleSize(this.posts, 10);
      return card;
    }
  },
  methods: {}
};
</script>
<style></style>
