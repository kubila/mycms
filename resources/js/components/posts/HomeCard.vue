<template>
  <div class="col-sm-4 my-3">
    <Card class="main-post">
      <template slot="header">
        <router-link :to="{ name: 'read', params: { title: card.title } }">
          <img alt="user header" :src="`/storage/${card.image}`" />
        </router-link>
      </template>

      <template slot="title">
        <pre class="d-inline text-secondary pl-1 date-sizes">in</pre>
        <router-link
          :to="{
            name: 'getcategory',
            params: { name: card.category.name }
          }"
          class="card-category-title"
        >
          {{ card.category.name }}
        </router-link>
        <!-- <span>
          <pre class="date-sizes pl-1 d-inline">on</pre>
          <p class="date-sizes text-black-50 d-inline">{{ card.published }}</p>
        </span> -->
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
        <!-- <span class="pl-1">
          <p class="m-0 card-date">on {{ card.published }}</p>
        </span> -->
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
      <template slot="footer">
        <!-- <div>
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
        </div> -->
      </template>
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
