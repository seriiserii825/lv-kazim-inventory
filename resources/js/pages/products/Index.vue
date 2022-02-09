<template>
  <admin-layout>
    <el-row class="mb-3">
      <router-link :to="{ name: 'admin.products.create' }">
        <el-button type="success">Create</el-button>
      </router-link>
    </el-row>
    <h2 class="admin-layout__title">List products</h2>
    <admin-table>
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Title</th>
            <th>Product quantity</th>
            <th>Buying price</th>
            <th>Buying date</th>
            <th>Category</th>
            <th>Supplier</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items" :key="item.id">
            <td>{{ item.id }}</td>
            <td><img width="100" height="75" :src="item.image" alt="" /></td>
            <td>{{ item.title }}</td>
            <td>{{ item.product_quantity }}</td>
            <td>{{ item.buying_price }}</td>
            <td>{{ item.buying_date }}</td>
            <td>{{ item.category_title }}</td>
            <td>{{ item.supplier_title }}</td>
            <td>
              <div class="admin-table__actions">
                <router-link
                  :to="{ name: 'admin.products.edit', params: { id: item.id } }"
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
              "/api/auth/products/" +
                id +
                "?api_token=" +
                this.$store.getters.getToken
            )
            .then((res) => {
              this.getItems();
            })
            .catch((error) => {
              this.errors = error.response.data.errors;
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
        .get("/api/auth/products?api_token=" + this.$store.getters.getToken)
        .then((res) => {
          this.items = res.data.data;
          this.items.forEach((elem) => console.log(elem, "elem"));
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