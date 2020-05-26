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
                  v-model="form.email"
                  type="text"
                  name="email"
                  class="form-control"
                  placeholder="Email"
                  @blur="$v.form.email.$touch()"
                />
                <template v-if="$v.form.email.$error">
                  <span v-if="!$v.form.email.required" class="form-error"
                    >Email is required</span
                  >
                </template>
              </div>

              <div class="form-group">
                <input
                  v-model="form.password"
                  type="password"
                  name="password"
                  class="form-control"
                  placeholder="Password"
                  @blur="$v.form.password.$touch()"
                />
                <template v-if="$v.form.password.$error">
                  <span v-if="!$v.form.password.required" class="form-error"
                    >Password is required</span
                  >
                </template>
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
import { required, email } from 'vuelidate/lib/validators';

export default {
  data() {
    return {
      form: {
        email: null,
        password: null
      }
    };
  },
  validations: {
    form: {
      email: {
        required,
        email
      },
      password: {
        required
      }
    }
  },
  methods: {
    async login() {
      this.$v.form.$touch();
      if (this.$v.form.$invalid) {
        return;
      }
      await this.$store
        .dispatch('fetchToken', {
          email: this.form.email,
          password: this.form.password
        })
        .then(() => this.$store.dispatch('fetchUser'))
        .then(() => this.$store.dispatch('isLoggedIn'))
        .then(() => this.$router.push({ name: 'app-home' }));
    }
  }
};
</script>

<style lang="scss" scoped></style>
