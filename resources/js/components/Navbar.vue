<template>
  <nav class="navbar navbar-expand-md navy">
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarText"
      aria-controls="navbarText"
      aria-expanded="false"
      aria-label="Toggle navigation"
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
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link :to="{ name: 'app-home' }" class="navbar-brand"
            >Home</router-link
          >
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#"
            >Home <span class="sr-only">(current)</span></a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
      <span class="navbar-text">
        <div><router-link :to="{ name: 'admin' }">Admin</router-link></div>
      </span>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {};
  }
};
</script>

<style scoped>
.navy {
  /*background-color: #563d7c !important;*/
  /*background-color: #1e1e1e;*/
  background-color: #322348;
}
.navbar-nav .nav-link {
  color: rgba(255, 255, 255, 0.5);
}
</style>
