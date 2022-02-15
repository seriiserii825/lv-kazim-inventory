<template>
  <tr>
    <td>{{ item.title }}</td>
    <td>
      <div class="admin-customer__quantity">
        <el-button class="admin-customer__btn" type="success" @click="dec"
          >-</el-button
        >
        <input type="text" v-model="count" style="width: 15px" />
        <el-button class="admin-customer__btn" type="success" @click="inc"
          >+</el-button
        >
      </div>
    </td>
    <td>{{ item.selling_price }}</td>
    <td>{{ item.sub_total }}</td>
    <td>
      <div
        class="el-icon-error icon-error"
        @click="removeItem(item.product_id)"
      ></div>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["item"],
  data() {
    return {
      count: 1,
      quantity: 0,
    };
  },
  methods: {
    removeItem(id) {
      this.$emit("remove_item", id);
    },
    inc() {
      if (this.count < this.quantity) {
        this.count += 1;
      }
    },
    dec() {
      if (this.count > 1) {
        this.count -= 1;
      }
    },
  },
  created() {
    this.quantity = this.item.quantity;
    console.log(this.iteml, "this.iteml");
  },
};
</script>

<style lang="scss"></style>
