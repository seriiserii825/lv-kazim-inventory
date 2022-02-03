<template>
  <div class="el-row">
    <el-col class="el-col" :span="6" :offset="9">
      <div class="form">
        <h3 class="form__title">Login</h3>
        <el-form ref="form" :model="form" label-width="120px">
          <el-form-item label="Email">
            <el-input v-model="form.email"></el-input>
          </el-form-item>
          <el-form-item label="Password">
            <el-input v-model="form.password"></el-input>
          </el-form-item>
          <div class="el-form-item">
            <el-checkbox v-model="remember_me">Remember me</el-checkbox>
          </div>
          <el-form-item>
            <el-button type="primary" @click="onSubmit">Login</el-button>
          </el-form-item>
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
      console.log("submit!");
    },
  },
};
</script>