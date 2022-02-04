<template>
  <div class="el-row">
    <el-col class="el-col" :span="8" :offset="8">
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
            <el-button type="primary" @click.prevent="onSubmit"
              >Login</el-button
            >
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
        </el-form>
      </div>
    </el-col>
  </div>
</template>
<script>
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
        })
        .catch((error) => {
          this.$message({
            message: error.response.data.error,
            type: "error",
          });
        });
    },
  },
};
</script>
<style lang="scss">
.form {
  &__link {
    color: darkblue;
    text-decoration: none;
  }
}
</style>
