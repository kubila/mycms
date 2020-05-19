<template>
  <div>
    <b-navbar toggleable="lg" type="dark" class="navy">
      <b-navbar-brand :to="{ name: 'app-home' }" class="navbar-brand text-light"
        >Blog Home</b-navbar-brand
      >

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item-dropdown text="Categories" left variant="dark">
            <b-dropdown-item
              class="dropdown-item"
              href="#"
              v-for="category in categories"
              :key="category.id"
              :category="category"
              >{{ category.name }}
            </b-dropdown-item>
          </b-nav-item-dropdown>

          <b-nav-item-dropdown text="Authors" left variant="light">
            <b-dropdown-item class="dropdown-item" href="#"
              >{{ 'wasd' }}
            </b-dropdown-item>
          </b-nav-item-dropdown>
          <!-- <b-nav-item href="#">Link</b-nav-item> -->
        </b-navbar-nav>

        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-form class="mr-2">
            <b-form-input
              size="sm"
              class="mr-sm-2"
              placeholder="Search"
            ></b-form-input>
            <b-button size="sm" class="my-2 my-sm-0" type="submit"
              >Search</b-button
            >
          </b-nav-form>

          <!-- <b-nav-item-dropdown text="Lang" right variant="dark">
            <b-dropdown-item href="#">EN</b-dropdown-item>
            <b-dropdown-item href="#">ES</b-dropdown-item>
            <b-dropdown-item href="#">RU</b-dropdown-item>
            <b-dropdown-item href="#">FA</b-dropdown-item>
          </b-nav-item-dropdown> -->

          <div class="mr-2" v-if="!isLoggedIn">
            <span class="navbar-text">
              <router-link :to="{ name: 'login' }" class="text-light"
                >Login</router-link
              >
            </span>
          </div>
          <span class="navbar-text mr-3" v-if="!isLoggedIn">
            <div>
              <router-link :to="{ name: 'register' }" class="text-light"
                >Register</router-link
              >
            </div>
          </span>

          <!-- <div class="text-white mr-3" v-if="isLoggedIn">
            <div class="dropdown">
              <a
                class="btn btn-link btn-md text-light dropdown-toggle"
                id="userDropdown"
                type="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                {{ user.name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="userDropdown">
                <span class="dropdown-item navbar-text">{{ user.name }}</span>
                <span class="dropdown-item navbar-text">{{ user.email }}</span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger lead" @click="logout"
                  >Logout</a
                >
              </div>
            </div>
          </div>
          <span class="navbar-text ml-1 mr-2" v-if="isLoggedIn">
            <router-link :to="{ name: 'admin' }" class="text-light"
              >Admin</router-link
            >
          </span> -->

          <b-nav-item-dropdown right class="ml-1 mr-3" v-if="isLoggedIn">
            <!-- Using 'button-content' slot -->
            <template v-slot:button-content>
              <b-icon-people-circle><em>User</em></b-icon-people-circle>
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
import { mapState, mapActions } from 'vuex';
import { BIcon, BIconPeopleCircle, BIconPersonFill } from 'bootstrap-vue';
export default {
  components: {
    BIcon,
    BIconPeopleCircle,
    BIconPersonFill
  },
  data() {
    return {};
  },
  created() {
    this.$store.dispatch('fetchCategories');
  },
  computed: {
    ...mapState(['categories']),
    ...mapState(['isLoggedIn']),
    user() {
      return this.$store.state.user;
    }
  },
  methods: {
    async logout() {
      await this.$store.dispatch('Logout');
      // FIX ME redirect after logout to refresh page
      //this.$router.push({ name: 'out' });
    }
  }

  // methods: {
  //   onOver() {
  //     this.$refs.dropdown.visible = true;
  //   },
  //   onLeave() {
  //     this.$refs.dropdown.visible = false;
  //   }
  // }
};
</script>

<style scoped>
.navy {
  /*background-color: #563d7c !important;*/
  /*background-color: #1e1e1e;*/
  background-color: #322348 !important;
}
.navbar-nav .nav-link {
  /* color: rgba(255, 255, 255, 0.5);*/
  font-size: 1rem;
}

.menu {
  background-color: rgb(122, 88, 177) !important;
}
</style>
