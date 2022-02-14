<template>
    <div class="admin-customer">
        <el-button type="success">Add customer</el-button>
        <admin-table class="admin-customer__table">
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items" :key="item.product_id" @click="remove(item.product_id)">
                    <td>{{ item.product_title }}</td>
                    <td>
                        <div class="admin-customer__quantity">
                            <el-button class="admin-customer__btn" type="success">-</el-button>
                            <input type="text" v-model="item.quantity" style="width: 15px;">
                            <el-button class="admin-customer__btn" type="success">+</el-button>
                        </div>
                    </td>
                    <td>{{ item.price }}</td>
                    <td>{{ item.sub_total }}</td>
                    <td>
                        <div class="el-icon-error icon-error"></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </admin-table>
        <admin-total></admin-total>
        <admin-customer-form></admin-customer-form>
    </div>
</template>
<script>
import AdminCustomerForm from "./AdminCustomerForm.vue";
import AdminTable from "./AdminTable";
import AdminTotal from "./AdminTotal";

export default {
    data() {
        return {
            items: []
        }
    },
    components: {AdminTotal, AdminTable, AdminCustomerForm},
    methods: {
        remove(id) {
            this.$confirm("This will permanently delete. Continue?", "Warning", {
                confirmButtonText: "OK",
                cancelButtonText: "Cancel",
                type: "warning",
            })
                .then(() => {
                    axios
                        .delete(
                            "/api/auth/cart/" + id + "?api_token=" + this.$store.getters.getToken
                        )
                        .then((res) => {
                            this.getItems();
                            this.$notify({
                                type: "success",
                                message: "Delete completed",
                            });
                        })
                        .catch((error) => {
                            this.errors = error.response.data.errors;
                        });
                })
                .catch(() => {
                    this.$notify({
                        type: "info",
                        message: "Delete canceled",
                    });
                });
        },
        getItems() {
            axios
                .get("/api/auth/cart?api_token=" + this.$store.getters.getToken)
                .then((res) => {
                    this.items = res.data.data;
                })
                .catch((error) => {
                    console.log(error, "error");
                });
        },
    },
    created() {
        this.getItems();
        Reload.$on('AfterAdd', () => {
            this.getItems();
        });
    },
};
</script>
<style lang="scss">
.admin-customer {
    &__table {
        margin-top: 3rem;
        td,
        th {
            font-size: 1.3rem;
            text-align: center;
        }
        .icon-error {
            display: block;
            font-size: 3rem;
            cursor: pointer;
        }
    }
    &__quantity {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    &__btn {
        padding: 2px 4px;
    }
}
</style>
