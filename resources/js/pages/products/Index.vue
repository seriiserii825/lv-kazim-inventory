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
            <th>
              <table-sort-header
                title="Title"
                table_column="title"
                @sort_table="sort_table"
                :sort_field="sort_field"
                :sort_direction="sort_direction"
              ></table-sort-header>
            </th>
            <th>
              <table-sort-header
                title="Quantity"
                table_column="product_quantity"
                @sort_table="sort_table"
                :sort_field="sort_field"
                :sort_direction="sort_direction"
              ></table-sort-header>
            </th>

            <th>
              <table-sort-header
                title="Buying price"
                table_column="buying_price"
                @sort_table="sort_table"
                :sort_field="sort_field"
                :sort_direction="sort_direction"
              ></table-sort-header>
            </th>
            <th>
              <table-sort-header
                title="Buying date"
                table_column="buying_date"
                @sort_table="sort_table"
                :sort_field="sort_field"
                :sort_direction="sort_direction"
              ></table-sort-header>
            </th>
            <th>
              <table-sort-header
                title="Category"
                table_column="category_id"
                @sort_table="sort_table"
                :sort_field="sort_field"
                :sort_direction="sort_direction"
              ></table-sort-header>
            </th>
            <th>Supplier</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items" :key="item.id">
            <td>{{ item.id }}</td>
            <td><img width="100" height="75" :src="item.image" alt="" /></td>
            <td>{{ item.title }}</td>
            <td v-if="item.product_quantity">{{ item.product_quantity }}</td>
            <td v-else>
              <el-result icon="error" subTitle="Out of stock"> </el-result>
            </td>
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
import TableSortHeader from "../../components/Admin/TableSortHeader.vue";
export default {
  data() {
    return {
      items: [],
      sort_field: "created_at",
      sort_direction: "desc",
    };
  },
  components: {
    AdminLayout,
    AdminTable,
    TableSortHeader,
  },
  methods: {
    sort_table(field) {
      if (this.sort_field === field) {
        this.sort_direction = this.sort_direction === "asc" ? "desc" : "asc";
      } else {
        this.sort_field = field;
        this.sort_direction = "asc";
      }
      this.getItems();
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
        .get(
          "/api/auth/products/" +
            "?sort_field=" +
            this.sort_field +
            "&sort_direction=" +
            this.sort_direction +
            "&api_token=" +
            this.$store.getters.getToken
        )
        .then((res) => {
          this.items = res.data.data;
          // this.items.forEach((elem) => console.log(elem, "elem"));
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