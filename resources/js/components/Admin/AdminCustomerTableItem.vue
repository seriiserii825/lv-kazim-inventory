<template>
  <tr>
    <td>{{ item.title.slice(0, 18) }}</td>
    <td>
      <div class="admin-customer__quantity">
        <el-button class="admin-customer__btn" type="success" @click="dec"
          >-</el-button
        >
        <input
          @blur="current_count_on_change"
          type="text"
          v-model="item.current_count"
          style="width: 32px"
        />
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
  methods: {
    removeItem(id) {
      this.$emit("remove_item", id);
    },
    async inc() {
      if (this.item.current_count < this.item.product_quantity) {
        await this.$store.dispatch("increase", this.item.id);
      }
    },
    async dec() {
      if (this.item.current_count > 1) {
        await this.$store.dispatch("decrease", this.item.id);
      }
    },
    current_count_on_change() {
      console.log(this.item.current_count, "item.current_count");
      if (this.item.current_count < 1) {
        this.item.current_count = 1;
      } else if (this.item.current_count > this.item.product_quantity) {
        this.item.current_count = this.item.product_quantity;
      }
      this.$store.dispatch("set_count", {
        id: this.item.id,
        count: this.item.current_count,
      });

      this.$store.getters.cart.forEach((element) => {
        console.log(element.current_count, "element.current_count");
        console.log(element.product_quantity, "element.product_quantity");
      });
    },
  },
};
</script>

<style lang="scss"></style>
