<template>
  <admin-layout>
    <h2 class="admin-layout__title">List orders</h2>
    <admin-table>
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Pay by</th>
            <th>Total</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items" :key="item.id">
            <td>{{ item.id }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.email }}</td>
            <td>
              <span :class="{'success': item.pay_by === 'Cheque', 'error': item.pay_by === 'Hand Cash', 'primary': item.pay_by === 'Gift Card'}" class="table-badge">{{ item.pay_by }}</span>
            </td>
            <td><strong>{{ item.total }}</strong></td>
            <td>{{ item.date }}</td>
            <td>
              <div class="admin-table__actions">
                <router-link
                  :to="{
                    name: 'admin.orders.single',
                    params: { id: item.id },
                  }"
                >
                  <el-button type="primary">View</el-button>
                </router-link>
                <el-button type="danger" @click="remove(item.id)"
                  >Delete
                </el-button>
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
    remove(id) {
      this.$confirm("This will permanently delete. Continue?", "Warning", {
        confirmButtonText: "OK",
        cancelButtonText: "Cancel",
        type: "warning",
      })
        .then(() => {
          axios
            .delete(
              "/api/auth/orders/" +
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
        .get("/api/auth/orders?api_token=" + this.$store.getters.getToken)
        .then((res) => {
          this.items = res.data.data;
          // this.items.forEach((item) => console.log(item.email, "item.email"));
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
