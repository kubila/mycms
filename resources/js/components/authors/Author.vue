<template>
  <div class="">
    <h5 class="card-main-title">{{ authorFound.name }}</h5>
    <p class="pt-1">
      <em class="text-info">{{ authorFound.description }}</em>
    </p>
    <p class="card-category-title">
      <em class="text-info"> Since: {{ authorFound.created }}</em>
    </p>
  </div>
</template>

<script>
export default {
  props: {
    authorFound: {
      type: Object,
      required: true
    }
  },
  data() {
    return {};
  }
};
</script>

<style lang="scss" scoped></style>
