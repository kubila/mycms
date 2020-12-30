export const formMixin = {
  inheritAttrs: false,
  props: {
    label: {
      type: String,
      default: ''
    },
    value: {
      type: [String, Number, Object]
    }
  },
  methods: {
    updateValue(event) {
      this.$emit('input', event.target.value);
    }
  }
};
