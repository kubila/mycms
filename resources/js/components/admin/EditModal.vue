<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div
          class="modal fade"
          id="myModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLongTitle"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                  Edit Post
                </h5>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <Editor v-model="value" editorStyle="height: 320px">
                  <template slot="toolbar">
                    <span class="ql-formats">
                      <button class="ql-bold"></button>
                      <button class="ql-italic"></button>
                      <button class="ql-underline"></button>
                    </span>
                  </template>
                </Editor>

                <form action="">
                  <div class="form-group">
                    <label for="post_title" class="form-text">Post Title</label>
                    <input
                      type="text"
                      name="title"
                      :value="post.title"
                      class="form-control form-control-md"
                    />
                  </div>

                  <div class="form-group">
                    <label for="post_content" class="form-text"
                      >Post Content</label
                    >
                    <textarea
                      v-if="post.content.length < 600"
                      rows="10"
                      type="text"
                      name="content"
                      :value="post.content"
                      class="form-control form-control-md"
                    ></textarea>
                    <textarea
                      v-else-if="
                        post.content.length > 600 && post.content.length < 900
                      "
                      rows="20"
                      type="text"
                      name="content"
                      :value="post.content"
                      class="form-control form-control-md"
                    ></textarea>

                    <textarea
                      v-else
                      rows="30"
                      type="text"
                      name="content"
                      :value="post.content"
                      class="form-control form-control-md"
                    ></textarea>
                  </div>

                  <div class="form-group">
                    <label for="post_title" class="form-text">Post Tags</label>
                    <input
                      type="text"
                      name="title"
                      :value="post.tags"
                      class="form-control form-control-md"
                    />
                  </div>

                  <div class="form-group">
                    <label for="post_image" class="form-text">Post Image</label>
                    <!-- <img :src="`/images/${post.image}`" :alt="post.title" /> -->
                    <img :src="`/images/${post.image}`" class="img-fluid" />
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button
                  @click="$router.replace('/cms/admin')"
                  type="button"
                  class="btn btn-secondary"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button
                  @submit="$router.replace('/cms/admin')"
                  type="button"
                  class="btn btn-primary"
                >
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue';
import Editor from 'primevue/editor';

Vue.component('Editor', Editor);

export default {
  props: {
    post: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      value: ''
    };
  }
};
</script>

<style lang="scss" scoped></style>
