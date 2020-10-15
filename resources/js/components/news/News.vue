<template>
  <div class="p-ml-1">
    <DataView
      :value="value"
      layout="list"
      :paginator="true"
      :rows="4"
      paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
      currentPageReportTemplate="Showing {first} to {last} of {totalRecords} posts"
    >
      >
      <template #list="slotProps">
        <Card>
          <template slot="title"> </template>
          <template slot="content">
            Simple Card Lorem ipsum dolor sit amet, consectetur adipisicing
            elit. Inventore
            <p>
              <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore
          sed consequuntur error repudiandae numquam deserunt quisquam repellat
          libero asperiores earum nam nobis, culpa ratione quam perferendis
          esse, cupiditate neque quas! -->
            </p>
          </template>
        </Card>
      </template>
    </DataView>
  </div>
</template>

<script>
export default {
  data() {
    return {
      value: ''
    };
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
