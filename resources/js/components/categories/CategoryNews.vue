<template>
  <div class="mt-2">
    <router-link :to="{ name: 'get-news', params: { title: news.title } }">{{
      news.title
    }}</router-link>
  </div>
</template>

<script>
export default {
  props: {
    news: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
