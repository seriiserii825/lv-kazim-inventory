<template>
  <el-container>
    <Aside />
    <el-container direction="horizontal">
      <el-main>
        <Header />
        <div class="main">
          <router-view></router-view>
        </div>
      </el-main>
    </el-container>
  </el-container>
</template>
<script>
import Aside from "./Aside.vue";
import Header from "./Header";

export default {
  components: {
    Aside,
    Header,
  },
};
</script>
<style lang="scss">
.main {
  padding: 4rem 0;
}
</style>
