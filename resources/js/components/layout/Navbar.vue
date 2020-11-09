<template>
  <!-- <div>
    <b-navbar toggleable="lg" type="dark" class="navy">
      <b-navbar-brand :to="{ name: 'app-home' }" class="navbar-brand text-light"
        >Blog Home</b-navbar-brand
      >

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav> -->
  <!-- <b-navbar-nav>
          <b-nav-item
            v-for="category in categories"
            :category="category"
            :key="category.id"
            :to="{ name: 'getcategory', params: { name: category.name } }"
          >
            {{ category.name }}
          </b-nav-item>
        </b-navbar-nav> -->

  <!-- <b-navbar-nav class="ml-auto">
          <b-nav-form class="mr-5" @submit.prevent="search">
            <b-form-input
              size="sm"
              class="mr-sm-2"
              placeholder="Search"
              name="search"
              v-model="form.search"
            ></b-form-input>
            <b-button size="sm" class="my-2 my-sm-0" type="submit"
              >Search</b-button
            >
          </b-nav-form>
        </b-navbar-nav> -->
  <!-- </b-collapse>
    </b-navbar>
  </div> -->
  <Menubar>
    <template #start>
      <b-navbar-brand :to="{ name: 'app-home' }" class="navbar-brand text-light"
        >Blog Home</b-navbar-brand
      >
    </template>
    <template #end>
      <b-nav vertical v-if="getUser" class="p-mt-3">
        <b-nav-item active :to="{ name: 'posts' }"
          ><b class="text-dark">Posts</b></b-nav-item
        >
        <b-nav-item active :to="{ name: 'categories' }"
          ><b class="text-dark">Categories</b></b-nav-item
        >
        <b-nav-item active :to="{ name: 'authors' }"
          ><b class="text-dark">Authors</b></b-nav-item
        >
      </b-nav>

      <!-- <b-navbar-nav class="ml-auto p-mt-3 p-mb-6"> -->
      <div class="mr-2" v-if="!getUser">
        <span class="navbar-text">
          <router-link :to="{ name: 'login' }" class="text-dark"
            ><b>Login</b></router-link
          >
        </span>
      </div>
      <div>
        <span class="navbar-text mr-4" v-if="!getUser">
          <router-link :to="{ name: 'register' }" class="text-dark"
            ><b>Register</b></router-link
          >
        </span>
      </div>
      <!-- <span class="navbar-text ml-1 mr-2" v-if="getUser">
                  <router-link :to="{ name: 'admin' }" class="text-dark"
                    >Admin</router-link
                  >
                </span> -->
      <!--
                <b-nav-item-dropdown
                  left
                  class="ml-1 mr-3"
                  variant="primary"
                  v-if="getUser"
                >
                  <template #button-content>
                    <i class="pi pi-user" style="fontSize: 1.5rem"></i
                    ><span class="p-pl-2">{{ user.name }}</span>
                  </template>

                  <b-dropdown-item @click="logout" href="#"
                    >Sign Out</b-dropdown-item
                  >
                </b-nav-item-dropdown> -->
      <!-- </b-navbar-nav> -->
      <InputText placeholder="Search" type="text" />
      <Button
        v-if="getUser"
        label="logout"
        icon="pi pi-power-off"
        :style="{ 'margin-left': '0 .5em' }"
        @click="logout"
      />
    </template>
  </Menubar>
</template>

<script>
import { mapState } from 'vuex';
import { BIcon, BIconPersonCircle, BIconPersonFill } from 'bootstrap-vue';
import { required, minLength } from 'vuelidate/lib/validators';
import Search from '../search/Search';

export default {
  components: {
    BIcon,
    BIconPersonCircle,
    BIconPersonFill,
    Search
  },
  data() {
    return {
      form: {
        search: null
      }
    };
  },
  computed: {
    ...mapState(['isLoggedIn']),
    ...mapState(['user']),
    getUser() {
      return this.user;
    }
  },
  methods: {
    async search() {
      const searchString = this.form.search;
      // this.$router.push({
      //   name: 'searches',
      //   params: { searchstring: searchString }
      // });
      await this.$store.dispatch('Search', searchString);
    },
    async logout() {
      await this.$store.dispatch('Logout');
    }
  }
};
</script>

<style scoped></style>
