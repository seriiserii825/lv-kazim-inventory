<template>
  <div>
    <h2>Logout</h2>
  </div>
</template>
<script>
import AppStorage from "../helpers/AppStorage";
export default {
  created() {
    AppStorage.clear();
    if (!User.loggedIn()) {
      this.$notify({
        type: "success",
        message: "You are logged out successfuly",
      });
      this.$router.push({ name: "home" });
    }
  },
};
</script>
<style lang="scss">
</style>