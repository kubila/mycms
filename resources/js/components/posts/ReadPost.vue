<template>
  <div class="inner-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 my-4 mx-auto">
          <div class="content">
            <div class="content-inner">
              <!-- <div class="mt-2 ml-2"> -->
              <div class="article-title">
                <h1>
                  {{ post.title }}
                </h1>
              </div>
              <div class="subhead">
                <h4>
                  {{ post.description }}
                </h4>
              </div>

              <div class="post-outer">
                by
                <router-link
                  class="post-author-title"
                  :to="{
                    name: 'getauthor',
                    params: { name: post.author.name }
                  }"
                >
                  <strong>{{ post.author.name }}</strong></router-link
                >

                <strong class="lead">|</strong>
                on
                <strong>{{ post.published }}</strong>

                <strong class="lead">|</strong>
                in
                <router-link
                  class="post-category-title"
                  :to="{
                    name: 'getcategory',
                    params: { name: post.category.name }
                  }"
                  ><strong>{{ post.category.name }}</strong></router-link
                >
              </div>

              <figure>
                <img
                  :src="`/images/${post.image}`"
                  :alt="`${post.title}`"
                  class="img-fluid"
                  :title="`${post.title}`"
                />
              </figure>

              <p class="article pt-3 text-left " v-html="post.content"></p>

              <p v-if="post.tags.length > 0" class="">
                Tag(s):
                <span
                  class="lead text-secondary font-italic"
                  v-for="tag in post.tags"
                >
                  <router-link
                    class="pl-1"
                    :to="{ name: 'get-tag', params: { name: tag.name } }"
                    >{{ tag.name }}</router-link
                  >
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    post: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
