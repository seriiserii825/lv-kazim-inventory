<template>
  <div class="admin-layout">
    <el-container>
      <Aside />
      <el-container direction="horizontal">
        <el-main>
          <Header />
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
import Header from "./Header";
export default {
  components: {
    Aside,
    Header,
  },
  created() {
    if (!User.loggedIn()) {
      this.$message({
        type: "error",
        message: "Need to be authorized",
      });
      this.$router.push({ name: "home" });
    }
  },
};
</script>
<style lang="scss">
</style>