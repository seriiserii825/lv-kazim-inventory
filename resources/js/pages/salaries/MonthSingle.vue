<template>
  <admin-layout>
    <el-row class="mb-3">
      <router-link :to="{ name: 'admin.salaries.month' }">
        <el-button type="success">All salaries by Month</el-button>
      </router-link>
    </el-row>
    <h3 class="form__title">Edit salary</h3>
    <admin-table>
      <table>
        <thead>
          <tr>
            <th>
              <a href="#" @click.prevent="sortTable('name')">Title</a>
              <span v-if="sort_field === 'name' && sort_direction === 'asc'"
                >&uarr;</span
              >
              <span v-if="sort_field === 'name' && sort_direction === 'desc'"
                >&darr;</span
              >
            </th>
            <th>Month</th>
            <th>
              <a href="#" @click.prevent="sortTable('amount')">Amount</a>
              <span v-if="sort_field === 'amount' && sort_direction === 'asc'"
                >&uarr;</span
              >
              <span v-if="sort_field === 'amount' && sort_direction === 'desc'"
                >&darr;</span
              >
            </th>
            <th>
              <a href="#" @click.prevent="sortTable('date')">Date</a>
              <span v-if="sort_field === 'date' && sort_direction === 'asc'"
                >&uarr;</span
              >
              <span v-if="sort_field === 'date' && sort_direction === 'desc'"
                >&darr;</span
              >
            </th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in items" :key="item.id">
            <td>{{ item.name }}</td>
            <td>{{ item.month }}</td>
            <td>{{ item.amount }}</td>
            <td>{{ item.date }}</td>
            <td>
              <div class="admin-table__actions">
                <router-link
                  :to="{ name: 'admin.salaries.edit', params: { id: item.id } }"
                >
                  <el-button type="primary">Edit</el-button>
                </router-link>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </admin-table>
  </admin-layout>
</template>
<script>
import AdminLayout from "../../layouts/AdminLayout.vue";
import FormComponent from "../../components/FormComponent.vue";
import AdminTable from "../../components/Admin/AdminTable.vue";

export default {
  data() {
    return {
      errors: {},
      items: [],
      sort_field: "created_at",
      sort_direction: "desc",
    };
  },
  components: {
    AdminLayout,
    FormComponent,
    AdminTable,
  },
  methods: {
    sortTable(field) {
      if (this.sort_field === field) {
        this.sort_direction = this.sort_direction === "asc" ? "desc" : "asc";
      } else {
        this.sort_field = field;
        this.sort_direction = "asc";
      }
      this.getResults();
    },
    getResults() {
      axios
        .get(
          "/api/auth/salary-month-single/" +
            this.$route.params.month +
            "?sort_field=" +
            this.sort_field +
            "&sort_direction=" +
            this.sort_direction +
            "&api_token=" +
            this.$store.getters.getToken
        )
        .then((res) => {
          console.log(res.data, "res.data");
          this.items = res.data.salaries;
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
  mounted() {
    this.getResults();
  },
};
</script>
