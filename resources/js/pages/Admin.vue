<template>
  <AdminLayout>
    <div class="admin-cards">
      <div class="admin-cards__item">
        <admin-card
          icon="el-icon-picture"
          :count="String(mediaCount)"
          title="Media"
          bg="red"
        ></admin-card>
      </div>
      <div class="admin-cards__item">
        <admin-card
          icon="el-icon-s-custom"
          :count="String(employeeCount)"
          title="Employee"
          bg="blue"
        ></admin-card>
      </div>
    </div>
  </AdminLayout>
</template>
<script>
import axios from "axios";
import AdminCard from "../components/Admin/AdminCard.vue";
import AdminLayout from "./../layouts/AdminLayout.vue";
export default {
  data() {
    return {
      mediaCount: 0,
      employeeCount: 0,
    };
  },
  components: {
    AdminLayout,
    AdminCard,
  },
  mounted() {
    axios
      .get("/api/auth/media-count?api_token=" + this.$store.getters.getToken)
      .then((res) => {
        this.mediaCount = res.data.count;
      });

    axios
      .get("/api/auth/employee-count?api_token=" + this.$store.getters.getToken)
      .then((res) => {
        this.employeeCount = res.data.count;
      });
  },
};
</script>
<style lang="scss">
.admin-cards {
  display: flex;
  align-items: flex-start;
  margin-bottom: 4rem;
  margin-right: 4rem;
  &__item {
    margin-right: 4rem;
    margin-bottom: 4rem;
    width: 25rem;
  }
}
</style>
