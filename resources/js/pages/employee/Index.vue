<template>
  <admin-layout>
    <el-row class="mb-3">
      <router-link :to="{ name: 'admin.employee.create' }">
        <el-button type="success">Create</el-button>
      </router-link>
    </el-row>
    <h2 class="admin-layout__title">List employee</h2>
    <table class="admin-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nid</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Photo</th>
          <th>Salary</th>
          <th>Join Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in items" :key="item.id">
          <td>{{ item.id }}</td>
          <td>{{ item.nid }}</td>
          <td>{{ item.name }}</td>
          <td>{{ item.email }}</td>
          <td>{{ item.phone }}</td>
          <td>{{ item.address }}</td>
          <td>{{ item.photo }}</td>
          <td>{{ item.salary }}</td>
          <td>{{ item.join_date }}</td>
          <td>
            <div class="admin-table__actions">
              <router-link
                :to="{ name: 'admin.employee.edit', params: { id: item.id } }"
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
  </admin-layout>
</template>
<script>
import axios from "axios";
import AdminLayout from "./../../layouts/AdminLayout.vue";
export default {
  data() {
    return {
      items: [],
    };
  },
  components: {
    AdminLayout,
  },
  methods: {
    remove(id) {
      this.$confirm("This will permanently delete. Continue?", "Warning", {
        confirmButtonText: "OK",
        cancelButtonText: "Cancel",
        type: "warning",
      })
        .then(() => {
          axios
            .delete("/api/auth/employee/" + id)
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
        .get("/api/auth/employee")
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
<style lang="scss">
.admin-table {
  width: 100%;
  border-collapse: collapse;
  th,
  td {
    padding: 1rem;
    border: 1px solid #444;
  }
  th {
    color: white;
    background-color: #444;
  }
  tr:nth-of-type(even) {
    background-color: #bbb;
  }
  &__actions {
    display: flex;
    align-items: center;
    a {
      margin-right: 1rem;
    }
  }
}
</style>