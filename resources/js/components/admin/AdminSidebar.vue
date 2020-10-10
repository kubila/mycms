<template>
  <div class="col-auto px-0 mt-5">
    <Sidebar :visible.sync="visibleLeft" :modal="false" :dismissable="true">
      <!-- Content
      <router-link :to="{ name: 'posts' }" class="nav-item">Posts</router-link>
      <router-link :to="{ name: 'categories' }" class="nav-item"
        >Categories</router-link
      >
      <router-link :to="{ name: 'posts' }" class="nav-item"
        >Authors</router-link
      > -->
      <div class="p-sidebar-active">
        <div class="p-3">
          <nav class="mb-3">
            <b-nav vertical>
              <b-nav-item active :to="{ name: 'posts' }">Posts</b-nav-item>
              <b-nav-item active :to="{ name: 'categories' }"
                >Categories</b-nav-item
              >
              <b-nav-item active :to="{ name: 'authors' }">Authors</b-nav-item>
            </b-nav>
          </nav>
        </div>
      </div>
    </Sidebar>

    <Button icon="pi pi-arrow-right" @click="visibleLeft = true" />
  </div>
</template>

<script>
import Vue from 'vue';
// import Sidebar from 'primevue/sidebar';

// Vue.component('Sidebar', Sidebar);
export default {
  data() {
    return {
      visibleLeft: false
    };
  }
};
</script>

<style lang="scss" scoped></style>
