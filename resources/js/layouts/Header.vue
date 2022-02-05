<template>
  <el-menu class="el-menu-demo main-menu" mode="horizontal">
    <el-menu-item index="1">
      <router-link class="main-menu__link" :to="{ name: 'home' }"
        >Home</router-link
      >
    </el-menu-item>
    <el-menu-item index="2">
      <router-link class="main-menu__link" :to="{ name: 'logout' }"
        >Logout</router-link
      >
    </el-menu-item>
  </el-menu>
</template>
<script>
export default {
  data() {
    return {};
  },
};
</script>
<style lang="scss">
.el-header {
  text-align: right;
  &__title {
    font-size: 1.7rem;
  }
}
</style>
