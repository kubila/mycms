<template>
  <div class="mt-2">
    <h5>{{ authorFound.name }}</h5>
    <p class="">{{ authorFound.description }}</p>
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
