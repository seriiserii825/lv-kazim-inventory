<template>
  <div class="admin-total">
    <div class="admin-total__row">
      <div class="admin-total__column">Total Quantity</div>
      <div class="admin-total__column">{{ total_count }}</div>
    </div>
    <div class="admin-total__row">
      <div class="admin-total__column">SubTotal</div>
      <div class="admin-total__column">{{ sub_total }}</div>
    </div>
    <div class="admin-total__row">
      <div class="admin-total__column">Vat</div>
      <div class="admin-total__column">35%</div>
    </div>
    <div class="admin-total__row">
      <div class="admin-total__column">Total</div>
      <div class="admin-total__column">{{ total }}</div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    total_count() {
      return this.$store.getters.total_count;
    },
    sub_total() {
      let sum = this.$store.getters.sub_total;
      return new Intl.NumberFormat("ru-Ru", {
        currency: "usd",
        style: "currency",
      }).format(sum);
    },
    total() {
      let sum = this.$store.getters.sub_total;
      sum = sum * 0.35;
      return new Intl.NumberFormat("ru-Ru", {
        currency: "usd",
        style: "currency",
      }).format(sum);
    },
  },
};
</script>

<style lang="scss">
.admin-total {
  margin-top: 2rem;
  margin-bottom: 4rem;
  padding: 3rem;
  border-radius: 1rem;
  border: 1px solid #ccc;
  &__row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 3rem;
  }
  &__column {
    &:last-of-type {
      font-weight: bold;
    }
  }
}
</style>
