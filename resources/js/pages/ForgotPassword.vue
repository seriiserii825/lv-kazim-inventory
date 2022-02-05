<template>
  <default-layout>
    <form-component>
      <h3 class="form__title">Forgot Password</h3>
      <el-form ref="form" :model="form">
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
      },
    };
  },
  components: {
    DefaultLayout,
    FormComponent,
    FormComponent,
  },
  methods: {
    onSubmit() {
      console.log("submit!");
    },
  },
};
</script>
