<template>
  <div>
    <b-navbar toggleable="lg" type="dark" class="navy">
      <b-navbar-brand :to="{ name: 'app-home' }" class="navbar-brand text-light"
        >Blog Home</b-navbar-brand
      >

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item
            v-for="category in categories"
            :category="category"
            :key="category.id"
            :to="{ name: 'getcategory', params: { name: category.name } }"
          >
            {{ category.name }}
          </b-nav-item>
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-form class="mr-2" @submit.prevent="search">
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
          <!-- <Search :searchstring="searchstring" /> -->

          <div class="mr-2" v-if="!isLoggedIn">
            <span class="navbar-text">
              <router-link :to="{ name: 'login' }" class="text-light"
                >Login</router-link
              >
            </span>
          </div>
          <span class="navbar-text mr-4" v-if="!isLoggedIn">
            <div>
              <router-link :to="{ name: 'register' }" class="text-light"
                >Register</router-link
              >
            </div>
          </span>

          <span class="navbar-text ml-1 mr-2" v-if="isLoggedIn">
            <router-link :to="{ name: 'admin' }" class="text-light"
              >Admin</router-link
            >
          </span>

          <b-nav-item-dropdown right class="ml-1 mr-3" v-if="isLoggedIn">
            <!-- Using 'button-content' slot -->
            <template v-slot:button-content>
              <b-icon-person-circle><em>User</em></b-icon-person-circle>
            </template>
            <b-dropdown-item href="#">{{ user.name }}</b-dropdown-item>
            <b-dropdown-item @click="logout" href="#">Sign Out</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
import Vue from 'vue';
import { mapState, mapActions, mapGetters } from 'vuex';
import { BIcon, BIconPersonCircle, BIconPersonFill } from 'bootstrap-vue';
import { required, email, minLength } from 'vuelidate/lib/validators';
import Search from '../search/Search';
import cloneDeep from 'lodash/cloneDeep';

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
  async created() {
    await this.$store.dispatch('category/fetchCategories');
  },
  computed: {
    ...mapState('category', ['categories']),
    ...mapState(['isLoggedIn']),
    //...mapGetters(['Login']),
    user() {
      return this.$store.state.user;
    }
  },
  methods: {
    async logout() {
      await this.$store.dispatch('Logout');
    },
    async search() {
      const searchString = this.form.search;
      // this.$router.push({
      //   name: 'searches',
      //   params: { searchstring: searchString }
      // });
      await this.$store.dispatch('Search', searchString);
    }
  }
};
</script>

<style scoped></style>
