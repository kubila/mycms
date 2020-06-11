<template>
  <div class="col-md-4 my-2 sutun">
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
      <div class="mx-3 mt-2">
        <router-link
          :to="{
            name: 'getcategory',
            params: { name: card.category.name }
          }"
          class="card-category-title"
        >
          {{ card.category.name }}
        </router-link>

        <span class="pl-1">
          <p class="m-0 card-date">on {{ card.published }}</p>
        </span>

        <strong class="text-secondary pl-1">by</strong>
        <router-link
          :to="{
            name: 'getauthor',
            params: { name: card.author.name }
          }"
          class="card-author-title pl-1"
        >
          {{ card.author.name }}
        </router-link>

        <h5 class="mt-1">
          <router-link
            :to="{ name: 'read', params: { title: card.title } }"
            class="card-main-title"
          >
            {{ card.title }}
          </router-link>
        </h5>

        <p class="m-1" v-if="card.content.length > 120">
          <router-link
            :to="{ name: 'read', params: { title: card.title } }"
            class="card-main-text"
          >
            {{ card.content.slice(0, 120) + '...' }}
          </router-link>
        </p>
        <p class="m-1" v-else>
          <router-link
            :to="{ name: 'read', params: { title: card.title } }"
            class="card-main-text"
          >
            {{ card.content }}
          </router-link>
        </p>
      </div>
      <hr class="card-hr" />
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
