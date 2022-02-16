<template>
  <div class="admin-customer-form">
    <el-form label-width="120px" @submit.prevent="submit">
      <el-form-item label="Customer name">
        <el-select v-model="customer" placeholder="Customer name">
          <el-option
            v-for="item in customers"
            :key="item.id"
            :label="item.name"
            :value="item.id"
          >
          </el-option>
        </el-select>
      </el-form-item>

      <el-form-item label="Pay">
        <el-input v-model="pay"></el-input>
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
  methods: {
    submit() {
      const data = {
        name: this.form.customer,
        phone: "required",
        address: "required",
        date: "required",
        sub_total: "required",
        vat: "required",
        total: "required",
        pay_by: "required",
      };
    },
  },
  created() {
    axios
      .get("/api/auth/customers?api_token=" + this.$store.getters.getToken)
      .then((res) => {
        this.customers = res.data.data;
        // console.log(this.customers, "this.customers");
      })
      .catch((error) => {
        console.log(error, "error");
      });
  },
};
</script>
<style lang="scss">
.admin-customer-form {
}
</style>