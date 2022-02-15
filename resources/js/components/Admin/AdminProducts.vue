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
                @click.prevent.native="addToCart(item.id, item.title, item.product_quantity, item.selling_price)"
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

           await this.checkProductExists(id);

            const data = {
                product_id: id,
                product_title: title,
                price: price,
                quantity: quantity,
                sub_total: price,
            };

            console.log(this.products_exists_in_cart, 'this.products_exists_in_cart')

            if (!this.products_exists_in_cart) {
                axios
                    .post("/api/auth/cart?api_token=" + this.$store.getters.getToken, data)
                    .then((res) => {
                        this.$notify({
                            type: "success",
                            message: `Product "${title}" was updated to cart`,
                        });
                        console.log(res, 'res post')
                        this.products_exists_in_cart = true;
                        Reload.$emit('AfterAdd');
                    })
                    .catch((error) => {
                            this.errors = error;
                            if (this.errors.product_id) {
                                let id_error = this.errors.product_id;
                                this.$notify({
                                    type: "error",
                                    message: id_error[0]
                                });
                            }
                        }
                    );
            } else if (this.products_exists_in_cart) {
                axios
                    .put("/api/auth/cart/" + id + "?api_token=" + this.$store.getters.getToken, data)
                    .then((res) => {
                        console.log(res.data, 'res update')
                        this.$notify({
                            type: "success",
                            message: `Product "${title}" was added to cart`,
                        });
                        Reload.$emit('AfterAdd');
                    })
                    .catch((error) => {
                            this.errors = error.response.data;
                        }
                    );
            }
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
        getCartItems() {
            axios
                .get("/api/auth/cart?api_token=" + this.$store.getters.getToken)
                .then((res) => {
                    this.cart_items = res.data.data;
                })
                .catch((error) => {
                    console.log(error, "error");
                });
        },
        checkProductExists(id) {
            return axios
                .get(
                    "/api/auth/product-exists-in-cart/" + id + "?api_token=" +
                    this.$store.getters.getToken
                )
                .then((res) => {
                    this.products_exists_in_cart = res.data.product_exists;
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                    if (this.errors.product_id) {
                        let id_error = this.errors.product_id;
                        this.$notify({
                            type: "error",
                            message: id_error[0],
                        });
                    }
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
