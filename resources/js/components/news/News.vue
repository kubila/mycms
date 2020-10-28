<template>
  <div class="p-mx-2" v-if="!isNewsLoading">
    <div><h5>Latest News</h5></div>
    <DataView
      :value="allNews"
      layout="list"
      :paginator="true"
      :rows="5"
      paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
      currentPageReportTemplate="Showing {first} to {last} of {totalRecords}"
    >
      >
      <template #list="slotProps">
        <Card class="p-my-1">
          <template slot="title">
            <router-link
              class="card-news-title"
              :to="{
                name: 'get-news',
                params: { title: slotProps.data.title }
              }"
            >
              {{ slotProps.data.title }}
            </router-link>
          </template>
          <template slot="content">
            <p>
              <router-link
                class="card-main-text"
                :to="{
                  name: 'get-news',
                  params: { title: slotProps.data.title }
                }"
              >
                {{ slotProps.data.content.substr(0, 200) + '...' }}
              </router-link>
            </p>
          </template>
        </Card>
      </template>
    </DataView>
  </div>
  <div v-else-if="isNewsLoading" class="p-mx-2">
    <DataView :value="fakeNews" layout="list" :rows="5">
      >
      <template #list="slotProps">
        <Card class="p-my-1 p-col-12 p-mx-auto">
          <template slot="title">
            <b-skeleton animation="wave" width="70%"></b-skeleton>
          </template>
          <template slot="content">
            <b-skeleton animation="wave" width="90%"></b-skeleton>
            <b-skeleton animation="wave" width="90%"></b-skeleton>
            <p></p>
          </template>
        </Card>
      </template>
    </DataView>
  </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
  data() {
    return {
      isNewsLoading: true,
      fakeNews: [{}, {}, {}, {}, {}]
    };
  },
  methods: {
    async newsGetter() {
      await this.$store.dispatch('newsUp/fetchNews');
    }
  },
  created() {
    this.newsGetter();
    this.isNewsLoading = false;
  },
  computed: {
    ...mapState('newsUp', ['news']),
    allNews() {
      return this.news;
    }
  }
};
</script>

<style lang="scss" scoped></style>
