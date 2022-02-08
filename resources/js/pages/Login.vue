<template>
  <default-layout>
    <form-component>
      <h3 class="form__title">Login</h3>
      <el-form ref="form" :model="form">
        <el-form-item label="Email">
          <el-input name="email" v-model="form.email"></el-input>
          <small class="form--error" v-if="errors && errors.email">{{
            errors.email[0]
          }}</small>
        </el-form-item>
        <el-form-item label="Password">
          <el-input name="password" v-model="form.password"></el-input>

          <small class="form--error" v-if="errors && errors.password">{{
            errors.password[0]
          }}</small>
        </el-form-item>
        <div class="el-form-item">
          <el-checkbox v-model="form.remember_me">Remember me</el-checkbox>
        </div>
        <el-form-item>
          <el-button type="primary" @click.prevent="onSubmit">Login</el-button>
        </el-form-item>
        <div class="el-form-item">
          <router-link :to="{ name: 'register' }" class="form__link"
            >Create an account
          </router-link>
        </div>
        <div class="el-form-item">
          <router-link :to="{ name: 'forgot-password' }" class="form__link"
            >Forgot password
          </router-link>
        </div>
        <div class="el-form-item">
          <router-link :to="{ name: 'home' }" class="form__link"
            >Home
          </router-link>
        </div>
      </el-form>
    </form-component>
  </default-layout>
</template>
<script>
import DefaultLayout from "../layouts/DefaultLayout.vue";
import FormComponent from "../components/FormComponent.vue";

export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
        remember_me: false,
      },
      errors: {},
    };
  },
  components: {
    DefaultLayout,
    FormComponent,
  },
  methods: {
    onSubmit() {
      axios
        .post(
          "/api/auth/login?api_token=" + this.$store.getters.getToken,
          this.form
        )
        .then((res) => {
          User.responseAfterLogin(res);
          this.$notify({
            title: "Success",
            message: "Congrats, you are logged in.",
            type: "success",
          });
          this.$router.push("/admin");
        })
        .catch((error) => {
          this.errors = error.response.data.errors;

          this.$message({
            message: error.response.data.message,
            type: "error",
          });
        });
    },
  },
  created() {
    if (User.loggedIn()) {
      this.$notify({
        type: "error",
        message: "You are logged in yet",
      });
      this.$router.push("/admin");
    }
  },
};
</script>
