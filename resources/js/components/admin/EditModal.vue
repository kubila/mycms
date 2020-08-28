<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div v-if="isOpened">
          <b-modal id="my-modal" hide-footer v-model="isOpen" size="lg">
            <template v-slot:modal-title>
              <!-- Using <code>$bvModal</code> Methods -->
              <h3>{{ post.title }}</h3>
            </template>
            <!-- <div class="d-block text-center">
              <h3>{{ post.title }}</h3>
            </div> -->
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <!-- <div class="modal-header">
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
                </div> -->
                <div class="modal-body">
                  <form method="POST" @submit.prevent="handleSubmit">
                    <div class="form-group">
                      <label for="post_title" class="form-modal"
                        >Post Title</label
                      >
                      <input
                        type="text"
                        name="title"
                        :value="post.title"
                        class="form-control form-control-md"
                      />
                    </div>

                    <div class="form-group">
                      <label for="post_content" class="form-modal"
                        >Post Content</label
                      >
                      <Editor
                        v-model="post.content"
                        editorStyle="height: 420px"
                      >
                        <template slot="toolbar">
                          <span class="ql-formats">
                            <button class="ql-bold"></button>
                            <button class="ql-italic"></button>
                            <button class="ql-underline"></button>
                          </span>
                        </template>
                      </Editor>
                    </div>

                    <!-- <div class="form-group">
                      <label for="post_content" class="form-modal"
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
                    </div> -->

                    <div class="form-group">
                      <label for="post_title" class="form-modal"
                        >Post Tags</label
                      >
                      <span v-for="tag in post.tags" :key="tag.id">
                        <input
                          type="text"
                          name="title"
                          :value="tag.name"
                          class="form-control form-control-md"
                        />
                      </span>
                    </div>

                    <div class="form-group">
                      <label for="post_image" class="form-modal"
                        >Post Image</label
                      >

                      <img
                        :src="`/images/${post.image}`"
                        class="img-fluid"
                        :alt="post.title"
                      />
                    </div>
                  </form>
                </div>

                <div class="modal-footer">
                  <b-button
                    variant="secondary"
                    @click="$router.replace('/cms/admin')"
                    >Close Me</b-button
                  >
                  <!-- <button
                    @click="$router.replace('/cms/admin')"
                    type="button"
                    class="btn btn-primary"
                  >
                    Save changes
                  </button> -->
                  <b-button variant="primary" submit>Save changes</b-button>
                </div>
              </div>
            </div>

            <!-- <b-button class="mt-3" block @click="$bvModal.hide('my-modal')"
              >Close Me</b-button
            > -->
          </b-modal>
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
      value: '',
      isOpen: false,
      form: {
        title: null,
        content: null,
        tags: null,
        image: null
      }
    };
  },
  mounted() {
    this.isOpened();
  },
  methods: {
    isOpened() {
      this.isOpen = true;
      return true;
    },
    handleSubmit() {
      console.log(this.form);
    }
  }
};
</script>

<style lang="scss" scoped></style>
