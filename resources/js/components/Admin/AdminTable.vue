<template>
  <div class="admin-table">
    <slot></slot>
  </div>
</template>
<script>
export default {};
</script>
<style lang="scss">
.admin-table {
  table {
    width: 100%;
    border-collapse: collapse;
  }
  th,
  td {
    padding: 1rem;
    border: 1px solid #444;
    &:nth-of-type(7) {
      width: 7rem;
    }
  }
  th {
    color: white;
    background-color: #444;
  }
  tr:nth-of-type(even) {
    background-color: #bbb;
  }
  &__actions {
    display: flex;
    align-items: center;
    a {
      margin-right: 1rem;
    }
  }
}
</style>