<template>
  <div class="admin-products">
    <el-input
      class="mb-5"
      placeholder="Please input"
      v-model="search"
      @input="searchProducts"
    ></el-input>
    <div class="admin-products__wrap">
      <admin-product
        v-for="item in filtered"
        :key="item.id"
        :img="item.image"
        :title="item.title"
        :count="item.product_quantity"
        @click.prevent.native="
          addToCart(
            item.id,
            item.title,
            item.product_quantity,
            item.selling_price
          )
        "
      ></admin-product>
    </div>
  </div>
</template>
<script>
import AdminProduct from "./AdminProduct.vue";

export default {
  props: {
    category_id: {
      type: Number,
      default: 0,
    },
  },
  data() {
    return {
      items: [],
      sort_field: "created_at",
      sort_direction: "desc",
      search: "",
      filtered: [],
      cart_items: [],
      products_exists_in_cart: false,
    };
  },
  components: {
    AdminProduct,
  },
  methods: {
    async addToCart(id, title, quantity, price) {
    },
    searchProducts() {
      this.filtered = this.items.filter((item) => {
        return item.title.toLowerCase().includes(this.search.toLowerCase());
      });
    },
    getItems() {
      axios
        .get(
          "/api/auth/products/" +
            "?sort_field=" +
            this.sort_field +
            "&sort_direction=" +
            this.sort_direction +
            "&product_quantity=in_stock" +
            "&category_id=" +
            this.category_id +
            "&api_token=" +
            this.$store.getters.getToken
        )
        .then((res) => {
          this.items = res.data.data;
          // console.log(this.items, "this.items");
          this.filtered = this.items;
        })
        .catch((error) => {
          console.log(error, "error");
        });
    },
  },
  created() {
    this.getItems();
  },
  mounted() {
    // console.log(this.category_id, "this.category_id");
  },
};
</script>
<style lang="scss">
.admin-products {
  &__wrap {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(18rem, 23rem));
    grid-gap: 3rem;
  }
}
</style>
