<template>
  <div class="container inner-wrapper form-register">
    <div class="row mb-5">
      <div class="col-lg-5 col-md-7 col-sm-9 mx-auto login-col">
        <div class="card login-card">
          <div class="card-header bg-grey">
            <h1 class="form-text text-white-50">Register</h1>
          </div>
          <div class="card-body">
            <form @submit.prevent="register">
              <div class="form-group">
                <label for="name" class="text-white-50 lead">Name</label>
                <input
                  id="name"
                  v-model="form.name"
                  @blur="$v.form.name.$touch()"
                  type="text"
                  name="name"
                  class="form-control"
                />
                <template v-if="$v.form.name.$error">
                  <span v-if="!$v.form.name.required" class="form-error"
                    >Name is required</span
                  >
                </template>
              </div>

              <div class="form-group">
                <label for="email" class="text-white-50 lead"
                  >Email Address</label
                >
                <input
                  id="email"
                  v-model="form.email"
                  @blur="$v.form.email.$touch()"
                  type="text"
                  name="email"
                  class="form-control"
                />
                <template v-if="$v.form.email.$error">
                  <span v-if="!$v.form.email.required" class="form-error"
                    >Email is required</span
                  >
                  <span v-else-if="!$v.form.email.email" class="form-error"
                    >This is not a valid email address</span
                  >
                </template>
              </div>

              <div class="form-group">
                <label for="password" class="text-white-50 lead"
                  >Password</label
                >
                <input
                  id="password"
                  v-model="form.password"
                  @blur="$v.form.password.$touch()"
                  type="password"
                  name="password"
                  class="form-control"
                />
                <template v-if="$v.form.password.$error">
                  <span v-if="!$v.form.password.required" class="form-error"
                    >Password is required</span
                  >
                </template>
              </div>

              <div class="form-group">
                <label for="password_confirm" class="text-white-50 lead"
                  >Confirm Password</label
                >
                <input
                  id="password_confirm"
                  v-model="form.password_confirm"
                  @blur="$v.form.password_confirm.$touch()"
                  type="password"
                  name="password_confirm"
                  class="form-control"
                />
                <template v-if="$v.form.password_confirm.$error">
                  <span
                    v-if="!$v.form.password_confirm.required"
                    class="form-error"
                    >Password confirmation is required</span
                  >
                </template>
              </div>

              <button type="submit" class="col btn btn-dark btn-md">
                <i class="fas fa-user"></i>Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { required, email, minLength } from 'vuelidate/lib/validators';
import UserService from '../../services/UserService';

export default {
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        password_confirm: null
      }
    };
  },
  validations: {
    form: {
      name: {
        required
      },
      email: {
        required,
        email
      },
      password: {
        required
      },
      password_confirm: {
        required
      }
    }
  },
  methods: {
    async register() {
      this.$v.form.$touch();
      if (this.$v.form.$invalid) {
        return;
      }

      const credentials = {
        name: this.form.name,
        email: this.form.email,
        password: this.form.password,
        password_confirmation: this.form.password_confirm
      };
      return UserService.signUp(credentials)
        .then(response => {
          console.log(response.data);
        })
        .catch(error => {
          console.log(error.response);
        });

      //console.log(this.form);
    }
  }
};
</script>

<style lang="scss" scoped></style>
