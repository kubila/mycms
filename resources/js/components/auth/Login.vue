<template>
  <div class="container inner-wrapper form-login">
    <div class="row mb-5">
      <div class="col-lg-5 col-md-7 col-sm-9 mx-auto login-col">
        <div class="card login-card">
          <div class="card-header bg-grey">
            <h6 class="form-text text-white-50">Login</h6>
          </div>
          <div class="card-body">
            <form @submit.prevent="login">
              <div class="form-group">
                <input
                  v-model="email"
                  type="text"
                  name="email"
                  class="form-control"
                  placeholder="Email"
                />
              </div>

              <div class="form-group">
                <input
                  v-model="password"
                  type="password"
                  name="password"
                  class="form-control"
                  placeholder="Password"
                />
              </div>

              <button type="submit" class="btn btn-dark btn-md">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
    async login() {
      await this.$store.dispatch('fetchToken', {
        email: this.email,
        password: this.password
      });

      //const token = localStorage.getItem('token');
      await this.$store.dispatch('fetchUser');
      await this.$store.dispatch('isLoggedIn');
      await this.$router.push({ name: 'app-home' });
    }
  }
};
</script>

<style lang="scss" scoped></style>
