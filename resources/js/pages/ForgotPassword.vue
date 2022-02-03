<template>
  <div class="el-row">
    <el-col class="el-col" :span="8" :offset="8">
      <div class="form">
        <h3 class="form__title">Forgot Password</h3>
        <el-form ref="form" :model="form" label-width="120px">
          <el-form-item label="Email">
            <el-input v-model="form.email"></el-input>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="onSubmit">Login</el-button>
          </el-form-item>
          <div class="el-form-item">
            <router-link :to="{ name: 'register' }" class="form__link"
              >Create an account</router-link
            >
          </div>
          <div class="el-form-item">
            <router-link :to="{ name: 'login' }" class="form__link"
              >Login</router-link
            >
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
      },
    };
  },
  methods: {
    onSubmit() {
      console.log("submit!");
    },
  },
};
</script>