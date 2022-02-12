<template>
  <div class="admin-cards">
    <div class="admin-cards__item">
      <admin-card
        :url="{ name: 'admin.media' }"
        icon="el-icon-picture"
        :count="String(mediaCount)"
        title="Media"
        bg="red"
      ></admin-card>
    </div>
    <div class="admin-cards__item">
      <admin-card
        :url="{ name: 'admin.employee' }"
        icon="el-icon-s-check"
        :count="String(employeeCount)"
        title="Employee"
        bg="blue"
      ></admin-card>
    </div>
    <div class="admin-cards__item">
      <admin-card
        :url="{ name: 'admin.suppliers' }"
        icon="el-icon-s-goods"
        :count="String(suppliersCount)"
        title="Suppliers"
        bg="green"
      ></admin-card>
    </div>
    <div class="admin-cards__item">
      <admin-card
        :url="{ name: 'admin.categories' }"
        icon="el-icon-s-unfold"
        :count="String(categoriesCount)"
        title="Categories"
        bg="maroon"
      ></admin-card>
    </div>
    <div class="admin-cards__item">
      <admin-card
        :url="{ name: 'admin.products' }"
        icon="el-icon-s-shop"
        :count="String(productsCount)"
        title="Products"
        bg="#dddd00"
      ></admin-card>
    </div>
    <div class="admin-cards__item">
      <admin-card
        :url="{ name: 'admin.expenses' }"
        icon="el-icon-s-help"
        :count="String(expensesCount)"
        title="Expenses"
        bg="#095C00"
      ></admin-card>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import AdminCard from "./AdminCard.vue";
export default {
  data() {
    return {
      mediaCount: 0,
      employeeCount: 0,
      suppliersCount: 0,
      categoriesCount: 0,
      productsCount: 0,
      expensesCount: 0,
    };
  },
  components: {
    AdminCard,
  },
  mounted() {
    axios
      .get("/api/auth/media-count?api_token=" + this.$store.getters.getToken)
      .then((res) => {
        this.mediaCount = res.data.count;
      });

    axios
      .get("/api/auth/employee-count?api_token=" + this.$store.getters.getToken)
      .then((res) => {
        this.employeeCount = res.data.count;
      });
    axios
      .get(
        "/api/auth/suppliers-count?api_token=" + this.$store.getters.getToken
      )
      .then((res) => {
        this.suppliersCount = res.data.count;
      });
    axios
      .get(
        "/api/auth/categories-count?api_token=" + this.$store.getters.getToken
      )
      .then((res) => {
        this.categoriesCount = res.data.count;
      });
    axios
      .get("/api/auth/products-count?api_token=" + this.$store.getters.getToken)
      .then((res) => {
        this.productsCount = res.data.count;
      });
    axios
      .get("/api/auth/expenses-count?api_token=" + this.$store.getters.getToken)
      .then((res) => {
        this.expensesCount = res.data.count;
      });
  },
};
</script>
<style lang="scss">
.admin-cards {
  display: flex;
  align-items: flex-start;
  margin-bottom: 4rem;
  width: 100%;
  &__item {
    margin-right: 4rem;
    margin-bottom: 4rem;
    width: 25rem;
  }
}
</style>