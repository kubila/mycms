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
                  <span v-if="!$v.form.email.email" class="form-error"
                    >This is not a valid email address</span
                  >
                  <span v-if="!$v.form.email.maxLength" class="form-error"
                    >Email must be 255 or less characters length!</span
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
                  <span v-if="!$v.form.password.minLength" class="form-error"
                    >Password must be at least 6 characters length</span
                  >
                </template>
              </div>

              <p
                v-if="status === 400 || status === 404 || status === 401"
                class="form-error"
              >
                Login info is invalid
              </p>

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
import {
  required,
  email,
  minLength,
  maxLength
} from 'vuelidate/lib/validators';

export default {
  data() {
    return {
      form: {
        email: null,
        password: null
      },
      status: null
    };
  },
  validations: {
    form: {
      email: {
        required,
        email,
        maxLength: maxLength(255)
      },
      password: {
        required,
        minLength: minLength(6)
      }
    }
  },
  methods: {
    async login() {
      this.$v.form.$touch();
      if (this.$v.form.$invalid) {
        return;
      }
      await this.$store.dispatch('fetchToken', {
        email: this.form.email,
        password: this.form.password
      });
      await this.$store.dispatch('fetchUser');
      await this.$store.dispatch('isLoggedIn');
      await this.$router.push({ name: 'app-home' }).catch(err => {
        this.status = err.response.status;
      });
    }
  }
};
</script>

<style lang="scss" scoped></style>
