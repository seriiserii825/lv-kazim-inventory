<template>
    <admin-layout>
        <div class="sale">
            <el-button type="success" @click="downloadCSVData">Download Csv</el-button>
        </div>
    </admin-layout>
</template>
<script>
import AdminLayout from "../../layouts/AdminLayout.vue";
import AdminBlock from "../../components/Admin/AdminBlock.vue";
import AdminProducts from "../../components/Admin/AdminProducts.vue";
import AdminCustomer from "../../components/Admin/AdminCustomer";

export default {
    data() {
        return {
            csv: []
        }
    },
    methods: {
        handleClick(tab, event) {
            // console.log(tab, event);
        },
        getCsv() {
            axios
                .get(
                    "/api/auth/csv?api_token=" + this.$store.getters.getToken
                )
                .then((res) => {
                    this.csv = res.data;
                })
                .catch((error) => {
                    console.log(error, "error");
                });
        },
        downloadCSVData() {
            let csv = 'id,title_it,title_en,title_fr,title_de,title_esp,title_ru,\n';
            this.csv.forEach((row) => {
                let values = Object.values(row);
                // values = values.filter(Boolean);
                csv += values.join(',');
                csv += "\n";
            });

            const anchor = document.createElement('a');
            anchor.href = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
            anchor.target = '_blank';
            anchor.download = 'typologies.csv';
            anchor.click();
        }
    },
    created() {
        this.getCsv();
    },
    components: {
        AdminLayout,
        AdminCustomer,
        AdminBlock,
        AdminProducts,
    },
};
</script>
