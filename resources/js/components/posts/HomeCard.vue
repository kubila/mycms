<template>
  <div class="p-col-12 p-sm-6 p-md-6 p-lg-4 p-py-lg-1">
    <Card class="main-post p-my-2 p-m-sm-2 p-my-md-2 p-mx-md-2">
      <template slot="header">
        <router-link :to="{ name: 'read', params: { title: card.title } }">
          <img alt="user header" :src="`/storage/${card.image}`" />
        </router-link>
      </template>

      <template slot="title">
        <!-- <pre class="d-inline text-secondary pl-1 date-sizes">in</pre> -->
        <router-link
          :to="{
            name: 'getcategory',
            params: { name: card.category.name }
          }"
          class="card-category-title"
        >
          {{ card.category.name }}
        </router-link>

        <em>
          <pre class="d-inline text-secondary pl-1 date-sizes">by</pre>
          <router-link
            :to="{
              name: 'getauthor',
              params: { name: card.author.name }
            }"
            class="card-author-title"
          >
            {{ card.author.name }}
          </router-link>
        </em>
      </template>
      <template slot="title">
        <h5 class="mt-1">
          <router-link
            :to="{ name: 'read', params: { title: card.title } }"
            class="card-main-title"
          >
            {{ card.title }}
          </router-link>
        </h5>
      </template>
      <template slot="subtitle"> </template>

      <template slot="content">
        <p class="m-1" v-if="card.content.length > 120">
          <router-link
            :to="{ name: 'read', params: { title: card.title } }"
            class="card-main-text"
          >
            {{ card.content.slice(0, 120) + '...' }}
          </router-link>
        </p>
      </template>
      <template slot="footer"> </template>
      <hr class="card-hr" />
    </Card>
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
