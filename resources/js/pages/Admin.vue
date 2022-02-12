<template>
  <AdminLayout>
    <admin-cards></admin-cards>
  </AdminLayout>
</template>
<script>
import AdminCards from "../components/Admin/AdminCards.vue";
import AdminLayout from "./../layouts/AdminLayout.vue";
export default {
  components: {
    AdminLayout,
    AdminCards,
  },
};
</script>