<template>
  <div>
    <Card style="margin-bottom: 1em; margin-left: 10px; margin-right:10px;">
      <template slot="title">
        Simple Card
      </template>
      <template slot="content">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore
          sed consequuntur error repudiandae numquam deserunt quisquam repellat
          libero asperiores earum nam nobis, culpa ratione quam perferendis
          esse, cupiditate neque quas!
        </p>
      </template>
    </Card>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: {
    news: {
      type: Array,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped></style>
