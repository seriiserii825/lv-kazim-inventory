<template>
  <admin-layout>
    <div class="orders">
      <div class="orders__item">
        <admin-block title="Customer details">
          <ul>
            <li>
              <span class="orders__label">Name:</span>
              <strong class="orders__value">{{ item.name }}</strong>
            </li>
            <li>
              <span class="orders__label">Phone:</span>
              <strong class="orders__value">{{ item.phone }}</strong>
            </li>
            <li>
              <span class="orders__label">Address:</span>
              <strong class="orders__value">{{ item.address }}</strong>
            </li>
            <li>
              <span class="orders__label">Email:</span>
              <strong class="orders__value">{{ item.email }}</strong>
            </li>
            <li>
              <span class="orders__label">Date:</span>
              <strong class="orders__value">{{ item.date }}</strong>
            </li>
          </ul>
        </admin-block>
      </div>
      <div class="orders__item">
        <admin-block title="Order details">
          <ul>
            <li>
              <span class="orders__label">Pay by:</span>
              <strong class="orders__value">{{ item.pay_by }}</strong>
            </li>
            <li>
              <span class="orders__label">Sub total:</span>
              <strong class="orders__value">{{ item.sub_total }}</strong>
            </li>
            <li>
              <span class="orders__label">Vat:</span>
              <strong class="orders__value">{{ item.vat }}</strong>
            </li>
            <li>
              <span class="orders__label">Total:</span>
              <strong class="orders__value">{{ item.total }}</strong>
            </li>
            <li>
              <span class="orders__label">Products:</span>
              <strong
                class="orders__value"
                v-if="item.products && item.products.length"
                >{{ item.products.length }}</strong
              >
            </li>
          </ul>
        </admin-block>
      </div>
    </div>
    <admin-block title="Products">
      <admin-table>
        <table>
          <thead>
            <tr>
              <th>Id</th>
              <th>Image</th>
              <th>Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in item.products" :key="item.id">
              <td>{{ item.id }}</td>
              <td><img :src="item.image" :width="100" alt=""></td>
              <td>{{ item.title }}</td>
              <td>{{ formatTotal(item.selling_price) }}</td>
              <td>{{ item.current_count }}</td>
              <td>{{ formatTotal(item.sub_total) }}</td>
            </tr>
          </tbody>
        </table>
      </admin-table>
    </admin-block>
  </admin-layout>
</template>
<script>
import AdminBlock from "../../components/Admin/AdminBlock.vue";
import AdminTable from "../../components/Admin/AdminTable.vue";
import AdminLayout from "../../layouts/AdminLayout.vue";

export default {
  data() {
    return {
      item: {},
    };
  },
  components: {
    AdminLayout,
    AdminBlock,
    AdminTable,
  },
  methods: {
    formatTotal(total) {
      return new Intl.NumberFormat("ru-Ru", {
        currency: "usd",
        style: "currency",
      }).format(total);
    },
    getOrder() {
      axios
        .get(
          "/api/auth/orders/" +
            this.$route.params.id +
            "?api_token=" +
            this.$store.getters.getToken
        )
        .then((res) => {
          this.item = res.data.data;
          this.item.products = JSON.parse(this.item.products);
          this.item.products.forEach((element) => {
            console.log(element, "element");
          });
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
  mounted() {
    this.getOrder();
  },
};
</script>
<style lang="scss">
.orders {
  display: flex;
  justify-content: space-between;
  margin-bottom: 6rem;
  &__item {
    width: 48%;
  }
  ul {
    li {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 3rem;
      padding: 1rem;
      border-bottom: 1px solid #ccc;
    }
  }
}
</style>
