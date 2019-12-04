<template>
  <div class="poster mt-2">
    <!-- card -->

    <div class="row">
      <div class="col-sm-3 my-auto">
        <router-link :to="{ name: 'read', params: { title: post.title } }">
          <img
            :src="`/images/${post.image}`"
            class="img-fluid"
            :alt="`${post.image}`"
            width="273"
            height="172"
          />
        </router-link>
      </div>
      <div class="col-sm-9 my-auto">
        <div class="p-0">
          <!-- card-body -->

          <h5 class="text-secondary">
            <!-- card-title -->
            <router-link :to="{ name: 'getcategory', params: { name: wasd } }">
              {{ post.category_id }}Some Category</router-link
            >
          </h5>

          <h5 class="text-alert card-title">
            <!-- card-title -->
            <router-link
              :to="{
                name: 'read',
                params: { title: post.title }
              }"
            >
              {{ post.title }}</router-link
            >
          </h5>
          <p>
            By
            <span class="text-dark">
              <span class="text-black">
                <router-link
                  :to="{ name: 'getauthor', params: { name: qwert } }"
                  ><strong>Unknown Author</strong>
                </router-link></span
              >
            </span>
            on
            <span>{{ post.created_at }}</span>
          </p>
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
      type: Object,
      required: true
    }
  }
};
</script>

<style scoped></style>
