<template>
  <admin-layout>
    <el-row class="mb-3">
      <router-link :to="{ name: 'admin.media.create' }">
        <el-button type="success">Create</el-button>
      </router-link>
    </el-row>
    <h2 class="admin-layout__title">List media</h2>
    <ul class="media-list">
      <li v-for="item in items" :key="item.id">
        <img :src="item.path" alt="" />
      </li>
    </ul>
  </admin-layout>
</template>
<script>
import axios from "axios";
import AdminLayout from "./../../layouts/AdminLayout.vue";
export default {
  data() {
    return {
      items: [],
      fullscreenLoading: false,
    };
  },
  components: {
    AdminLayout,
  },
  methods: {
    remove(id) {
      this.$confirm("This will permanently delete. Continue?", "Warning", {
        confirmButtonText: "OK",
        cancelButtonText: "Cancel",
        type: "warning",
      })
        .then(() => {
          axios
            .delete("/api/auth/media/" + id)
            .then((res) => {
              this.getItems();
            })
            .catch((error) => {
              this.errors = error.response.data.errors;
              // this.form_submitting = false;
            });
          this.$notify({
            type: "success",
            message: "Delete completed",
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
        .get("/api/auth/media")
        .then((res) => {
          this.items = res.data.data;
          console.log(this.items, "this.items");
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
.media-list {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  margin: 0;
  padding: 0;
  width: 100%;
  list-style-type: none;
  li {
    position: relative;
    margin-bottom: 2rem;
    width: 18%;
    height: 20rem;
    background-color: white;
    border: 1px solid #ccc;
    box-shadow: 0 0 6px 2px rgba(0, 0, 0, 0.2);
    img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
}
</style>