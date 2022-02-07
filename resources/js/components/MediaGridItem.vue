<template>
  <div class="media-grid-item" :class="{ active: active }" @click="toggleImage">
    <el-checkbox v-model="checked">Option</el-checkbox>
    <img :src="path" alt="" />
  </div>
</template>
<script>
export default {
  data() {
    return {
      active: false,
      checked: false,
    };
  },
  methods: {
    toggleImage() {
      this.active = !this.active;
      if (this.active) {
        this.checked = true;
        this.$emit("add-image", this.path);
      } else {
        this.checked = false;
        this.$emit("remove-image", this.path);
      }
    },
  },
  props: {
    path: String,
  },
};
</script>
<style lang="scss">
.media-grid-item {
  opacity: 0.7;
  transition: all 0.4s;
  cursor: pointer;
  &.active {
    opacity: 1;
  }
  .el-checkbox {
    position: relative;
    top: -0.4rem;
    left: 0;
  }
}
</style>