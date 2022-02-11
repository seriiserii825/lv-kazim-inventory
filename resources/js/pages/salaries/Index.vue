<template>
  <admin-layout>
    <el-row class="mb-3">
      <router-link :to="{ name: 'admin.salaries.create' }">
        <el-button type="success">Create</el-button>
      </router-link>
      <router-link :to="{ name: 'admin.salaries.month' }">
        <el-button type="primary">View salaries by Month</el-button>
      </router-link>
    </el-row>
    <h2 class="admin-layout__title">List salaries</h2>
    <admin-table>
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Employee</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Month</th>
            <th>Year</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items" :key="item.id">
            <td>{{ item.id }}</td>
            <td>{{ item.employee_name }}</td>
            <td>{{ item.amount }}</td>
            <td>{{ item.date }}</td>
            <td>{{ getMonth(item.month) }}({{ item.month }})</td>
            <td>{{ item.year }}</td>
            <td>
              <div class="admin-table__actions">
                <router-link
                  :to="{
                    name: 'admin.salaries.edit',
                    params: { id: item.id },
                  }"
                >
                  <el-button type="primary">Edit</el-button>
                </router-link>
                <el-button type="danger" @click="remove(item.id)"
                  >Delete</el-button
                >
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </admin-table>
  </admin-layout>
</template>
<script>
import axios from "axios";
import AdminLayout from "./../../layouts/AdminLayout.vue";
import AdminTable from "../../components/Admin/AdminTable.vue";
export default {
  data() {
    return {
      items: [],
      fullscreenLoading: false,
    };
  },
  components: {
    AdminLayout,
    AdminTable,
  },
  methods: {
    getMonth(index) {
      const months = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ];
      return months[index - 1];
    },
    remove(id) {
      this.$confirm("This will permanently delete. Continue?", "Warning", {
        confirmButtonText: "OK",
        cancelButtonText: "Cancel",
        type: "warning",
      })
        .then(() => {
          axios
            .delete(
              "/api/auth/salaries/" +
                id +
                "?api_token=" +
                this.$store.getters.getToken
            )
            .then((res) => {
              this.getItems();
            })
            .catch((error) => {
              this.errors = error.response.data.errors;
              // this.form_submitting = false;
            });
          this.$notify({
            type: "success",
            message: "Delete completed",
          });
        })
        .catch(() => {
          this.$notify({
            type: "info",
            message: "Delete canceled",
          });
        });
    },
    getItems() {
      axios
        .get("/api/auth/salaries?api_token=" + this.$store.getters.getToken)
        .then((res) => {
          this.items = res.data.data;
        })
        .catch((error) => {
          console.log(error, "error");
        });
    },
  },
  created() {
    this.getItems();
  },
};
</script>