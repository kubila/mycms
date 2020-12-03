<template>
  <div v-if="!isLatestPostsLoading">
    <div class="p-my-1 p-col-6 p-mx-auto">
      <div class="topic-hp-title topic">
        <h5>Recent Posts</h5>
      </div>
    </div>
    <DataView
      :value="lastPosts"
      layout="list"
      :paginator="true"
      :rows="5"
      paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
      currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
    >
      >
      <template #list="slotProps">
        <div class="p-col-12 p-my-2">
          <div class="poster p-card">
            <div class="p-grid p-nogutter">
              <div class="p-col-3 p-px-0 p-my-auto">
                <div class="p-px-0">
                  <router-link
                    :to="{
                      name: 'read',
                      params: { title: slotProps.data.title },
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
                          params: { name: slotProps.data.category.name },
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
                          params: { title: slotProps.data.title },
                        }"
                        class="card-main-title"
                      >
                        {{ slotProps.data.title }}</router-link
                      >
                    </h5>

                    <h5>
                      <em>
                        By
                        <router-link
                          :to="{
                            name: 'getauthor',
                            params: { name: slotProps.data.author.name },
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
              </div>
            </div>
          </div>
        </div>
      </template>
    </DataView>
  </div>
  <div v-else-if="isLatestPostsLoading" class="p-col-12 p-mx-auto">
    <DataView :value="fakePosts" layout="grid" :rows="6">
      >
      <template #grid="slotProps">
        <div class="p-col-12 p-my-2">
          <div class="poster p-card">
            <div class="p-grid p-nogutter">
              <div class="p-col-3 p-px-0 p-my-auto">
                <div class="p-px-0">
                  <b-skeleton-img
                    card-img="left"
                    width="225px"
                  ></b-skeleton-img>
                </div>
              </div>
              <div class="p-col-9 p-my-auto">
                <div class="p-pl-0 p-ml-3">
                  <div class="">
                    <b-skeleton animation="wave" width="60%"></b-skeleton>
                    <b-skeleton animation="wave" width="90%"></b-skeleton>
                    <b-skeleton animation="wave" width="70%"></b-skeleton>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </template>
    </DataView>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import _ from 'lodash';
export default {
  data() {
    return {
      isLatestPostsLoading: true,
      fakePosts: [{}, {}, {}, {}, {}],
    };
  },
  methods: {
    async latestPostsFetcher() {
      await this.$store.dispatch('post/fetchHomePosts');
      this.isLatestPostsLoading = false;
    },
  },
  created() {
    this.latestPostsFetcher();
  },
  computed: {
    ...mapState('post', ['homePosts']),
    lastPosts() {
      return _.chain(this.homePosts).orderBy(['id'], ['desc']).value();
    },
  },
};
</script>

<style scoped></style>
