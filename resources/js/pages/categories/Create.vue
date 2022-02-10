<template>
  <admin-layout>
    <el-row class="mb-3">
      <router-link :to="{ name: 'admin.categories' }">
        <el-button type="success">All categories</el-button>
      </router-link>
    </el-row>
    <h3 class="form__title">Create category</h3>
    <el-form ref="form" :model="form" label-width="120px">
      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item label="Category title">
            <el-input name="name" v-model="form.title"></el-input>
            <small class="form--error" v-if="errors && errors.title">{{
              errors.title[0]
            }}</small>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row>
        <el-col :span="6" :offset="18">
          <el-form-item>
            <el-button type="success" @click.prevent="onSubmit"
              >Create
            </el-button>
          </el-form-item>
        </el-col>
      </el-row>
    </el-form>
  </admin-layout>
</template>
<script>
import AdminLayout from "../../layouts/AdminLayout.vue";
import FormComponent from "../../components/FormComponent.vue";

export default {
  data() {
    return {
      form: {
        title: "",
      },
      errors: {},
    };
  },
  components: {
    AdminLayout,
    FormComponent,
  },
  methods: {
    onSubmit() {
      axios
        .post(
          "/api/auth/categories?api_token=" + this.$store.getters.getToken,
          this.form
        )
        .then((res) => {
          this.$router.push({ name: "admin.categories" });
          this.$notify({
            type: "success",
            message: "Post was created",
          });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>
