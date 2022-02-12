<template>
  <div class="admin-customer-form">
    <el-form label-width="120px">
      <el-form-item label="Customer name">
        <el-select v-model="customer" placeholder="Customer name">
          <el-option
            v-for="item in customers"
            :key="item.id"
            :label="item.title"
            :value="item.id"
          >
          </el-option>
        </el-select>
      </el-form-item>

      <el-form-item label="Pay">
        <el-input v-model="pay"></el-input>
      </el-form-item>

      <el-form-item label="Due">
        <el-input v-model="due"></el-input>
      </el-form-item>

      <el-form-item label="Pay buy">
        <el-select v-model="pay_by" placeholder="Pay by">
          <el-option
            v-for="item in pay_bu_items"
            :key="item.id"
            :label="item.title"
            :value="item.id"
          >
          </el-option>
        </el-select>
      </el-form-item>
    </el-form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      customer: "",
      customers: [
        {
          id: 0,
          title: "Serii",
        },
        {
          id: 1,
          title: "Radu",
        },
      ],
      pay: "",
      due: "",
      pay_by: "",
      pay_bu_items: [
        {
          id: 0,
          title: "Hand Cash",
        },
        {
          id: 1,
          title: "Cheque",
        },
        {
          id: 2,
          title: "Gift Card",
        },
      ],
    };
  },
};
</script>
<style lang="scss">
.admin-customer-form {
}
</style>