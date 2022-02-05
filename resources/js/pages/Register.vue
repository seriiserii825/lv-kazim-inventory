<template>
  <default-layout>
    <form-component>
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
        <div class="el-form-item">
          <router-link :to="{ name: 'login' }" class="form-link"
            >You have an account?</router-link
          >
        </div>
        <el-form-item>
          <el-button type="primary" @click="onSubmit">Register</el-button>
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
        first_name: "",
        last_name: "",
        email: "",
        password: "",
        repeat_password: "",
      },
    };
  },
  components: {
    DefaultLayout,
    FormComponent,
  },
  methods: {
    onSubmit() {
      console.log("submit!");
    },
  },
};
</script>