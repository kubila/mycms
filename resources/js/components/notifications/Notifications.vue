<template>
  <!-- <div v-for="nfs in notifications">
    <b-toast id="my-toast" :title="nfs.statusText" static no-auto-hide>
      {{ nfs.status, nfs.data }}
    </b-toast>
  </div> -->
  <div>
    <b-button @click="toast('b-toaster-top-right', true)" class="mb-2"
      >Toast</b-button
    >
  </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
  data() {
    return {
      counter: 2
    };
  },
  computed: {
    ...mapState('notification', ['notifications'])
  },
  mounted() {},
  methods: {
    toast(toaster, append = false) {
      this.counter++;
      this.$bvToast.toast(`Toast ${this.counter} body content`, {
        title: this.notifications.statusText,
        toaster: toaster,
        solid: true,
        appendToast: append
      });
    }
  }
};
</script>

<style lang="scss" scoped></style>
