<template>
  <div class="col-auto">
    <!--<div class="mt-2">
       <admin-table
        :items="adminPosts"
        :per-page="perPage"
        :current-page="currentPage"
        :totalRows="adminPostPaginator"
      /> -->
    <!-- <b-table
        id="my-table"
        :items="adminPosts"
        :per-page="perPage"
        :current-page="currentPage"
        small
      ></b-table>
    </div>
    <div class="overflow-auto">
      <b-pagination
        v-model="currentPage"
        :total-rows="adminPostPaginator"
        :per-page="perPage"
        aria-controls="my-table"
      ></b-pagination>
    </div> -->

    <!-- <Paginator
      v-model:first="currentPage"
      :rows="perPage"
      :totalRecords="adminPostPaginator"
      :rowsPerPageOptions="[10, 20, 30]"
    ></Paginator> -->
    <Toolbar class="p-mb-4">
      <template slot="left">
        <Button label="New" icon="pi pi-plus" class="p-button-success p-mr-2" />
        <Button
          label="Delete"
          icon="pi pi-trash"
          class="p-button-danger p-ml-2"
        />
      </template>
    </Toolbar>
    <DataTable
      ref="dt"
      :value="adminPosts"
      dataKey="id"
      :paginator="true"
      :rows="5"
      :totalRecords="adminPostPaginator"
      paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
      :rowsPerPageOptions="[5, 10, 25]"
      currentPageReportTemplate="Showing {first} to {last} of {totalRecords} posts"
      class="p-datatable-gridlines"
    >
      <template #header>
        <div class="table-header">
          <h5 class="p-m-0">Manage Posts</h5>
          <span class="p-input-icon-left">
            <i class="pi pi-search" />
            <!-- <InputText v-model="filters['global']" placeholder="Search..." /> -->
          </span>
        </div>
      </template>

      <Column
        selectionMode="multiple"
        headerStyle="width: 3rem"
        :exportable="false"
      ></Column>
      <Column field="id" header="#" :sortable="true"></Column>
      <Column field="title" header="Title" :sortable="true"></Column>
      <Column field="content" header="Content">
        <template #body="slotProps">
          <span>{{ slotProps.data.content.substring(0, 200) + '...' }}</span>
        </template>
      </Column>
      <Column field="author.name" header="Author" :sortable="true"></Column>
      <Column field="category.name" header="Category" :sortable="true"></Column>

      <Column :exportable="false">
        <template #body="slotProps">
          <Button
            icon="pi pi-pencil"
            class="p-button-rounded p-button-success p-mr-2"
            @click="editProduct(slotProps.data)"
          />
          <Button
            icon="pi pi-trash"
            class="p-button-rounded p-button-warning"
            @click="confirmDeleteProduct(slotProps.data)"
          />
        </template>
      </Column>
    </DataTable>
  </div>
</template>

<script>
import Vue from 'vue';
import { mapState } from 'vuex';
import Paginator from 'primevue/paginator';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import Toolbar from 'primevue/toolbar';

import _ from 'lodash';

Vue.component('Paginator', Paginator);
Vue.component('Column', Column);
Vue.component('DataTable', DataTable);
Vue.component('Button', Button);
Vue.component('Toolbar', Toolbar);

export default {
  data() {
    return {
      perPage: 2,
      currentPage: 1,
      fields: [
        { key: 'content', label: 'Content' },
        { key: 'category.name', label: 'Category' }
      ],
      items: [{ id: '', content: '', category: '' }]
    };
  },
  created() {
    this.$store.dispatch('post/fetchPosts');
  },
  computed: {
    ...mapState('post', ['posts']),
    adminPosts() {
      const orderedPosts = _.orderBy(this.posts, ['id'], 'desc');
      return this.posts;
    },
    adminPostPaginator() {
      return this.posts.length;
    }
  },
  methods: {
    editProduct(data) {
      return console.log('edit');
    },
    confirmDeleteProduct(data) {
      return console.log('delete');
    }
  }
};
</script>

<style lang="scss" scoped></style>
