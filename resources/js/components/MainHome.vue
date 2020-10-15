<template>
  <div class="wrapper">
    <Navbar />

    <Sidebar
      :visible.sync="visibleLeft"
      :modal="false"
      :dismissable="true"
      position="right"
    >
      <div class="p-sidebar-active mt-5">
        <div class="pl-1 pr-4 pt-5 pb-3 overflow-scroll">
          <div v-if="!isCategoriesLoading">
            <nav class="mb-3 ">
              <b-nav vertical v-if="getUser">
                <b-nav-item active :to="{ name: 'posts' }">Posts</b-nav-item>
                <b-nav-item active :to="{ name: 'categories' }"
                  >Categories</b-nav-item
                >
                <b-nav-item active :to="{ name: 'authors' }"
                  >Authors</b-nav-item
                >
              </b-nav>

              <b-nav vertical style="margin-right: 3rem;">
                <h4>Categories</h4>
                <b-nav-item
                  class=""
                  v-for="category in categories"
                  :key="category.id"
                  :to="{ name: 'getcategory', params: { name: category.name } }"
                >
                  {{ category.name }}
                  <pre class="d-inline">({{ category.count }})</pre>
                </b-nav-item>
              </b-nav>
              <b-navbar-nav class="ml-auto mt-5">
                <div class="mr-2" v-if="!getUser">
                  <span class="navbar-text">
                    <router-link :to="{ name: 'login' }" class="text-dark"
                      >Login</router-link
                    >
                  </span>
                </div>
                <span class="navbar-text mr-4" v-if="!getUser">
                  <div>
                    <router-link :to="{ name: 'register' }" class="text-dark"
                      >Register</router-link
                    >
                  </div>
                </span>

                <span class="navbar-text ml-1 mr-2" v-if="getUser">
                  <router-link :to="{ name: 'admin' }" class="text-dark"
                    >Admin</router-link
                  >
                </span>

                <b-nav-item-dropdown right class="ml-1 mr-3" v-if="getUser">
                  <template v-slot:button-content>
                    <b-icon-person-circle><em>User</em></b-icon-person-circle>
                  </template>
                  <b-dropdown-item href="#">{{ user.name }}</b-dropdown-item>
                  <b-dropdown-item @click="logout" href="#"
                    >Sign Out</b-dropdown-item
                  >
                </b-nav-item-dropdown>
              </b-navbar-nav>

              <b-nav id="mylinks">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="https://github.com/kubila"
                    target="_blank"
                  >
                    <i class="pi pi-github" style="fontSize: 2rem"></i>
                  </a>
                </li>

                <li class="nav-item ml-2">
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
          <div
            v-else-if="isCategoriesLoading"
            style="display:flex; justify-content:center; margin-top: 30vh;"
          >
            <ProgressSpinner
              style="width:140px; height: 140px;"
              animationDuration="1s"
            />
          </div>
        </div>
      </div>
    </Sidebar>

    <Button
      icon="pi pi-angle-double-left"
      @click="switchSidebar"
      class="sitting-button p-button-lg"
    />
    <!-- mount components here -->
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
      visibleLeft: false,
      isCategoriesLoading: true
    };
  },
  async created() {
    await this.$store.dispatch('category/fetchCategories');
    this.isCategoriesLoading = false;
  },
  computed: {
    ...mapState('category', ['categories']),
    ...mapState(['user']),
    ...mapState(['isLoggedIn']),
    getUser() {
      return this.user;
    }
  },
  methods: {
    switchSidebar() {
      return (this.visibleLeft = !this.visibleLeft);
    },
    async logout() {
      await this.$store.dispatch('Logout');
    }
  }
};
</script>

<style scoped></style>
