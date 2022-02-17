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
      <div class="admin-total__column">{{ vat }}%</div>
    </div>
    <div class="admin-total__row">
      <div class="admin-total__column">Total</div>
      <div class="admin-total__column">{{ total }}</div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      vat: 5,
    };
  },
  computed: {
    total_count() {
      return this.$store.getters.total_count;
    },
    sub_total() {
      return this.$store.getters.sub_total;
    },
    total() {
      return this.formatTotal(this.sub_total);
    },
  },
  methods: {
    parseSum(sum) {
      const result = sum.replace(/\s/gi, "");
      return parseInt(result);
    },
    formatTotal(total) {
      let sum = this.parseSum(total);

      const percent = parseInt(this.vat) / 100;
      sum = sum - sum * percent;
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
