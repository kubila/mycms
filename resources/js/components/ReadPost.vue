<template>
  <div class="container inner-wrapper">
    <div class="row">
      <div class="col-sm-8 content mt-4 mb-4">
        <div class="mt-2 ml-2">
          <div class="article-title">
            <h1>
              {{ post.title }}
            </h1>
          </div>
          <div class="subhead">
            <h4 class="mt-1 mb-4">
              Description sentence contains a few word about content, small
              text.
            </h4>
          </div>
          <p class="lead font-weight-bold text-secondary">
            by Somebody {{ post.author_id }} {{ post.created_at }} in
            {{ post.category.name }}
          </p>

          <p class="lead text-secondary text-italic">
            Tags will be here
          </p>
          <figure>
            <img
              :src="`/images/${post.image}`"
              :alt="`${post.title}`"
              class="img-fluid"
              :title="`${post.title}`"
            />
            <figcaption>description will be gone here</figcaption>
          </figure>
          <p class="article pt-4 text-left ">{{ post.content }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    post: {
      type: [Array, Object],
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
