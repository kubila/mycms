<template>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div v-if="isOpened">
          <b-modal
            id="my-modal"
            hide-footer
            v-model="isOpen"
            size="xl"
            scrollable
          >
            <template v-slot:modal-title>
              <!-- Using <code>$bvModal</code> Methods -->
              <h3>{{ post.title }}</h3>
            </template>
            <!-- <div class="d-block text-center">
              <h3>{{ post.title }}</h3>
            </div> -->
            <form @submit.prevent="handleSubmit">
              <!-- <div class="modal-dialog-centered" role="document">

                <div class="modal-content"> -->
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

              <!-- <div class="modal-body"> -->
              <div class="form-group">
                <label for="post_title" class="form-modal">Post Title</label>
                <input
                  type="text"
                  name="title"
                  :value="post.title"
                  class="form-control form-control-md"
                  ref="titleRef"
                />
              </div>
              <!-- <div class="form-group">
                      <label for="post_title" class="form-modal"
                        >Post Title</label
                      >
                      <input
                        type="text"
                        name="title"
                        :value="post.title"
                        class="form-control form-control-md"
                        v-model="form.title"
                      />
                    </div> -->

              <div class="form-group">
                <label for="post_content" class="form-modal"
                  >Post Content</label
                >
                <!-- <Editor
                  v-model="post.content"
                  editorStyle="height: 420px"
                  ref="contentRef"
                >
                </Editor> -->
                <editor
                  :initialValue="post.content"
                  height="500px"
                  initialEditType="wysiwyg"
                  previewStyle="vertical"
                  ref="toastuiEditor"
                />
              </div>

              <div class="form-group">
                <label for="post_title" class="form-modal">Post Tags</label>
                <span v-for="(tag, index) in post.tags" :key="tag.id">
                  <input
                    type="text"
                    :name="`title${index}`"
                    :value="tag.name"
                    ref="tagRefs"
                    class="form-control
                        form-control-md"
                  />
                </span>
              </div>

              <div class="form-group">
                <label for="post_image" class="form-modal">Post Image</label>

                <img
                  :src="`/images/${post.image}`"
                  class="img-fluid"
                  :alt="post.title"
                  ref="imgRef"
                />
              </div>
              <!-- </div> -->

              <div class="modal-footer">
                <b-button variant="secondary" @click="$router.replace('/posts')"
                  >Close Me</b-button
                >
                <button type="submit" class="btn btn-primary">
                  Save changes
                </button>
                <!-- </div>
                </div> -->
              </div>
            </form>
          </b-modal>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import 'codemirror/lib/codemirror.css';
import '@toast-ui/editor/dist/toastui-editor.css';

import { Editor } from '@toast-ui/vue-editor';
import 'highlight.js/styles/github.css';
import codeSyntaxHighlight from '@toast-ui/editor-plugin-code-syntax-highlight';

export default {
  components: {
    editor: Editor
  },
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
    options: {
      plugins: [codeSyntaxHighlight];
    }
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
      const postContent = {
        title: this.$refs.titleRef.value,
        // content: this.$refs.contentRef.value,
        content: this.$refs.toastuiEditor.invoke('getHtml'),
        tags: () => {
          this.$refs.tagRefs.value.map(val => this.form.tags.fill(val));
        },
        image: this.$refs.imgRef.src
      };
      console.log(postContent);
    }
  }
};
</script>

<style lang="scss" scoped></style>
