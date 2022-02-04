require("./bootstrap");

import Vue from "vue";
import VueRouter from "vue-router";
import Element from "element-ui";
import routes from "./routes";
import User from "./helpers/User";
window.User = User;

Vue.use(VueRouter);
Vue.use(Element);

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component("app-component", require("./layouts/App.vue").default);

const router = new VueRouter(routes);

const app = new Vue({
    el: "#app",
    router,
});
