<template>
  <div class="container inner-wrapper">
    <div class="row pb-3">
      <div class="col-sm-12">
        <div class="card mt-2">
          <div class="card-header">
            <h4 class="card-title">Edit Post</h4>
          </div>
          <div class="card-body">
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
                <label for="post_content" class="form-text">Post Content</label>
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
                <input
                  type="file"
                  name="image"
                  :src="`/images/${post.image}`"
                />
                <input
                  type="image"
                  :src="`/images/${post.image}`"
                  class="img-fluid"
                  alt=""
                />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    post: {
      type: [Object],
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
.form-text {
  font-size: 1rem;
}
</style>
