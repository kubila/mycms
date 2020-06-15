<template>
  <div class="container inner-wrapper form-login">
    <div class="row mb-5">
      <div class="col-sm-12 mx-auto">
        <div class="">
          <h5 class="lead">
            Ohh No! We couldn't find what you're looking for.
          </h5>
          <router-link :to="{ name: 'app-home' }">Got to Home</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped></style>
