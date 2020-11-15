<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="info" class="navy">
      <!-- <b-navbar-brand :to="{ name: 'app-home' }" class="navbar-brand text-light"
        >Blog Home</b-navbar-brand
      > -->
      <Button
        id="home-button"
        icon="pi pi-home"
        label="BlogHome"
        class="p-button-lg p-button-rounded p-button-text"
        @click="goToHome"
      />

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
      <b-collapse id="nav-collapse" is-nav>
        <!-- Right aligned navigation items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-form class="p-mr-4">
            <b-form-input
              size="md"
              class="mr-sm-2"
              placeholder="Search"
              v-model="form.search"
            ></b-form-input>
            <!-- <b-button size="sm" class="my-2 my-sm-0" type="submit"
              >Search</b-button
            > -->
          </b-nav-form>

          <div class="p-mr-2" v-if="!getUser">
            <!-- <span class="navbar-text">
              <router-link :to="{ name: 'login' }" class="text-light"
                >Login</router-link
              >
            </span> -->
            <Button
              icon="pi pi-sign-in"
              label="Login"
              class="p-button-outlined p-button-info"
              @click="goToLogin"
            />
          </div>
          <div class="p-mr-3" v-if="!getUser">
            <!-- <span class="navbar-text mr-4" >
              <router-link :to="{ name: 'register' }" class="text-light"
                >Register</router-link
              >
            </span> -->
            <Button
              icon="pi pi-user-plus"
              label="Register"
              class="p-button-outlined p-button-secondary"
              @click="goToRegister"
            />
          </div>
          <b-nav v-if="getUser">
            <b-nav-item active :to="{ name: 'posts' }">Posts</b-nav-item>
            <b-nav-item active :to="{ name: 'categories' }"
              >Categories</b-nav-item
            >
            <b-nav-item active :to="{ name: 'authors' }">Authors</b-nav-item>
          </b-nav>
          <Button
            v-if="getUser"
            label="Logout"
            icon="pi pi-sign-out"
            :style="{ 'margin-left': '0 .8em' }"
            @click="logout"
          />
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
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
    goToHome() {
      this.$router.push({ name: 'app-home' });
    },
    goToLogin() {
      this.$router.push({ name: 'login' });
    },
    goToRegister() {
      this.$router.push({ name: 'register' });
    },
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
