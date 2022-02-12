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
      ></admin-product>
    </div>
  </div>
</template>
<script>
import AdminProduct from "./AdminProduct.vue";
export default {
  data() {
    return {
      items: [],
      sort_field: "created_at",
      sort_direction: "desc",
      search: "",
      filtered: [],
    };
  },
  components: {
    AdminProduct,
  },
  methods: {
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
            "&api_token=" +
            this.$store.getters.getToken
        )
        .then((res) => {
          this.items = res.data.data;
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