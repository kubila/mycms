<template>
  <div>
    <div class="p-mx-2" v-if="!isNewsLoading">
      <DataView
        :value="allNews"
        layout="list"
        :paginator="true"
        :rows="5"
        paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
        currentPageReportTemplate="Showing {first} to {last} of {totalRecords} news"
      >
        >
        <template #list="slotProps">
          <Card class="p-my-1">
            <template slot="title">
              {{ slotProps.data.title }}
            </template>
            <template slot="content">
              {{ slotProps.data.content.substr(0, 200) + '...' }}
              <p></p>
            </template>
          </Card>
        </template>
      </DataView>
    </div>
    <div
      v-else-if="isNewsLoading"
      style="display:flex; justify-content:center;"
      class="p-breadcrumb"
    >
      <ProgressSpinner
        style="width:140px; height: 140px;"
        animationDuration="1s"
      />
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
  data() {
    return {
      isNewsLoading: true
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
