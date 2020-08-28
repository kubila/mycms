<template>
  <!-- <div class="col-md-2 px-0">
    <div class="admin-sidebar">
      <div class="admin-inner-sidebar">
        <ul class="nav flex-column pt-5">
          <li class="nav-item admin-list">
            <a href="#" class="nav-link admin-link">Posts</a>
          </li>
          <li class="nav-item admin-list">
            <a href="#" class="nav-link admin-link">Categories</a>
          </li>
          <li class="nav-item admin-list">
            <a href="#" class="nav-link admin-link">Authors</a>
          </li>
        </ul>
      </div>
    </div>
  </div> -->

  <div class="col-auto px-0">
    <b-button
      v-b-toggle.sidebar-no-header
      style="border-radius: 0; background-color: #2176bd;"
      ><b-icon
        icon="arrow-right-square"
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
          <h4 id="sidebar-no-header-title">Custom header sidebar</h4>
          <p>
            Cras mattis consectetur purus sit amet fermentum. Cras justo odio,
            dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta
            ac consectetur ac, vestibulum at eros.
          </p>
          <nav class="mb-3">
            <b-nav vertical>
              <b-nav-item active @click="hide">Active</b-nav-item>
              <b-nav-item href="#link-1" @click="hide">Link</b-nav-item>
              <b-nav-item href="#link-2" @click="hide">Another Link</b-nav-item>
            </b-nav>
          </nav>
          <b-button variant="primary" block @click="hide"
            >Close Sidebar</b-button
          >
        </div>
      </template>
    </b-sidebar>
  </div>
</template>

<script>
import { BIconArrowRightSquare } from 'bootstrap-vue';
export default {
  components: {
    BIconArrowRightSquare
  }
};
</script>

<style lang="scss" scoped></style>
