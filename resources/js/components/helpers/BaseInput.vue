<template>
  <div>
    <label for="" v-if="label"
      ><b>{{ label }}</b></label
    >
    <input
      class="form-control"
      :value="value"
      v-on="$listeners"
      v-bind="$attrs"
      @input="updateValue"
    />
  </div>
</template>

<script>
import { formMixin } from './formMixin';
export default {
  mixin: [formMixin],
  computed: {
    listeners() {
      return {
        ...this.$listeners,
        input: this.updateValue,
      };
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
