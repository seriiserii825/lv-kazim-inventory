<template>
  <AdminLayout>
    <el-row>
      <el-col :span="24">
        <admin-cards></admin-cards>
      </el-col>
    </el-row>
  </AdminLayout>
</template>
<script>
import AdminCards from "../components/Admin/AdminCards.vue";
import AdminLayout from "./../layouts/AdminLayout.vue";

export default {
  components: {
    AdminLayout,
    AdminCards,
  },
};
</script>
<style lang="scss">
</style>
