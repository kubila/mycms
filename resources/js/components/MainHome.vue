<template>
  <div class="wrapper">
    <Navbar />

    <Sidebar
      :visible.sync="visibleLeft"
      style="overflow: auto"
      :modal="true"
      :dismissable="false"
      class="p-sidebar-sm"
      position="right"
      :showCloseIcon="false"
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
    <Button :icon="switchIcon" @click="switchSidebar" :class="switchClass" />
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
  metaInfo() {
    return {
      title: 'Blog Home Page',
      meta: [
        {
          vmid: 'description',
          name: 'description',
          content:
            'Open Source, Laravel, .NET Core, Javascript, React, Vue, SQL, Full Stack',
        },
      ],
    };
  },
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
      isOpen: false,
    };
  },
  created() {
    this.$store.dispatch('category/fetchCategories');
    return (this.isCategoriesLoading = false);
  },
  computed: {
    ...mapState('category', ['categories']),
    switchClass() {
      return [
        'sitting-button p-button-lg',
        {
          'sitting-button-switched': this.isOpen == true,
          'sitting-button-unswitched': this.isOpen !== true,
        },
      ];
    },
    switchIcon() {
      return [
        'pi ',
        {
          'pi-angle-double-left': this.isOpen !== true,
          'pi-angle-double-right': this.isOpen == true,
        },
      ];
    },
  },
  methods: {
    switchSidebar() {
      this.isOpen = !this.isOpen;
      return (this.visibleLeft = !this.visibleLeft);
    },
  },
};
</script>

<style scoped>
.sitting-button-switched {
  margin-right: 320px !important;
  transition: 0.3s;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
}
.sitting-button-unswitched {
  margin-right: 0px !important;
  transition: 0.3s;
  -webkit-transition: 0.3s;
  -moz-transition: 0.3s;
}
</style>
