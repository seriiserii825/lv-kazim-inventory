<template>
  <div class="header-admin">
    <el-menu class="el-menu-demo main-menu" mode="horizontal">
      <el-menu-item index="1">
        <router-link class="main-menu__link" :to="{ name: 'admin.media' }"
          >List media</router-link
        >
      </el-menu-item>
      <el-menu-item index="2">
        <router-link
          class="main-menu__link"
          :to="{ name: 'admin.media.create' }"
          >Add media</router-link
        >
      </el-menu-item>
    </el-menu>
    <el-menu class="el-menu-demo header-menu" mode="horizontal">
      <el-menu-item index="1">
        <router-link class="header-menu__link" :to="{ name: 'home' }">
          <i class="el-icon-s-home"></i>
          <span>Home</span>
        </router-link>
      </el-menu-item>
      <el-menu-item index="2">
        <router-link class="header-menu__link" :to="{ name: 'logout' }">
          <i class="el-icon-platform-eleme"></i>
          <span>Logout</span>
        </router-link>
      </el-menu-item>
    </el-menu>
  </div>
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

.header-menu {
  display: flex;
  justify-content: flex-end;
  margin-bottom: 0 !important;
  background-color: #333;
  border: none !important;
  &__link {
    display: flex;
    align-items: center;
    text-decoration: none;
  }
}
</style>
