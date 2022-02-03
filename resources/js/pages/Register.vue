<template>
  <div class="el-row">
    <el-col class="el-col" :span="6" :offset="9">
      <div class="form">
        <h3 class="form__title">Register</h3>
        <el-form ref="form" :model="form" label-width="120px">
          <el-form-item label="First name">
            <el-input v-model="form.first_name"></el-input>
          </el-form-item>
          <el-form-item label="Last name">
            <el-input v-model="form.last_name"></el-input>
          </el-form-item>
          <el-form-item label="Email">
            <el-input v-model="form.email"></el-input>
          </el-form-item>
          <el-form-item label="Password">
            <el-input v-model="form.password"></el-input>
          </el-form-item>
          <el-form-item label="Repeat password">
            <el-input v-model="form.repeat_password"></el-input>
          </el-form-item>
          <el-form-item>
            <el-button type="primary" @click="onSubmit">Register</el-button>
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
        first_name: "",
        last_name: "",
        email: "",
        password: "",
        repeat_password: "",
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
<style lang="scss">
.form {
  padding: 4rem;
  box-shadow: 0 0 20px 10px rgba(0, 0, 0, 0.1);
  &__title {
    font-size: 3rem;
    font-weight: bold;
  }
}
.el-form-item {
  display: flex;
  flex-direction: column;
  margin-bottom: 0.5rem;
  &__label {
    font-weight: bold;
    text-align: left;
  }
}
.el-form-item__content {
  margin-left: 0 !important;
}
</style>