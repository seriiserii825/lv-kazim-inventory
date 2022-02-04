<template>
  <default-layout>
    <div class="form">
      <h3 class="form__title">Login</h3>
      <el-form ref="form" :model="form" label-width="120px">
        <el-form-item label="Email">
          <el-input name="email" v-model="form.email"></el-input>
        </el-form-item>
        <el-form-item label="Password">
          <el-input name="password" v-model="form.password"></el-input>
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
    </div>
  </default-layout>
</template>
<script>
import DefaultLayout from "../layouts/DefaultLayout.vue";
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
        remember_me: false,
      },
    };
  },
  components: {
    DefaultLayout,
  },
  methods: {
    onSubmit() {
      axios
        .post("/api/auth/login", this.form)
        .then((res) => {
          User.responseAfterLogin(res);
          this.$message({
            message: "Congrats, you are logged in.",
            type: "success",
          });
          this.$router.push("/admin");
        })
        .catch((error) => {
          this.$message({
            message: error.response.data.error,
            type: "error",
          });
        });
    },
  },
  created() {
    if (User.loggedIn()) {
      this.$message({
        type: "error",
        message: "You are logged in yet",
      });
      this.$router.push("/admin");
    }
  },
};
</script>
<style lang="scss" scoped>
.form {
  width: 30%;
  &__link {
    color: darkblue;
    text-decoration: none;
  }
}
</style>
