<template>
  <div class="admin-customer-form">
    <el-form label-width="120px">
      <el-form-item label="Customer name">
        <el-select
          v-model="customer"
          placeholder="Customer name"
          @change="customer_change"
        >
          <el-option
            v-for="item in customers"
            :key="item.id"
            :label="item.name"
            :value="item.id"
          >
          </el-option>
        </el-select>
      </el-form-item>

      <el-form-item label="Pay buy">
        <el-select v-model="pay_by" placeholder="Pay by">
          <el-option
            v-for="item in pay_bu_items"
            :key="item.id"
            :label="item.title"
            :value="item.title"
          >
          </el-option>
        </el-select>
      </el-form-item>
      <el-button type="submit" @click="submit">Submit</el-button>
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
      name: "",
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
      phone: "",
      address: "",
      email: "",
      date: "",
      vat: "5%",
    };
  },
  computed: {
    sub_total() {
      return this.$store.getters.sub_total;
    },
    total() {
      return this.formatTotal(this.sub_total);
    },
    products() {
      return this.$store.getters.products;
    },
  },
  methods: {
    customer_change() {
      const customer_id = this.customer;
      axios
        .get(
          "/api/auth/customers/" +
            customer_id +
            "?api_token=" +
            this.$store.getters.getToken
        )
        .then((res) => {
          const { name, address, phone, email } = res.data.data;
          this.name = name;
          this.phone = phone;
          this.address = address;
          this.email = email;
          this.date = this.formatDate(new Date());
        })
        .catch((error) => {
          console.log(error, "error");
        });
    },
    parseSum(sum) {
      const result = sum.replace(/\s/gi, "");
      return parseInt(result);
    },
    formatTotal(total) {
      let sum = this.parseSum(total);

      const percent = parseInt(this.vat) / 100;
      sum = sum - sum * percent;
      return new Intl.NumberFormat("ru-Ru", {
        currency: "usd",
        style: "currency",
      }).format(sum);
    },
    submit() {
      const data = {
        name: this.name,
        phone: this.phone,
        address: this.address,
        email: this.email,
        date: this.date,
        sub_total: this.sub_total,
        vat: this.vat,
        total: this.formatTotal(this.total),
        pay_by: this.pay_by,
        products: JSON.stringify(this.products),
      };
      const values = Object.values(data);
      let object_has_empty_values = values.some((item) => item == "");
      if (object_has_empty_values) {
        this.$message({
          type: "error",
          message: "Add products and complete form",
        });
      } else {
        axios
          .post(
            "/api/auth/orders?api_token=" + this.$store.getters.getToken,
            data
          )
          .then((res) => {
            this.$notify({
              type: "success",
              message: "Order was created",
            });
            this.$router.push({name: "admin.orders"});
          })
          .catch((error) => {
            console.log(error, "error");

            this.$notify({
              type: "error",
              message: "error.response.data",
            });
          });
      }
    },
    formatDate(date) {
      let options = {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
        hour12: false,
      };

      return new Intl.DateTimeFormat("ro", options).format(new Date(date));
    },
  },
  created() {
    axios
      .get("/api/auth/customers?api_token=" + this.$store.getters.getToken)
      .then((res) => {
        this.customers = res.data.data;
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
