<template>
  <div class="my-auto mr-2">
    {{ searchstring }}
  </div>
</template>

<script>
export default {
  props: {
    searchstring: {
      type: String,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
