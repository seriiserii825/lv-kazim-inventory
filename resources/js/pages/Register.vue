<template>
  <default-layout>
    <form-component>
      <h3 class="form__title">Register</h3>
      <el-form ref="form" :model="form" label-width="120px">
        <el-form-item label="Full name">
          <el-input v-model="form.name"></el-input>
          <small class="form--error" v-if="errors && errors.name">{{
            errors.name[0]
          }}</small>
        </el-form-item>
        <el-form-item label="Email">
          <el-input v-model="form.email"></el-input>
          <small class="form--error" v-if="errors && errors.email">{{
            errors.email[0]
          }}</small>
        </el-form-item>
        <el-form-item label="Password">
          <el-input v-model="form.password"></el-input>
          <small class="form--error" v-if="errors && errors.password">{{
            errors.password[0]
          }}</small>
        </el-form-item>
        <div class="el-form-item">
          <router-link :to="{ name: 'login' }" class="form-link"
            >You have an account?</router-link
          >
        </div>
        <el-form-item>
          <el-button type="primary" @click.prevent="onSubmit"
            >Register</el-button
          >
        </el-form-item>
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
        name: "",
        email: "",
        password: "",
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
        .post("/api/auth/signup", this.form)
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