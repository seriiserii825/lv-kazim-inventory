<template>
  <a href="#" class="admin-product">
    <div class="admin-product__img">
      <img :src="img" alt="" />
    </div>
    <div class="admin-product__title">{{ title }}</div>
    <div class="admin-product__count">
      <span class="admin-product__count--success" v-if="count"
        >Available <strong>{{ count }}</strong></span
      >
      <span class="admin-product__count--error" v-else>Out of stock</span>
    </div>
  </a>
</template>
<script>
export default {
  props: {
    img: String,
    title: String,
    count: Number,
  },
};
</script>
<style lang="scss">
.admin-product {
  padding: 2rem;
  text-decoration: none;
  color: inherit;
  border: 1px solid #ccc;
  border-radius: 1rem;
  box-shadow: 0 0 6px -2px rgba(0, 0, 0, 0.4);
  transition: all .4s;
  &:hover {
    box-shadow: 2px 2px 4px 4px rgba(0,0,0,.2);
  }
  &__img {
    position: relative;
    margin-bottom: 3rem;
    height: 20rem;
    img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
  &__title {
    margin-bottom: 2rem;
    height: 3.2rem;
    font-size: 1.4rem;
    font-weight: bold;
    overflow: hidden;
  }
  &__count {
    display: flex;
    justify-content: space-between;
    align-items: center;
    strong {
      position: relative;
      top: -0.3rem;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      width: 1.6rem;
      height: 1.6rem;
      font-size: 1.2rem;
      color: #333;
      background-color: white;
      border-radius: 50%;
    }
    &--success {
      padding: 0.5rem 1rem;
      color: white;
      background-color: green;
      border-radius: 0.5rem;
    }
    &--error {
      padding: 0.5rem 1rem;
      color: white;
      background-color: red;
      border-radius: 0.5rem;
    }
  }
}
</style>
