<template>
  <nav class="navbar navbar-expand-sm navy">
    <button
      class="navbar-toggler"
      id="navbarContent"
      type="button"
      data-toggle="collapse"
      aria-expanded="false"
      aria-label="Toggle navigation"
      aria-controls="navbarContent"
    >
      <span class="navbar-toggler-icon"></span><i class="fas fa-bars"></i>
    </button>
    <!--
        <button
            class="navbar-toggler btn-link"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>-->
    <div
      class="collapse navbar-collapse"
      id="navbarText"
      aria-labelledby="navbarContent"
    >
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link
            :to="{ name: 'app-home' }"
            class="navbar-brand text-light"
            >Blog Home</router-link
          >
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a
              class="btn btn-link text-light dropdown-toggle"
              id="dLabel"
              type="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="dLabel" ref="dropdown">
              <a
                class="dropdown-item lead"
                href="#"
                v-for="category in categories"
                :key="category.id"
                :category="category"
                >{{ category.name }}
              </a>
            </div>
          </div>
        </li>

        <li class="nav-item">
          <!-- <a
            class="nav-link text-light dropdown-toggle"
            href="#"
            role="button"
            id="navbarDropdown"
            >Authors</a
          > -->
          <div class="dropdown">
            <a
              class="btn btn-link text-light dropdown-toggle"
              id="navbarDropdown"
              type="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Authors
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </li>
      </ul>
      <div class="mr-2" v-if="!isLoggedIn">
        <span class="navbar-text">
          <router-link :to="{ name: 'login' }" class="text-light"
            >Login</router-link
          >
        </span>
      </div>
      <span class="navbar-text mr-2" v-if="!isLoggedIn">
        <div>
          <router-link :to="{ name: 'register' }" class="text-light"
            >Register</router-link
          >
        </div>
      </span>

      <div class="text-white mr-3" v-if="isLoggedIn">
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
            <a class="dropdown-item text-danger lead" @click="logout">Logout</a>
          </div>
        </div>
      </div>
      <span class="navbar-text ml-1 mr-2" v-if="isLoggedIn">
        <router-link :to="{ name: 'admin' }" class="text-light"
          >Admin</router-link
        >
      </span>
    </div>
  </nav>
</template>

<script>
import { mapState, mapActions } from 'vuex';
export default {
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
    logout() {
      this.$store.dispatch('Logout');
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
  background-color: #322348;
}
.navbar-nav .nav-link {
  /* color: rgba(255, 255, 255, 0.5);*/
  font-size: 1rem;
}

.dropdown-menu {
  background-color: rgb(122, 88, 177);
}

/* .dropdown:hover .dropdown-menu {
  display: block !important;
  margin-top: 0;
} */
</style>
