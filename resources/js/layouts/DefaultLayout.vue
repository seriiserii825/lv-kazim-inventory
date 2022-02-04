<template>
  <div class="default-layout">
    <slot />
  </div>
</template>
<script>
export default {};
</script>
<style lang="scss">
.default-layout {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  min-height: 100vh;
}
</style>