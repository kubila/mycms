<template>
  <div class="col-md-4 my-3 sutun">
    <div class="main-post">
      <div>
        <router-link :to="{ name: 'read', params: { title: card.title } }">
          <img
            :src="`/images/${card.image}`"
            alt="Just a pic"
            class="img-fluid"
          />
        </router-link>
      </div>
      <div class="mx-3 mt-1">
        <router-link
          :to="{
            name: 'getcategory',
            params: { name: card.category.name }
          }"
          class="card-category-title"
        >
          {{ card.category.name }}
        </router-link>

        <h5>
          <router-link
            :to="{ name: 'read', params: { title: card.title } }"
            class="card-main-title"
          >
            {{ card.title }}
          </router-link>
        </h5>

        <p class="m-1" v-if="card.content.length > 120">
          {{ card.content.slice(0, 120) + '...' }}
        </p>
        <p class="m-1" v-else>
          {{ card.content }}
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
    card: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
