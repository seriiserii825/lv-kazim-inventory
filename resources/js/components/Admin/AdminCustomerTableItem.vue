<template>
    <tr>
        <td>{{ item.title.slice(0, 18) }}</td>
        <td>
            <div class="admin-customer__quantity">
                <el-button class="admin-customer__btn" type="success" @click="dec">-</el-button>
                <input type="text" v-model="item.current_count" style="width: 32px"/>
                <el-button class="admin-customer__btn" type="success" @click="inc">+</el-button>
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
    },
};
</script>

<style lang="scss"></style>
