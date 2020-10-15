<template>
  <div class="inner-wrapper">
    <!-- <div class="container-fluid"> -->
    <div class="p-grid p-nogutter">
      <!-- <div class="row"> -->
      <div class="p-col-12 p-md-12 p-lg-12 main-image img-fluid">
        <!-- <div class="col main-image img-fluid"> -->

        <div class="main-top text-center">
          <h2 class="text-white">Welcome to my blog</h2>
          <p class="lead">
            You will find posts about programming, nature, books and more in
            this blog.
          </p>
        </div>
      </div>
      <!-- </div> -->
    </div>
    <!-- container -->
    <!-- <div class="container" v-if="!isLoading"> -->
    <!-- <div class="row mt-3"> -->
    <!-- <home-card v-for="card in featured" :card="card" :key="card.id" /> -->
    <!-- <Paginator
          :first.sync="first"
          :rows="perPage"
          :totalRecords="featured.length"
        >
        </Paginator> -->
    <!-- <div class="p-d-inline-flex"> -->

    <div class="p-grid p-nogutter p-mx-6 p-mx-md-5 p-mx-sm-1 p-mx-xl-5">
      <!-- <div class="p-col-12 p-md-6 p-lg-3"> -->
      <div class="p-col-9 p-mx-auto">
        <div class="p-grid p-nogutter">
          <home-card v-for="card in featured" :card="card" :key="card.id" />
          <!-- <DataView
            :value="featured"
            layout="grid"
            :rows="6"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            currentPageReportTemplate="Showing {first} to {last} of {totalRecords} posts"
          >
            >

            <template #grid="slotProps">
              <div class="p-col-12 p-sm-6 p-md-6 p-lg-4 p-py-lg-1">
                <Card class="main-post p-my-2 p-m-sm-2 p-my-md-2 p-mx-md-2">
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
                    <pre class="d-inline text-secondary pl-1 date-sizes">
in</pre
                    >
                    <router-link
                      :to="{
                        name: 'getcategory',
                        params: { name: slotProps.data.category.name }
                      }"
                      class="card-category-title"
                    >
                      {{ slotProps.data.category.name }}
                    </router-link>
                    <em>
                      <pre class="d-inline text-secondary pl-1 date-sizes">
by</pre
                      >
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
          </DataView> -->
        </div>
      </div>
      <!-- </div> -->
      <!-- </div> -->
      <!-- </div> -->
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
          </div>
        </div>
      </div>
    </div> -->
    <div
      class="p-grid p-nogutter p-my-2 p-mx-6 p-mx-md-5 p-mx-sm-1 p-mx-xl-5"
      v-if="!isLoading"
    >
      <!-- <div class="p-col-12 p-md-6 p-lg-3"> -->
      <div class="p-xl-7 p-lg-7 p-md-12">
        <DataView
          :value="cards"
          layout="list"
          :paginator="true"
          :rows="4"
          paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
          currentPageReportTemplate="Showing {first} to {last} of {totalRecords} posts"
        >
          >

          <template #list="slotProps">
            <div class="p-col-12 p-my-2">
              <!-- <div class="row mx-0"> -->
              <div class="poster p-card">
                <div class="p-grid p-nogutter">
                  <!-- <div class="p-grid p-nogutter"> -->

                  <div class="p-col-3 p-px-0 p-my-auto">
                    <div class="p-px-0">
                      <router-link
                        :to="{
                          name: 'read',
                          params: { title: slotProps.data.title }
                        }"
                      >
                        <img
                          :src="`/storage/${slotProps.data.image}`"
                          class="img-fluid"
                          :alt="`${slotProps.data.image}`"
                          width="273"
                          height="172"
                        />
                      </router-link>
                    </div>
                  </div>
                  <div class="p-col-9 p-my-auto">
                    <div class="p-pl-0 p-ml-3">
                      <div class="">
                        <h5>
                          <router-link
                            :to="{
                              name: 'getcategory',
                              params: { name: slotProps.data.category.name }
                            }"
                            class="card-category-title"
                          >
                            {{ slotProps.data.category.name }}</router-link
                          >
                        </h5>

                        <h5>
                          <router-link
                            :to="{
                              name: 'read',
                              params: { title: slotProps.data.title }
                            }"
                            class="card-main-title"
                          >
                            {{ slotProps.data.title }}</router-link
                          >
                        </h5>

                        <h5>
                          <em>
                            <router-link
                              :to="{
                                name: 'getauthor',
                                params: { name: slotProps.data.author.name }
                              }"
                              class="card-author-title"
                              ><strong>{{ slotProps.data.author.name }}</strong>
                            </router-link></em
                          >
                          <pre class="d-inline date-sizes p-pl-1">
published on </pre
                          >
                          <span class="date-sizes text-black-50">{{
                            slotProps.data.published
                          }}</span>
                        </h5>

                        <p></p>
                      </div>
                    </div>
                    <!-- <Card
                      style="margin-bottom: 1em; margin-left: 10px; margin-right:10px;"
                    >
                      <template slot="title">
                        {{ slotProps.data.title }}
                      </template>
                      <template slot="content">
                        <p>
                          {{ slotProps.data.content.slice(0, 120) + '...' }}
                        </p>
                      </template>
                    </Card> -->
                  </div>
                </div>
                <!-- </div> -->
              </div>
            </div>
          </template>
        </DataView>
        <!-- </div> -->
        <!-- </div> -->
      </div>
      <div class="p-xl-5 p-lg-5 p-md-12">
        <News />
      </div>
    </div>

    <!-- <div class="container-fluid" v-if="!isLoading">
      <main role="main mt-3">
        <div class="row mb-2">
          <div class="col-lg-7">

          </div>

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
    </div> -->

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
  },
  methods: {}
};
</script>
<style></style>
