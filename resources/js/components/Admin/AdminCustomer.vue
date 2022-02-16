<template>
  <div class="admin-customer">
    <el-button type="success">Add customer</el-button>
    <admin-table class="admin-customer__table">
      <table v-if="items.length">
        <thead>
          <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <admin-customer-table-item
            v-for="item in items"
            :key="item.id"
            :item="item"
          >
          </admin-customer-table-item>
        </tbody>
      </table>
    </admin-table>
    <admin-total></admin-total>
    <admin-customer-form></admin-customer-form>
  </div>
</template>
<script>
import AdminCustomerForm from "./AdminCustomerForm.vue";
import AdminTable from "./AdminTable";
import AdminTotal from "./AdminTotal";
import AdminCustomerTableItem from "./AdminCustomerTableItem";

export default {
  components: {
    AdminCustomerTableItem,
    AdminTotal,
    AdminTable,
    AdminCustomerForm,
  },
  computed: {
    items() {
      return this.$store.getters.cart;
    },
  },
};
</script>
<style lang="scss">
.admin-customer {
  &__table {
    margin-top: 3rem;
    td,
    th {
      font-size: 1.3rem;
      text-align: center;
    }
    .icon-error {
      display: block;
      font-size: 3rem;
      cursor: pointer;
    }
  }
  &__quantity {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  &__btn {
    padding: 2px 4px;
  }
}
</style>
