<template>
  <AdminLayout>
    <el-row>
      <el-col :span="24">
        <admin-cards></admin-cards>
      </el-col>
    </el-row>
    <el-row :gutter="20">
      <el-col :span="8">
        <admin-block title="Monthly Recap Report">
          <h2>Some text</h2>
        </admin-block>
      </el-col>
      <el-col :span="16">
        <admin-block title="Products Sold">
          <el-tabs type="card" @tab-click="handleClick">
            <el-tab-pane label="All products">
              <admin-products></admin-products>
            </el-tab-pane>
            <el-tab-pane label="Profile"> </el-tab-pane>
          </el-tabs>
        </admin-block>
      </el-col>
    </el-row>
  </AdminLayout>
</template>
<script>
import AdminCards from "../components/Admin/AdminCards.vue";
import AdminLayout from "./../layouts/AdminLayout.vue";
import AdminBlock from "../components/Admin/AdminBlock.vue";
import AdminProducts from "../components/Admin/AdminProducts.vue";

export default {
  data() {
    return {
      activeName: "first",
    };
  },
  methods: {
    handleClick(tab, event) {
      console.log(tab, event);
    },
  },
  components: {
    AdminLayout,
    AdminCards,
    AdminBlock,
    AdminProducts,
  },
};
</script>
<style lang="scss">
</style>