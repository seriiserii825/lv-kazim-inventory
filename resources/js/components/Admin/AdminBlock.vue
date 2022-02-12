<template>
  <div class="admin-block">
    <header class="admin-block__header">
      <h2 class="admin-block__title">{{ title }}</h2>
    </header>
    <div class="admin-block__content">
      <slot></slot>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    title: String,
  },
};
</script>
<style lang="scss">
.admin-block {
}
</style>