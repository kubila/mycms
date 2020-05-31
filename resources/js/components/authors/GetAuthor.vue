<template>
  <div>
    {{ author.name }}
  </div>
</template>

<script>
export default {
  props: {
    author: {
      type: Object,
      requried: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
