<template>
  <div class="container inner-wrapper form-register">
    <div class="row mb-5">
      <div class="col-lg-5 col-md-7 col-sm-9 mx-auto login-col">
        <!-- <div class="card login-card">
          <div class="card-header bg-grey">
            <h1 class="form-text text-white-50">Register</h1>
          </div>
          <div class="card-body"> -->
        <FormulateForm class="login-form" v-model="formValues">
          <h2 class="form-title">Register</h2>

          <FormulateInput
            name="name"
            type="text"
            label="Your name"
            placeholder="Your name"
            validation="required"
          />
          <FormulateInput
            name="email"
            type="email"
            label="Email address"
            placeholder="Email address"
            validation="required|email"
          />
          <div class="double-wide">
            <FormulateInput
              name="password"
              type="password"
              label="Password"
              placeholder="Your password"
              validation="required"
            />
            <FormulateInput
              name="password_confirm"
              type="password"
              label="Confirm your password"
              placeholder="Confirm password"
              validation="required|confirm"
              validation-name="Confirmation"
            />
            <!-- </div> -->
            <FormulateInput type="submit" label="Register" />
          </div>
          <pre class="code" v-text="formValues" />
        </FormulateForm>
        <!-- </div>
        </div> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      formValues: {}
    };
  }
};
</script>

<style scoped>
.login-form {
  padding: 2em;
  border: 1px solid #a8a8a8;
  border-radius: 0.5em;
  max-width: 500px;
  box-sizing: border-box;
}
.form-title {
  margin-top: 0;
}
.login-form::v-deep .formulate-input .formulate-input-element {
  max-width: none;
}
@media (min-width: 420px) {
  .double-wide {
    display: flex;
  }
  .double-wide .formulate-input {
    flex-grow: 1;
    width: calc(50% - 0.5em);
  }
  .double-wide .formulate-input:first-child {
    margin-right: 0.5em;
  }
  .double-wide .formulate-input:last-child {
    margin-left: 0.5em;
  }
}
</style>
