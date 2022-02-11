<template>
    <admin-layout>
        <el-row class="mb-3">
            <router-link :to="{ name: 'admin.salaries' }">
                <el-button type="success">All salaries</el-button>
            </router-link>
        </el-row>
        <h2 class="admin-layout__title">List salaries by Month</h2>
        <admin-table>
            <table>
                <thead>
                <tr>
                    <th>Month</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items" :key="item.id">
                    <td>{{ item.month }}</td>
                    <td>
                        <div class="admin-table__actions">
                            <router-link
                                :to="{ name: 'admin.salaries.month.single', params: { month: item.month }, }">
                                <el-button type="primary">View</el-button>
                            </router-link>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </admin-table>
    </admin-layout>
</template>
<script>
import axios from "axios";
import AdminLayout from "./../../layouts/AdminLayout.vue";
import AdminTable from "../../components/Admin/AdminTable.vue";

export default {
    data() {
        return {
            items: [],
            fullscreenLoading: false,
        };
    },
    components: {
        AdminLayout,
        AdminTable,
    },
    methods: {
        getItems() {
            axios
                .get("/api/auth/salary-month?api_token=" + this.$store.getters.getToken)
                .then((res) => {
                    this.items = res.data.salaries;
                    console.log(this.items, 'this.items')
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
