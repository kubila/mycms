<template>
  <div class="wrapper">
    <Navbar />

    <Sidebar :visible.sync="visibleLeft" :modal="true" :dismissable="true">
      <div class="p-sidebar-active">
        <div class="p-3 mt-5 overflow-scroll">
          <nav class="mb-3 ">
            <b-nav vertical v-if="getUser">
              <b-nav-item active :to="{ name: 'posts' }">Posts</b-nav-item>
              <b-nav-item active :to="{ name: 'categories' }"
                >Categories</b-nav-item
              >
              <b-nav-item active :to="{ name: 'authors' }">Authors</b-nav-item>
            </b-nav>
            <b-nav vertical>
              <b-nav-item
                v-for="category in categories"
                :key="category.id"
                :to="{ name: 'getcategory', params: { name: category.name } }"
              >
                {{ category.name }}
              </b-nav-item>
            </b-nav>

            <b-nav vertical style="margin-top: 5rem;">
              <li class="nav-item">
                <a
                  class="nav-link"
                  href="https://github.com/kubila"
                  target="_blank"
                >
                  <i class="pi pi-github" style="fontSize: 2rem"></i>
                </a>
              </li>

              <li class="nav-item">
                <a
                  class="nav-link"
                  href="https://www.linkedin.com/in/yasin-sunguray/"
                  target="_blank"
                >
                  <i class="pi pi-twitter" style="fontSize: 2rem"></i>
                </a>
              </li>
            </b-nav>
          </nav>
        </div>
      </div>
    </Sidebar>

    <Button icon="pi pi-arrow-right" @click="visibleLeft = true" />
    <router-view :key="$route.fullPath" />
    <Footer />
  </div>
</template>

<script>
import Navbar from './layout/Navbar';
import AppHome from './layout/AppHome';
import Footer from './layout/Footer';
import AdminHome from './admin/AdminHome';
import { mapState } from 'vuex';

export default {
  components: {
    Navbar,
    AppHome,
    Footer,
    AdminHome
  },
  data() {
    return {
      visibleLeft: false
    };
  },
  computed: {
    ...mapState('category', ['categories']),
    ...mapState(['user']),
    getUser() {
      return this.user;
    }
  }
};
</script>

<style scoped></style>
