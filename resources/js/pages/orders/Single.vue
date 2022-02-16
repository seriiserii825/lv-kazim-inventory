<template>
  <admin-layout>
    <el-row class="mb-3">
      <router-link :to="{ name: 'admin.customers' }">
        <el-button type="success">All customers</el-button>
      </router-link>
    </el-row>
    <h3 class="form__title">Edit customers</h3>

    <el-form ref="form" :model="form" label-width="120px">
      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item label="Full name">
            <el-input name="name" v-model="form.name"></el-input>
            <small class="form--error" v-if="errors && errors.name">{{
              errors.name[0]
            }}</small>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item label="Email">
            <el-input name="email" v-model="form.email"></el-input>
            <small class="form--error" v-if="errors && errors.email">{{
              errors.email[0]
            }}</small>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item label="Address">
            <el-input name="address" v-model="form.address"></el-input>
            <small class="form--error" v-if="errors && errors.address">{{
              errors.address[0]
            }}</small>
          </el-form-item>
        </el-col>
        <el-col :span="6">
          <el-form-item label="Phone">
            <el-input name="phone" v-model="form.phone"></el-input>
            <small class="form--error" v-if="errors && errors.phone">{{
              errors.phone[0]
            }}</small>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row :gutter="20">
        <el-col :span="6">
          <el-form-item label="Photo">
            <el-button type="primary" @click="showMediaGrid = true"
              >Add image</el-button
            >
            <images-thumbs :images="form.images"></images-thumbs>
            <img width="250" :src="form.photo" alt="" />
          </el-form-item>
          <small class="form--error" v-if="errors && errors.photo">{{
            errors.photo[0]
          }}</small>
        </el-col>
      </el-row>
      <el-row>
        <el-col :span="6" :offset="18">
          <el-form-item>
            <el-button type="success" @click.prevent="onSubmit"
              >Update
            </el-button>
          </el-form-item>
        </el-col>
      </el-row>
    </el-form>

    <media-grid
      @emit_images="emit_images"
      @handler="showMediaGrid = false"
      v-if="showMediaGrid"
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
        name: "",
        email: "",
        address: "",
        salary: "",
        join_date: "",
        nid: "",
        phone: "",
        photo: null,
        images: [],
      },
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
      this.form.photo = images[0];
    },
    onSubmit() {
      axios
        .put(
          "/api/auth/customers/" +
            this.$route.params.id +
            "?api_token=" +
            this.$store.getters.getToken,
          this.form
        )
        .then((res) => {
          this.$router.push({ name: "admin.customers" });
          this.$notify({
            type: "success",
            message: "Post was edited",
          });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
  mounted() {
    axios
      .get(
        "/api/auth/customers/" +
          this.$route.params.id +
          "?api_token=" +
          this.$store.getters.getToken
      )
      .then((res) => {
        console.log(res.data.data, "res.data.data");
        this.form = res.data.data;
      })
      .catch((error) => {
        this.errors = error.response.data.errors;
      });
  },
};
</script>
