<template>
  <admin-layout>
    <el-row class="mb-3">
      <router-link :to="{ name: 'admin.salaries' }">
        <el-button type="success">All salaries</el-button>
      </router-link>
    </el-row>
    <h3 class="form__title">Edit salary</h3>
    <el-form ref="form" :model="form" label-width="120px">
      <el-row :gutter="20">
        <el-col :span="4">
          <el-form-item label="Employee">
            <el-input :value="employee_name" disabled></el-input>
            <small class="form--error" v-if="errors && errors.employee_id">{{
              errors.employee_id[0]
            }}</small>
          </el-form-item>
        </el-col>
        <el-col :span="4">
          <el-form-item label="Amount">
            <el-input name="selling_price" v-model="form.amount"></el-input>
            <small class="form--error" v-if="errors && errors.amount">{{
              errors.amount[0]
            }}</small>
          </el-form-item>
        </el-col>
        <el-col :span="4">
          <el-form-item label="Date">
            <el-date-picker
              v-model="fullDate"
              type="date"
              placeholder="Pick a day"
            >
            </el-date-picker>
            <p>{{ form.date }}</p>
            <small class="form--error" v-if="errors && errors.date">{{
              errors.date[0]
            }}</small>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row>
        <el-col :span="4" :offset="18">
          <el-form-item>
            <el-button type="success" @click.prevent="onSubmit"
              >Update
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
        employee_id: "",
        amount: "",
        date: "",
        month: "",
        year: "",
      },
      errors: {},
      fullDate: null,
      employee_name: "",
    };
  },
  components: {
    AdminLayout,
    FormComponent,
  },
  methods: {
    onSubmit() {
      axios
        .put(
          "/api/auth/salaries/" +
            this.$route.params.id +
            "?api_token=" +
            this.$store.getters.getToken,
          this.form
        )
        .then((res) => {
          this.$router.push({ name: "admin.salaries" });
          this.$notify({
            type: "success",
            message: "Post was updated",
          });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
  watch: {
    fullDate(value) {
      const date = new Date(value);
      this.form.date = date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear();
      this.form.month = date.toLocaleString("en-us", { month: "long" });
      this.form.year = date.getFullYear();
    },
  },
  mounted() {
    axios
      .get(
        "/api/auth/salaries/" +
          this.$route.params.id +
          "?api_token=" +
          this.$store.getters.getToken
      )
      .then((res) => {
        this.form = res.data.data;
        this.employee_name = res.data.data.employee_name;
        console.log(this.form, "this.form");
      })
      .catch((error) => {
        this.errors = error.response.data.errors;
      });
  },
};
</script>
