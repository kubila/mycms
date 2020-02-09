<template>
  <div class="col-md-4 my-3 sutun">
    <div class="main-post">
      <div>
        <router-link :to="{ name: 'read', params: { title: post.title } }">
          <img
            :src="`/images/${post.image}`"
            alt="Just a pic"
            class="img-fluid"
          />
        </router-link>
      </div>
      <div class="mx-3 mt-1">
        <router-link
          :to="{
            name: 'getcategory',
            params: { name: post.category.name }
          }"
          class="card-category-title"
        >
          {{ post.category.name }}
        </router-link>

        <h5>
          <router-link
            :to="{ name: 'read', params: { title: post.title } }"
            class="card-main-title"
          >
            {{ post.title }}
          </router-link>
        </h5>

        <p class="m-1" v-if="post.content.length > 120">
          {{ post.content.slice(0, 120) + '...' }}
        </p>
        <p class="m-1" v-else>
          {{ post.content }}
        </p>
      </div>
      <hr class="card-hr m-0" />
    </div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    post: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
