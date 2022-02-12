<template>
  <div class="admin-block">
    <header class="admin-block__header">
      <h2 class="admin-block__title">
        <strong>{{ title }}</strong>
      </h2>
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
  background-color: #fff;
  border-radius: 1rem;
  border: 1px solid #ccc;
  box-shadow: 0 0 4px -2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  &__header {
    padding: 3rem;
    color: white;
    background-color: #444;
    border-bottom: 1px solid #ccc;
  }
  &__content {
    padding: 3rem;
    min-height: 40rem;
  }
}
</style>