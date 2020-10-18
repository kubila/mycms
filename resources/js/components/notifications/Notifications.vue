<template>
  <div>
    <Toast position="top-right" />
  </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
  data() {
    return {};
  },
  computed: {
    ...mapState('notification', ['notifications'])
  },
  mounted() {
    this.$toast.add({
      severity: 'success',
      summary: 'Success Message',
      detail: 'Order submitted',
      life: 3000
    });
  },
  methods: {}
};
</script>

<style lang="scss" scoped></style>
