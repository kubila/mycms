<template>
  <div class="col-auto px-0 mt-5">
    <b-button
      v-b-toggle.sidebar-no-header
      style="border-radius: 0; background-color: #2176bd;"
      ><b-icon
        icon="arrow-down-right-square-fill"
        style="width: 30px; height: 30px;"
        aria-hidden="true"
      ></b-icon>
    </b-button>
    <b-sidebar
      id="sidebar-no-header"
      aria-labelledby="sidebar-no-header-title"
      no-header
      shadow
    >
      <template v-slot:default="{ hide }">
        <div class="p-3">
          <nav class="mb-3">
            <b-nav vertical>
              <!-- <router-link :to="{ name: 'posts' }" class="nav-item"
                >Posts</router-link
              > -->
              <b-nav-item active :to="{ name: 'posts' }">Posts</b-nav-item>
              <b-nav-item active :to="{ name: 'categories' }"
                >Categories</b-nav-item
              >
              <b-nav-item active :to="{ name: 'authors' }">Authors</b-nav-item>
            </b-nav>
          </nav>
          <b-button variant="primary" block @click="hide">Close </b-button>
        </div>
      </template>
    </b-sidebar>
  </div>
</template>

<script>
import { BIconArrowDownRightSquareFill } from 'bootstrap-vue';
export default {
  components: {
    BIconArrowDownRightSquareFill
  },
  data() {
    return {};
  }
};
</script>

<style lang="scss" scoped></style>
