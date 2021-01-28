<template>
  <div>
    <label :class="labelClass" class="mb-1" v-if="label"
      ><b>{{ label }}</b></label
    >
    <select
      :value="value.name"
      @change="updateValue"
      v-on="$listeners"
      v-bind="$attrs"
      class="form-control ml-1"
    >
      <option
        v-for="option in options"
        :key="option.id"
        :value="option.name"
        :selected="option.name === value"
      >
        {{ option.name }}
      </option>
    </select>
  </div>
</template>

<script>
import { formMixin } from './formMixin';
export default {
  mixins: [formMixin],
  data() {
    return {};
  },
  props: {
    options: {
      type: Array,
      required: true,
    },
    labelClass: {
      type: String,
      default: '',
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
