<template>
    <admin-layout>
        <el-row class="mb-3">
            <router-link :to="{ name: 'admin.salaries.month' }">
                <el-button type="success">All salaries by Month</el-button>
            </router-link>
        </el-row>
        <h3 class="form__title">Edit salary</h3>
        <admin-table>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in items" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.month }}</td>
                    <td>{{ item.amount }}</td>
                    <td>{{ item.date }}</td>
                    <td>
                        <div class="admin-table__actions">
                            <router-link :to="{ name: 'admin.salaries.edit', params: { id: item.id }, }">
                                <el-button type="primary">Edit</el-button>
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
import AdminLayout from "../../layouts/AdminLayout.vue";
import FormComponent from "../../components/FormComponent.vue";
import AdminTable from "../../components/Admin/AdminTable.vue";

export default {
    data() {
        return {
            errors: {},
            items: [],
        };
    },
    components: {
        AdminLayout,
        FormComponent,
        AdminTable,
    },
    mounted() {
        const url = "/api/auth/salary-month-single/" + this.$route.params.month + "?api_token=" + this.$store.getters.getToken;
        axios
            .get(url)
            .then((res) => {
                this.items = res.data.salaries;
                // console.log(res.data, 'res.data')
            })
            .catch((error) => {
                this.errors = error.response.data.errors;
            });
    },
};
</script>
