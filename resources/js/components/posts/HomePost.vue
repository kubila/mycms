<template>
  <div class="poster">
    <!-- card -->

    <div class="row mx-0">
      <div class="col-sm-3 px-0">
        <div class="px-0">
          <router-link :to="{ name: 'read', params: { title: post.title } }">
            <img
              :src="`/storage/${post.image}`"
              class="img-fluid"
              :alt="`${post.image}`"
              width="273"
              height="172"
            />
          </router-link>
        </div>
      </div>
      <div class="col-sm-9 my-auto">
        <div class="sutun-dokuz pl-0">
          <div class="">
            <!-- card-body -->

            <h5>
              <!-- card-title -->
              <router-link
                :to="{
                  name: 'getcategory',
                  params: { name: post.category.name }
                }"
                class="card-category-title"
              >
                {{ post.category.name }}</router-link
              >
            </h5>

            <h5>
              <!-- card-title -->
              <router-link
                :to="{
                  name: 'read',
                  params: { title: post.title }
                }"
                class="card-main-title"
              >
                {{ post.title }}</router-link
              >
            </h5>
            <p>
              By
              <span>
                <span>
                  <router-link
                    :to="{
                      name: 'getauthor',
                      params: { name: post.author.name }
                    }"
                    class="card-author-title"
                    ><strong>{{ post.author.name }}</strong>
                  </router-link></span
                >
              </span>
              on
              <span>{{ post.published }}</span>
            </p>
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
      type: Object,
      required: true
    }
  }
};
</script>

<style scoped></style>
