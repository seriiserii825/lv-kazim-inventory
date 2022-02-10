<template>
  <admin-layout>
    <el-row class="mb-3">
      <router-link :to="{ name: 'admin.products' }">
        <el-button type="success">All products</el-button>
      </router-link>
    </el-row>
    <h3 class="form__title">Create product</h3>
    <el-form ref="form" :model="form" label-width="120px">
      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item label="Title">
            <el-input name="name" v-model="form.title"></el-input>
            <small class="form--error" v-if="errors && errors.title">{{
              errors.title[0]
            }}</small>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item label="Code">
            <el-input name="email" v-model="form.code"></el-input>
            <small class="form--error" v-if="errors && errors.code">{{
              errors.code[0]
            }}</small>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item label="Buying price">
            <el-input
              name="buying_price"
              v-model="form.buying_price"
            ></el-input>
            <small class="form--error" v-if="errors && errors.buying_price">{{
              errors.buying_price[0]
            }}</small>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item label="Selling price">
            <el-input
              name="selling_price"
              v-model="form.selling_price"
            ></el-input>
            <small class="form--error" v-if="errors && errors.selling_price">{{
              errors.selling_price[0]
            }}</small>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item label="Buy date">
            <el-date-picker
              v-model="form.buying_date"
              type="date"
              placeholder="Pick a day"
            >
            </el-date-picker>
            <small class="form--error" v-if="errors && errors.buying_date">{{
              errors.buying_date[0]
            }}</small>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item label="Quantity">
            <el-input
              name="product_quantity"
              v-model="form.product_quantity"
            ></el-input>
            <small
              class="form--error"
              v-if="errors && errors.product_quantity"
              >{{ errors.product_quantity[0] }}</small
            >
          </el-form-item>
        </el-col>
      </el-row>
      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item label="Category">
            <el-select v-model="form.category_id" placeholder="Category">
              <el-option
                v-for="item in categories"
                :key="item.id"
                :label="item.title"
                :value="item.id"
              >
              </el-option>
            </el-select>

            <small class="form--error" v-if="errors && errors.category_id">{{
              errors.category_id[0]
            }}</small>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item label="Supplier">
            <el-select v-model="form.supplier_id" placeholder="Supplier">
              <el-option
                v-for="item in suppliers"
                :key="item.id"
                :label="item.name"
                :value="item.id"
              >
              </el-option>
            </el-select>

            <small class="form--error" v-if="errors && errors.supplier_id">{{
              errors.supplier_id[0]
            }}</small>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item label="Root">
            <el-input name="salary" v-model="form.root"></el-input>
            <small class="form--error" v-if="errors && errors.root">{{
              errors.root[0]
            }}</small>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item label="Image">
            <el-button type="primary" @click="showMediaGrid = true"
              >Add image</el-button
            >
            <images-thumbs :images="form.images"></images-thumbs>
          </el-form-item>
          <small class="form--error" v-if="errors && errors.image">{{
            errors.image[0]
          }}</small>
        </el-col>
      </el-row>
      <el-row>
        <el-col :span="6" :offset="18">
          <el-form-item>
            <el-button type="success" @click.prevent="onSubmit"
              >Create
            </el-button>
          </el-form-item>
        </el-col>
      </el-row>
    </el-form>
    <media-grid
      @emit_images="emit_images"
      @handler="showMediaGrid = false"
      v-if="showMediaGrid"
      :single="false"
    />
  </admin-layout>
</template>
<script>
import AdminLayout from "../../layouts/AdminLayout.vue";
import FormComponent from "../../components/FormComponent.vue";
import MediaGrid from "../../components/MediaGrid.vue";
import ImagesThumbs from "../../components/ImagesThumbs.vue";

export default {
  data() {
    return {
      form: {
        category_id: "",
        supplier_id: "",
        title: "",
        code: "",
        root: "",
        buying_price: "",
        selling_price: "",
        buying_date: "",
        image: "",
        product_quantity: "",
        images: [],
      },
      categories: [],
      suppliers: [],
      errors: {},
      showMediaGrid: false,
    };
  },
  components: {
    AdminLayout,
    FormComponent,
    MediaGrid,
    ImagesThumbs,
  },
  methods: {
    emit_images(images) {
      this.form.images = images;
      this.form.image = this.form.images[0];
    },
    onSubmit() {
      axios
        .post(
          "/api/auth/products?api_token=" + this.$store.getters.getToken,
          this.form
        )
        .then((res) => {
          this.$router.push({ name: "admin.products" });
          this.$notify({
            type: "success",
            message: "Post was created",
          });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
  mounted() {
    axios
      .get("/api/auth/product-create?api_token=" + this.$store.getters.getToken)
      .then((res) => {
        this.categories = res.data.categories;
        this.suppliers = res.data.suppliers;
        console.log(this.suppliers, "this.suppliers");
        // this.$router.push({ name: "admin.products" });
        this.$notify({
          type: "success",
          message: "Post was created",
        });
      })
      .catch((error) => {
        this.errors = error.response.data.errors;
      });
  },
};
</script>
