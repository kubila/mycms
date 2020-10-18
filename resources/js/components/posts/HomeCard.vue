<template>
  <div v-if="!isPinnedPostsLoading">
    <DataView
      :value="featured"
      layout="grid"
      :rows="6"
      :paginator="true"
      paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
      currentPageReportTemplate="Showing {first} to {last} of {totalRecords} pinned posts"
    >
      >

      <template #grid="slotProps">
        <div class="p-col-12 p-sm-6 p-md-6 p-lg-6 p-xl-4 p-py-lg-1">
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
              <!-- <pre class="d-inline text-secondary pl-1 date-sizes">in</pre> -->
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
  </div>
  <div v-else-if="isPinnedPostsLoading" class="p-col-12 p-mx-auto">
    <DataView :value="fakeCards" layout="grid" :rows="6">
      >
      <template #grid="slotProps">
        <div class="p-col-12 p-sm-6 p-md-6 p-lg-6 p-xl-4 p-py-lg-1 p-py-3">
          <Card class="p-my-2 p-m-sm-2 p-my-md-2 p-mx-md-2">
            <template slot="header">
              <b-skeleton-img
                card-img="top"
                height="200px"
                aspect="3:1"
              ></b-skeleton-img>
            </template>
            <template slot="title">
              <b-skeleton animation="wave" width="70%"></b-skeleton>
            </template>
            <template slot="title">
              <b-skeleton animation="wave" width="90%"></b-skeleton>
            </template>
            <template slot="content">
              <b-skeleton animation="wave" width="95%"></b-skeleton>
              <b-skeleton animation="wave" width="95%"></b-skeleton>
              <b-skeleton animation="wave" width="95%"></b-skeleton>
              <b-skeleton animation="wave" width="95%"></b-skeleton>
            </template>
          </Card>
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
      isPinnedPostsLoading: true,
      fakeCards: [{}, {}, {}, {}, {}, {}]
    };
  },
  async created() {
    await this.$store.dispatch('post/fetchPinnedPosts');
    this.isPinnedPostsLoading = false;
  },
  computed: {
    ...mapState('post', ['pinned']),
    featured() {
      const fas = _.chain(this.pinned)
        //.sampleSize(12)
        .orderBy(['id'], ['desc'])
        .value();
      return fas;
    }
  }
};
</script>

<style lang="scss" scoped></style>
