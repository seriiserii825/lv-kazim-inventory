<template>
  <div class="admin-customer">
    <el-button type="success">Add customer</el-button>
    <admin-table class="admin-customer__table">
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Qty</th>
            <th>Unit</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Name</td>
            <td>Qty</td>
            <td>Unit</td>
            <td>Total</td>
            <td>
              <div class="icon el-icon-error"></div>
            </td>
          </tr>
        </tbody>
      </table>
    </admin-table>
    <admin-total> </admin-total>
    <admin-customer-form></admin-customer-form>
  </div>
</template>
<script>
import AdminCustomerForm from "./AdminCustomerForm.vue";
import AdminTable from "./AdminTable";
import AdminTotal from "./AdminTotal";

export default {
  components: { AdminTotal, AdminTable, AdminCustomerForm },
};
</script>
<style lang="scss">
.admin-customer {
  &__table {
    margin-top: 3rem;
    td,
    th {
      text-align: center;
    }
    .icon {
      font-size: 3rem;
      color: red;
    }
  }
}
</style>
