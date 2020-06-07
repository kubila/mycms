<template>
  <div class="inner-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 mt-4 mb-4">
          <div class="content">
            <div class="mt-2 ml-2">
              <div class="article-title">
                <h1>
                  {{ post.title }}
                </h1>
              </div>
              <div class="subhead">
                <h4 class="mt-1 mb-4">
                  {{ post.description }}
                </h4>
              </div>

              <span>
                <router-link
                  class="card-author-title"
                  :to="{
                    name: 'getauthor',
                    params: { name: post.author.name }
                  }"
                  >by {{ post.author.name }}</router-link
                >
                in
                <!-- <p class="lead font-weight-bold"> -->
                <router-link
                  class="card-category-title"
                  :to="{
                    name: 'getcategory',
                    params: { name: post.category.name }
                  }"
                  >{{ post.category.name }}</router-link
                >
                on
                {{ post.published }}
                <!-- </p> -->
              </span>

              <p v-if="post.tags.length > 0">
                <span class="lead text-secondary font-italic">
                  {{ post.tags.name }}
                </span>
              </p>

              <p v-else-if="post.tags.length > 1">
                <span
                  class="lead text-secondary font-italic"
                  v-for="tag in post.tags"
                >
                  {{ tag.name }}
                </span>
              </p>

              <figure>
                <img
                  :src="`/images/${post.image}`"
                  :alt="`${post.title}`"
                  class="img-fluid"
                  :title="`${post.title}`"
                />
                <!-- <figcaption>{{ post.description }}</figcaption> -->
              </figure>
              <p class="article pt-4 text-left ">{{ post.content }}</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3 bg-light mt-4 mb-4">
          <category-news />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CategoryNews from '../categories/CategoryNews';

export default {
  props: {
    post: {
      type: Object,
      required: true
    }
  },
  components: {
    CategoryNews
  }
};
</script>

<style lang="scss" scoped></style>
