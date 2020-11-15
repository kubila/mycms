<template>
  <div></div>
</template>

<script>
export default {
  name: 'Gettag',
  metaInfo() {
    return {
      title: this.tag.name,
      meta: [
        {
          vmid: 'description',
          name: 'description',
          content: this.tag.name,
        },
      ],
    };
  },
  data() {
    return {};
  },
  props: {
    tag: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped></style>
