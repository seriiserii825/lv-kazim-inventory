<template>
  <div class="app">
    <router-view></router-view>
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
};
</script>