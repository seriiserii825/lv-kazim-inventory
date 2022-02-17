<template>
  <admin-layout>
    <div class="sale">
      <el-row :gutter="20">
        <el-col :span="8">
          <admin-block title="Expense insert">
            <admin-customer></admin-customer>
          </admin-block>
        </el-col>
        <el-col :span="16">
          <admin-block title="Products To Sold(Click to add to cart)">
            <el-tabs type="card" @tab-click="handleClick">
              <el-tab-pane label="All products">
                <admin-products></admin-products>
              </el-tab-pane>
              <el-tab-pane
                v-for="category in categories"
                :key="category.id"
                :label="category.title"
              >
                <admin-products :category_id="category.id"></admin-products>
              </el-tab-pane>
            </el-tabs>
          </admin-block>
        </el-col>
      </el-row>
    </div>
  </admin-layout>
</template>
<script>
import AdminLayout from "../../layouts/AdminLayout.vue";
import AdminBlock from "../../components/Admin/AdminBlock.vue";
import AdminProducts from "../../components/Admin/AdminProducts.vue";
import AdminCustomer from "../../components/Admin/AdminCustomer";

export default {
  data() {
    return {
      activeName: "first",
      categories: "",
    };
  },
  methods: {
    handleClick(tab, event) {
      // console.log(tab, event);
    },
    getCategories() {
      axios
        .get(
          "/api/auth/categories-list?api_token=" + this.$store.getters.getToken
        )
        .then((res) => {
          this.categories = res.data.data;
        })
        .catch((error) => {
          console.log(error, "error");
        });
    },
  },
  created() {
    this.getCategories();
  },
  components: {
    AdminLayout,
    AdminCustomer,
    AdminBlock,
    AdminProducts,
  },
};
</script>