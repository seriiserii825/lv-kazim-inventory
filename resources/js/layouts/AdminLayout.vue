<template>
  <div class="admin-layout">
    <el-container>
      <Aside />
      <el-container direction="horizontal">
        <el-main>
          <HeaderAdmin class="admin-header" />
          <div class="main">
            <slot />
          </div>
        </el-main>
      </el-container>
    </el-container>
  </div>
</template>
<script>
import Aside from "./Aside.vue";
import HeaderAdmin from "./HeaderAdmin";
export default {
  components: {
    Aside,
    HeaderAdmin,
  },
  created() {
    if (!User.loggedIn()) {
      this.$message({
        type: "error",
        message: "Need to be authorized",
      });
      this.$router.push({ name: "home" });
    }
    window.scrollTo({ top: 0, behavior: "smooth" });
  },
};
</script>
<style lang="scss">
.admin-layout {
  min-height: 300vh;
  background-color: #444;
  &__search {
    width: 30rem;
    height: 4rem;
    background-color: #eee;
    border: 1px solid #ccc;
  }
  &__title {
    margin-bottom: 3rem;
    font-size: 3rem;
    font-weight: bold;
  }
  .el-main {
    padding: 0;
  }
  .main {
    padding: 4rem;
    background-color: #d4d4d4;
  }
}
</style>
