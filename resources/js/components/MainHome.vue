<template>
  <div class="wrapper">
    <Navbar />

    <Sidebar
      :visible.sync="visibleLeft"
      style="overflow: auto"
      :modal="false"
      :dismissable="true"
      class="p-sidebar-sm"
      position="right"
      ariaCloseLabel="Close"
    >
      <div class="p-sidebar-active">
        <div class="p-pl-1 p-pr-5 p-pb-3">
          <div v-if="!isCategoriesLoading">
            <nav class="p-mb-3">
              <b-nav vertical class="p-mr-3 p-mt-3">
                <h4 class="p-pb-2">Categories</h4>
                <b-nav-item
                  v-for="category in categories"
                  :key="category.id"
                  :to="{ name: 'getcategory', params: { name: category.name } }"
                >
                  {{ category.name }}
                  <pre class="d-inline">({{ category.count }})</pre>
                </b-nav-item>
              </b-nav>

              <b-nav id="mylinks" class="p-mt-6">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="https://github.com/kubila"
                    target="_blank"
                  >
                    <i class="pi pi-github" style="fontsize: 2rem"></i>
                  </a>
                </li>

                <li class="nav-item p-ml-2">
                  <a
                    class="nav-link"
                    href="https://www.linkedin.com/in/yasin-sunguray/"
                    target="_blank"
                  >
                    <i class="pi pi-twitter" style="fontsize: 2rem"></i>
                  </a>
                </li>
              </b-nav>
            </nav>
          </div>
          <div v-else-if="isCategoriesLoading" class="spinner">
            <ProgressSpinner
              style="width: 140px; height: 140px"
              animationDuration="1s"
            />
          </div>
        </div>
      </div>
    </Sidebar>
    <!-- <notifications /> -->
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
import Notifications from './notifications/Notifications';
import { mapState } from 'vuex';

export default {
  name: 'Mainhome',

  components: {
    Navbar,
    AppHome,
    Footer,
    AdminHome,
    Notifications,
  },
  data() {
    return {
      visibleLeft: false,
      isCategoriesLoading: true,
    };
  },
  created() {
    this.$store.dispatch('category/fetchCategories');
    return (this.isCategoriesLoading = false);
  },
  computed: {
    ...mapState('category', ['categories']),
  },
  methods: {
    switchSidebar() {
      return (this.visibleLeft = !this.visibleLeft);
    },
  },
};
</script>

<style scoped></style>
