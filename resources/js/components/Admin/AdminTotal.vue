<template>
  <div class="admin-total">
    <div class="admin-total__row">
      <div class="admin-total__column">Total Quantity</div>
      <div class="admin-total__column">56</div>
    </div>
    <div class="admin-total__row">
      <div class="admin-total__column">SubTotal</div>
      <div class="admin-total__column">562$</div>
    </div>
    <div class="admin-total__row">
      <div class="admin-total__column">Vat</div>
      <div class="admin-total__column">35%</div>
    </div>
    <div class="admin-total__row">
      <div class="admin-total__column">Total</div>
      <div class="admin-total__column">5462$</div>
    </div>
  </div>
</template>

<script>
export default {};
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
