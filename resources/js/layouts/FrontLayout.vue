<template>
  <div>
    <el-menu
      :default-active="activeIndex"
      class="el-menu-demo front-menu"
      mode="horizontal"
    >
      <el-menu-item index="1" v-if="loggedIn">
        <router-link class="front-menu__link" :to="{ name: 'admin.index' }"
          >Admin</router-link
        >
      </el-menu-item>
      <el-menu-item index="2" v-if="!loggedIn">
        <router-link class="front-menu__link" :to="{ name: 'login' }"
          >Login</router-link
        >
      </el-menu-item>
      <el-menu-item index="1" v-if="!loggedIn">
        <router-link class="front-menu__link" :to="{ name: 'register' }"
          >Register</router-link
        >
      </el-menu-item>
      <el-menu-item index="1" v-if="loggedIn">
        <router-link class="front-menu__link" :to="{ name: 'logout' }"
          >Logout</router-link
        >
      </el-menu-item>
    </el-menu>
    <slot></slot>
  </div>
</template>
<script>
export default {
  data() {
    return {
      activeIndex: "1",
      activeIndex2: "1",
      loggedIn: false,
    };
  },
  methods: {
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    },
  },
  created() {
    if (User.loggedIn()) {
      this.loggedIn = true;
    }
  },
};
</script>
<style lang="scss">
.el-menu {
  margin-bottom: 5rem;
}
.front-menu {
  display: flex;
  justify-content: flex-end;
  .el-menu-item {
    .main-menu__link {
      padding: 1rem 1.5rem;
      font-weight: bold;
      text-decoration: none;
      text-transform: uppercase;
      color: blue;
      transition: all 0.4s;
      &:hover {
        color: white;
        background-color: blue;
      }
    }
  }
}
</style>
