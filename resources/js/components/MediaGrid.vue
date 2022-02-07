<template>
  <div class="media-grid">
    <header class="media-grid__header">
      <input type="text" />
      <div @click="closeMediaGrid" class="el-icon-circle-close"></div>
    </header>
    <div class="media-grid__wrap">
      <div class="media-grid__item" v-for="item in items" :key="item.id">
        <media-grid-item
          :path="item.path"
          @add-image="add_image"
          @remove-image="remove_image"
        />
      </div>
    </div>
    <el-button type="primary" @click="emit_images">Add images</el-button>
  </div>
</template>
<script>
import MediaGridItem from "./MediaGridItem.vue";
export default {
  components: { MediaGridItem },
  data() {
    return {
      items: [],
      images: [],
    };
  },
  methods: {
    emit_images() {
      this.$emit("emit_images", this.images);
      this.closeMediaGrid();
    },
    add_image(value) {
      this.images.push(value);
    },
    remove_image(value) {
      this.images = this.images.filter((item) => {
        return item !== value;
      });
    },
    closeMediaGrid() {
      this.$emit("handler");
    },
    getItems() {
      axios
        .get("/api/auth/media")
        .then((res) => {
          this.items = res.data.data;
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
  mounted() {
    this.getItems();
  },
};
</script>
<style lang="scss">
.media-grid {
  position: fixed;
  top: 0;
  left: 0;
  padding: 4rem;
  width: 100%;
  height: 100%;
  background-color: #f4f4f4;
  z-index: 10000;
  &__header {
    margin-bottom: 5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    .el-icon-circle-close {
      font-size: 4rem;
      color: red;
      cursor: pointer;
    }
  }
  &__wrap {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-bottom: 2rem;
    padding: 3rem;
    background-color: #ddd;
  }
  &__item {
    position: relative;
    margin-bottom: 3rem;
    width: 14rem;
    height: 10rem;
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