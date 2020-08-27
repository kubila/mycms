<template>
  <div class="inner-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8 my-4 mx-auto">
          <div class="content">
            <!-- <div class="mt-2 ml-2"> -->
            <div style="margin-left: 3rem;">
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
            </div>
            <div class="content-inner">
              <div class="post-outer">
                <p class="pl-1 d-inline-block">
                  <!-- <router-link
                    class="post-author-title"
                    :to="{
                      name: 'getauthor',
                      params: { name: post.author.name }
                    }"
                  >
                    <img
                      class="bylineImage"
                      src="https://images.idgesg.net/images/article/2019/05/screen-shot-2017-10-02-at-10.44.49-am-100796432-byline.png"
                      width="34"
                      alt="Matt Asay"
                      itemprop="image"
                    />
                  </router-link> -->
                  <!-- <b-icon-person-fill
                    class="icon-big"
                    style="color: #8f8d8d;"
                  ></b-icon-person-fill> -->
                  By
                  <span
                    ><i class="pi pi-spin pi-spinner" style="fontSize: 2rem"></i
                  ></span>
                  <router-link
                    class="post-author-title"
                    :to="{
                      name: 'getauthor',
                      params: { name: post.author.name }
                    }"
                  >
                    <strong>{{ post.author.name }}</strong></router-link
                  >
                </p>
                <!-- <strong class="lead">||</strong> -->
                <p class="pl-1 d-inline-block">
                  <!-- <b-icon-paperclip class="icon-big"></b-icon-paperclip> -->
                  <b-icon-egg-fill
                    class="icon-big"
                    style="color: #10abcc;"
                  ></b-icon-egg-fill>
                  <router-link
                    class="post-category-title"
                    :to="{
                      name: 'getcategory',
                      params: { name: post.category.name }
                    }"
                    ><strong>{{ post.category.name }}</strong></router-link
                  >
                </p>

                <strong class="pl-1 text-black-50">|</strong>

                <p class="pl-1 d-inline-block text-black-50">
                  {{ post.published }}
                </p>
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
              <hr />
              <p v-if="post.tags.length > 0" class="pl-2 d-inline-block">
                <b-icon-tag-fill
                  class="icon-big"
                  style="color: rgb(184, 134, 11)"
                ></b-icon-tag-fill>
                <span class="" v-for="tag in post.tags">
                  <router-link
                    class="tag lead"
                    :to="{ name: 'get-tag', params: { name: tag.name } }"
                  >
                    {{ tag.name }}</router-link
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
import {
  BIcon,
  BIconTagFill,
  BIconPersonFill,
  BIconGripHorizontal,
  BIconPaperclip,
  BIconEggFill
} from 'bootstrap-vue';

export default {
  components: {
    BIcon,
    BIconTagFill,
    BIconPersonFill,
    BIconGripHorizontal,
    BIconPaperclip,
    BIconEggFill
  },
  props: {
    post: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
