<template>
  <el-header>
    <el-dropdown>
      <i class="el-icon-setting" style="margin-right: 15px"></i>
      <el-dropdown-menu slot="dropdown">
        <el-dropdown-item>View</el-dropdown-item>
        <el-dropdown-item>Add</el-dropdown-item>
        <el-dropdown-item>Delete</el-dropdown-item>
      </el-dropdown-menu>
    </el-dropdown>
    <span class="el-header__title">Tom</span>
  </el-header>
</template>
<script>
export default {};
</script>
<style lang="scss">
.el-header {
  height: 3rem !important;
  text-align: right;
  border-bottom: 1px solid #ccc;
  &__title {
    font-size: 1.7rem;
  }
}
</style>
