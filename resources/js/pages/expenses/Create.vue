<template>
  <admin-layout>
    <el-row class="mb-3">
      <router-link :to="{ name: 'admin.expenses' }">
        <el-button type="success">All expenses</el-button>
      </router-link>
    </el-row>
    <h3 class="form__title">Create expense</h3>
    <el-form ref="form" :model="form" label-width="120px">
      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item label="Amount">
            <el-input name="name" v-model="form.amount"></el-input>
            <small class="form--error" v-if="errors && errors.amount">{{
              errors.amount[0]
            }}</small>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item label="Date">
            <el-date-picker
              v-model="form.date"
              type="date"
              placeholder="Pick a day"
            >
            </el-date-picker>
            <small class="form--error" v-if="errors && errors.date">{{
              errors.date[0]
            }}</small>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row>
        <el-col :span="6">
          <el-form-item label="Details">
            <el-input
              name="details"
              type="textarea"
              :rows="4"
              v-model="form.details"
            ></el-input>
            <small class="form--error" v-if="errors && errors.details">{{
              errors.details[0]
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
        details: "",
        amount: "",
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
          "/api/auth/expenses?api_token=" + this.$store.getters.getToken,
          this.form
        )
        .then((res) => {
          this.$router.push({ name: "admin.expenses" });
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
