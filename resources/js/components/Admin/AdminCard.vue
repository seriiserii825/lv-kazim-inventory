<template>
  <div class="admin-card" :style="{ background: bg }">
    <div class="admin-card__content">
      <h3 class="admin-card__title">{{ title }}</h3>
      <div class="admin-card__count">{{ count }}</div>
    </div>
    <div class="admin-card__icon" :class="icon"></div>
  </div>
</template>
<script>
export default {
  props: {
    icon: String,
    bg: String,
    count: String,
    title: String,
  },
};
</script>
<style lang="scss">
.admin-card {
  padding: 3rem 5rem 3rem 3rem;
  border-radius: 2rem;
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  &__icon {
    width: 3rem;
    height: 3rem;
    font-size: 5rem;
    color: white;
  }
  &__title {
    margin-bottom: 2rem;
    font-size: 2.5rem;
    font-weight: bold;
    color: white;
  }
  &__count {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 4rem;
    height: 4rem;
    background-color: white;
    border-radius: 50%;
  }
}
</style>