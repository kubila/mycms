<template>
  <div class="col-auto" v-if="!isAdminPostsLoading">
    <Toolbar class="p-mb-4">
      <template slot="left">
        <Button label="New" icon="pi pi-plus" class="p-button-success p-mr-1" />
      </template>
    </Toolbar>
    <DataTable
      ref="dt"
      :value="posts"
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
        </div>
      </template>

      <Column
        selectionMode="single"
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
            @click="editPost(slotProps.data)"
          />
          <Button
            icon="pi pi-trash"
            class="p-button-rounded p-button-warning"
            @click="confirmDeletePost(slotProps.data)"
          />
        </template>
      </Column>
    </DataTable>

    <Dialog :visible.sync="editPostDialog" header="Edit" :modal="true">
      <!-- <div class="confirmation-content">
        <i class="pi pi-exclamation-triangle p-mr-3" style="font-size: 2rem" />
        <span v-if="post"
          >Are you sure you want to edit <b>{{ post }}</b
          >?</span
        >

      </div> -->
      <template #header>
        <InputText
          type="text"
          v-model="post.title"
          class="p-inputtext-lg w-100"
        />
        <!-- <h3>{{ post.title }}</h3> -->
      </template>

      <editor
        :initialValue="post.content"
        :options="options"
        height="500px"
        initialEditType="wysiwyg"
        previewStyle="vertical"
        ref="toastuiEditor"
      />

      <div class="my-3">
        <base-select
          v-model="post.category"
          label="Select a category"
          :options="post.categories"
        />
      </div>

      <div class="my-3">
        <base-select
          v-model="post.author"
          label="Select an author"
          :options="post.authors"
        />
      </div>

      <template #footer>
        <Button
          label="No"
          icon="pi pi-times"
          class="p-button-text"
          @click="editPostDialog = false"
        />
        <Button
          label="Yes"
          icon="pi pi-check"
          class="p-button-text"
          @click="deletePost"
        />
      </template>
    </Dialog>

    <Dialog :visible.sync="deletePostDialog" header="Confirm" :modal="true">
      <div class="confirmation-content">
        <i class="pi pi-exclamation-triangle p-mr-3" style="font-size: 2rem" />
        <span v-if="post.title"
          >Are you sure you want to delete <b>{{ post.title }}</b
          >?</span
        >
      </div>
      <template #footer>
        <Button
          label="No"
          icon="pi pi-times"
          class="p-button-text"
          @click="deletePostDialog = false"
        />
        <Button
          label="Yes"
          icon="pi pi-check"
          class="p-button-text"
          @click="deletePost"
        />
      </template>
    </Dialog>
  </div>
  <div v-else-if="isAdminPostsLoading" class="p-col-12 p-mx-auto">
    <div class="spinner">
      <ProgressSpinner
        style="width: 140px; height: 140px"
        animationDuration="1s"
      />
    </div>
  </div>
</template>

<script>
import Vue from 'vue';
import _ from 'lodash';
import { mapState } from 'vuex';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import Toolbar from 'primevue/toolbar';

import 'codemirror/lib/codemirror.css';
import '@toast-ui/editor/dist/toastui-editor.css';
import { Editor } from '@toast-ui/vue-editor';
import 'highlight.js/styles/github.css';
import codeSyntaxHightlight from '@toast-ui/editor-plugin-code-syntax-highlight';
import hljs from 'highlight.js/lib/highlight';
import javascript from 'highlight.js/lib/languages/javascript';
import php from 'highlight.js/lib/languages/php';
import csharp from 'highlight.js/lib/languages/cs';
import python from 'highlight.js/lib/languages/python';
import BaseSelect from '../helpers/BaseSelect.vue';

hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('php', php);
hljs.registerLanguage('csharp', csharp);
hljs.registerLanguage('python', python);

Vue.component('Column', Column);
Vue.component('DataTable', DataTable);
Vue.component('Button', Button);
Vue.component('Toolbar', Toolbar);

export default {
  components: {
    editor: Editor,
    BaseSelect,
  },
  data() {
    return {
      deletePostDialog: false,
      editPostDialog: false,
      isAdminPostsLoading: true,
      title: {},
      id: {},
      post: {},
      fakeAdminPosts: [{}, {}, {}, {}],
      options: {
        plugins: [[codeSyntaxHightlight, { hljs }]],
      },
    };
  },
  created() {
    this.allPostsFetcher();
  },
  computed: {
    ...mapState('post', ['posts']),

    adminPostPaginator() {
      return this.posts.length;
    },
  },
  methods: {
    async allPostsFetcher() {
      await this.$store.dispatch('post/fetchPosts');
      this.isAdminPostsLoading = false;
    },
    editPost(post) {
      this.post = { ...post };
      this.editPostDialog = true;
      return;
    },
    confirmDeletePost(post) {
      this.post = post;
      this.deletePostDialog = true;
      return;
    },
    deletePost() {},
  },
};
</script>

<style lang="scss" scoped></style>
